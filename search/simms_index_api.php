<?php

error_reporting(E_ALL);
ini_set("display_errors", true);
ini_set("display_startup_errors", true);
if (isset($_GET['id'])) {
  $id=$_GET['id'];
  $mysqli = new mysqli("localhost","simmsuser","@ccess2Simmsdb!","simms");

  $statement1 = $mysqli->prepare("SELECT item_id, item_title FROM simms_items WHERE item_id=? LIMIT 1");
  $statement1->bind_param('i',$id);
  $statement1->execute();
  $statement1->store_result();
  $statement1->bind_result($id2,$title);

  $document = array();
  $statement1->fetch();
    $statement2 = $mysqli->prepare("SELECT item_text FROM simms_fulltext WHERE item_id=? LIMIT 1");
    $statement2->bind_param('i',$id2);
    $statement2->execute();
    $statement2->store_result();
    $statement2->bind_result($fulltext);
    $statement2->fetch(); 

  $statement3 = $mysqli->prepare("SELECT place_id FROM simms_items_places WHERE item_id=? AND status='Approved'");
  $statement3->bind_param('i',$id2);
 $statement3->execute();
  $statement3->store_result();
  $statement3->bind_result($placeID);
//var_dump($statement3);
$places = array();
  while($statement3->fetch()){
    $statement4 = $mysqli->prepare("SELECT place_name, lat, lng FROM simms_places WHERE place_id=?");
    $statement4->bind_param('i',$placeID);
    $statement4->execute();
    $statement4->store_result();
    $statement4->bind_result($placeName,$lat,$lng);
    $statement4->fetch();
    $places[$placeName] = [$lat,$lng];
  }
//var_dump ($places);
$geoHuman = array();
$geoMachine = array();
foreach ($places as $place=>$latlng){
  $geoHuman[] = $place;
  $geoMachine[] = $latlng[0].','.$latlng[1];
}
    $document = array(
      'id'=> $id2,
      'title'=>$title,
      'text'=>$fulltext,
      'geolocation_human'=>$geoHuman,
      'geolocation_machine'=>$geoMachine/*,
      'workName'=>$workName,
      'workId'=>$workId,
      'compositionHistory'=>$compositionHistory,
      'hierarchy'=>$hierarchy,
      'bibliographicDescription'=>$bibliographicDescription,
      'biblipgraphicCitation'=>$bibliographicCitation,
      'notes'=>$notes,
      'genre'=>$genre,
      'grandparentId'=>$grandparentId,
      'parentId'=>$parentId,
      'fullPerson'=>$fullPerson,
      'fullPlace'=>$fullPlace,
      'lat'=>$lat,
      'lng'=>$lng,
      'headnote'=>$headnote,
      'subjectHeading'=>$subject_heading,
      'pubDateDecade'=>$pubDateDecade,
      'hierarchyNamed'=>$hierarchyNamed*/
    );
// var_dump($document); 
  $newDoc = array();
  foreach ($document as $key => $value){
    if (is_array($value)){
      foreach ($value as &$val){
        $val = utf8_encode($val);
      }
      $newDoc[$key] = $value; 
    }
    else{
      $newDoc[$key] = utf8_encode($value);
    }
  }
//kvar_dump($newDoc);
  $jsonDoc = json_encode($newDoc);
  header('Content-Type: application/json');
  print $jsonDoc;

}

else {
$mysqli = new mysqli("localhost","simmsuser","@ccess2Simmsdb!","simms");

$statement1 = $mysqli->prepare("SELECT item_id FROM simms_items WHERE item_status='Approved'");
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($id);

$counter=0;
$IDs = array();
while($statement1->fetch()){
  $IDs[] = $id;
}

$jsonIDs = json_encode($IDs);

header('Content-Type: application/json');

print $jsonIDs;

}
