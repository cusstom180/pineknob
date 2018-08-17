<div class="row">
	<div class="container">
		<div class="col-md-10 col-md-offset-1">
			<form action="<?= base_url('admin/updateInstructor')?>" method="post">
				<div class="form-group">
			  		<div class="">
			  			<h1>apointment info</h1>
			  		</div>
				</div>
				<div class="form-group">
					<label>customer name</label>
					<p class="form-control-static"><?php echo $day['customer_first'] . " " . $day['customer_last']; ?></p>
				</div>
				<div class="form-group">
					<label>sport</label>
					<p class="form-control-static"><?php echo $day['sport']; ?></p>
				</div>
				<div class="form-group">
					<label>lesson</label>
					<p class="form-control-static"><?php echo $day['lesson']; ?></p>
				</div>
				<div class="form-group">
					<label>age</label>
					<p class="form-control-static"><?php echo $day['age']; ?></p>
				</div>
				<div class="form-group">
					<label>skill level</label>
					<p class="form-control-static"><?php echo $day['skill']; ?></p>
				</div>
				<div class="form-group">
					<label>instructor</label>
					<select class="form-control" name="instructor">
						<option value="<?= $day['instructor_id']?>"><?php echo $day['instructor_first'] . " " . $day['instructor_last'];?></option>
						
					 	<?php foreach ($instructor as $array) { ?>
					 	<option value="<?= $array['instructor_id'];?>"><?php echo $array['first_name'] . " " . $array['last_name'];?></option>
					 	<?php }?>
					</select>
				</div>
				<div>
					<input type="hidden" name="appt" value="<?= $day['appt_id']?>">
					<input type="hidden" name="date" value="<?= $day['date']?>">
				</div>
				<div class="form-group">
			  		<button name="check1" value="1" type="submit" id="submit" class="btn btn-default">Submit</button>
			  	</div>
			</form>
		</div>
	</div>
</div>
