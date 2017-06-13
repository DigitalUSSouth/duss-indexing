<?php

require_once ("solr.php");


function getMainMapData(){

  global $solrUrl;

  $res = file_get_contents($solrUrl."select?q=geolocation_human:(%2A)&start=0&rows=100&wt=json&indent=true");
  $res = json_decode($res,true);
  print "<pre>";
  var_dump($res);
  print "</pre>";

  $start = 0;
  $rows = 100;
  $numFound = $res['response']['numFound'];

  $allResults = array();

  while ($start<$numFound){
    $res = file_get_contents($solrUrl."select?q=geolocation_human:(%2A)&$start=0&$rows=100&wt=json&indent=true");
    $res = json_decode($res,true);
    $results = $res['response']['docs'];
    foreach ($results as $result){
      
    }
  }
}