<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="container mar-top-50 mar-bot-50">
		<?php if(isset($_SESSION['success_add_msg'])) { ?>
				<div class="form-group">
			  		<div class="error ">
			  			<h1><?= $_SESSION['success_add_msg']?></h1>
			  		</div>
				</div>
				<?php } ?>
			<form id="addclientform" method="post" action="<?= base_url('admin/adduser')?>">
				<h1>enter employee information</h1>
				<?php if(isset($_SESSION['error_add_msg'])) { ?>
				<div class="form-group">
			  		<div class="error ">
			  			<h1><?= $_SESSION['error_add_msg']?></h1>
			  		</div>
				</div>
				<?php } ?>
			  	<div class="form-group">
			  		<div class="error hide"><p>wait, what is a skill?</p></div>
					<label class="hide">sport</label>
				</div>
			 	<div class="form-group">
			 		<div class="error hide"><p>what is the date?</p></div>
			 		<label>first name</label>
			  		<div class="input-group">
					<input type="text" name="first_name">
					</div>
					<label>last name</label>
			  		<div class="input-group">
					<input type="text" name="last_name">
					</div>
					<label>email</label>
			  		<div class="input-group">
					<input type="text" name="email">
 					</div>							
					<label>instructor type</label>
					<div class="form-group">
	 			  		<label class="radio-inline">
						 	<input type="radio" name="instructor_cde" id="inlineRadio1" value="1"> ski
						</label>
						<label class="radio-inline">
						  	<input type="radio" name="instructor_cde" id="inlineRadio2" value="2"> snowboard
						</label>
						<label class="radio-inline">
						  	<input type="radio" name="instructor_cde" id="inlineRadio3" value="3"> both
						</label>
					</div>
				</div>
			  	<div class="form-group">
			  		<button name="submit" value="1" type="submit" id="submit" class="btn btn-default">Submit</button>
			  	</div>
			</form>
		</div>
	</div>
</div>