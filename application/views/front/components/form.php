<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<div class="container">
	<form>
	  	<div class="form-group">
	  		<div class="btn-group-vertical btn-group-sm" role="group">
		  		<div type="button" class="btn btn-default btn-1 active">Ski</div>
		  		<div type="button" class="btn btn-default btn-2">Snowboard</div>
			</div>
		</div>
		<div class="form-group">
	  		<div class="dropdown">
	  			<select>
	  				<option selected="pick an age">pick an age</option>
	  				<option value="child">child</option>
	  				<option value="teen">teen</option>
	  				<option value="adult">adult</option>
	  			</select>
	  		</div>
	  	</div>
	  	<div class="form-group">
	  		<div class="dropdown">
	  			<select>
	  				<option selected="pick skill level">pick skill leve</option>
	  				<option value="never tried it">never tried it</option>
	  				<option value="beginner">beginner</option>
	  				<option value="intermediate">intermediate</option>
	  				<option value="advanced">advanced</option>
	  			</select>
	  		</div>
	  	</div>
	  	<div class="form-group"> <!-- Date input -->
	  		<label class="control-label" for="date">start date</label>
	  		<div class="input-group date" data-provide="datepicker">
		    	<input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text"/>
	  		
		    	<div class="input-group-addon">
		        	<span class="glyphicon glyphicon-th"></span>
		    	</div>
		    </div>
		</div>
	  	<div class="form-group">
	  		<button type="submit" id="submit" onclick="submitfunction" class="btn btn-default">Submit</button>
	  	</div>
	</form>
</div>
<script>
$('.btn-group-vertical').on('click', '.btn', function() {
	  $(this).addClass('active').siblings().removeClass('active');
	});


$(document).ready(function(){
  var date_input=$('input[name="date"]'); //our date input has the name "date"
  var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
  var options={
    format: 'mm/dd/yyyy',
    container: container,
    todayHighlight: true,
    autoclose: true,
  };
  //date_input.datepicker(options);
});

$('.datepicker').datepicker();

function submitfunction() {
	console.log('submit');
	
}

</script>