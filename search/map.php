<?php
/* map.php
 */

$isMapPage = true;

require_once ("config.php");

require "layout/head.php";

//require "layout/splash.php";

require "layout/nav-search.php";

require "mapSolr.php";



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