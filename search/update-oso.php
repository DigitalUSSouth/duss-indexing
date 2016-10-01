<?php
/* update-sce.php
 */

require "layout/head.php";

//require "layout/splash.php";

require "layout/nav-search.php";

require_once 'solr.php';

require_once 'db-config.php';

require_once 'config.php';
$mysql2;
$mysql2 = new mysqli('localhost','x', 'x', 'x');
if ($mysql2->connect_error || $mysql2->connect_errno) {
  exit ("<h1 class='text-danger'>Database Connection Error (" . $mysql2->connect_errno . "): " . $mysql2->connect_error . "</h1>");
}

?>
<div class="container-fluid">
<pre>
<?php
set_time_limit(600);

$statement = $mysql2->prepare("SELECT name,description FROM sub_orc_data");
$statement->execute();
$statement->store_result();

$statement->bind_result($name,$description);

$counter=1;
while ($statement->fetch()){
    print $counter++.'-'.$id.'<br>';

    $document = array(
        'archive' => 'Old Southern Orchards',
        'contributing_institution' => 'University of South Carolina',
        'id' => 'http://www.duss.sc.edu/oldsouthernorchards/subsubindex.php?name='.$name,
        'url' => 'http://www.duss.sc.edu/oldsouthernorchards/subsubindex.php?name='.$name,
        'title' => utf8_encode(trim($name)),
        'type_content' => 'Text',
        'type_digital' => 'Text',
        'geolocation_human' => 'US South',
        'file_format' => 'text/html',
        'description' => utf8_encode(strip_tags(trim($description)))/*,
        'full_text' => utf8_encode(strip_tags($fullText))*/
    );
//jjprint mb_detect_encoding($content);
//    print_r($document);
//print '<br>';
//continue;
    if($document['description']!=""){
      indexDocument($document);
    }
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
