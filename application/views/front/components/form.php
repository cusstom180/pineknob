
<div class="container">
	<form method="post" action="<?= base_url('front/schedule')?>">
	  	<div class="form-group">
	  		<div class="sport error hide"><p>wait, what is a skill?</p></div>
			<label>sport</label>
	  		<div class="btn-group-vertical btn-group-sm" role="group">
		  		<div type="button" class="btn btn-default btn-1 sport" value="1">Ski</div>
		  		<div type="button" class="btn btn-default btn-2 sport" value="2">Snowboard</div>
		  		<input id="sport" type="hidden" name="sport" value="">
			</div>
		</div>
		<div class="form-group">
			<div class="lesson error hide"><p>wait, what is a skill?</p></div>
			<label>lesson</label>
	  		<div class="btn-group-vertical btn-group-sm" role="group">
		  		<div type="button" class="btn btn-default btn-1 lesson" value="1">private</div>
		  		<div type="button" class="btn btn-default btn-2 lesson" value="2">group</div>
		  		<input id="lesson" type="hidden" name="lesson" value="">
			</div>
		</div>
		<div class="form-group">
			<div class="age error hide"><p>you know your age</p></div>
			<label>age</label>
	  		<div class="dropdown">
	  			<select id="age2">
	  				<option selected="pick an age">pick an age</option>
	  				<option value="1">child</option>
	  				<option value="2">teen</option>
	  				<option value="3">adult</option>
	  			</select>
	  			<input id="age" type="hidden" name="age" value="">
	  		</div>
	  	</div>
	  	<div class="form-group">
	  		<div class="skill error hide"><p>wait, what is a skill?</p></div>
			<label>skill</label>
	  		<div class="dropdown">
	  			<select id="skill2">
	  				<option value="0" selected="pick skill level">pick skill level</option>
	  				<option value="1">never tried it</option>
	  				<option value="2">beginner</option>
	  				<option value="3">intermediate</option>
	  				<option value="4">advanced</option>
	  			</select>
	  			<input id="skill" type="hidden" name="skill" value="">
	  		</div>
	  	</div>
	 	<div class="form-group">
	 		<div class="date error hide"><p>what is the date?</p></div>
	 		<label>date</label>
	  		<div class="input-group date" data-provide="datepicker">
			<input type="text" id="datepicker">
			    <div class="input-group-addon">
			        <span class="glyphicon glyphicon-th"></span>
			    </div>
			</div>
			<input id="date" type="hidden" name="date" value="">
		</div>
	  	<div class="form-group">
	  		<button type="submit" id="submit" class="btn btn-default">Submit</button>
	  	</div>
	</form>
</div>
<script>
$('.btn-group-vertical').on('click', '.btn', function() {
	  $(this).addClass('active').siblings().removeClass('active');
	  var $change = $(this).attr('value');
// 	  console.log($change);
	  $(this).siblings('input').attr('value', $change);
	//   console.log($(this).siblings('input'));
	});
	
$( "#datepicker" ).datepicker({
  	dateFormat: "yy-mm-dd",
	altField: "#date"
 	});

//collect dropdown value on change and assign
$('.dropdown select').change(function() {
// console.log($(this));
var $status = $(this).val();
// console.log($status);
// console.log($('.dropdown input'));
// $(this).val($status);
$(this).siblings('input').val($status);
});


$('form').submit(function(evt) {
 	
	var array = {
		sport: $('#sport').val(),
		lesson: $('#lesson').val(),
		age: $('#age').val(),
		skill: $('#skill').val(),
		date: $('#date').val()
	};

	console.log(array);
	var error = 0;
	for (var key in array) {
		console.log('.' + key + '.error');
		if (array[key] == '') {
			$('.' + key + '.error').removeClass('hide');
			error++;
			console.log(error);
			evt.preventDefault();
		} else {
			$('.' + key + '.error').addClass('hide');
			}
		}

 	});

 

 
</script>