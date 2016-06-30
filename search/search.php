<?php

require "layout/head.php";

//require "layout/splash.php";

require "layout/nav-search.php";

//require "layout/home.php";

//require "layout/about.php";

//require "layout/projects.php";

//require "layout/contact.php";

require_once 'solr.php';


$carousel = array(
	array(
		"image" => "simms.png",
		"alt" => "Simms Initiatives"
	),
	array(
		"image" => "southworth.png",
		"alt" => "E.D.E.N. Southworth Collection"
	),
	array(
		"image" => "american-heritage.png",
		"alt" => "American Heritage Vegetables"
	),
	array(
		"image" => "burning-of-columbia.png",
		"alt" => "The Burning of Columbia"
	),
	array(
		"image" => "pope-brown.png",
		"alt" => "The Ethelind Pope Brown Collection of South Carolina Natural History"
	),
	array(
		"image" => "civil-war.png",
		"alt" => "South Carolina and the Civil War"
	),
	array(
		"image" => "sphr.png",
		"alt" => "Southern Periodical Humor Repository"
	),
	array(
		"image" => "ravenel.png",
		"alt" => "Plants and Planters - Henry William Ravenel"
	)
);

$advancedSearchFields = array (
	"all" => "Search all fields",
	"title" => "Title (title and alternative title fields)",
	"description" => "Description",
	"notes" => "Notes",
	"shelfmark" => "Shelfmark",
	"subject" => "LC Subject Headings",
	"role" => "Roles (authors, editors, etc.)"
);

?>
<div class="container-fluid">
	<div class="row">

<div class="col-xs-3 center-block">
<div id="about-carousel" class="carousel slide" data-ride="carousel">

			<!-- Wrapper for slides -->
  			<div class="carousel-inner" role="listbox">
			<?php
			$counter=0;
			foreach($carousel as $image):?>
				<div class="<?php print ($counter++ == 0)?'item active':'item';?>">
     				<?php 
     				if (isset($image["image"]) && file_exists("img/carousel/" . $image["image"]) && $image["image"] != "") {
     					print "<img src='img/carousel/" . $image["image"] . "' alt='" . $image["alt"] . "' class='img-responsive'>";
     				} else if (!file_exists("img/carousel/" . $image["image"])) {
     					print "<p class='text-danger'>There was an error finding the file named " . $image["image"] . ".</p>";
     				}
     				?>
     			</div>
			<?php endforeach;?>
			</div>
		</div>
        
        
       </div> 
	</div>
<?php

if (isset($_GET['form_submitted'])):
//form submitted, display advanced search page with populated search fields
//and also display search results


//check that $_GET query is valid
if (!isset($_GET['f']) || !isset($_GET['q']) || !isset($_GET['op']) || sizeof($_GET['f']) != sizeof($_GET['q']) || sizeof($_GET['f']) != sizeof($_GET['op'])):
	$qArray = NULL;
	require 'advanced-search-box.php';

print '<div class="row text-center"><h1 class="text-danger">Invalid search query</h1></div>';
else:
/* convert search results into query array
 $queryArray = array($field,$boolean,$query)
*/

$queryArray = array();
$counter=0;

foreach ($_GET['q'] as $query){
	$queryArray[] = array($_GET['f'][$counter],$_GET['op'][$counter],$query);
	$counter++;
}



require 'advanced-search-box.php';
//debug
/*print '<pre>';
print_r($queryArray);
print '</pre>';*/
//end debug

//is the search full-text?
$searchQuery['isFullText'] = (isset($_GET['full-text-search'])) ? $_GET['full-text-search'] : false;

$searchQuery['queryArray'] = $queryArray;

$searchQuery['start'] = (isset($_GET['start'])) ? $_GET['start'] : 0;

$searchQuery['rows'] = 20;

$searchQuery['fq'] = (isset($_GET['fq'])) ? $_GET['fq']: array();
$searchQuery['fq_field'] = (isset($_GET['fq_field'])) ? $_GET['fq_field']: array();

$solrResponse = getResultsFromSolr($searchQuery);
$searchResponse = $solrResponse['response'];

$searchFacetCounts = $solrResponse['facet_counts'];
$searchHighlighting = $solrResponse['highlighting'];

//debug
//var_dump($searchResponse);
?>
<a href="#" id="top-of-results" class="sr-only"></a>
<h3 class="text-right">Showing results <?php print ($searchResponse['start']+1)?> to <?php print ($searchResponse['numFound']<=$searchResponse['start']+$searchQuery['rows'] ) ?($searchResponse['numFound']):($searchResponse['start']+$searchQuery['rows'] );?> of <?php print ($searchResponse['numFound'])?></h3>
<p class="text-right">
<?php if ($searchResponse['start']>0):?>
	<a href="<?php 
	$oldQuery = $_GET;
	$oldQuery['start'] = $oldQuery['start']-$searchQuery['rows'];
	$newQuery = http_build_query($oldQuery);
	print $_SERVER['PHP_SELF'].'?'.$newQuery?>" class="btn btn-default">Previous</a>
<?php endif;?>
<?php if ($searchResponse['numFound']>($searchResponse['start']+$searchQuery['rows'])):?>
	<a href="<?php 
	$oldQuery = $_GET;
	$oldQuery['start'] = $oldQuery['start']+$searchQuery['rows'];
	$newQuery = http_build_query($oldQuery);
	print $_SERVER['PHP_SELF'].'?'.$newQuery?>" class="btn btn-default">Next</a>
<?php endif;?>
</p>
<?php 
require 'search-results.php';





endif;//check $_GET query

?>

<?php 
else: //form not submitted - display advanced search page only
$queryArray = NULL;
require 'advanced-search-box.php';


endif; //if (isset($_GET['form_submitted'])):

?></div> <!-- container-fluid -->
<?php 

require "layout/footer.php";

require "layout/scripts.php";

?>