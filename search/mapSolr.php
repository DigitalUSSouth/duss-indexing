<?php

require_once ("solr.php");


function getMainMapData(){

  global $solrUrl;

  $res = file_get_contents($solrUrl."select?q=geolocation_human:(%2A)&start=0&rows=100&wt=json&indent=true");
  $res = json_decode($res,true);
  

  $start = 0;
  $rows = 1000;
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
          "title"=>$result['title'],
          "url"=>$result['url'],
          "description"=>$result['description']
        );
        if (!array_key_exists($loc,$locations)){
          $locations[$loc] = array(
            "num"=>1,
            "latlng"=>[0,0]);
        }
        else {
          $locations[$loc]['num']++;
        }
        $allMarkers[] = $marker;
      }
    }
    $start = $start+$rows;
  }

  //geocode all locations
  foreach ($locations as $loc=>$data){
    $locations[$loc]['latlng'] = geocode($loc);
  }
  print "<pre>";
  $jsonLocations = json_encode($locations,JSON_PRETTY_PRINT);
  print $jsonLocations;
  print "</pre>";
  file_put_contents("data/locations.json", $jsonLocations);

  foreach ($allMarkers as &$marker){
    $marker['latlng'] = $locations[$marker['location']]['latlng'];
  }
  print "<pre>";
  $jsonMarkers = json_encode($allMarkers);
  print $jsonMarkers;
  print "</pre>";
  file_put_contents("data/markers.json", $jsonMarkers);
}


/**
 * geocode a place name - uses google geocoding API
 * @param {string} literal name of place to geocode
 * @return {array} [(float)lat,(float)lng]
 */
function geocode($locationName){
//CHANGE TO DUSS API KEY IN PRODUCTION
if ($locationName=="") return [0,0];
	 $url = 'https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($locationName).'&key=AIzaSyBVXm_BC0-fmKBncSUzB_5NMGIv9HPLhYY';
 	print $url.'<br>';
	 $jsonResult = file_get_contents($url);
	 $result = json_decode($jsonResult,true);
	 $lat = $result['results'][0]['geometry']['location']['lat'];
	 $lng = $result['results'][0]['geometry']['location']['lng'];
	 return [$lat,$lng];
}  
