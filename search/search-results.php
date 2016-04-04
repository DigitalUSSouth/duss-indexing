<?php

$jsonResponse;

$searchResults = array (
array(
"title" => "Charleston - Residence - John Steinmeyer House, 108 Beaufain St.",
"digital_collection" => "George LaGrange Cook Photograph Collection",
"contributing_institution" => "University of South Carolina. South Caroliniana Library",
"alt_title" => "",
"role" => array(
		"Creator" => "Cook, George LaGrange"
),
"description" => "4 contact sheets, 4 prints; 20.5 x 12.5; Same as #70 but from further away.",
"subject" => "Charleston (S.C.); Dwellings--South Carolina--Charleston--Photographs",
"type_physical" => "Still Image",
"date_original" => "1880-1895",
"date_digital" => "2010-09-20",
"geolocation" => "Charleston County (S.C.)",
"extent" => "",
"format" => "image/jpeg",
"shelfmark" => "Box 4; Temporary num. 71",
"notes" => ""
),
array(
		"title" => "Charleston - Business - Roper Hospital (right section) Queen and Mazyck Sts. Facing Queen St.",
		"digital_collection" => "George LaGrange Cook Photograph Collection",
		"contributing_institution" => "University of South Carolina. South Caroliniana Library",
		"alt_title" => "",
		"role" => array(
				"Creator" => "Cook, George LaGrange"
		),
		"description" => "2 contact sheets, 1 print; 20.5 x 12.5; Partially destroyed tower (two-story with wooden eaves) is on far left. On right side at corner of building is a four-story tower. Each piazza arch frames a door or window.",
		"subject" => "Business enterprises--South Carolina--Charleston--Photographs; Charleston (S.C.); Hospitals--South Carolina--Charleston",
		"type_physical" => "Still Image",
		"date_original" => "1880-1895",
		"date_digital" => "2010-09-20",
		"geolocation" => "Charleston County (S.C.)",
		"extent" => "",
		"format" => "image/jpeg",
		"shelfmark" => "Box 1; Temporary num. 13",
		"notes" => ""
		
)
);
?>

<div class="row">
	<div class="col-xs-7 center-block" id="search-results-column">
<?php

foreach ($searchResults as $result):
?>
<?php //print_r($result);?>

<div class="row">
	<div class="col-xs-12">
		<h3><a><?php print $result['title']?></a></h3>
	</div>
	<div class="col-xs-12">
		<?php foreach ($result['role'] as $role => $value):?>
			<p><strong><?php print $role;?>:</strong> <?php print $value;?></p>
		<?php endforeach;?>
	</div>
	<div class="col-xs-4">
		<p><strong>Type:</strong> <?php print $result['type_physical'];?></p>
	</div>
	<div class="col-xs-4">
		<p><strong>Date:</strong> <?php print $result['date_original'];?></p>
	</div>

	<div class="col-xs-4">
		<p><strong>Format:</strong> <?php print $result['format'];?></p>
	</div>
	<div class="col-xs-12">
		<p><strong>Description:</strong> <?php print $result['description'];?></p>
	</div>
	<div class="col-xs-12">
		<p><strong>LC Subject Headings:</strong> <?php print $result['subject'];?>
		</p>
	</div>
	
	
	
</div>
<hr>






<?php 
endforeach; //foreach ($searchResults as $result):

?>
	</div> <!-- search-results-column -->
</div>
