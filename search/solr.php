<?php
/*
 * This file includes all the solr related functions
 * 
 * */



require_once('config.php');

/*
 * The following functions are used to index specific projects.
 * Each function implements the appropriate crosswalk for its
 * respective project.
 * */

//SC Civil War
function importTabFileSCCivilWar(){
	$file = NULL;

	try {
		$file = new SplFileObject("uploads/upload-sc-civil-war.txt");
	}
	catch (Exception $error){
		echo '<div class="jumbotron"><h1 class="text-danger">Unable to open uploaded file. Please try again.</h1><p>'.$error->getMessage().'</p></div>';
		return;
	}

	$counter=0;

	while ($line = $file->fgets()) {
		if ($counter++ == 0) continue; //discard first line because it only contains headers


		$fields = explode("\t",$line);

		$document = array(
				'title' => $fields[0],
				'role_creator' => $fields[1],
				//'date' => parse_date($fields[2]),
				//'shelfmark' => $fields[3],
			    'description' => $fields[9].' - '.$fields[4],
				//'description' => $fields[5],
				//'archive' => $fields[6],
				'shelfmark' => $fields[7],
				//'contributing_institution' => $fields[8],
				//'rights' => $fields[9],
				'extent' => $fields[10],
				//'file_format' => $fields[11],
				'notes' => $fields[12].' - '.$fields[18],
				'language' => $fields[13],
				'archive' => $fields[14],
				//'geolocation_human' => $fields[15],
				'contributing_institution' => $fields[16],
				//'date_digital' => parse_date($fields[17]),
				//'none' => $fields[18],
				//'type_content' => $fields[19],
				'type_content' => $fields[20],
				'file_format' => $fields[21],
				'type_digital' => $fields[22],
				//'id' => $fields[23],
				//'id' => $fields[24],
				//'id' => $fields[25],
				'geolocation_human' => $fields[26].' - '.$fields[27],
				//'id' => $fields[27],
				//'id' => $fields[28],
				//'id' => $fields[29],
				'full_text' => $fields[30],
				//'id' => $fields[31],
				//'id' => $fields[32],
				//'id' => $fields[33],
				//'id' => $fields[34],
				//'id' => $fields[35],
				//'id' => $fields[36],
				'url' => $fields[37],
				'id' => $fields[37]
		);

		indexDocument($document);

		//$date_parsed = parse_date($date);
		//$date_digital_parsed = parse_date($date_digital);
	}
}

//George Lagrange Cook Photograph Collection
function importTabFileGCook(){
	//global $mysqli;
	$file = NULL;

	try {
		$file = new SplFileObject("uploads/upload-g-cook.txt");
	}
	catch (Exception $error){
		echo '<div class="jumbotron"><h1 class="text-danger">Unable to open uploaded file. Please try again.</h1><p>'.$error->getMessage().'</p></div>';
		return;
	}

	$counter=0;

	while ($line = $file->fgets()) {
		if ($counter++ == 0) continue; //discard first line because it only contains headers

		$fields = explode("\t",$line);
		
		$document = array(
		'title' => $fields[0],
		'role_creator' => $fields[1],
		//'date' => parse_date($fields[2]),
		'shelfmark' => $fields[3],
		//'subjects' => $fields[4],
		'description' => $fields[5],
		'archive' => $fields[6],
		//'none' => $fields[7],
		'contributing_institution' => $fields[8],
		//'rights' => $fields[9],
		'type_content' => $fields[10],
		'file_format' => $fields[11],
		'type_digital' => $fields[12],
		//'none' => $fields[13],
		'language' => $fields[14],
		'geolocation_human' => $fields[15],
		'notes' => $fields[16],
		//'date_digital' => parse_date($fields[17]),
		//'none' => $fields[18],
		//'none' => $fields[19],
		//'none' => $fields[20],
		'url' => $fields[21],
		'id' => $fields[21]
		);
		
		indexDocument($document);

		//$date_parsed = parse_date($date);
		//$date_digital_parsed = parse_date($date_digital);
	}
}

