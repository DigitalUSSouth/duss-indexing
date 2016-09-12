<?php
/*api.php*/

require_once 'config.php';
require_once 'solr.php';

if (!isset($_GET['q']) || !isset($_GET['start'])){
    print json_encode(array('error'=>'Parameter not set'));
    die();
}
//TODO: add error checking for parameters

$searchQuery['isFullText'] = true;

$searchQuery['queryArray'] = array(array("all","AND",urlencode($_GET['q'])));

$searchQuery['start'] = $_GET['start'];

$searchQuery['rows'] = $searchResultsRows;

$searchQuery['fq'] = (isset($_GET['fq'])) ? $_GET['fq']: array();
$searchQuery['fq_field'] = (isset($_GET['fq_field'])) ? $_GET['fq_field']: array();

try{
$solrResponse = getResultsFromSolr($searchQuery); //this is where the magic happens
}
catch (Exception $e) {
	print json_encode(array('error' => $e->getMessage()));
	//TODO: email admin to inform that solr is down
	die();
}
header ('Content-Type: application/json');
//var_dump($solrResponse);

if ($solrResponse['responseHeader']['status']!=0) {
    print json_encode(array('error'=>'Unspecified solr error'));
    die();
}

$apiResults = array(
    'error' => 'None',
    'response' => $solrResponse['response']
);
//remove json pretty print in production
print json_encode($apiResults,JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES);

?>