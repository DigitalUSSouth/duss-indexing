<?php

$jsonResponse;

$searchResults = $searchResponse['docs'];
?>

<div class="row">
	<div class="col-xs-3">
		<div class="col-xs-12"><h4>Facets (under development):</h4>
			<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse1">
        Digital Collection</a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse in">
      <div class="panel-body">
      	<?php 
      	$facets = $searchFacetCounts['facet_fields']['archive_facet'];
      	for($i=0; $i<sizeof($facets); $i++):
      		if ($facets[$i+1]==0){
      			$i++;
      			continue;
      	}
      	?>
      	<a href="<?php print buildFacetFilterQuery('archive_facet', $facets[$i]);?>">-<?php print ($facets[$i]=="")? "Other":$facets[$i];?> (<small><strong><?php print $facets[$i+1]; $i++;?></strong></small>)</a><br>
      	<?php endfor;?>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse2">
        Contributing Institution</a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse in">
      <div class="panel-body">
      <?php 
      	$facets = $searchFacetCounts['facet_fields']['contributing_institution_facet'];
      	//debug:
      	//print_r($facets);
      	for($i=0; $i<sizeof($facets); $i++):
      		if ($facets[$i+1]==0){
      			$i++;
      			continue;
      	}
      	?>
      	<a href="<?php print buildFacetFilterQuery('contributing_institution_facet', $facets[$i]);?>">-<?php print ($facets[$i]=="")? "Other":$facets[$i];?> (<small><strong><?php print $facets[$i+1]; $i++;?></strong></small>)</a><br>
      	<?php endfor;?>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse3">
        Type of Content</a>
      </h4>
    </div>
    <div id="collapse3" class="panel-collapse collapse in">
      <div class="panel-body">
      <?php 
      	$facets = $searchFacetCounts['facet_fields']['type_content'];
      	for($i=0; $i<sizeof($facets); $i++):
      		if ($facets[$i+1]==0){
      			$i++;
      			continue;
      	}
      	?>
      	<a href="<?php print buildFacetFilterQuery('type_content', $facets[$i]);?>">-<?php print ($facets[$i]=="")? "Other":$facets[$i];?> (<small><strong><?php print $facets[$i+1]; $i++;?></strong></small>)</a><br>
      	<?php endfor;?>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse4">
        LC Subject Headings</a>
      </h4>
    </div>
    <div id="collapse4" class="panel-collapse collapse in">
      <div class="panel-body"></div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse5">
        File Format</a>
      </h4>
    </div>
    <div id="collapse5" class="panel-collapse collapse in">
      <div class="panel-body">
      <?php 
      	$facets = $searchFacetCounts['facet_fields']['file_format'];
      	for($i=0; $i<sizeof($facets); $i++):
      		if ($facets[$i+1]==0){
      			$i++;
      			continue;
      	}
      	?>
      	<a href="<?php print buildFacetFilterQuery('file_format', $facets[$i]);?>">-<?php print ($facets[$i]=="")? "Other":$facets[$i];?> (<small><strong><?php print $facets[$i+1]; $i++;?></strong></small>)</a><br>
      	<?php endfor;?>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse6">
        Language</a>
      </h4>
    </div>
    <div id="collapse6" class="panel-collapse collapse in">
      <div class="panel-body">
      <?php 
      	$facets = $searchFacetCounts['facet_fields']['language'];
      	for($i=0; $i<sizeof($facets); $i++):
      		if ($facets[$i+1]==0){
      			$i++;
      			continue;
      	}
      	?>
      	<a href="<?php print buildFacetFilterQuery('language', $facets[$i]);?>">-<?php print ($facets[$i]=='')? "Other":$facets[$i];?> (<small><strong><?php print $facets[$i+1]; $i++;?></strong></small>)</a><br>
      	<?php endfor;?>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" href="#collapse7">
        Date</a>
      </h4>
    </div>
    <div id="collapse7" class="panel-collapse collapse in">
      <div class="panel-body"></div>
    </div>
  </div>
        
</div>
		</div>
	</div>
	<div class="col-xs-9" id="search-results-column">
<?php
$displaySearchResults = array();

