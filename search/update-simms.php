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
//set_time_limit(600);
flush();
$jsonObjects = file_get_contents('http://simms.library.sc.edu/index_api.php');

$objects = json_decode($jsonObjects, true);

$document;
$counter=1;
foreach ($objects as $object){
    print $counter++.'-'.$object.'<br>';
    flush();
    $jsonDoc = file_get_contents('http://simms.library.sc.edu/index_api.php?id='.$object);
    $doc = json_decode($jsonDoc,true);
    $document = array(
        'archive' => 'William Gilmore Simms Digital Collection',
        'contributing_institution' => 'University of South Carolina',
        'id' => 'http://simms.library.sc.edu/view_item.php?item='.$doc['id'],
        'url' => 'http://simms.library.sc.edu/view_item.php?item='.$doc['id'],
        'title' => $doc['title'],
        'type_content' => 'Text',
        'type_digital' => 'Text',
        'geolocation_human' => 'South Carolina',
        'file_format' => 'text/html',
        'description' => '',
        'full_text' => $doc['text']
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
