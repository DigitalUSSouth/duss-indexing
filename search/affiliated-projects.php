<?php
/* affiliated-projects.php
 * This file displays a list of DUSS "Affiliated Projects"
 * List is pulled from the $projects array defined in head.php 
 */

require "layout/head.php";
//require "layout/splash.php";
require "layout/nav-search.php";



?>
<div class="container-fluid">
  <?php foreach ($projects as $project):
    if ($project['type']=='affiliated'):?>
      <div class="row">
        <div class="col-xs-9 center-block">
          <h2><?php print $project['header']?></h2>
          <p><h4><a target="_blank" href="<?php print $project['website']?>">Visit website</a></h4></p>
        <?php if (isset($project["thumb"]) && file_exists("img/thumb/" . $project["thumb"]) && $project["thumb"] != ""): ?>
					<img src="img/thumb/<?php echo $project['thumb']; ?>" class="pull-left project-modal-img" width="150px" alt="<?php echo $project['header']; ?>">
				<?php else: ?>
					<!--<img src="http://placehold.it/200x200" class="img-responsive center-block">-->
				<?php endif; ?>
        <?php print $project['content'];?>
        </div>
      </div>
      <div class="row"><div class="col-xs-9 center-block"><hr></div></div>
    <?php endif;?>
  <?php endforeach;?>
</div><!-- container-fluid --><?php
require "layout/footer.php";
require "layout/scripts.php";
?>