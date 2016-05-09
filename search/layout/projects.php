<?php
/**
 * @file projects.php
 * This file serves as the listing of all projects completed or in progress by the Digital United States South.
 */
// Since we don't actually have a database, this will replicate our database.
$projects = array(
	// Here is how this works.
	// Each project is it's own array.
	// Every key and value is self-explanatory.
	// Content must include all HTML markup.
	array(
		"thumb" => "simms.png",
		"header" => "Simms Initiatives",
		"website" => "http://simms.library.sc.edu/index.php",
		"content" => "<p><em>The William Gilmore Simms Initiatives</em> is an online repository for the life and work of the nineteenth-century South's most prolific and important man of letters. Thanks to generous funding from the Watson-Brown Foundation and the University of South Carolina Libraries, the <em>Simms Initiatives</em> brings together four different collections:</p>" .
			"<ul>" .
				"<li>Simms's published works and the manuscripts of two novels left unfinished at his death,</li>" .
				"<li>The scrapbooks in which he collected his own serially-published works, wrote down early versions of some poems, and saved clippings of various publications he found intriguing,</li>" .
				"<li>The complete run of <em>The Simms Review</em>, the leading journal for the study of Simms, and</li>" .
				"<li>A collection of physical materials owned by, or otherwise connected to, Simms.</li>".
			"</ul>" .
			"<p>When combined with the site's full-text searchability, the ability to read and examine all items closely, and robust metadata and informative headnotes, <em>The Simms Initiatives</em> provides scholars, researchers, and interested readers with unparalleled access to and information about Simms and his work.</p>"
	),
	array(
		"thumb" => "southworth.png",
		"header" => "E.D.E.N. Southworth Collection",
		"website" => "http://library.sc.edu/p/Collections/Digital/Browse/Southworth",
		"content" => "<p>In the second half of the 19th century, novelist Emma Dorothy Eliza Nevitte (E.D.E.N.) Southworth was one of the most popular writers in America, and was as popular in the United States and England as Mark Twain and Harriet Beecher Stowe. The <em>E.D.E.N. Southworth Collection</em> draws on the significant holdings of USC's Irvin Department of Rare Books to create the first-ever comprehensive digital collection of Southworth's voluminous works. Launched in 2014 and continuing to grow its digital holding over the next several years, the project hopes to encourage further study of Southworth, and eventually to provide all of Southworth's book publications digitally.</p>"
	),
	array(
		"thumb" => "burning-of-columbia.png",
		"header" => "The Burning of Columbia",
		"website" => "http://calliope.cse.sc.edu/burning/neatline/show/colaburning",
		"content" => "<p><em>The Burning of Columbia</em> is an interactive map and timeline that both narrates and visualizes the destruction of Colubmia, SC during the waning days of the Civil War. The project draws on William Gilmore Simms's first-person account, <em>Sack and Destruction of the City of Columbia, S.C.</em>, alongside Marion B. Lucas's definitive scholarly history, <em>Sherman and the Burning of Columbia</em>. By combining these two sources with nineteenth-century maps and images from the digital collections of the University of South Carolina Libraries, this project provides a robust overview of what happened in February 1865. The extent of the destruction is also superimposed on maps from 1869, 1872, and 1895, helping to contextualize how the burning might have shaped post-War development in South Carolina's capital city.</p>"
	),
	array(
		"thumb" => "american-heritage.png",
		"header" => "American Heritage Vegetables",
		"website" => "http://lichen.csd.sc.edu/vegetable/",
		"content" => "<p><em>The American Heritage Vegetables</em> project presents the variety of vegetables&mdash;excluding grains like rice, wheat, and corn&mdash;found in American fields, kitchens, markets, and tables before the 20th century. The project documents varieties of vegetables from artichokes to melons, and includes cultivation practices, period recipes, and other information of interest to agricultural historians, serious gardeners, and those simply interested in how our ancestors ate. The information presented here has been gleaned from the seminal 19th-century works of American gardening, period seed catalogues and cookbooks, and agricultural textbooks.</p>"
	),
	array(
		"thumb" => "civil-war.png",
		"header" => "South Carolina and the Civil War",
		"website" => "http://library.sc.edu/digital/collections/civilwar.html",
		"content" => "<p>While South Carolina's importance in the Civil War's political and military history is clear, less noticed have been the personal and social histories of South Carolina and South Carolinians during our nation's greatest conflict. <em>South Carolina and the Civil War</em> addresses this lack, providing us with primary documents that reveal more than Fort Sumter, the <em>H.L. Hunley</em>, and Sherman's Carolinas Campaign. This collection brings together books, diaries, sheet music, photographs, letters, drawings, and other primary materials that tell the complex history of South Carolina during the War from myriad social and personal perspectives: Union and Confederate, man and woman, slave and free, urban and rural, at home and on campaign.</p>"
	),
	array(
		"thumb" => "pope-brown.png",
		"header" => "The Ethelind Pope Brown Collection of South Carolina Natural History",
		"website" => "http://library.sc.edu/digital/collections/popebrown.html",
		"content" => "<p><em>The Ethelind Pope Brown Collection of South Carolina Natural History</em> consists of 32 watercolor paintings of a total of 48 species of flora and fauna native to the US South, with the majority found in South Carolina. While the artist is unknown, John Laurens, an 18th century Charleston artist and amateur naturalist, is thought to be the most likely candidate. This collection was given to USC by Mrs. Ethelind Pope Brown of Belton, S.C. in 1991; Mrs. Brown and her husband purchased a portfolio containing these paintings from a New York antiques dealer in the early 1950s. These beautiful, vibrant works provide excellent illustrations of many of the plants and animals found in the Southern landscape.</p>"
	),
	array(
		"thumb" => "george-lagrange-cook.png",
		"header" => "George LaGrange Cook Photograph Collection, c.1880-1895",
		"website" => "http://library.sc.edu/digital/collections/scook.html",
		"content" => "<p><em>The George LaGrange Cook Photograph Collection</em> presents negatives of various business, churches, public buildings, and residences in both Charleston and Summerville, S.C. Taken in the late 1880s and early 1890s by George LaGrange Cook, son of the famous Civil War photographer George Smith Cook, these photos provide a unique look at life and living conditions in these significant cities, and the South more generally, as the New South emerged at the end of the 19th century.</p>"
	),
	array(
		"thumb" => "ravenel.png",
		"header" => "Plants and Planters - Henry William Ravenel",
		"website" => "http://tundra.csd.sc.edu/ravenel/",
		"content" => "<p><em>Plants and Planter</em> connects the life, travels, business pursuits, and scientific work of one of the great minds of the 19th century, Henry William Ravenel. A prolific traveler, collector and cataloger of botanical specimens, Ravenel had many species named for him, and was considered to have specific expertise in North American fungi. Besides his scientific work, Ravenel was a prolific diarist, and his diaries provide one of the most complete pictures of daily life in the mid-19th century South we have. <em>Plants and Planter</em> brings together Ravenel's personal diaries, correspondence, and over 6,200 botanical specimens, providing us with a detailed portrait of science, self, and society in the 19th-century South.</p>"
	),
	array(
		"thumb" => "sphr.png",
		"header" => "Southern Periodical Humor Repository",
		"website" => "http://library.sc.edu/sphr/",
		"content" => "<p>Between the 1830s and the outbreak of the Civil War, \"southwestern humor\" was one of the most popular genres of American fiction. While largely forgotten outside of academic circles, southwestern humors continues to influence our conceptions America and the South into the 21<sup>st</sup> century. As America expanded west of the Appalachians after the Louisiana Purchase, the frontier of the \"Old Southwest\"&mdash;those states we now tend to associate with the Deep South&mdash;sparked the imagination of Americans up and down the Eastern Seaboard. Many talented writers used this frontier as the setting for some truly original short fictions. These works prefigured the biting humor of Mark Twain and later generations of great American humorists, and helped shape our ideas about rugged individualism, honor and violence, and swaggering masculinity that we still associate with the West, the Western genre, and the rural South. The goal of the <em>Southern Periodical Humor Repository</em> is to collect forgotten southwestern humor published in newspapers and periodicals, much of which never found publication in books. Currently, it houses works published between 1845 and 1848 in Columbia, SC's <em>The South Carolinian</em>; we hope to collect works from more periodicals as the project matures.</p>"
	)
	// array(
	// 	"thumb" => "civil-rights.png",
	// 	"header" => "Civil Rights in South Carolina",
	// 	"website" => "http://library.sc.edu/digital/collections/newman.html",
	// 	"content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras in nunc dapibus, finibus sem ac, tristique metus. Donec semper eros sit amet tellus accumsan, ac accumsan ante varius. Cras interdum rutrum condimentum."
	// )
);

