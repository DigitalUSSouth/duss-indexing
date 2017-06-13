<?php

error_reporting(E_ALL);
ini_set("display_errors", true);
ini_set("display_startup_errors", true);


/**
 * @file head.php
 * This file writes everything between <!DOCTYPE html> and <body>.
 */
// Since we don't actually have a database, this will replicate our database.
$projects = array(
		// Here is how this works.
		// Each project is it's own array.
		// Every key and value is self-explanatory.
		// Content must include all HTML markup.
		array(
				"type" => "core",
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
				"type" => "affiliated",
				"thumb" => "southworth.png",
				"header" => "E.D.E.N. Southworth Collection",
				"website" => "http://library.sc.edu/p/Collections/Digital/Browse/Southworth",
				"content" => "<p>In the second half of the 19th century, novelist Emma Dorothy Eliza Nevitte (E.D.E.N.) Southworth was one of the most popular writers in America, and was as popular in the United States and England as Mark Twain and Harriet Beecher Stowe. The <em>E.D.E.N. Southworth Collection</em> draws on the significant holdings of USC's Irvin Department of Rare Books to create the first-ever comprehensive digital collection of Southworth's voluminous works. Launched in 2014 and continuing to grow its digital holding over the next several years, the project hopes to encourage further study of Southworth, and eventually to provide all of Southworth's book publications digitally.</p>"
		),
		array(
				"type" => "core",
				"thumb" => "burning-of-columbia.png",
				"header" => "The Burning of Columbia",
				"website" => "http://www.digitalussouth.org/burningofcolumbia/neatline/show/colaburning",
				"content" => "<p><em>The Burning of Columbia</em> is an interactive map and timeline that both narrates and visualizes the destruction of Colubmia, SC during the waning days of the Civil War. The project draws on William Gilmore Simms's first-person account, <em>Sack and Destruction of the City of Columbia, S.C.</em>, alongside Marion B. Lucas's definitive scholarly history, <em>Sherman and the Burning of Columbia</em>. By combining these two sources with nineteenth-century maps and images from the digital collections of the University of South Carolina Libraries, this project provides a robust overview of what happened in February 1865. The extent of the destruction is also superimposed on maps from 1869, 1872, and 1895, helping to contextualize how the burning might have shaped post-War development in South Carolina's capital city.</p>"
		),
		array(
				"type" => "affiliated",
				"thumb" => "american-heritage.png",
				"header" => "American Heritage Vegetables",
				"website" => "http://www.duss.sc.edu/vegetable",
				"content" => "<p><em>The American Heritage Vegetables</em> project presents the variety of vegetables&mdash;excluding grains like rice, wheat, and corn&mdash;found in American fields, kitchens, markets, and tables before the 20th century. The project documents varieties of vegetables from artichokes to melons, and includes cultivation practices, period recipes, and other information of interest to agricultural historians, serious gardeners, and those simply interested in how our ancestors ate. The information presented here has been gleaned from the seminal 19th-century works of American gardening, period seed catalogues and cookbooks, and agricultural textbooks.</p>"
		),
		array(
				"type" => "affiliated",
				"thumb" => "civil-war.png",
				"header" => "South Carolina and the Civil War",
				"website" => "http://library.sc.edu/digital/collections/civilwar.html",
				"content" => "<p>While South Carolina's importance in the Civil War's political and military history is clear, less noticed have been the personal and social histories of South Carolina and South Carolinians during our nation's greatest conflict. <em>South Carolina and the Civil War</em> addresses this lack, providing us with primary documents that reveal more than Fort Sumter, the <em>H.L. Hunley</em>, and Sherman's Carolinas Campaign. This collection brings together books, diaries, sheet music, photographs, letters, drawings, and other primary materials that tell the complex history of South Carolina during the War from myriad social and personal perspectives: Union and Confederate, man and woman, slave and free, urban and rural, at home and on campaign.</p>"
		),
		array(
				"type" => "affiliated",
				"thumb" => "pope-brown.png",
				"header" => "The Ethelind Pope Brown Collection of South Carolina Natural History",
				"website" => "http://library.sc.edu/digital/collections/popebrown.html",
				"content" => "<p><em>The Ethelind Pope Brown Collection of South Carolina Natural History</em> consists of 32 watercolor paintings of a total of 48 species of flora and fauna native to the US South, with the majority found in South Carolina. While the artist is unknown, John Laurens, an 18th century Charleston artist and amateur naturalist, is thought to be the most likely candidate. This collection was given to USC by Mrs. Ethelind Pope Brown of Belton, S.C. in 1991; Mrs. Brown and her husband purchased a portfolio containing these paintings from a New York antiques dealer in the early 1950s. These beautiful, vibrant works provide excellent illustrations of many of the plants and animals found in the Southern landscape.</p>"
		),
		array(
				"type" => "affiliated",
				"thumb" => "george-lagrange-cook.png",
				"header" => "George LaGrange Cook Photograph Collection, c.1880-1895",
				"website" => "http://library.sc.edu/digital/collections/scook.html",
				"content" => "<p><em>The George LaGrange Cook Photograph Collection</em> presents negatives of various business, churches, public buildings, and residences in both Charleston and Summerville, S.C. Taken in the late 1880s and early 1890s by George LaGrange Cook, son of the famous Civil War photographer George Smith Cook, these photos provide a unique look at life and living conditions in these significant cities, and the South more generally, as the New South emerged at the end of the 19th century.</p>"
		),
		array(
				"type" => "affiliated",
				"thumb" => "oldsouthernorchards.png",
				"header" => "Old Southern Orchards",
				"website" => "http://www.digitalussouth.org/oldsouthernorchards/index.php",
				"content" => "<p><em>Old Southern Orchards</em> serves as a companion to <em>American Heritage Vegetables</em>, and provides information
		about the most consequential fruits grown in the South prior to the Great Depression.  There were a multitude of varieties grown in the
		region that would become the American South from the colonial era onward.  Some were native (plums, pawpaws, persimmons),
		some introduced from Europe. Yet there were relatively few that mattered decades on end, in town and city markets throughout the region.
		This site documents those durable, marketable varieties.  However splendid a family apple, a local pawpaw, a seedling peach, if it could
		not command the interest of the broader public, it does not appear here.</p>"
		),
		array(
				"type" => "core",
				"thumb" => "ravenel.png",
				"header" => "Plants and Planters - Henry William Ravenel",
				"website" => "http://tundra.csd.sc.edu/ravenel/",
				"content" => "<p><em>Plants and Planter</em> connects the life, travels, business pursuits, and scientific work of one of the great minds of the 19th century, Henry William Ravenel. A prolific traveler, collector and cataloger of botanical specimens, Ravenel had many species named for him, and was considered to have specific expertise in North American fungi. Besides his scientific work, Ravenel was a prolific diarist, and his diaries provide one of the most complete pictures of daily life in the mid-19th century South we have. <em>Plants and Planter</em> brings together Ravenel's personal diaries, correspondence, and over 6,200 botanical specimens, providing us with a detailed portrait of science, self, and society in the 19th-century South.</p>"
				),
		array(
				"type" => "core",
				"thumb" => "sce.png",
				"header" => "South Carolina Encyclopedia",
				"website" => "http://www.scencyclopedia.org/sce/",
				"content" => "<p>A joint project of South Carolina Humanities, the University of South Carolina Press, the USC Libraries, the USC Center for Digital Humanities, the USC College of Arts &amp; Sciences, the USC Institute for Southern Studies, the South Carolina State Library, and many other organizations, the Digital South Carolina Encyclopedia is a comprehensive reference source of the people, places, events, things, achievements, and ideals that have contributed to the evolution of the Palmetto State. Consisting of almost 2000 entries with more than 1100 digital assets, the digital encyclopedia aspires to be an authoritative compilation of essays on topics ranging from politics to the arts, from Hilton Head to Caesars Head, from the Lords Proprietors to Hootie and the Blowfish. In short, we hope it will be <em>the</em> go-to reference for everything South Carolina.</p>
<p>The Digital South Carolina Encyclopedia builds on the 2006 print volume, edited by Dr. Walter B. Edgar and with articles by more than 600 authors. Working with our partner institutions, we have enhanced the print version by adding more than 1200 photos, videos, documents, and audio recordings. In addition to the entries from the print version, we will, over time, add entries as well as update others as needed. Thus, not only is the Digital South Carolina Encyclopedia an essential means of exploring the past and present of the Palmetto State – fostering a deeper appreciation of its richness and complexity – but it also serves as the most complete bibliography on South Carolina ever assembled.</p>"
		),
		array(
				"type" => "affiliated",
				"thumb" => "bullstreet.png",
				"header" => "Digitizing Bull Street",
				"website" => "http://www.digitalussouth.org/bullstreet/",
				"content" => "<p>Our mission is to research and analyze the history of the built environment of the Bull Street campus of the South Carolina State Hospital (formerly the South Carolina State Hospital for the Insane). This website is intended to present our findings and to begin a public conversation about the site's history and future as it faces redevelopment.</p>
<p>This website presents the work of the second in a series of classes on the history and architecture of Bull Street taught by Lydia Mattice Brandt, PhD at the University of South Carolina. The first course, taught in fall 2012, documented and began researching the buildings of the former South Carolina State Hospital. Presentations of this research may be found on <a target=\"_blank\" href=\"http://www.youtube.com/user/BullStreetSymposium2\">YouTube</a>.</p>"
		),
		array(
				"type" => "core",
				"thumb" => "bsm.png",
				"header" => "Black Soldiers Mattered",
				"website" => "http://www.blacksoldiersmattered.com/",
				"content" => "<p>April 6, 1917, changed the lives of 21,609 young African American men from North Carolina. The participation of these Black North Carolinians in World War I has been mostly ignored. Black Soldiers Mattered addresses that void with this interactive site. Explore the journey of Black North Carolinians (BNC)—as units and individual soldiers—from induction to demobilization.</p>"
		)
);
		
		/*//removing these projects from slider
		,
		array(
				"type" => "affiliated",
				"thumb" => "",
				"header" => "SC e-Archives",
				"website" => "",
				"content" => "SC e-Archives"
		),
		array(
				"type" => "affiliated",
				"thumb" => "",
				"header" => "SC Historical Properties",
				"website" => "",
				"content" => "SC Historical Properties"
		),
		array(
				"type" => "affiliated",
				"thumb" => "",
				"header" => "SC Online Records",
				"website" => "",
				"content" => "SC Online Records"
		)
		
		/*,// The Southern Periodical Humor Repository may be added back at a later date
		array(
				"thumb" => "sphr.png",
				"header" => "Southern Periodical Humor Repository",
				"website" => "http://library.sc.edu/sphr/",
				"content" => "<p>Between the 1830s and the outbreak of the Civil War, \"southwestern humor\" was one of the most popular genres of American fiction. While largely forgotten outside of academic circles, southwestern humors continues to influence our conceptions America and the South into the 21<sup>st</sup> century. As America expanded west of the Appalachians after the Louisiana Purchase, the frontier of the \"Old Southwest\"&mdash;those states we now tend to associate with the Deep South&mdash;sparked the imagination of Americans up and down the Eastern Seaboard. Many talented writers used this frontier as the setting for some truly original short fictions. These works prefigured the biting humor of Mark Twain and later generations of great American humorists, and helped shape our ideas about rugged individualism, honor and violence, and swaggering masculinity that we still associate with the West, the Western genre, and the rural South. The goal of the <em>Southern Periodical Humor Repository</em> is to collect forgotten southwestern humor published in newspapers and periodicals, much of which never found publication in books. Currently, it houses works published between 1845 and 1848 in Columbia, SC's <em>The South Carolinian</em>; we hope to collect works from more periodicals as the project matures.</p>"
		)*/
		// array(
		// 	"thumb" => "civil-rights.png",
		// 	"header" => "Civil Rights in South Carolina",
		// 	"website" => "http://library.sc.edu/digital/collections/newman.html",
		// 	"content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras in nunc dapibus, finibus sem ac, tristique metus. Donec semper eros sit amet tellus accumsan, ac accumsan ante varius. Cras interdum rutrum condimentum."
		// )

		//SORT PROJECTS ALPHABETICALLY
		usort($projects, function($a, $b){
			return strcmp($a['header'], $b['header']);
		});

