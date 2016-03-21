<?php

require "layout/head.php";

//require "layout/splash.php";

require "layout/nav-search.php";

//require "layout/home.php";

//require "layout/about.php";

//require "layout/projects.php";

//require "layout/contact.php";




$carousel = array(
	array(
		"image" => "simms.png",
		"alt" => "Simms Initiatives"
	),
	array(
		"image" => "southworth.png",
		"alt" => "E.D.E.N. Southworth Collection"
	),
	array(
		"image" => "american-heritage.png",
		"alt" => "American Heritage Vegetables"
	),
	array(
		"image" => "burning-of-columbia.png",
		"alt" => "The Burning of Columbia"
	),
	array(
		"image" => "pope-brown.png",
		"alt" => "The Ethelind Pope Brown Collection of South Carolina Natural History"
	),
	array(
		"image" => "civil-war.png",
		"alt" => "South Carolina and the Civil War"
	),
	array(
		"image" => "sphr.png",
		"alt" => "Southern Periodical Humor Repository"
	),
	array(
		"image" => "ravenel.png",
		"alt" => "Plants and Planters - Henry William Ravenel"
	)
);

$advancedSearchFields = array (
	"title" => "Title (title and alternative title fields)",
	"description" => "Description",
	"notes" => "Notes",
	"shelfmark" => "Shelfmark",
	"subject" => "LC Subject Headings",
	"role" => "Roles (authors, editors, etc.)"
);

?>

<div class="container-fluid" id="about">
	<div class="row">

		<div class="col-xs-4 center-block" id="carousel">
			<?php
			foreach ($carousel as $image) {
				if (isset($image["image"]) && file_exists("img/carousel/" . $image["image"]) && $image["image"] != "") {
					print "<img src='img/carousel/" . $image["image"] . "' alt='" . $image["alt"] . "' class='img-responsive'>";
				} else if (!file_exists("img/carousel/" . $image["image"])) {
					print "<p class='text-danger'>There was an error finding the file named " . $image["image"] . ".</p>";
				}
			}
			?>
		</div>

	</div>

	<div class="row text-center">
		<div class="col-md-10 center-block">
			<p>Digital US South Initiative - Advanced Search</p>
		</div>
	</div>
	<div class="row text-center">
		<div class="col-md-6 center-block">
			<form class="form-horizontal" id="home-search" name="home-search" method="GET" action="search">
			
			<div class="row form-group" id="searchRow">
				<div class="col-xs-1 nopadding">
					<select class="form-control" id="boolean" name="boolean_operator[]">
						<option value="AND" selected="">AND</option>
						<option value="OR">OR</option>
						<option value="NOT">NOT</option>
					</select>
				</div>
				<div class="col-xs-6 nopadding">
					<input type="text" name="query[]" id="query" class="form-control" placeholder="Search our projects">
				</div>
				<div class="col-xs-4 nopadding">
					<select class="form-control" id="advanced_field" name="search_field[]">
						<?php foreach ($advancedSearchFields as $key => $value):?>
						<option value="<?php print $key;?>"><?php print $value;?></option>
						<?php endforeach;?>
					</select>
				</div>
				<div class="col-xs-1 nopadding">
					<button type="button" class="form-control close pull-left">x</button>
				</div>
				<div class="col-xs-12"><hr></div>
			</div>
			
			<div class="row form-group">
					<button type="button" class="btn btn-default" id="addRow">Add another search term</button>
			</div>
			
			<div class="row">
				<div class="col-xs-6">
					<input type="checkbox" value="false" name="full-text-search" id="full-text-search">
					<label for="full-text-search" class="control-label">Search full text</label><br>
					
				</div>
				<div class="col-xs-6">
					<input type="submit" class="btn btn-primary" value="Advanced Search">
				</div>
				
			</div>
			</form>
		</div>
	</div>

</div>

















<?php
require "layout/footer.php";

require "layout/scripts.php";

?>