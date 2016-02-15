<?php

/**
 * @file functions.php
* Functions used throughout the website.
*/


require_once('config.php');



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

print_r ($responseArray);

print_r ($searchResults);

return $searchResults;
	 
}


/*
 * function buildSolrQuery
 * builds json query for solr based on parameters
 * @param {array} $query: associative array of search parameters eg: "title" => "query title"
 * @return {string} url-formatted solr query for json-formatted results

 */
function buildSolrQuery($query){

$queryString = '';

foreach ($query as $key => $value){
  $queryString = $queryString.'&'.$key.'='.urlencode($value);
}
global $solrCoreName;

$queryString = 'http://localhost:8983/solr/'.$solrCoreName.'/select?'.$queryString.'&wt=json&indent=true';

return $queryString;
}


?>