//Pope Brown Collection of Natural History
function importTabFilePBrown(){
	//global $mysqli;
	$file = NULL;

	try {
		$file = new SplFileObject("uploads/upload-p-brown.txt");
	}
	catch (Exception $error){
		echo '<div class="jumbotron"><h1 class="text-danger">Unable to open uploaded file. Please try again.</h1><p>'.$error->getMessage().'</p></div>';
		return;
	}

	$counter=0;

	while ($line = $file->fgets()) {
		if ($counter++ == 0) continue; //discard first line because it only contains headers

		$fields = explode("\t",$line);

		$document = array(
				'title' => $fields[0],
				//'role_creator' => $fields[1],
				//'date' => parse_date($fields[2]),
				//'shelfmark' => $fields[3],
				'shelfmark' => $fields[4],
				//'description' => $fields[5],
				'language' => $fields[6],
				'archive' => $fields[7],
				//'contributing_institution' => $fields[8],
				'contributing_institution' => $fields[9],
				//'type_content' => $fields[10],
				'type_content' => $fields[11],
				'file_format' => $fields[12],
				'type_digital' => $fields[13],
				'description' => $fields[14],
				//'geolocation_human' => $fields[15],
				//'notes' => $fields[16],
				//'date_digital' => parse_date($fields[17]),
				//'none' => $fields[18],
				//'none' => $fields[19],
				//'none' => $fields[20],
				'geolocation_human' => $fields[21],
				//'id' => $fields[22],
				//'id' => $fields[23],
				//'id' => $fields[24],
				//'id' => $fields[25],
				'id' => $fields[26],
				'url' => $fields[26]
		);

		indexDocument($document);

		//$date_parsed = parse_date($date);
		//$date_digital_parsed = parse_date($date_digital);
	}
}

//SIMMS
function importTabFileSimms(){
	
	print 'importTabFileSimms()<br>';
	//global $mysqli;
	$file = NULL;

	try {
		$file = new SplFileObject("uploads/upload-simms.txt");
	}
	catch (Exception $error){
		echo '<div class="jumbotron"><h1 class="text-danger">Unable to open uploaded file. Please try again.</h1><p>'.$error->getMessage().'</p></div>';
		return;
	}

	$counter=0;

	while ($line = $file->fgets()) {
		if ($counter++ == 0) continue; //discard first line because it only contains headers

		$fields = explode("\t",$line);

		$document = array(
				'title' => $fields[0],
				//'role_creator' => $fields[1],
				//'date' => parse_date($fields[2]),
				//'shelfmark' => $fields[3],
				//'shelfmark' => $fields[4],
				'contributing_institution' => $fields[5],
				//'language' => $fields[6],
				//'archive' => $fields[7],
				//'contributing_institution' => $fields[8],
				//'contributing_institution' => $fields[9],
				//'type_content' => $fields[10],
				//'type_content' => $fields[11],
				//'file_format' => $fields[12],
				//'type_digital' => $fields[13],
				//'description' => $fields[14],
				//'geolocation_human' => $fields[15],
				//'notes' => $fields[16],
				//'date_digital' => parse_date($fields[17]),
				//'none' => $fields[18],
				//'none' => $fields[19],
				//'none' => $fields[20],
				//'geolocation_human' => $fields[21],
				//'id' => $fields[22],
				'geolocation_human' => $fields[23],
				//'id' => $fields[24],
				//'id' => $fields[25],
				'description' => $fields[26],
				//'url' => $fields[27],
				'archive' => $fields[28],
				'url' => $fields[29],
				//'url' => $fields[30],
				//'role_creator' => $fields[311],
				//'date' => parse_date($fields[32]),
				//'shelfmark' => $fields[33],
				//'shelfmark' => $fields[34],
				//'description' => $fields[35],
				'type_content' => $fields[36],
				'file_format' => $fields[37],
				'type_digital' => $fields[38],
				//'contributing_institution' => $fields[39],
				//'type_content' => $fields[40],
				'notes' => $fields[41],
				'full_text' => $fields[42],
				//'type_digital' => $fields[43],
				//'description' => $fields[44],
				//'geolocation_human' => $fields[45],
				//'notes' => $fields[46],
				'url' => $fields[47],
				'id' => $fields[47]
				//'none' => $fields[49],
				//'none' => $fields[50],
		);

		indexDocument($document);

		//$date_parsed = parse_date($date);
		//$date_digital_parsed = parse_date($date_digital);
	}
}


