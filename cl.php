<?php

require 'QueryPath/src/qp.php';



function get($url)
{
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET"
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) 
	{
	  	echo "cURL Error #:" . $err;
	} 
	else 
	{
		return $response;
	}

}


function find_citys()
{
	$response = get('https://portland.craigslist.org');

	$phpq = phpQuery::newDocumentHTML($response);
	
	foreach ($phpq['a'] as $link)
	{
		if(strpos($link, '//geo.craigslist.org/iso/us/'))
		{

		}
	}


}

function get_params()
{
	$query     = readline('Enter Query:');
	$mileage   = readline('Enter Max Mileage:');
	$max_price = readline('Enter Max Price:');
	$min_price = readline('Enter Min Price:');
	$body_type = readline("Enter Body Type: bus, convertible, coupe, hatchback, van, offroad, pickup, sedan, truck, SUV, wagon, van, other");

	$bodys = ['bus' => 1, 'convertible' => 2, 'coupe' => 3, 'hatchback' => 4, 'van' => 5, 'offroad' => 6, 'pickup' => 7, 'sedan' => 8, 'truck' => 9, 'SUV' => 0, 'wagon' => 1, 'van' => 2, 'other' => 3];

	$params = [
		'query'=>$query,
		'max_price'=>$max_price,
		'min_price'=>$min_price,
		'max_auto_miles'=>$mileage,
	];

	if(!empty($body_type))
	{
		$params['body_type'] = $bodys[$body_type];
	}

	return $params;
}


function basic_search($city, $params)
{
	$response = get("https://$city.craigslist.org/search/cta?".http_build_query($params));

	$html = htmlqp($response)->find('.result-row a');
	$links = [];

	foreach ($html as $result)
	{
		$links [] = $result->attr('href');
	}

	array_unique($links);

	return $links;
}

$queries = ['Subaru h6', 'Subaru ll bean', 'Subaru l.l. Bean', 'Subaru VDC', 'Forester', 'Impreza', 'Cr-V awd', 'cr v', 'prius', 'rav 4', 'hybrid'];
$cities = ['portland', 'seattle', 'boise', 'losangeles', 'lasvegas', 'spokane', 'kpr', 'yakima', 'orangecounty', 'phoenix', 'sacramento', 'sandiego', 'sfbay'];
$results = [];

foreach ($cities as $city) 
{
	foreach ($queries as $query) 
	{
		$params = [
			'query'             => $query,
			'srchType'          => 'T',
			'max_price'         => 4000,
			'min_price'         => 400,
			'min_auto_miles'    => 1000,
			'max_auto_miles'    => 150000,
			'auto_title_status' => 1,
		];

		foreach(basic_search($city, $params) as $new_result)
		{
			if(strpos($new_result, 'http') !== false)
			{
				$results[] = $new_result;
			}
		}
	}
}

array_unique($results);

print_r($results);


