<?php
/* update-sce.php
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

global $mysqli;
$statement = $mysqli->prepare("SELECT id,post_title,post_name,post_date,post_excerpt,post_content FROM scecms_posts WHERE post_type='entry' AND post_status='publish'");
$statement->execute();
$statement->store_result();

$statement->bind_result($id,$title,$name,$date,$excerpt,$content);

while ($statement->fetch()){
    print $id;
}
?>
</pre>
</div>
<?php 

?>

<?php 

require "layout/footer.php";

require "layout/scripts.php";

?>