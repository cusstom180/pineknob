<div class="modal fade" id="loginModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button id="nope" type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title">Already a customer?</h4>
				</div>
				<div class="modal-body">
					<div class="panel-heading">
						<h3 class="panel-title">Login</h3>
					</div>
                <?php
					$success_msg = $this->session->flashdata ( 'success_msg' );
					$error_msg = $this->session->flashdata ( 'error_msg' );
		
					if ($success_msg) { ?>
                    <div class="alert alert-success">
                      <?php echo $success_msg; ?>
                    </div>
                  <?php }
					if ($error_msg) { ?>
                    <div class="alert alert-danger">
                      <?php echo $error_msg; ?>
                    </div>
                    <?php } ?>
                <div class="panel-body">
						<form role="form" method="post"
							action="<?php echo base_url('user/login_user'); ?>">
							<fieldset>
								<div class="form-group">
									<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
								</div>
								<div class="form-group">
									<input class="form-control" placeholder="Password" name="password" type="password" value="">
								</div>
								<input class="btn btn-lg btn-success btn-block" type="submit" value="login" name="login">
							</fieldset>
						</form>
						<center>
							<b>Not registered ?</b> <br>
							<!-- Button trigger registar modal -->
                            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#registarModal">
                              Registar here
                            </button>
						</center>
						<!--for centered text-->
					</div>
				</div>
				<div class="modal-footer">
					<button id="close" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button id="guest" type="button" class="btn btn-primary" data-dismiss="modal">continue as a guest</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
	<!-- Registar Modal -->
<div class="modal fade" id="registarModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Registration</h4>
      </div>
      <div class="modal-body">
      	<span style="background-color: red;">
					<div class="login-panel panel panel-success">
						<div class="panel-heading">
							<h3 class="panel-title">Registration</h3>
						</div>
						<div class="panel-body">

                  <?php
                $error_msg = $this->session->flashdata('error_msg');
                if ($error_msg) {
                    echo $error_msg;
                }
                ?>

                      <form role="form" method="post"
								action="<?php echo base_url('user/register_user'); ?>">
								<fieldset>
									<div class="form-group">
										<input class="form-control" placeholder="first name"
											name="first_name" type="text" autofocus>
									</div>
									<div class="form-group">
										<input class="form-control" placeholder="last name"
											name="last_name" type="text">
									</div>
									<div class="form-group">
										<input class="form-control" placeholder="E-mail" name="email"
											type="email" autofocus>
									</div>
									<div class="form-group">
										<input class="form-control" placeholder="Password"
											name="password" type="password" value="">
									</div>
									<div class="form-group">
										<input class="form-control" placeholder="Mobile No"
											name="mobile" type="number" value="">
									</div>
									<input class="btn btn-lg btn-success btn-block" type="submit"
										value="Register" name="register">

								</fieldset>
							</form>
						</div>
					</div>
	</span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
	<script type="text/javascript"> 
		<?php if (current_url() === base_url('front/shoppingcart')) { ?>
		$('#loginModal').modal('show'); 
		<?php } ?>
		$('#close, #guest, #nope').on('click', function (e) {
			  console.log("it hide the model");
			  $.ajax({
				url: "<?= base_url('call/guestuser')?>",
				success: function(result) {
					console.log(result);
					}	
			});
			})
			
		 $('input[name="register"]').on('click', function (e) {
			 e.preventDefault() ;
			 console.log("registar model");
			 $.ajax({
					url: "<?= base_url('user/register_user')?>",
					success: function(result) {
						console.log(result);
						}	
				});
			 });
			
		</script>