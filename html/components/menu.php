<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button><a class="navbar-brand" href="http://localhost:8888/pineknob/">Home</a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">Link <span class="sr-only">(current)</span></a>
					</li>
					<li><a href="#">Link</a>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Action</a>
							</li>
							<li><a href="#">Another action</a>
							</li>
							<li><a href="#">Something else here</a>
							</li>
							<li role="separator" class="divider"></li>
							<li><a href="#">Separated link</a>
							</li>
							<li role="separator" class="divider"></li>
							<li><a href="#">One more separated link</a>
							</li>
						</ul>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<div class="modal fade" id="loginModal" tabindex="-1" role="dialog">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									<h4 class="modal-title">Already a customer?</h4>
								</div>
								<div class="modal-body">
									<div class="panel-heading">
										<h3 class="panel-title">Login</h3>
									</div>
									<div class="panel-body">
										<form role="form" method="post" action="http://localhost:8888/pineknob/user/login_user">
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
											</b><a href="http://localhost:8888/pineknob/user">Register here</a>
										</center>
										<!--for centered text-->

									</div>
								</div>
								<div class="modal-footer">
									<button id="close" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									<button type="button" class="btn btn-primary">continue as a guest</button>
								</div>
							</div>
							<!-- /.modal-content -->
						</div>
						<!-- /.modal-dialog -->
					</div>
					<!-- /.modal -->
					<script type="text/javascript">
						$( '#close' ).on( 'click', function ( e ) {
							console.log( "it hide the model" );
							$.ajax( {
								url: "http://localhost:8888/pineknob/call/guestuser",
								success: function ( result ) {
									console.log( result );
								}
							} );
						} )
					</script>
					<li><a data-toggle="modal" data-target="#loginModal">login</a>
					</li>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>