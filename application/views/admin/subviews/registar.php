<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Login</h3>
                </div>
                <?php  if(isset($_SESSION['success_msg'])){?>
                    <div class="alert alert-success">
                      <?php echo $_SESSION['error_msg']; ?>
                    </div>
                  <?php
                  }
                  if(isset($_SESSION['reg_error_msg'])) {
                    ?>
                    <div class="alert alert-danger">
                      <?php echo $_SESSION['reg_error_msg']; ?>
                    </div>
                    <?php
                  }
                  ?>

                <div class="panel-body">
                    <form id = "userregistarform" role="form" method="post" action="<?php echo base_url('admin/registarclient'); ?>">
                        <fieldset>
                            <div class="form-group"  >
                            	<label>Email</label>
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                            </div>
                            <div class="form-group">
                            	<label>temporay password</label>
                                <input class="form-control" placeholder="temporay password" name="temp_password" type="password" value="">
                            </div>
                            <div class="form-group">
                            	<label>new password</label>
                                <input class="form-control" placeholder="new password" name="new_password" type="password" value="">
                            </div>
                            <div class="form-group">
                            	<label>confirm password</label>
                                <input class="form-control" placeholder="confirm password password" name="confirm_password" type="password" value="">
                            </div>
                                <input class="btn btn-lg btn-success btn-block" type="submit" value="login" name="login" >
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
