<?php if (is_array($this->data['form'])) { ?>
<div class="container">
	<form method="post" action="<?= base_url('index/schedule2')?>">
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
	  			<select id="instructor">
	  				<option selected=""></option>
	  				<?php foreach ($instructor as $value) { ?>
	  				<option value="<?= $value['id'];?>"><?php echo $value['first_name'] . " " . $value['last_name'];?></option>
	  				<?php  } ?>
	  			</select>
	  		</div>
	  		<input id="instructor2" type="hidden" name="instructor" value="">
	  	</div>
		<div class="form-group">
			<label>time</label>
	  		<div class="dropdown">
	  			<select id="instructor">
	  				<option selected=""></option>
	  				
	  				<option value=""></option>
	  				
	  			</select>
	  		</div>
	  		<input id="instructor2" type="hidden" name="instructor" value="">
	  	</div>
	  	<div class="form-group">
	  		<button type="button" id="button" class="btn btn-default">look for times</button>
	  	</div>
	  	<div>
	  		<?php foreach ($form as $key => $value) { ?>
	  		<input id="<?= $key; ?>" type="hidden" name="<?= $key; ?>" value="<?= $value; ?>">
	  		<?php } ?>
		</div>
	</form>
</div>

<div id="ajax"></div>

<script>
$('.btn-group-vertical').on('click', '.btn', function() {
	  $(this).addClass('active').siblings().removeClass('active');
	});


$('form').submit(function(evt) {
 	evt.preventDefault();
	var $duration = $('.btn.duration.active')
	var duration = $duration.attr('value');
	var instructor = $('#instructor').val();

	console.log(duration);
	console.log(instructor);

 	});
 
$('#button').click(function (){
	$.ajax({url: "<?= base_url('index/schedule2');?>",
		success: function(result){
			$('#ajax').html(result);},
			dataType:"json"})
});

</script>
<?php } ?>

