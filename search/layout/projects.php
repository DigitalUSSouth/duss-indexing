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
    <div class="col-sm-3 col-xs-6" style="padding-bottom:1em;">
      <a href="#" data-toggle="modal" data-target="#modal<?php print $projectCounter;?>">
        <div style="height:4em;">
          <h4><?php print $project['header'];?></h4>
        </div>
        <img src="img/thumb/<?php print $project['thumb']?>" class="img-responsive" alt="<?php print $project['header'];?>">
        
      </a>
      <div class="col-xs-12" id="projects<?php print $projectCounter;?>">
        <a href="<?php print $project['website']; ?>" target="_blank">Visit website</a>
      </div>
    </div>
    <?php 
    if ( ($projectCounter % 4) == 0):
      print "<div class=\"clearfix\"></div>";
    endif;
    $projectCounter++;
    endforeach;?>

<!-- These are the prject info modals -->
		
		<!-- Modal -->
<?php 
$counter=1;
foreach ($projects as $project):
?>
<div id="modal<?php print $counter;?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title"><?php print $project['header'];?></h2>
      </div>
      <div class="modal-body">
        <p><h4><a target="_blank" href="<?php print $project['website']?>">Visit website</a></h4></p>
        <?php if (isset($project["thumb"]) && file_exists("img/thumb/" . $project["thumb"]) && $project["thumb"] != ""): ?>
					<img src="img/thumb/<?php echo $project['thumb']; ?>" class="pull-left project-modal-img" width="150px" alt="<?php echo $project['header']; ?>">
				<?php else: ?>
					<!--<img src="http://placehold.it/200x200" class="img-responsive center-block">-->
				<?php endif; ?>
        <?php print $project['content'];?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<?php 
$counter++;
endforeach;?>		


  </div>
</section>