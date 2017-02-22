<?php
/* update-simms.php
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
$statement = $mysqli->prepare("SELECT item_id,item_title,work_id,item_hierarchy,parent_id,grandparent_id FROM simms_items WHERE item_status='Approved'");
$statement->execute();
$statement->store_result();

$statement->bind_result($id,$title,$name,$date,$excerpt,$content);

$currentID = 2;

$query  = "SELECT item_text FROM simms_fulltext WHERE item_id=?";

$query  = "SELECT work_name FROM simms_works WHERE work_id=?";

$query  = "SELECT item_bibliographi_description,item_bibliographic_citation,item_genre FROM simms_item_revisions WHERE item_id=? ORDER BY revision_time DESC";


$counter=1;
while ($statement->fetch()){
    print $counter++.'-'.$id.'<br>';
    $document = array(
        'archive' => 'Simms',
        'contributing_institution' => 'University of South Carolina',
        'id' => '',
        'url' => '',
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
    //indexDocument($document);
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
