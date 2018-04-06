
<div class="container">
	<form method="post" action="<?= base_url('index/schedule')?>">
	  	<div class="form-group">
			<label>sport</label>
	  		<div class="btn-group-vertical btn-group-sm" role="group">
		  		<div type="button" class="btn btn-default btn-1 sport active" value="1">Ski</div>
		  		<div type="button" class="btn btn-default btn-2 sport" value="2">Snowboard</div>
			</div>
 			<input id="sport" type="hidden" name="sport" value="1">
		</div>
		<div class="form-group">
			<label>lesson</label>
	  		<div class="btn-group-vertical btn-group-sm" role="group">
		  		<div type="button" class="btn btn-default btn-1 lesson active" value="1">private</div>
		  		<div type="button" class="btn btn-default btn-2 lesson" value="2">group</div>
			</div>
			<input id="lesson" type="hidden" name="lesson" value="">
		</div>
		<div class="form-group">
			<label>duration</label>
	  		<div class="btn-group-vertical btn-group-sm" role="group">
		  		<div type="button" class="btn btn-default btn-1 duration active" value="1">one hour</div>
		  		<div type="button" class="btn btn-default btn-2 duration" value="2">two hour</div>
			</div>
			<input id="duration" type="hidden" name="duration" value="">
		</div>
		<div class="form-group">
			<label>age</label>
			<div class="age error hide"><p>you know your age</p></div>
	  		<div class="dropdown">
	  			<select id="age">
	  				<option selected="pick an age">pick an age</option>
	  				<option value="1">child</option>
	  				<option value="2">teen</option>
	  				<option value="3">adult</option>
	  			</select>
	  		</div>
	  		<input id="age2" type="hidden" name="age" value="">
	  	</div>
	  	<div class="form-group">
			<label>skill</label>
			<div class="skill error hide"><p>wait, what is a skill?</p></div>
	  		<div class="dropdown">
	  			<select id="skill2">
	  				<option selected="pick skill level">pick skill level</option>
	  				<option value="0">never tried it</option>
	  				<option value="1">beginner</option>
	  				<option value="2">intermediate</option>
	  				<option value="3">advanced</option>
	  			</select>
	  		</div>
	  		<input id="skill" type="hidden" name="skill" value="">
	  	</div>
	 	<div class="form-group">
	 		<label>date</label>
	  		<div class="input-group date" data-provide="datepicker">
			<input type="text" id="datepicker">
			    <div class="input-group-addon">
			        <span class="glyphicon glyphicon-th"></span>
			    </div>
			</div>
			<input id="date2" type="hidden" name="date" value="">
		</div>
	  	<div class="form-group">
	  		<button type="submit" id="submit" class="btn btn-default">Submit</button>
	  	</div>
	  	<div>
			<input id="client" type="hidden" name="client" value="1">
			<input id="employee" type="hidden" name="employee" value="1">
		</div>
	</form>
</div>
<script>
$('.btn-group-vertical').on('click', '.btn', function() {
	  $(this).addClass('active').siblings().removeClass('active');
	});

$( "#datepicker" ).datepicker({
  	dateFormat: "yy-mm-dd",
	altField: "#date2"
 	});

$('form').submit(function(evt) {
//  	evt.preventDefault();
	var $sport = $('.btn.sport.active');
	var sport = $sport.attr('value');
	var $lesson = $('.btn.lesson.active')
	var lesson = $lesson.attr('value');
	var $duration = $('.btn.duration.active')
	var duration = $duration.attr('value');
	var age = $('#age').val();
	var skill = $('#skill2').val();
	var currentDate = $('#date2').val();
	
	$('#sport').val(sport);
	$('#lesson').val(lesson);
	$('#duration').val(duration);
	$('#age2').val(age);
	$('#skill').val(skill);
	$('#datepicker').val(currentDate);
	
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
	
	//var skill = $('#skill').val();
	
	if (skill == 'pick skill level') {
		$('.skill.error').removeClass('hide');
		return false;
	}if (skill != 'pick skill level') {
		$('.age.error').addClass('hide');
	}
	
	console.log(sport);
	console.log(lesson);
	console.log(age);
	console.log(duration);
	console.log(skill);
	console.log(currentDate);

 	});
 

 
</script>

<!-- <input type="text" class="form-control" placeholder="MM/DD/YYY" id="date" name="date"> -->