?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Center for Digital Humanities - University of South Carolina">
	<meta name="keywords" content="digital, united, states, south, institute, southern, studies">
	<meta name="description" content="The official website for the Digital United States South.">

	<title><?php echo !isset($title) || $title == "" ? "" : $title . " - ";?>Digital United States South</title>

	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!--<link rel="stylesheet" href="css/slick.css">
	<link rel="stylesheet" href="css/slick-theme.css">-->


	<!--Slick Carousel-->
		<link rel="stylesheet" type="text/css" href="slick/slick.css"/>
		<link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
		
		
	<?php // All pre-defined CSS libraries above this line. ?>
	<link rel="stylesheet" href="css/duss.css">
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="css/duss-search.css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">	

	<script src="js/modernizr.min.js"></script>
	
	<?php if (!DEBUGGING){include "google-analytics.php";} 
	if ($isMapPage==true):?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

	<link rel="stylesheet" href="leaflet/leaflet.css"/>
	<script src="leaflet/leaflet.js"></script>

		<link rel="stylesheet" href="css/map.css"/>

	<?php endif;
	?>
	
</head>
<body>
	 <!--<div class="overlay">
		<noscript>
			<style> section { display: none !important; } </style>
			<div>You have JavaScript disabled. Good luck with that.</div>
		</noscript>
		<div class="spinner">
			<div class="double-bounce1"></div>
			<div class="double-bounce2"></div>
		</div>
	</div>-->
