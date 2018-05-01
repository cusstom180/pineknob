
<?php if (empty($instructor)) {
	echo 'its empty';
	
} else {?>
<div class="container">
	<form method="post" action="<?= base_url('front/checkout')?>">
		<div class="form-group">
			<div class="duration error hide"><p>how long?</p></div>
			<label>duration</label>
	  		<div class="btn-group-vertical btn-group-sm" role="group">
		  		<div type="button" class="btn btn-default btn-1" value="1">one hour</div>
		  		<div type="button" class="btn btn-default btn-2" value="2">two hour</div>
		  		<input id="duration" type="hidden" name="duration" value="">
			</div>
		</div>
		<div class="form-group">
			<label>instructor</label>
	  		<div class="dropdown">
	  			<select id="instructor">
	  				<?php  foreach ($instructor as $value) { ?>
	  						<option value="<?= $value['employee_id'];?>"><?php echo $value['first_name'] . " " . $value['last_name'];?></option>
	  				<?php } ?>
	  			</select>
	  			<input id="instructor" type="hidden" name="instructor" value="1">
	  		</div>
	  	</div>
	  	<div>
	  		<?php  foreach ($form as $key => $value) { ?>
	    		<input id="<?= $key; ?>" type="hidden" name="<?= $key; ?>" value="<?= $value; ?>"> 
	  		<?php  } ?>
		</div>
	  	<div id="last" class="form-group">
	  		<button type="button" id="next" class="btn btn-default">next</button>
	  	</div>
	</form>
</div>
<?php } ?>