//Southworth
function importTabFileSouthworth(){
	//global $mysqli;
	$file = NULL;

	try {
		$file = new SplFileObject("uploads/upload-southworth.txt");
	}
	catch (Exception $error){
		echo '<div class="jumbotron"><h1 class="text-danger">Unable to open uploaded file. Please try again.</h1><p>'.$error->getMessage().'</p></div>';
		return;
	}

	$counter=0;

	while ($line = $file->fgets()) {
		if ($counter++ == 0) continue; //discard first line because it only contains headers

		$fields = explode("\t",$line);

		$document = array(
				'title' => $fields[0],
				'alternative_title' => $fields[1],
				//'date' => parse_date($fields[2]),
				//'shelfmark' => $fields[3],
				//'shelfmark' => $fields[4],
				//'contributing_institution' => $fields[5],
				'geolocation_human' => $fields[6],
				//'archive' => $fields[7],
				'shelfmark' => $fields[8],
				//'' => $fields[9],
				'description' => $fields[10],
				//'type_content' => $fields[11],
				'archive' => $fields[12],
				//'type_digital' => $fields[13],
				'contributing_institution' => $fields[14],
				//'geolocation_human' => $fields[15],
				'language' => $fields[16],
				//'date_digital' => parse_date($fields[17]),
				//'none' => $fields[18],
				'type_content' => $fields[19],
				'file_format' => $fields[20],
				'type_digital' => $fields[21],
				//'id' => $fields[22],
				//'geolocation_human' => $fields[23],
				'notes' => $fields[24],
				'full_text' => $fields[25],
				//'description' => $fields[26],
				//'url' => $fields[27],
				//'archive' => $fields[28],
				'url' => $fields[29],
				'id' => $fields[29],
				//'role_creator' => $fields[311],
				//'date' => parse_date($fields[32]),
				//'shelfmark' => $fields[33],
				//'shelfmark' => $fields[34],
				//'description' => $fields[35],
				//'type_content' => $fields[36],
				//'file_format' => $fields[37],
				//'type_digital' => $fields[38],
				//'contributing_institution' => $fields[39],
				//'type_content' => $fields[40],
				//'notes' => $fields[41],
				//'full_text' => $fields[42],
				//'type_digital' => $fields[43],
				//'description' => $fields[44],
				//'geolocation_human' => $fields[45],
				//'notes' => $fields[46],
				//'url' => $fields[47],
				//'id' => $fields[47]
				//'none' => $fields[49],
				//'none' => $fields[50],
		);

		indexDocument($document);

		//$date_parsed = parse_date($date);
		//$date_digital_parsed = parse_date($date_digital);
	}
}

function indexDocument($doc){
	//print 'indexDocument()<br>';
	$data = array(
			'add' => array (
					'doc' => $doc
			)
	);
	$data_string = json_encode($data);                                                                                   

	print 'curl_exec() done <br>';
	print $doc['title'];	
	postJsonDataToSolr($data_string, 'update');
}

function commitIndex(){
	$data = array(
			'commit' => new stdClass()
	);
	$data_string = json_encode($data);
	postJsonDataToSolr($data_string, 'update');
}


//$data = json formatted string
//$action = solr handler eg. 'update', 'select'
function postJsonDataToSolr($data, $action){
	$url = $solrUrl.$action;
	//validate json data
	if (json_decode($data)==NULL){
		echo '<div class="col-xs-12"><h1 class="text-danger">postJsonData() invalid Json</h1><p><pre>'.json_last_error().'<br>'.json_last_error_msg().'</pre></p></div>';
		return;
	}
	
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Content-Length: ' . strlen($data))
			);
	
	$result = curl_exec($ch);
	//print_r($data);
	print_r($result);
}

