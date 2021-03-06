<?php if ($this->session->form !== NULL) { 
	var_dump($this->session->form); 
}?>
<?php // if an instructor has been selected display time slots
	if (isset($timeSlot) && !null) { //var_dump($form); ?>
	<div class="form-group time">
	<div class="time error hide"><p>pick a time</p></div>
		<label>time</label>
	  	<div class="dropdown">
	  		<select id="time2">
	  			<option selected=""></option>
	  			<?php foreach ($timeSlot as $key => $value) { //var_dump($value);
	  	                $fvalue = date('h:i A',strtotime($value)); ?>
	  	                <option value="<?= $value; ?>"><?= $fvalue; ?></option>
	  			<?php }?>	
	  		</select>
	  		<input id="time" type="hidden" name="time" value="" data-code="<?= $form['instructor']?>">
	  	</div>
	</div>
	<script type="text/javascript">
	$('#last button').attr('type', 'submit').text('submit');
	$('#last button').prop('disabled', 'disabled');
	
	$('#instructor').change(function() {
		var instructor = $('#instructor').val();
		var dataCode = $('#time').attr('data-code');
// 		console.log(instructor);
// 		console.log(dataCode);

		if (instructor !== dataCode) {
			console.log('no match');
			$('.form-group.time').remove();
			$('#last button').attr('type', 'button').text('next');
			}
	});

	$('#time2').change(function() {
		var time = $('#time2').val();
		console.log(time);
		if (time) {
			console.log('its greater');
			$('#last button').prop('disabled', false);
		} else {
			$('#last button').prop('disabled', 'disabled');
		}
	});
	</script>
<?php } else { ?>
	<div class="form-group time">
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
			<input id="date2" type="hidden" name="date2" value="">
	</div>
	
<?php } ?>