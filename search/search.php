<?php
/* search.php
 * This file prints out the main search page.
 * Prints out the initual search page.
 *
 * Partials:
 *   - advanced-search-box.php: prints out the search box
 *   - search-results.php: performs the search and print facets+results
 */

require "layout/head.php";

//require "layout/splash.php";

require "layout/nav-search.php";



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



//debug
//var_dump($searchResponse);
?>

<?php 
require 'search-results.php';

endif;//check $_GET query

else: //form not submitted - display advanced search page only
$queryArray = NULL;
require 'advanced-search-box.php';

endif; //if (isset($_GET['form_submitted'])):

?></div> <!-- container-fluid -->
<?php 

require "layout/footer.php";

require "layout/scripts.php";

?>