<?php if ($time !== null) {  ?>
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
<?php // var_dump($time);?>
