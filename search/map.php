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
<script>
var itemLocations = <?php print file_get_contents("data/locationMarkers.json");?>;
</script>

<div class="container-fluid">
	<div class="row">
    <div class="col-xs-12">
      <div id="mainMap">
      </div>
    </div>
  </div>
</div>
<?php 

require "layout/footer.php";

require "layout/scripts.php";

?>