<?php
/* update-sce.php
 */

require "layout/head.php";

//require "layout/splash.php";

require "layout/nav-search.php";

require_once 'solr.php';

require_once 'db-config.php';
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

$counter=1;
while ($statement->fetch()){
    print $counter++.'-'.$id.'<br>';
    $document = array(
        'archive' => 'South Carolina Encyclopedia',
        'contributing_institution' => 'University of South Carolina',
        'id' => 'http://www.duss.sc.edu/sce/entries/'.$name.'/',
        'url' => 'http://www.duss.sc.edu/sce/entries/'.$name.'/',
        'title' => utf8_encode($title),
        'type_content' => 'Text',
        'type_digital' => 'Text',
        'geolocation_human' => 'South Carolina',
        'file_format' => 'text/html',
        'description' => '',
        'full_text' => utf8_encode($content)
    );
//jjprint mb_detect_encoding($content);
//    print_r($document);
//print '<br>';
//continue;
    indexDocument($document);
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
