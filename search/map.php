<?php
/* search.php
 * This file prints out the main search page.
 * Prints out the initual search page.
 *
 * Partials:
 *   - advanced-search-box.php: prints out the search box
 *   - search-results.php: performs the search and print facets+results
 */

$isMapPage = true;

require_once ("config.php");

require "layout/head.php";

//require "layout/splash.php";

require "layout/nav-search.php";

require "mapSolr.php";

getMainMapData();



?>

<div class="container-fluid">
	<div class="row">
   <div id="mainMap">

   </div>
  </div>
</div>
<?php 

require "layout/footer.php";

require "layout/scripts.php";

?>