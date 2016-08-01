<?php
/* delete-all.php
 *
 **********WARNING!!!****************
 * Executing this script (or opening in browser) will DELETE and COMMIT
 *   all data in the project Solr index. 
 */


require "layout/head.php";

//require "layout/splash.php";

require "layout/nav-search.php";

require_once 'solr.php';
?>
<div class="container-fluid">
<pre>
<?php 
delete_all();
?>
</pre>
</div>
<?php 

?>

<?php 

require "layout/footer.php";

require "layout/scripts.php";

?>