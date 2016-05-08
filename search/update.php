<?php

require "layout/head.php";

//require "layout/splash.php";

require "layout/nav-search.php";

require_once 'solr.php';
?>
<div class="container-fluid">
<pre>
<?php 
importTabFile();
?>
</pre>
</div>
<?php 

?>

<?php 

require "layout/footer.php";

require "layout/scripts.php";

?>