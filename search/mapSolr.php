<?php

require_once ("solr.php");


function getMainMapData(){

  global $solrUrl;

  $res = file_get_contents($solrUrl."select?q=geolocation_human:(%2A)&start=0&rows=100&wt=json&indent=true");
  $res = json_decode($res,true);
  

  $start = 0;
  $rows = 100;
  $numFound = $res['response']['numFound'];
  print $numFound;

  $allMarkers = array();
  $locations = array();
  $counter=0;
  while ($start<$numFound){
    $res = file_get_contents($solrUrl."select?q=geolocation_human:(%2A)&start=$start&rows=$rows&wt=json&indent=true");
    $res = json_decode($res,true);
    $results = $res['response']['docs'];
    foreach ($results as $result){
      foreach ($result['geolocation_human'] as $loc){
        $marker = array(
          "location"=>$loc,
          "title"=>$result['title']
        );
        if (!array_key_exists($loc,$locations)){
          $locations[$loc] = 1;
        }
        else {
          $locations[$loc]++;
        }
        $allMarkers[] = $marker;
      }
    }
    $start = $start+100;
  }
  print "<pre>";
  var_dump($locations);
  print "</pre>";
}