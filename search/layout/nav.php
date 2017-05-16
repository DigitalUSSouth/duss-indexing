<?php
/**
 * @file nav.php
 * This file serves as the navigation around the website.
 */
?>
<nav class="navbar navbar-duss">
	<div class="container">
		<div class="row">

			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<?php for ($i = 0; $i < 3; $i++): ?>
						<span class="icon-bar"></span>
					<?php endfor; ?>
				</button>
				<img src="img/logo-text-stacked.png" class="navbar-brand img-responsive" alt="Digital US South">
			</div>

			<div class="collapse navbar-collapse" id="menu">
				<ul class="nav navbar-nav navbar-right text-uppercase">
					<li class="active"><a href="#home">Home</a></li>
					<li><a href="#about">About</a></li>
					<li>
					  <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
					  Projects<span class="caret"></span>
					  </a>
					  <ul class="dropdown-menu">
					    <li><a href="#projects">View all projects</a></li>
					    <li role="separator" class="divider"></li>
					    <li><a href="featured-projects">Featured projects</a></li>
					    <!--<li><a href="affiliated-projects">Affiliated projects</a></li>-->
					  </ul>
					</li>
					<li><a href="search">Search</a></li>
					<li><a href="#contact">Contact</a></li>
				</ul>
			</div>

		</div>
	</div>
</nav>