?>
<section class="container-fluid" id="projects">
	<div class="positioner">
		<div class="row">

			<?php foreach ($projects as $project): ?>
			<div class="col-sm-4 project-listing text-center">

				<?php if (isset($project["thumb"]) && file_exists("img/thumb/" . $project["thumb"]) && $project["thumb"] != ""): ?>
					<img src="img/thumb/<?php echo $project['thumb']; ?>" class="img-responsive center-block" alt="<?php echo $project['header']; ?>">
				<?php else: ?>
					<img src="http://placehold.it/200x200" class="img-responsive center-block">
				<?php endif; ?>

				<h3><?php echo $project["header"]; ?></h3>
			</div>
			<?php endforeach; ?>

		</div>
	</div>
	<i class="fa fa-3x fa-chevron-down"></i>
</section>

<section class="container-fluid" id="projectDetail">
	<div class="close">Close</div>
	<?php foreach ($projects as $project): ?>
		<div class="row" id="<?php echo $project['header']; ?>">
			<div class="col-sm-6">
				<?php if (isset($project["thumb"]) && file_exists("img/thumb/" . $project["thumb"]) && $project["thumb"] != ""): ?>
					<img src="img/thumb/<?php echo $project['thumb']; ?>" class="img-responsive center-block" alt="<?php echo $project['header']; ?>">
				<?php else: ?>
					<img src="http://placehold.it/400x400" class="img-responsive center-block">
				<?php endif; ?>
			</div>

			<div class="col-sm-6">
				<h2><?php echo $project["header"]; ?></h2>
				<h3><a href="<?php echo $project["website"]; ?>" target="_blank">Website</a></h3>
				<?php echo $project["content"]; ?>
			</div>
		</div>
	<?php endforeach; ?>
</section>
