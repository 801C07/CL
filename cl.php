<?php

class CLSearch extends Thread
{
	function __construct($city, $params)
	{
		$this->city   = $city;
		$this->params = $params;
	}

	public function run()
	{
		// echo microtime(true).PHP_EOL;
		$this->data = basic_search($this->city, $this->params);
	}
}

function basic_search($city, $params)
{
	$response = get("https://$city.craigslist.org/search/cto?".http_build_query($params));

	require 'QueryPath/src/qp.php';

	$html = htmlqp($response)->find('.result-image');
	$results = [];

	foreach ($html as $anchor)
	{
		$url = $anchor->attr('href');
		if(strpos($url, 'ttp'))
		{
			$results[] = ['url' => $url, 'image' => $anchor->attr('data-ids') ?? null, 'price' => $anchor->find('span')->text() ?? null];
		}
	}

	return json_encode($results);
}

function main()
{
	// require 'cities.php';
	$cities = ['portland','boise','seattle','spokane'];
	// $queries = ['Subaru h6', 'Subaru ll bean', 'Subaru l.l. Bean', 'Subaru VDC', 'subaru'];
	// $queries = ['Tundra Crewmax', 'Tundra 1794', 'Tundra LTD', 'Tundra platinum'];
	$queries = ['vanagon', 'eurovan', 'euro van', 'westfalia', 'delica', 'hiace'];
	// $queries = ['cx-5','pathfinder','outlander', 'jeep'];
	// $queries = ['subaru'];
	// $queries = ['golf', 'vw golf'];
	// $queries = ['cr v', 'cr-v'];
	// $queries = ['sprinter',];
	$results = [];
	$remote_ids = [];

	$params = [
		'max_price'=>10000,
		'min_price'=>400,
		'max_auto_miles'=>150000,
	];

	foreach ($cities as $city) 
	{
		foreach ($queries as $query) 
		{
			$remote_ids[] = "$city|$query";
		}
	}

	foreach ($remote_ids as &$remote_id) 
	{
		list($city, $query) = explode('|',$remote_id);
		$params['query'] = $query;

		$remote_id = new CLSearch($city, $params);
		$remote_id->start();
	}

	foreach ($remote_ids as $remote_id)
	{
		try{
			$remote_id->join();
			$json = json_decode($remote_id->data);

			foreach ($json as $result) 
			{
				preg_match('#\/(\d+).html#', $result->url, $matches);
				$results[$matches[1]] = $result;
			}
		}catch(RuntimeException $e)
		{
		}
	}


	echo print_html($queries[0], $results);
}

function print_html($title, $list)
{
	$html = '<meta charset=utf-8><title>'.$title.'</title><style></style><script src=https://code.jquery.com/jquery-3.2.1.min.js crossorigin=anonymous integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="></script><link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">';

	$html .= '<style>

	.center-img {
		display: block;
	    margin-left: auto;
	    margin-right: auto;
	    width: 50%;
		
	}
    </style>';

	foreach ($list as $id => $result)
	{
		preg_match('#\/ct.\/d\/(.+)\/\d+.html#', $result->url, $title);

		$html .= '<h2 class="w3-center">'.$title[1].'  '.$result->price.'</h2><div class="w3-content w3-display-container w3-center"><a href="'.$result->url.'">';
	
		foreach (explode(',', $result->image) as $image) 
		{
			$html .= '<img class="myslides-'.$id.' center-img" src="https://images.craigslist.org/'.(explode(':', $image)[1] ?? '').'_600x450.jpg"/>';
		}
		
		$html .= '</a><button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1,'.$id.')">&#10094;</button><button class="w3-button w3-black w3-display-right" onclick="plusDivs(1,'.$id.')">&#10095;</button></a></div>';
	}

	$html .= '
		<script>
			var ids = ['.implode(',',array_keys($list)).'];

			console.log(ids);
			slideIndex = {};
			ids.forEach(function(id){
				slideIndex[id] = 1;
				showDivs(slideIndex[id], id);
			});

			function plusDivs(n, id) {
			    showDivs(slideIndex[id] += n, id);
			}

			function showDivs(n, id) {
			    var i;
			    var x = document.getElementsByClassName("myslides-"+id.toString());
			    console.log("myslides-"+id);
			    if (n > x.length) {slideIndex[id] = 1}
			    if (n < 1) {slideIndex[id] = x.length} ;
			    for (i = 0; i < x.length; i++) {
			        x[i].style.display = "none";
			    }
			    x[slideIndex[id]-1].style.display = "block";
			}
		</script>';

	return $html;
}

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


function find_cities()
{
	$response = get('https://portland.craigslist.org');

	$phpq = htmlqp($response);
	$cities = [];
	
	foreach ($phpq->find('a') as $link)
	{
		if(strpos($link->attr('href'), '//geo.craigslist.org/iso/us/') !== false)
		{
			$geo = htmlqp(get('https:'.$link->attr('href')));

			foreach ($geo->find('.geo-site-list a') as $city) 
			{
				$cities[] = $city->attr('href');
			}
		}
	}

	array_unique($cities);
	print_r($cities);
}

function get_params()
{
	$query     = readline('Enter Query:');
	$mileage   = readline('Enter Max Mileage:');
	$max_price = readline('Enter Max Price:');
	$min_price = readline('Enter Min Price:');
	$body_type = readline("Enter Body Type: bus, convertible, coupe, hatchback, van, offroad, pickup, sedan, truck, SUV, wagon, van, other");

	$bodys = ['bus' => 1, 'convertible' => 2, 'coupe' => 3, 'hatchback' => 4, 'van' => 5, 'offroad' => 6, 'pickup' => 7, 'sedan' => 8, 'truck' => 9, 'SUV' => 10, 'wagon' => 11, 'van' => 12, 'other' => 13];

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


main();



