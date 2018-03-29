<div class="container">
	<form>
	  <div class="form-group">
	    <label for="exampleInputEmail1">Email address</label>
	    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Password</label>
	    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
	  </div>
	  <div class="btn-group-vertical btn-group-sm" role="group">
		  <div type="button" class="btn btn-default btn-1 active">Ski</div>
		  <div type="button" class="btn btn-default btn-2">Snowboard</div>
		</div>
	  <div class="checkbox">
	    <label>
	      <input type="checkbox"> Check me out </label>
	  </div>
	  <button type="submit" class="btn btn-default">Submit</button>
	</form>
</div>
<script>
$('.btn-group').on('click', '.btn', function() {
	  $(this).addClass('active').siblings().removeClass('active');
	});

</script>