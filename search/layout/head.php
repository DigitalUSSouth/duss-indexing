<?php
/**
 * @file head.php
 * This file writes everything between <!DOCTYPE html> and <body>.
 */
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
	<link rel="stylesheet" href="css/slick.css">
	<link rel="stylesheet" href="css/slick-theme.css">

	<?php // All pre-defined CSS libraries above this line. ?>
	<link rel="stylesheet" href="css/duss.css">
	<link rel="stylesheet" href="css/duss-search.css">

	<script src="js/modernizr.min.js"></script>
	<!--<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-65171142-2', 'auto');
		ga('send', 'pageview');

	</script>-->
</head>
<body>
	<!-- <div class="overlay">
		<noscript>
			<style> section { display: none !important; } </style>
			<div>You have JavaScript disabled. Good luck with that.</div>
		</noscript>
		<div class="spinner">
			<div class="double-bounce1"></div>
			<div class="double-bounce2"></div>
		</div>
	</div>
	uncomment in production
	-->