foreach ($searchResults as $result){
	$url = $result['url'];
	$highlightArray = $searchHighlighting[$url];
	
	//title
	$displayResult['title'] = isset($highlightArray['title']) ? $highlightArray['title'][0] : $result['title'];
	//type
	$displayResult['type_content'] = isset($highlightArray['type_content']) ? $highlightArray['type_content'][0] : $result['type_content'];
	//format
	$displayResult['format'] = isset($highlightArray['format']) ? $highlightArray['format'][0] : $result['format'];
	//description
	$displayResult['description'] = isset($highlightArray['description']) ? $highlightArray['description'][0] : $result['description'];
	//digital collection/archive
	$displayResult['archive'] = isset($highlightArray['archive']) ? $highlightArray['archive'][0] : $result['archive'];
	//shelfmark
	$displayResult['shelfmark'] = isset($highlightArray['shelfmark']) ? $highlightArray['shelfmark'][0] : $result['shelfmark'];
	global $solrFieldNames;
	
	foreach ($highlightArray as $key => $value){
		if ($key == 'title' || $key == 'type_content' || $key == 'format' || $key == 'description' || $key == 'digital_collection' || $key == 'shelfmark') continue;
		if (!isset($solrFieldNames[$key])) continue;
		$displayResult[$key] = $value[0];
	}
	$displayResult['url'] = $url;
	$displaySearchResults[] = $displayResult;
}
?>
<div id="resultsCarousel" class="carousel slide" data-ride="carousel" data-interval="false">

<div class="carousel-inner" role="listbox">
	<div class="item active">
<?php 
$counter=1;
foreach($displaySearchResults as $result):?>
<div class="col-xs-12">
	<div class="col-xs-12">
		<p class="h3"><a target="_blank" href="<?php print $result['url'];?>"><?php print $result['title']?></a></p>
	</div>
	<div class="col-xs-6">
		<p><strong>Type:</strong> <?php print $result['type_content'];?></p>
	</div>
	<div class="col-xs-6">
		<p><strong>Format:</strong> <?php print $result['file_format'];?></p>
	</div>
	<div class="col-xs-12">
		<p><strong>Description:</strong> <?php print $result['description'];?></p>
	</div>
	<?php foreach($result as $key => $value):
	if ($key == 'title' || $key == 'type_content' || $key == 'format' || $key == 'description' || $key == 'digital_collection' || $key == 'shelfmark') continue;
	if (!isset($solrFieldNames[$key])) continue;
	?>
	<div class="col-xs-12">
		<p><strong><?php print $solrFieldNames[$key];?>:</strong> <?php print $value;?></p>
	</div>
	<?php endforeach;?>
	<div class="col-xs-6">
		<p><strong>Shelfmark:</strong> <?php print $result['shelfmark'];?>
		</p>
	</div>
	<div class="col-xs-6">
		<p><strong>Digital Collection:</strong> <?php print $result['archive'];?>
		</p>
	</div>
	<div class="col-xs-12">
		<a data-target="#resultsCarousel" data-slide-to="<?php print $counter++;?>" class="btn btn-default">More --&gt;</a>
	</div>
	
	<div class="col-xs-12"><hr></div>	
	

</div>
<?php endforeach;?>
</div>
<?php 
foreach ($searchResults as $result):
?>
<?php //print_r($result);?>
<div class="item">
<div class="col-xs-12">
	<div class="col-xs-12">
		<a data-target="#resultsCarousel" data-slide-to="0" class="btn btn-default">&lt;-- Back to search results</a>
	</div>
	<div class="col-xs-12">
		<h3><a target="_blank" href="<?php print $result['url'];?>"><?php print $result['title']?></a></h3>
	</div>
	<div class="col-xs-12">
		<?php //foreach ($result['role'] as $role => $value):?>
			<p><strong><?php //print $role;?>:</strong> <?php// print $value;?></p>
		<?php //endforeach;?>
	</div>
	<div class="col-xs-4">
		<p><strong>Type:</strong> <?php print $result['type_content'];?></p>
	</div>
	<div class="col-xs-4">
		<p><strong>Date:</strong> <?php //print $result['date_original'];?></p>
	</div>

	<div class="col-xs-4">
		<p><strong>Format:</strong> <?php print $result['file_format'];?></p>
	</div>
	<div class="col-xs-12">
		<p><strong>Description:</strong> <?php print $result['description'];?></p>
	</div>
	<div class="col-xs-6">
		<p><strong>LC Subject Headings:</strong> <?php //print $result['subject'];?>
		</p>
	</div>
	<div class="col-xs-6">
		<p><strong>Shelfmark:</strong> <?php print $result['shelfmark'];?>
		</p>
	</div>
	<div class="col-xs-12">
		<p><strong>Digital Collection:</strong> <?php print $result['archive'];?>
		</p>
	</div>
	
	
	
<div class="col-xs-12"><hr></div>	
</div>

</div> <!-- class="item" -->
<?php 
endforeach; //foreach ($searchResults as $result):

?>
</div> <!-- carousel inner -->
</div> <!-- carousel -->
	</div> <!-- search-results-column -->
</div>
