
<div class="container">
	<form method="post" action="">
		<div class="form-group">
			<label>duration</label>
	  		<div class="btn-group-vertical btn-group-sm" role="group">
		  		<div type="button" class="btn btn-default btn-1 duration active" value="1">one hour</div>
		  		<div type="button" class="btn btn-default btn-2 duration" value="2">two hour</div>
			</div>
			<input id="duration" type="hidden" name="duration" value="">
		</div>
		<div class="form-group">
			<label>instructor</label>
	  		<div class="dropdown">
	  			<select id="instructor2">
	  				<option selected=""></option>
	  				<?php  foreach ($instructor as $value) { ?>
	  				<option value="<?= $value['id'];?>"><?php echo $value['first_name'] . " " . $value['last_name'];?></option>
	  				<?php  } ?>
	  			</select>
	  		</div>
	  		<input id="instructor" type="hidden" name="instructor" value="">
	  	</div>
	  	<div id="ajax"></div>
	  	
	  	<div>
	  		<?php  foreach ($form as $key => $value) { ?>
	    		<input id="<?= $key; ?>" type="hidden" name="<?= $key; ?>" value="<?= $value; ?>"> 
	  		<?php  } ?>
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


$( "form" ).on( "submit", function( event ) {
	  event.preventDefault();
	  var $duration = $('.btn.duration.active')
	  var duration = $duration.attr('value');
	  var instructor = $('#instructor2').val();
	  
	  $('#duration').val(duration);
	  $('#instructor').val(instructor);
		
	  var form = $(this);
	  console.log(form.serialize());
      $.ajax({
        url: "<?php echo base_url('index/schedule2')?>", // Get the action URL to send AJAX to
          type: "POST",
          data: form.serialize(), // get all form variables
          success: function(result){
              $('#ajax').html(result);
          }
      });
  	});


</script>
