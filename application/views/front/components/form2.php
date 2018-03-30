<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<div class="container">
	<form>
	  	<div class="form-group">
	  		<div class="btn-group-vertical btn-group-sm" role="group">
		  		<div type="button" class="btn btn-default btn-1 sport active ski" value="ski">Ski</div>
		  		<div type="button" class="btn btn-default btn-2 sport" value="Snowboard">Snowboard</div>
			</div>
		</div>
		<div class="form-group">
	  		<div class="dropdown">
	  			<select id="age">
	  				<option selected="pick an age">pick an age</option>
	  				<option value="child">child</option>
	  				<option value="teen">teen</option>
	  				<option value="adult">adult</option>
	  			</select>
	  		</div>
	  	</div>
	  	<div class="form-group">
	  		<div class="dropdown">
	  			<select id="skill">
	  				<option selected="pick skill level">pick skill leve</option>
	  				<option value="never tried it">never tried it</option>
	  				<option value="beginner">beginner</option>
	  				<option value="intermediate">intermediate</option>
	  				<option value="advanced">advanced</option>
	  			</select>
	  		</div>
	  	</div>
	 	<div class="form-group">
	 		<label>select date</label>
	  		<div class="input-group date" data-provide="datepicker">
			    <input type="text" class="form-control">
			    <div class="input-group-addon">
			        <span class="glyphicon glyphicon-th"></span>
			    </div>
			</div>
		</div>
	  	<div class="form-group">
	  		<button type="submit" id="submit" class="btn btn-default">Submit</button>
	  	</div>
	</form>
</div>
<script>
$('.btn-group-vertical').on('click', '.btn', function() {
	  $(this).addClass('active').siblings().removeClass('active');
	});

$('form').submit(function(evt) {
	evt.preventDefault();
	var sport = $('.btn.active').attr('value');
	console.log(sport);
	var age = $('#age').val();
	console.log(age);
	var skill = $('#skill').val();
	console.log(skill);
});

$(document).ready(function(){
	  var date_input=$('input[name="date"]'); //our date input has the name "date"
	  console.log(date_input);
	  var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
	  var options={
	    format: 'mm/dd/yyyy',
	    container: container,
	    todayHighlight: true,
	    autoclose: true,
	  };


</script>

<!-- <input type="text" class="form-control" placeholder="MM/DD/YYY" id="date" name="date"> -->