<div class="row text-center">
		<div class="col-md-10 center-block">
			<p>Digital US South Initiative - Advanced Search</p>
		</div>
	</div>
	<div class="row text-center">
		<div class="col-md-6 center-block">
			<form class="form-horizontal" id="home-search" name="home-search" method="GET" action="search">
			
			<?php if($queryArray)://populate search terms in advanced search box
			foreach ($queryArray as $item):
			?>
	        <div class="row form-group search-row">
				<div class="col-xs-1 nopadding">
					<select class="form-control boolean-selector" name="op[]">
						<option value="AND"<?php if($item[1]=='AND') print ' selected=""';?>>AND</option>
						<option value="OR"<?php if($item[1]=='OR') print ' selected=""';?>>OR</option>
						<option value="NOT"<?php if($item[1]=='NOT') print ' selected=""';?>>NOT</option>
					</select>
				</div>
				<div class="col-xs-6 nopadding">
					<input type="text" name="q[]" class="form-control" placeholder="Search our projects" value="<?php print $item[2];?>">
				</div>
				<div class="col-xs-4 nopadding">
					<select class="form-control" name="f[]">
						<?php foreach ($advancedSearchFields as $key => $value):?>
						<option value="<?php print $key;?>"<?php if ($item[0]==$key) print ' selected=""';?>><?php print $value;?></option>
						<?php endforeach;?>
					</select>
				</div>
				<div class="col-xs-1 nopadding">
					<button type="button" class="form-control close">x</button>
				</div>
				<div class="col-xs-12"><hr></div>
			</div>
			<?php 
			endforeach;
			else:?>
			<div class="row form-group search-row">
				<div class="col-xs-1 nopadding">
					<select class="form-control boolean-selector" name="op[]">
						<option value="AND" selected="">AND</option>
						<option value="OR">OR</option>
						<option value="NOT">NOT</option>
					</select>
				</div>
				<div class="col-xs-6 nopadding">
					<input type="text" name="q[]" class="form-control" placeholder="Search our projects">
				</div>
				<div class="col-xs-4 nopadding">
					<select class="form-control" name="f[]">
						<?php foreach ($advancedSearchFields as $key => $value):?>
						<option value="<?php print $key;?>"><?php print $value;?></option>
						<?php endforeach;?>
					</select>
				</div>
				<div class="col-xs-1 nopadding">
					<button type="button" class="form-control close">x</button>
				</div>
				<div class="col-xs-12"><hr></div>
			</div>
			<?php endif;?>
			
			
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
					<input type="hidden" name="form_submitted">
				</div>
				
			</div>
			</form>
		</div>
	</div>
	<br>
	<hr>