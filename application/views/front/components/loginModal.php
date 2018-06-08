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
							</b><a href="<?php echo base_url('user'); ?>">Register here</a>
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
		</script>