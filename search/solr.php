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

function indexDocument($doc){
	
	
	$url = 'http://localhost:8983/solr/duss-indexing/update';
	//$data = json_encode($doc);
	$data = array(
			'add' => array (
					'doc' => $doc
			),
			'commit' => new stdClass()
	);
	$data_string = json_encode($data);                                                                                   
                                                                                                                     
	$ch = curl_init($url);                                                                      
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    	'Content-Type: application/json',                                                                                
    	'Content-Length: ' . strlen($data_string))                                                                       
	);                                                                                                                   
                                                                                                                     
	$result = curl_exec($ch);
	print_r($data_string);
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
	$parts = explode(' - ',$date_string);
	$parsed_date = array(
			'year_begin' => 0,
			'month_begin' => 0,
			'day_begin' => 0,
			'year_end' => 0,
			'month_end' => 0,
			'day_end' => 0
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
	
	print $queryString;

	if ($jsonResponse === false) return false;

	$responseArray = json_decode($jsonResponse,true);

	$searchResults = $responseArray/*["response"]*/;


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
	return $_SERVER['PHP_SELF'].'?'.$newQuery.'&fq[]='.urlencode(($query=='')? '*':('"'.$query).'"').'&fq_field[]='.$facet;
}
