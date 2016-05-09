<?php
/**
 * @file contact.php
 * Print out the contact information and form.
 */
?>
<section class="container-fluid" id="contact">
	<table id="staff">
		<caption>Project Staff Directory</caption>
		<tr>
			<th>Name</th><th>Title</th><th>Email</th><th>Phone</th>
		</tr>
		<tr>
			<td>W. Matthew J. Simmons</td><td>Project Coordinator</td><td>simmonwm@mailbox.sc.edu</td><td>803-777-9783</td>
		</tr>
		<tr>
			<td>Harry Ferguson</td><td>Programmer</td><td>harryf@email.sc.edu</td><td><!--blank--></td>
		</tr>
		<tr>
			<td>Jill Weber</td><td>Content Specialist</td><td>weberjm@email.sc.edu</td><td><!--blank--></td>
		</tr>
		<tr>
			<td>Sam Lackey</td><td>Content Specialist</td><td>lackeys@email.sc.edu</td><td><!--blank--></td>
		</tr>
	</table>
</section>
<!-- ### maybe use contact form later ###
<section class="container-fluid" id="contact">
	<div class="row positioner">
		<div class="col-md-6 center-block">

			<div class="alert alert-dismissiable" style="display: none;">
				<button type="button" class="close">x</button>
			</div>

			<form class="form-horizontal">
				<legend>Contact Us</legend>
				<fieldset>
					<div class="form-group">
						<label for="name" class="control-label col-md-2">Name</label>
						<div class="col-md-10">
							<input type="text" class="form-control" name="name" id="name" placeholder="John Smith" autocomplete="off">
						</div>
					</div>

					<div class="form-group">
						<label for="email" class="control-label col-md-2">Email</label>
						<div class="col-md-10">
							<input type="email" class="form-control" name="email" id="email" placeholder="me@example.com" autocomplete="off">
						</div>
					</div>

					<div class="form-group">
						<label for="message" class="control-label col-md-2">Message</label>
						<div class="col-md-10">
							<textarea class="form-control" name="message" id="message" placeholder="Your message here"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label for="answer" class="control-label col-md-2">
							<?php print rand(1, 10) . " + " . rand(1, 10) . " = "; ?>
						</label>
						<div class="col-md-2">
							<input type="tel" class="form-control" name="answer" id="answer" autocomplete="off">
						</div>
						<div class="col-md-2 pull-right">
							<button type="submit" class="btn btn-primary pull-right">Send</button>
						</div>
					</div>
				</fieldset>
			</form>

		</div>
	</div>
</section>-->