/* function parse_date($date_string);
 * 
 * @param {string} $date_string: 
 *     string in the following format:
 *       "date - date" //for a date range
 *     or:
 *       "date" // for a single date
 *     (date) format:
 *       "yyyy-mm-dd"
 *     or:
 *       "yyyy-mm"
 *     or:
 *       "yyyy"
 * @return $parsed_date = array(
			'year_begin' => (int,default 0),
			'month_begin' => (int,default 0),
			'day_begin' => (int,default 0),
			'year_end' => (int,default 0),
			'month_end' => (int,default 0),
			'day_end' => (int,default 0)
	);
 * 
 * */
function parse_date($date_string){
	$date_string = trim($date_string);
	$parts = explode(' - ',$date_string);
	$parsed_date = array(
			'year_begin' => 0,
			'month_begin' => 0,
			'day_begin' => 0,
			'year_end' => 0,
			'month_end' => 0,
			'day_end' => 0,
			'years' => array()
	);
	
	if (sizeof($parts) == 1){//single date
		$date = explode('-',$parts[0]);
		if (sizeof($date)==3){//yyyy-mm-dd
			$parsed_date['year_begin'] = $date[0];
			$parsed_date['month_begin'] = $date[1];
			$parsed_date['day_begin'] = $date[2];
			$parsed_date['year_end'] = $date[0];
			$parsed_date['month_end'] = $date[1];
			$parsed_date['day_end'] = $date[2];
		}
		else if (sizeof($date)==2){//yyyy-mm
			$parsed_date['year_begin'] = $date[0];
			$parsed_date['month_begin'] = $date[1];
			$parsed_date['year_end'] = $date[0];
			$parsed_date['month_end'] = $date[1];
		}
		else {//yyy
			$parsed_date['year_begin'] = $parts[0];
			$parsed_date['year_end'] = $parts[0];

		}
	}
	else if (sizeof($parts) == 2){//date range
		$date = explode('-',$parts[0]);
		if (sizeof($date)==3){//yyyy-mm-dd
			$parsed_date['year_begin'] = $date[0];
			$parsed_date['month_begin'] = $date[1];
			$parsed_date['day_begin'] = $date[2];
		}
		else if (sizeof($date)==2){//yyyy-mm
			$parsed_date['year_begin'] = $date[0];
			$parsed_date['month_begin'] = $date[1];
		}
		else {//yyy
			$parsed_date['year_begin'] = $parts[0];		
		}
		
		$date = explode('-',$parts[1]);
		if (sizeof($date)==3){//yyyy-mm-dd
			$parsed_date['year_end'] = $date[0];
			$parsed_date['month_end'] = $date[1];
			$parsed_date['day_end'] = $date[2];
		}
		else if (sizeof($date)==2){//yyyy-mm
			$parsed_date['year_end'] = $date[0];
			$parsed_date['month_end'] = $date[1];
		}
		else {//yyy
			$parsed_date['year_end'] = $parts[0];
		
		}
	}
	else {//error
		
	}
	return $parsed_date;
}


/*
 * function getResultsFromSolr
 * performs search on solr and returns mathing documents
 * @param {array} $query: associative array of search parameters
 *  $query['isFullText'] = (bool)
    $query['queryArray'] = array();
    $query['start'] = (int,0);
    $query['rows'] = (int,20); 
 *
 * @return {array} or {FALSE} if an error ocurred
 */
function getResultsFromSolr($query){

	$queryString = buildSolrQuery($query);

	$jsonResponse = file_get_contents($queryString);
	
	print $queryString.'<br>';

	if ($jsonResponse === false) return false;

	$responseArray = json_decode($jsonResponse,true);

	$searchResults = $responseArray/*["response"]*/;
	
	print_r($searchResults['response']['numFound']);

	return $searchResults;

}


