<?php

function main()
{
	$cities = ['auburn', 'bham', 'columbusga', 'dothan', 'shoals', 'gadsden', 'huntsville', 'mobile', 'montgomery', 'tuscaloosa', 'anchorage', 'fairbanks', 'kenai', 'juneau', 'flagstaff', 'mohave', 'phoenix', 'prescott', 'showlow', 'sierravista', 'tucson', 'yuma', 'fayar', 'fortsmith', 'jonesboro', 'littlerock', 'memphis', 'texarkana', 'bakersfield', 'chico', 'fresno', 'goldcountry', 'hanford', 'humboldt', 'imperial', 'inlandempire', 'losangeles', 'mendocino', 'merced', 'modesto', 'monterey', 'orangecounty', 'palmsprings', 'redding', 'reno', 'sacramento', 'sandiego', 'slo', 'santabarbara', 'santamaria', 'sfbay', 'siskiyou', 'stockton', 'susanville', 'ventura', 'visalia', 'yubasutter', 'boulder', 'cosprings', 'denver', 'eastco', 'fortcollins', 'rockies', 'pueblo', 'westslope', 'newlondon', 'hartford', 'newhaven', 'nwct', 'daytona', 'keys', 'fortmyers', 'gainesville', 'cfl', 'jacksonville', 'lakeland', 'lakecity', 'ocala', 'okaloosa', 'orlando', 'panamacity', 'pensacola', 'sarasota', 'miami', 'spacecoast', 'staugustine', 'tallahassee', 'tampa', 'treasure', 'albanyga', 'athensga', 'atlanta', 'augusta', 'brunswick', 'columbusga', 'macon', 'nwga', 'savannah', 'statesboro', 'valdosta', 'boise', 'eastidaho', 'lewiston', 'pullman', 'spokane', 'twinfalls', 'bn', 'chambana', 'chicago', 'decatur', 'lasalle', 'mattoon', 'peoria', 'quadcities', 'rockford', 'carbondale', 'springfieldil', 'stlouis', 'quincy', 'bloomington', 'evansville', 'fortwayne', 'indianapolis', 'kokomo', 'tippecanoe', 'muncie', 'richmondin', 'southbend', 'terrehaute', 'ames', 'cedarrapids', 'desmoines', 'dubuque', 'fortdodge', 'iowacity', 'masoncity', 'omaha', 'quadcities', 'siouxcity', 'ottumwa', 'waterloo', 'kansascity', 'lawrence', 'ksu', 'nwks', 'salina', 'seks', 'swks', 'topeka', 'wichita', 'bgky', 'cincinnati', 'eastky', 'huntington', 'lexington', 'louisville', 'owensboro', 'westky', 'batonrouge', 'cenla', 'houma', 'lafayette', 'lakecharles', 'monroe', 'neworleans', 'shreveport', 'annapolis', 'baltimore', 'chambersburg', 'easternshore', 'frederick', 'smd', 'westmd', 'boston', 'capecod', 'southcoast', 'westernmass', 'worcester', 'annarbor', 'battlecreek', 'centralmich', 'detroit', 'flint', 'grandrapids', 'holland', 'jxn', 'kalamazoo', 'lansing', 'monroemi', 'muskegon', 'nmi', 'porthuron', 'saginaw', 'southbend', 'swmi', 'thumb', 'up', 'bemidji', 'brainerd', 'duluth', 'fargo', 'mankato', 'minneapolis', 'rmn', 'marshall', 'stcloud', 'gulfport', 'hattiesburg', 'jackson', 'memphis', 'meridian', 'northmiss', 'natchez', 'columbiamo', 'joplin', 'kansascity', 'kirksville', 'loz', 'semo', 'springfield', 'stjoseph', 'stlouis', 'billings', 'bozeman', 'butte', 'montana', 'greatfalls', 'helena', 'kalispell', 'missoula', 'asheville', 'boone', 'charlotte', 'eastnc', 'fayetteville', 'greensboro', 'hickory', 'onslow', 'outerbanks', 'raleigh', 'wilmington', 'winstonsalem', 'grandisland', 'lincoln', 'northplatte', 'omaha', 'scottsbluff', 'siouxcity', 'elko', 'lasvegas', 'reno', 'cnj', 'jerseyshore', 'newjersey', 'southjersey', 'albuquerque', 'clovis', 'farmington', 'lascruces', 'roswell', 'santafe', 'albany', 'binghamton', 'buffalo', 'catskills', 'chautauqua', 'elmira', 'fingerlakes', 'glensfalls', 'hudsonvalley', 'ithaca', 'longisland', 'newyork', 'oneonta', 'plattsburgh', 'potsdam', 'rochester', 'syracuse', 'twintiers', 'utica', 'watertown', 'bismarck', 'fargo', 'grandforks', 'nd', 'akroncanton', 'ashtabula', 'athensohio', 'chillicothe', 'cincinnati', 'cleveland', 'columbus', 'dayton', 'huntington', 'limaohio', 'mansfield', 'wheeling', 'parkersburg', 'sandusky', 'toledo', 'tuscarawas', 'youngstown', 'zanesville', 'fortsmith', 'lawton', 'enid', 'oklahomacity', 'stillwater', 'texoma', 'tulsa', 'bend', 'corvallis', 'eastoregon', 'eugene', 'klamath', 'medford', 'oregoncoast', 'portland', 'roseburg', 'salem', 'altoona', 'chambersburg', 'erie', 'harrisburg', 'lancaster', 'allentown', 'meadville', 'philadelphia', 'pittsburgh', 'poconos', 'reading', 'scranton', 'pennstate', 'twintiers', 'williamsport', 'york', 'charleston', 'columbia', 'florencesc', 'greenville', 'hiltonhead', 'myrtlebeach', 'nesd', 'csd', 'rapidcity', 'siouxfalls', 'sd', 'chattanooga', 'clarksville', 'cookeville', 'jacksontn', 'knoxville', 'memphis', 'nashville', 'tricities', 'abilene', 'amarillo', 'austin', 'beaumont', 'brownsville', 'collegestation', 'corpuschristi', 'dallas', 'nacogdoches', 'delrio', 'elpaso', 'galveston', 'houston', 'killeen', 'laredo', 'lubbock', 'mcallen', 'odessa', 'sanangelo', 'sanantonio', 'sanmarcos', 'bigbend', 'texarkana', 'texoma', 'easttexas', 'victoriatx', 'waco', 'wichitafalls', 'logan', 'ogden', 'provo', 'saltlakecity', 'stgeorge', 'charlottesville', 'danville', 'easternshore', 'fredericksburg', 'harrisonburg', 'lynchburg', 'blacksburg', 'norfolk', 'richmond', 'roanoke', 'swva', 'winchester', 'bellingham', 'kpr', 'lewiston', 'moseslake', 'olympic', 'pullman', 'seattle', 'skagit', 'spokane', 'wenatchee', 'yakima', 'charlestonwv', 'martinsburg', 'huntington', 'morgantown', 'wheeling', 'parkersburg', 'swv', 'wv', 'appleton', 'duluth', 'eauclaire', 'greenbay', 'janesville', 'racine', 'lacrosse', 'madison', 'milwaukee', 'northernwi', 'sheboygan', 'wausau'];
// $cities = ['portland','boise','seattle','spokane'];

	// $queries = ['Subaru h6', 'Subaru ll bean', 'Subaru l.l. Bean', 'Subaru VDC', 'subaru'];
	// $queries = ['Tundra Crewmax', 'Tundra 1794', 'Tundra LTD', 'Tundra platinum'];
	$queries = ['vanagon', 'eurovan', 'euro van', 'westfalia', 'delica', 'hiace', 'liteace', 'town ace', 'master ace', ];
	// $queries = ['t100'];
	// $queries = ['c30'];
	// $queries = ['cx-5','pathfinder','outlander', 'jeep'];
	// $queries = ['subaru'];
	// $queries = ['golf', 'vw golf'];
	// $queries = ['cr v', 'cr-v'];
	// $queries = ['sprinter',];

	$params = [
		'max_price'=>15000,
		'min_price'=>1000,
		'max_auto_miles'=>150000,
		'min_auto_miles'=>1000,
		'srchType'      => 'T',
		// 'auto_cylinders'=> 4,
		// 'auto_drivetrain' => 3, //awd
		'auto_title_status' =>1,
		// 'auto_paint' => 1, //black
	];

	//search($cities, 'apa', $params, $queries); //apartments
	search($cities, 'cta', $params, $queries); //cars 
}


