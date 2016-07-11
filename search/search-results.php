<?php

//is the search full-text?
$searchQuery['isFullText'] = (isset($_GET['full-text-search'])) ? $_GET['full-text-search'] : false;

$searchQuery['queryArray'] = $queryArray;

$searchQuery['start'] = (isset($_GET['start'])) ? $_GET['start'] : 0;

$searchQuery['rows'] = 20;

$searchQuery['fq'] = (isset($_GET['fq'])) ? $_GET['fq']: array();
$searchQuery['fq_field'] = (isset($_GET['fq_field'])) ? $_GET['fq_field']: array();

try{
$solrResponse = getResultsFromSolr($searchQuery); //this is where the magic happens
}
catch (Exception $e) {
	print '<h1 class="text-danger text-center">'.$e->getMessage().'</h1>';
	//TODO: email admin to inform that solr is down
	die();
}
$searchResponse = $solrResponse['response'];

$searchFacetCounts = $solrResponse['facet_counts'];
$searchHighlighting = $solrResponse['highlighting'];

$jsonResponse;

$searchResults = $searchResponse['docs'];

//prints next/previous buttons and total results count
printResultsNavigation($searchResponse['start'],$searchResponse['numFound'],$searchQuery['rows']);
?>
<div class="row">
<?php /*
The following displays the facets column
*/?><div class="col-xs-3">
		<div class="col-xs-12"><h4>Facets (under development):</h4>
			<div class="panel-group" id="accordion">
  <?php
  $counter=1;
  foreach ($facetFields as $facetField => $facetTitle):?>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle<?php print in_array($facetField,$searchQuery['fq_field'])? ' accordion-opened':'';?>" data-toggle="collapse" href="#collapse<?php print $counter;?>"><?php print $facetTitle?>&nbsp;</a>
      </h4>
    </div>
    <div id="collapse<?php print $counter;?>" class="panel-collapse collapse<?php print in_array($facetField,$searchQuery['fq_field'])? ' in':'';?>">
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
		if ($key == 'title' || $key == 'type_content' || $key == 'file_format' || $key == 'description' || $key == 'archive' || $key == 'shelfmark') continue;
		if (!isset($solrFieldNames[$key])) continue;
		$displayResult[$key] = $value[0];
	}
	$displayResult['url'] = $url;
	$displaySearchResults[] = $displayResult;
}
?>

<div class="panel-group" id="accordion">
<?php
$counter=1;
foreach($displaySearchResults as $result):?>
  <div class="panel panel-default">
    <div class="panel-heading container-fluid panel-heading-results">
      <div class="col-xs-11">
        <h3><a target="_blank" href="<?php print $result['url']?>"><?php print $result['title']?></a></h3>
      </div>
      <p class="col-xs-10 pull-right"><strong>Description:</strong> <?php print $result['description'];?></p>
	  <div class="clearfix"></div>
	  <div class="col-xs-2"></div>
	  <p class="col-xs-5"><strong>Digital Collection:</strong> <?php print $result['archive'];?></p>
	  <p class="col-xs-5"><strong>Shelfmark:</strong> <?php print $result['shelfmark'];?></p>
	  <div class="clearfix"></div>
	  <a class="btn btn-default btn-sm btn-results-more col-xs-2" id="btn-results-<?php print $counter;?>" data-toggle="collapse" href="#results-collapse<?php print $counter;?>">
      Show more&nbsp;<i class="fa fa-angle-right"></i></a>
      <p class="col-xs-5"><strong>Type:</strong> <?php print $result['type_content'];?></p>
	  <p class="col-xs-5"><strong>Format:</strong> <?php print $result['file_format'];?></p>
    </div>
    <div id="results-collapse<?php print $counter;?>" class="panel-collapse collapse">
      <div class="panel-body panel-results">
      <?php
        $counter2=0;
        foreach ($result as $key => $value){
		  if ($key == 'title' || $key == 'type_content' || $key == 'file_format' || $key == 'description' || $key == 'archive' || $key == 'shelfmark') continue;
		  if (!isset($solrFieldNames[$key])) continue;
		  $counter2++;
		  ?>
		  <p class="col-xs-6"><strong><?php print $solrFieldNames[$key];?>:</strong><br>&nbsp;&nbsp;
		  <?php
		  if (is_array($value)){
		    foreach ($value as $val){
		  	  print '<br>'.$val;
		    }
		  }
		  else{
		    print $value;
		  }
		  ?>
		  </p>
		  <?php 
	    }//endforeach
	    if ($counter2==0)://if counter2==0 then we need to hide the 'more' button
	    ?>
	    <script>
	    <?php //this script disables the 'more' button if there are no additional items to display
	          //we have to use an array of functions because jquery is not loaded yet
	          //once the dom is ready, we iterate through this array and execute each function
	          //see duss-search.js -> $(document).ready()
	    ?>
	      //check if disableArray is defined
	      if (typeof disableArray === 'undefined' || disableArray === null) {
		    var disableArray = [];
		  }
		  disableArray.push(function(){
		    $("#btn-results-<?php print $counter;?>").css("visibility","hidden");
		  });
		  //console.log(disableArray);
	    </script>
	  <?php endif;?>
      </div>
    </div>
  </div>
<?php 
$counter++;
endforeach;?>
</div><!-- #accordion -->
</div> <!-- search-results-column -->

<?php 

/*functions*/
function printResultsNavigation($start,$numFound,$rows){
	?>
	<h3 class="text-right">Showing results <?php print ($start+1)?> to <?php print ($numFound<=$start+$rows ) ?($numFound):($start+$rows );?> of <?php print ($numFound)?></h3>
	<p class="text-right">
	<?php if ($start>0):?>
		<a href="<?php 
		$oldQuery = $_GET;
		$oldQuery['start'] = $oldQuery['start']-$rows;
		$newQuery = http_build_query($oldQuery);
		print $_SERVER['PHP_SELF'].'?'.$newQuery?>" class="btn btn-default">Previous</a>
	<?php endif;?>
	<?php if ($numFound>($start+$rows)):?>
		<a href="<?php 
		$oldQuery = $_GET;
		$oldQuery['start'] = $oldQuery['start']+$rows;
		$newQuery = http_build_query($oldQuery);
		print $_SERVER['PHP_SELF'].'?'.$newQuery?>" class="btn btn-default">Next</a>
	<?php endif;?>
	</p><?php
}

?>
</div> <!-- row -->
<?php printResultsNavigation($searchResponse['start'],$searchResponse['numFound'],$searchQuery['rows']);?>