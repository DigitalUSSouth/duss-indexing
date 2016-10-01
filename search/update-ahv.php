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
global $mysql1;
$statement = $mysql1->prepare("SELECT Id, Name, LatinName, Description, Source FROM Vegetables");
$statement->execute();
$statement->store_result();

$statement->bind_result($id,$name,$latinName,$description,$source);

$counter=1;
while ($statement->fetch()){
    print $counter++.'-'.$id.'<br>';

    $statement2 = $mysql1->prepare("SELECT Name,Directions FROM Recipes WHERE VegetableId=?");
    $statement2->bind_param('i',$id);
    $statement2->execute();
    $statement2->store_result();

    $statement2->bind_result($rName,$rDirections);
    $fullText = "";
    while ($statement2->fetch()){
        $fullText = $fullText.' '.$rName.' '.$rDirections;
    }

    $statement2 = $mysql1->prepare("SELECT Name,Description FROM Varieties WHERE VegetableId=?");
    $statement2->bind_param('i',$id);
    $statement2->execute();
    $statement2->store_result();

    $statement2->bind_result($vName,$vDirections);
    while ($statement2->fetch()){
        $fullText = $fullText.' '.$vName.' '.$vDirections;
    }


    $document = array(
        'archive' => 'American Heritage Vegetables',
        'contributing_institution' => 'University of South Carolina',
        'id' => 'http://www.duss.sc.edu/vegetable/vegetable.php?Id='.$id,
        'url' => 'http://www.duss.sc.edu/vegetable/vegetable.php?Id='.$id,
        'title' => $name.' ('.$latinName.')',
        'type_content' => 'Text',
        'type_digital' => 'Text',
        'geolocation_human' => 'US South',
        'file_format' => 'text/html',
        'description' => $description,
        'full_text' => $fullText
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
