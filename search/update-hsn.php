<?php
/* update-nsh.php
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

global $mysql2;
$statement = $mysql2->prepare("SELECT collection, compound_page, contri, covera, date, descri, image_height, image_width, is_compound_object, media, parent_object, pointer, publis, relati, subjec, title, transc, id FROM manuscripts");
$statement->execute();
$statement->store_result();

$statement->bind_result($collection, $compound_page, $contri, $covera, $date, $descri, $image_height, $image_width, $is_compound_object, $media, $parent_object, $pointer, $publis, $relati, $subjec, $title, $transc, $id);

$counter=1;
while ($statement->fetch()){
    print $counter++.'-'.$id.'<br>';
    $document = array(
        'archive' => 'Historic Southern Naturalists',
        'contributing_institution' => 'University of South Carolina',
        'id' => 'http://www.digitalussouth.org/historicsouthernnaturalists/manuscript-viewer.php?id='.$id,
        'url' => 'http://www.digitalussouth.org/historicsouthernnaturalists/manuscript-viewer.php?id='.$id,
        'title' => utf8_encode($title),
        'type_content' => 'Text',
        'type_digital' => 'Text',
        'geolocation_human' => 'South Carolina',
        'file_format' => 'text/html',
        'description' => '',
        'full_text' => utf8_encode($descri.' '.$transc)
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