class CLSearch extends Threaded
{
	public $data = [];

	function __construct($city, $category, $params)
	{
		$this->city   = $city;
		$this->params = $params;
		$this->cateogry = $category;
	}

	public function run()
	{
		// echo microtime(true).PHP_EOL;
		$data = basic_search($this->city, $this->cateogry, $this->params);

		foreach (json_decode($data) as $result)
		{
			preg_match('#\/(\d+).html#', $result->url, $matches);
			$this->data[$matches[1]] = $result;
		}
	}
}

class SearchPool extends Pool
{
	public $data = [];

	public function process()
	{
		// Run this loop as long as we have
		// jobs in the pool
		while ($this->collect(function (Collectable $job) {
			$this->data["$job->city|".$job->params['query']] = $job->data;
			return true;
		}));

		$this->shutdown();

		return $this->data;
	}
}

function search($cities, $category, $params, $queries)
{
	$unique = [];

	$pool = new SearchPool(5, Worker::class);

	foreach ($cities as $city)
	{
		foreach ($queries as $query)
		{
			$params['query'] = $query;

			$pool->submit(new CLSearch($city,$category, $params));
		}
	}

	$data = $pool->process();


	foreach ($data as $request => $results)
	{
		foreach ($results as $key => $value)
		{
			$unique[$key] = $value;
		}
	}
	echo print_html($queries[0], $unique);
}

function basic_search($city, $category, $params)
{
	$response = get("https://$city.craigslist.org/search/$category?".http_build_query($params));

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

function print_html($title, $list)
{
	$id_list = '';
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
		$id_list .= "$id,";
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
			var ids = ['.$id_list.'];

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



