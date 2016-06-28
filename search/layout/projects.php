<?php
/**
 * @file projects.php
 * This file serves as the listing of all projects completed or in progress by the Digital United States South.
 */
?><section class="container-fluid" id="projects">
		<div class="col-xs-12">

		<div id="project-carousel" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
			<?php 
			$arrayChunks = array_chunk($projects, 8);
			//print "<pre>";
			//print_r($arrayChunks);
			//print "</pre>";
			for ($i=0; $i<sizeof($arrayChunks); $i++):?>
				<li data-target="#project-carousel" data-slide-to="<?php print $i?>"<?php print ($i==0)?' class="active"':'';?>></li>
			<?php endfor;?>
			</ol>
			
			<!-- Wrapper for slides -->
  			<div class="carousel-inner" role="listbox">
			<?php
			$counter=0;
			$projectCounter=0;
			foreach($arrayChunks as $projectsChunk):?>
				<div class="<?php print ($counter++ == 0)?'item active':'item';?>">
     				<?php 
     				$columnIndex=0;
     				foreach ($projectsChunk as $project):
     				if ($columnIndex==4):
     				?>
     				<!-- Add the extra clearfix for only the required viewport -->
  					<div class="clearfix"></div>
     				<!-- <div class="col-xs-3">-->
     				<?php endif;?>
     				<div class="col-xs-3 wrapper">
						<div><a href="#" data-toggle="modal" data-target="#modal<?php print $projectCounter++;?>">
						<?php if (isset($project["thumb"]) && file_exists("img/thumb/" . $project["thumb"]) && $project["thumb"] != ""): ?>
					<img src="img/thumb/<?php echo $project['thumb']; ?>" class="carousel-img img-responsive" alt="<?php echo $project['header']; ?>">
				<?php else: ?>
					<img src="http://placehold.it/200x200" class="img-responsive center-block">
				<?php endif; ?>
						
						
						
						<!--  <img class="carousel-img img-responsive" src="./img/thumb/<?php //print $project['thumb']?>" alt="<?php //print $project['header']?>" />-->
						<p class="carousel-text"><?php print $project['header']?></p></a></div>
					</div>
     				<?php
     				
     				if ($columnIndex==1 || $columnIndex==3 || $columnIndex==5 || $columnIndex==7):
     				?>
     				<!-- </div>-->
     				<?php endif;
     				$columnIndex++;
     				endforeach;?>
     			</div>
			<?php endforeach;?>
			</div>
			
			<!-- Left and right controls -->
  <a class="left carousel-control" href="#project-carousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#project-carousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
		</div>



		</div>
		
		<!-- These are the prject info modals -->
		
		<!-- Modal -->
<?php 
$counter=0;
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
		
		
		
	<i class="fa fa-3x fa-chevron-down"></i>
</section>
