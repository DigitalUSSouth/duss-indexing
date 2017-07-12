<?php
/* update.php
 *
 * Executing this script (or opening in browser) will index
 *   data into solr. You will need to run commit.php to commit any changes
 * Indexing will overwrite data for any objects with the same ID (url)
 *
 * Usage: 
 *   - uncomment the appropriate importTabFile*() function(s) below
 *     corresponding to the project(s) you want to index
 *   - execute this file.
 */

require "layout/head.php";

//require "layout/splash.php";

require "layout/nav-search.php";

require_once 'solr.php';
?>
<div class="container-fluid">
<pre>
<?php 
set_time_limit(600);
importTabFileGCook();
importTabFileSCCivilWar();
importTabFilePBrown();
//importTabFileSimms();
importTabFileSouthworth();
?>
</pre>
</div>
<?php 

?>

<?php 

require "layout/footer.php";

require "layout/scripts.php";

?>