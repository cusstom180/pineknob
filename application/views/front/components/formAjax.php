<div class="container">
	<form method="post" action="">
		<div class="form-group">
			<div class="duration error hide"><p>how long?</p></div>
			<label>duration</label>
	  		<div class="btn-group-vertical btn-group-sm" role="group">
		  		<div type="button" class="btn btn-default btn-1 duration" value="1">one hour</div>
		  		<div type="button" class="btn btn-default btn-2 duration" value="2">two hour</div>
		  		<input id="duration" type="hidden" name="duration" value="">
			</div>
		</div>
		<div class="form-group">
			<label>instructor</label>
	  		<div class="dropdown">
	  			<select id="instructor2">
	  				<option value="1" selected="">first available</option>
	  				<?php  foreach ($instructor as $array) {
	  					foreach ($array as $value) {?>
	  						<option value="<?= $value['id'];?>"><?php echo $value['first_name'] . " " . $value['last_name'];?></option>
	  				<?php }
	  				
	  				  } ?>
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
	  		<button type="button" id="next" class="btn btn-default">Submit</button>
	  	</div>
	</form>
</div>
<script>
$('.btn-group-vertical').on('click', '.btn', function() {
	  $(this).addClass('active').siblings().removeClass('active');
	  var $change = $(this).attr('value');
//	  console.log($change);
	  $(this).siblings('input').attr('value', $change);
	//   console.log($(this).siblings('input'));
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



$('#next').click(function(evt) {
// 	evt.preventDefault();
	var form = $('form'); 
// 	var $duration = $('.btn.duration.active')
// 	var duration = $duration.attr('value');
// 	var instructor = $('#instructor2').val();
// 	var time = $('#time2').val();
// 	$('#duration').val(duration);
// 	$('#instructor').val(instructor);
// 	$('#time').val(time);
	  
	
	console.log(form.serialize());
	$.ajax({
        url: "<?php echo base_url('call/calldropdown')?>", // Get the action URL to send AJAX to
          type: "POST",
          data: form.serialize(), // get all form variables
          success: function(result){
              $('#last').before(result);
          }
      });
	});


</script>

