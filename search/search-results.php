<?php

$jsonResponse;

$searchResults = $searchResponse['docs'];
?>

<div class="row">

	<div class="col-xs-3">
		<div class="col-xs-12"><h4>Facets (under development):</h4>
			<div class="panel-group" id="accordion">
  <?php
  $counter=1;
  foreach ($facetFields as $facetField => $facetTitle):?>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" href="#collapse<?php print $counter;?>"><?php print $facetTitle?>&nbsp;</a>
      </h4>
    </div>
    <div id="collapse<?php print $counter;?>" class="panel-collapse collapse">
      <div class="panel-body">
      	<?php
        $currentFacet = $facetField;
      	$facets = $searchFacetCounts['facet_fields'][$currentFacet];
      	for($i=0; $i<sizeof($facets); $i++):
      		if ($facets[$i+1]==0){
      			$i++;
      			continue;
      	}
      	$isBreadcrumbSet = false;
      	if (in_array($currentFacet, $searchQuery['fq_field'])):
      	  if (in_array('"'.$facets[$i].'"',$searchQuery['fq'])):
      	    $isBreadcrumbSet = true;
      	?>
      	  <a href="<?php print buildFacetBreadcrumbQuery($currentFacet, $facets[$i]);?>"><strong>(X)</strong></a>
      	<?php 
      	  endif;
      	endif;?>
      	<a href="<?php print buildFacetFilterQuery($currentFacet, $facets[$i]);?>"><?php print ($isBreadcrumbSet) ? '<strong><em>' : '';?>-<?php print ($facets[$i]=='')? "None":$facets[$i];?> (<small><strong><?php print $facets[$i+1]; $i++;?></strong></small>)<?php print ($isBreadcrumbSet) ? '</em></strong>' : '';?></a><br>
      	<?php endfor;?>
      </div>
    </div>
  </div>
  <?php
  $counter++;
  endforeach;?>
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
	$displayResult['file_format'] = isset($highlightArray['file_format']) ? $highlightArray['file_format'][0] : $result['file_format'];
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
<a data-target="#resultsCarousel" data-slide-to="0" class="sr-only" id="back-results-link"></a>
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
		<a data-target="#resultsCarousel" data-slide-to="<?php print $counter++;?>" class="btn btn-default btn-results-more">More --&gt;</a>
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
		<a data-target="#resultsCarousel" data-slide-to="0" class="btn btn-default btn-results-back">&lt;-- Back to search results</a>
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
