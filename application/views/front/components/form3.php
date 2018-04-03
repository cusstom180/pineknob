
<div class="container">
	<form method="get" action="schedule.php">
	  	<div class="form-group">
			<label>sport</label>
	  		<div class="btn-group-vertical btn-group-sm" role="group">
		  		<div type="button" class="btn btn-default btn-1 sport active" value="ski">Ski</div>
		  		<div type="button" class="btn btn-default btn-2 sport" value="Snowboard">Snowboard</div>
			</div>
 			<input id="sport" type="hidden" name="sport2" value="1">
		</div>
		<div class="form-group">
			<label>lesson</label>
	  		<div class="btn-group-vertical btn-group-sm" role="group">
		  		<div type="button" class="btn btn-default btn-1 lesson active" value="private">private</div>
		  		<div type="button" class="btn btn-default btn-2 lesson" value="group" name="lesson">group</div>
			</div>
<!-- 			<input id="lesson" type="hidden" name="lesson" value=""> -->
		</div>
		<div class="form-group">
			<label>age</label>
			<div class="age error hide"><p>you know your age</p></div>
	  		<div class="dropdown">
	  			<select id="age" name="age">
	  				<option selected="pick an age">pick an age</option>
	  				<option value="child">child</option>
	  				<option value="teen">teen</option>
	  				<option value="adult">adult</option>
	  			</select>
	  		</div>
	  	</div>
	  	<div class="form-group">
			<label>skill</label>
			<div class="skill error hide"><p>wait, what is a skill?</p></div>
	  		<div class="dropdown">
	  			<select id="skill" name="skill">
	  				<option selected="pick skill level">pick skill level</option>
	  				<option value="never tried it">never tried it</option>
	  				<option value="beginner">beginner</option>
	  				<option value="intermediate">intermediate</option>
	  				<option value="advanced">advanced</option>
	  			</select>
	  		</div>
	  	</div>
	 	<div class="form-group">
	 		<label>date</label>
	  		<div class="input-group date" data-provide="datepicker" name="date" value="">
			<input type="text" id="datepicker">
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
// 	evt.preventDefault();
	var $sport = $('.btn.sport.active');
	var sport = $sport.attr('value');
	var lesson = $('.btn.lesson.active').attr('value');
	var age = $('#age').val();
	var currentDate = $( "#datepicker" ).datepicker("getDate");

	$('#sport').val(sport);
	
	if ((age == 'pick an age') || (skill == 'pick skill level') || (currentDate == null)) {
		console.log('failed');
		}
	if (age == 'pick an age') {
		$('.age.error').removeClass('hide');
		return false;
	}
	if (age != 'pick an age') {
		$('.age.error').addClass('hide');
	}
	
	var skill = $('#skill').val();
	
	if (skill == 'pick skill level') {
		$('.skill.error').removeClass('hide');
		return false;
	}if (skill != 'pick skill level') {
		$('.age.error').addClass('hide');
	}
	
	console.log(sport);
	console.log(lesson);
	console.log(age);
	console.log(skill);
	console.log(currentDate);
});
	
  $( function() {
    $( "#datepicker" ).datepicker();
  } );

  $

</script>

<!-- <input type="text" class="form-control" placeholder="MM/DD/YYY" id="date" name="date"> -->