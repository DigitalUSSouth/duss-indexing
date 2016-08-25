<?php
/* commit.php
 * Executing this script (or opening in browser) will commit
 *   all pending changes in the project Solr index. 
 */

require "layout/head.php";

//require "layout/splash.php";

require "layout/nav-search.php";

require_once 'solr.php';
?>
<div class="container-fluid">
<pre>
<?php 
commitIndex();
?>
</pre>
</div>
<?php 

?>

<?php 

require "layout/footer.php";

require "layout/scripts.php";

?>