<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#registarModal">
  Registar here
</button>

<!-- Registar Modal -->
<div class="modal fade" id="registarModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
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
							<center>
								<b>Already registered ?</b> <br>
								</b><a href="<?php echo base_url('user/login_view'); ?>">Login
									here</a>
							</center>
							<!--for centered text-->
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