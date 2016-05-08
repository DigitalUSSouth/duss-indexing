<?php
/*
 * This file includes all the solr related functions
 * 
 * */



require_once('config.php');


/*Indexing*/
 
function importTabFile(){
	//global $mysqli;
	$file = NULL;

	try {
		$file = new SplFileObject("uploads/upload.txt");
	}
	catch (Exception $error){
		echo '<div class="jumbotron"><h1 class="text-danger">Unable to open uploaded file. Please try again.</h1><p>'.$error->getMessage().'</p></div>';
		return;
	}

	$counter=0;

	//delete everything
	//$statement = $mysqli->prepare("DELETE FROM works2");
	//$statement->execute();
	//$statement->store_result();



	while ($line = $file->fgets()) {
		if ($counter++ == 0) continue; //discard first line because it only contains headers
		//echo $line;
		//$line2 =  preg_replace('/\\t"/',"\t",$line);
		//echo $line2;
		//$line3 =  preg_replace('/"\\t/',"\t",$line2);
		//echo $line3;
		//$line4 =  preg_replace('/""/','"',$line3);
		//echo $line4;

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
		
		
		
		
		
		//if ($type=="") continue; //skip insert into db if empty
		//echo $line4;
		
		

		//$statement = $mysqli->prepare("INSERT INTO works2 (id,type,parent_id,volume,title,year,month,day,first_performance,recordings,genre,text,instrumentation,duration,list_movements,notes,materials_included) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		//$statement->bind_param("sssssssssssssssss", $id,$type,$parent_id,$volume,$title,$year,$month,$day,$first_performance,$recordings,$genre,$text,$instrumentation,$duration,$list_movements,$notes,$materials_included);
		//$statement->execute();
		//$statement->store_result();
		
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
var_dump($data_string);
 var_dump($result);	
	
}

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
 * performs search on solr and returns ids of mathing documents
 * @param {array} $query: associative array of search parameters eg: "title" => "query title"
 * @return {array} or {FALSE} if an error ocurred
 */
function getResultsFromSolr($query){

	$queryString = buildSolrQuery($query);

	$jsonResponse = file_get_contents($queryString);

	if ($jsonResponse === false) return false;

	$responseArray = json_decode($jsonResponse,true);

	$searchResults = $responseArray["response"];


	return $searchResults;

}


/*
 * function buildSolrQuery
 * builds json query for solr based on parameters
 * @param {array} $query: associative array of search parameters eg: "title" => "query title"
 * @return {string} url-formatted solr query for json-formatted results

 */
function buildSolrQuery($query){

	$queryString = 'q=';
	
	$queryArray = $query['queryArray'];

	$counter=0;
	foreach ($queryArray as $queryPartial){ //$queryPartial = array($_GET['f'][$counter],$_GET['op'][$counter],$query);
		if($counter++ !=0){
			$queryString = $queryString.$queryPartial[1]/*op*/.'+';
		}
		//TODO: add search all
		$queryString = $queryString.$queryPartial[0]/*field*/.':'.urlencode($queryPartial[2]).'%0A';
	}
	global $solrCoreName;

	$queryString = 'http://localhost:8983/solr/'.$solrCoreName.'/select?'.$queryString.'&start='.$query['start'].'&rows='.$query['rows'].'&wt=json&indent=true';

	return $queryString;
}
