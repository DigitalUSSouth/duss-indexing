<?php
/**
 * @file projects.php
 * This file serves as the listing of all projects completed or in progress by the Digital United States South.
 */
?>
<section class="container-fluid" id="projects">
  <div class="col-xs-12">
    <?php 
    $projectCounter = 1;
    foreach ($projects as $project):?>
    <div class="col-sm-3 col-xs-6">
      <a href="<?php print $project['website']?>" target="_blank" class="explore-link">
        <img src="img/thumb/<?php print $project['thumb']?>" class="img-responsive" alt="<?php print $project['header'];?>">
        <div class="">
          <h4><?php print $project['header'];?></h4>
          <p class="text-white"></p>
        </div>
      </a>
      <div class="collapse col-xs-12" id="projects<?php print $projectCounter;?>">
        <?php //print $project['content']; ?>
      </div>
    </div>
    <?php 
    if ( ($projectCounter % 4) == 0):
      print "<div class=\"clearfix\"></div>";
    endif;
    $projectCounter++;
    endforeach;?>
  </div>
</section>