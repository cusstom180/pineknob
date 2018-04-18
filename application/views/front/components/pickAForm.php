<?php if (FALSE) {  ?>
	<div class="form-group">
		<label>time</label>
	  	<div class="dropdown">
	  		<select id="time2">
	  			<option selected=""></option>
	  			<?php foreach ($time as $key => $value) { 
	  	            if (strpos($key, 'lot_')) { 
	  	                $value = date('h:i A',strtotime($value)); ?>
	  	                <option value="<?= $value; ?>"><?= $value; ?></option>
	  	            <?php } ?>
	  			<?php }?>	
	  		</select>
	  	</div>
		<input id="time" type="hidden" name="time" value="">
	</div>
<?php  } ?>
<?php // var_dump($apptTime);?>
<?php if (isset($apptTime)) { ?>
	<div class="form-group">
		<label>time</label>
	  	<div class="dropdown">
	  		<select id="time2">
	  			<option selected=""></option>
	  			<?php foreach ($apptTime as $key => $value) { 
	  	            if (strpos($key, 'lot_')) { 
	  	                $value = date('h:i A',strtotime($value)); ?>
	  	                <option value="<?= $value; ?>"><?= $value; ?></option>
	  	            <?php } ?>
	  			<?php }?>	
	  		</select>
	  	</div>
		<input id="time" type="hidden" name="time" value="">
	</div>
<?php } else { ?>
	<div class="form-group">
		<p>this instructor is not scheduled to work this day</p>
		<p>pick another day or send request</p>
	  	<div class="date error hide"><p>what is the date?</p></div>
	 		<label>date</label>
	  		<div class="input-group date" data-provide="datepicker">
			<input type="text" id="datepicker">
			    <div class="input-group-addon">
			        <span class="glyphicon glyphicon-th"></span>
			    </div>
			</div>
			<input id="date2" type="hidden" name="date" value="">
		<input id="time" type="hidden" name="time" value="">
	</div>
	<script type="text/javascript">
	$( "#datepicker" ).datepicker({
	  	dateFormat: "yy-mm-dd",
		altField: "#time"
	 	});
	</script>
<?php } ?>