/*
 * function buildSolrQuery
 * builds url query for json results from solr based on parameters
 * @param {array} $query: associative array of search parameters
 * @return {string} url-formatted solr query for json-formatted results

 */
function buildSolrQuery($query){

	$queryString = 'q=';
	
	$queryArray = $query['queryArray'];

	$counter=0;
	foreach ($queryArray as $queryPartial){ //$queryPartial = array($_GET['f'][$counter],$_GET['op'][$counter],$query);
		if ($queryPartial[2]=='') continue; //check it's not empty
		if($counter++ !=0){
			$queryString = $queryString.$queryPartial[1]/*op*/.'+';
		}
		if ($queryPartial[0]=='all'){
			$queryString = $queryString.buildQueryForAllFields($queryPartial[2]);
		}
		else {
			$queryString = $queryString.$queryPartial[0]/*field*/.':('.urlencode($queryPartial[2]).')%0A';
		}
		
		
	}
	
	//filter queries
	$counter=0;
	foreach ($query['fq'] as $fq){
		$queryString = $queryString.'&fq='.urlencode($query['fq_field'][$counter++]).':'.urlencode($fq);
	}
	
	
	global $solrCoreName;
	global $solrResultsHighlightTag;

	$queryString = 'http://localhost:8983/solr/'.$solrCoreName
		.'/select?'.$queryString.'&start='.$query['start'].'&rows='.$query['rows']
		.'&wt=json&hl=true&hl.simple.pre='.urlencode('<'.$solrResultsHighlightTag.'>')
		.'&hl.simple.post='.urlencode('</'.$solrResultsHighlightTag.'>')
		.'&hl.fl=*&facet=true&facet.field=archive_facet&facet.field=contributing_institution_facet&facet.field=type_content&facet.field=file_format'
		.'&facet.field=language&indent=true';
	
		/*
		 * Archive (Digital collection)
Contributing Institution
Type of content
LC Subject Headings
File Format
Language
Copyright (Use Rights)
Date (slider to select range)
		 * */

	return $queryString;
}


function buildQueryForAllFields($query){
	$queryString = '';
	$searchFields = array(
			"contributing_institution",
			"url",
			"title",
			"type_content",
			"type_digital",
			"role_ALL" ,
			"geolocation_human",
			"alternative_title",
			"description",
			"full_text",
			"type_physical",
			"shelfmark",
			"subject_heading",
			"extent",
			"copyright_holder",
			"use_permissions",
			"language",
			"notes",
	);
	foreach ($searchFields as $field){
		$queryString = $queryString.$field.':('.urlencode($query).')%0A';
	}
	return $queryString;
}


function buildFacetFilterQuery($facet,$query){
	$newQuery = http_build_query($_GET);
	return $_SERVER['PHP_SELF'].'?'.$newQuery.'&fq[]='.urlencode(($query=='')? '""':('"'.$query).'"').'&fq_field[]='.$facet;
}

function buildFacetBreadcrumbQuery($facet, $query){
	$newGet = array();
	foreach ($_GET as $key => $value){
		$newGet[$key] = $value;
	}
	$new_fq = array();
	$new_fq_field = array();
	$counter=0;
	//debug
	//print_r($newGet);
	foreach ($newGet['fq_field'] as $fq_field){
		//debug
		//print $fq_field.'__'.$newGet['fq'][$counter].'nn'.$query.'--'.'<br>';
		if (!($fq_field==$facet && $newGet['fq'][$counter]=='"'.$query.'"')){
			$new_fq[] = $newGet['fq'][$counter];
			$new_fq_field[] = $fq_field;
		}
		$counter++;
	}
	
	$newGet['fq_field'] = $new_fq_field;
	$newGet['fq'] = $new_fq;
	//debug
	//print_r($newGet);
	$newQuery = http_build_query($newGet);
	return $_SERVER['PHP_SELF'].'?'.$newQuery;
}
