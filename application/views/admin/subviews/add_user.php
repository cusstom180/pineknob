<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="container mar-top-50 mar-bot-50">
			<form id="addclientform" method="post" action="<?= base_url('admin/addclient')?>">
				<h1>enter employee information</h1>
				<?php if(isset($_SESSION['error_msg'])) { ?>
				<div class="form-group">
			  		<div class="error ">
			  			<h1><?= $_SESSION['error_msg']?></h1>
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
					<label>temporary password</label>
			  		<div class="input-group">
					<input type="text" name="temp_password">
					</div>
				</div>
			  	<div class="form-group">
			  		<button name="submit" value="1" type="submit" id="submit" class="btn btn-default">Submit</button>
			  	</div>
			</form>
		</div>
	</div>
</div>