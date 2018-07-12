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
						<form id="loginForm" role="form" method="post"
							action="<?php if ($this->uri->segment(1) === 'admin') {
								echo base_url('admin/login_user');
							} else {
								echo base_url('user/login_user');
							} ?>">
							<fieldset>
								<div class="form-group">
									<input class="form-control" placeholder="email" name="email" type="email" autofocus>
								</div>
								<div class="form-group">
									<input class="form-control" placeholder="Password" name="password" type="password" value="">
								</div>
								<input class="btn btn-lg btn-success btn-block" type="button" value="login" name="login">
							</fieldset>
						</form>
						<center>
							<p>Not registered ?</p> <br>
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
		<div class="loginResult"></div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
	<!-- Registar Modal -->

	<script type="text/javascript"> 
		<?php if (current_url() === base_url('front/shoppingcart') && !isset($_SESSION['login'])) { ?>
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
		});

		$('input[name="login"]').on('click', function (e) {
			console.log("boop");
			$.ajax({
				type: "POST",
				url: "<?= base_url('user/login_user')?>",
				data: $('#loginForm').serialize(),	
				success: function(event) {
					console.log(event);
					$('.loginResult').append(event);
				}
			});
		});
		</script>
<?php include_once 'registar_modal.php';?>