<?php

if (!isset($_GET['loc']) || !isset($_GET['start'])){
  print "<h1>No results</h1>";
  die();
}


$locationMarkers = json_decode(file_get_contents("data/locationMarkers.json"),true);

$items = $locationMarkers[$_GET['loc']]['items'];

$subItems = array_slice($items,$_GET['start'],10);

$output = "";

foreach($subItems as $item){
  $output = $output."<p><big><a href=\"".$item['url']."\" target=\"_blank\"><strong>".$item['title']."</strong></a></big><br><em>".$item['archive']."</em><br><small>".$item['description'].substr(0,45)."</small></p>";
}

print $output;
