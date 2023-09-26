<?php 
include("includes/header.php");
include("functions/db.php");
include("functions/functions.php"); 
?>
<body style="margin: 0;padding: 0;width: 100%;height: 100%;background:url('../img/banner/bradcam3.avif');background-size: 100%;background-repeat: no-repeat;">
<?php include("includes/nav.php");?>
<div class="container" style="margin-top: 100px;">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3" >
				<div class="panel panel-login" style="background-color: #E0FCE1;">
					<div class="panel-heading" style="background-color: #E0FCE1;">
						<div class="row" >
							<div class="col-xs-12" style="background-color: #E0FCE1;">
								<a href="register.php" class="active" id="" style="text-align:center;">CREATE RECIPE ACCOUNT</a>
								<div class="story" style="text-align: center;font-weight: 600;font-size: 15px;color: darkblue;font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, 'sans-serif';">Get started with Web-COOKBOOK.</div>
							</div>
							<div class="row">
		<div class="col-lg-6 col-lg-offset-3">    
		<?php validate_user_registration(); ?>						
		</div>
	</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="register-form" method="post" role="form" >
									<div class="form-group">
										<input type="text" name="first_name" id="first_name" tabindex="1" class="form-control" placeholder="First Name" value="" required >
									</div>
									<div class="form-group">
										<input type="text" name="last_name" id="last_name" tabindex="1" class="form-control" placeholder="Last Name" value="" required >
									</div>

									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="" required >
									</div>
									<div class="form-group">
										<input type="text" name="phone" id="phone" tabindex="1" class="form-control" placeholder="Phone" value="" required >
									</div>
									<div class="form-group">
										<input type="email" name="email" id="register_email" tabindex="1" class="form-control" placeholder="Email Address" value="" required >
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" required>
									</div>
									<div class="form-group">
										<input type="password" name="confirm_password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password" required>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
												<div style="text-align: center;"><a href="../administration/pages-login.php" id="redirect" style="color: darkblue;font-weight: 600;font-size: 13px;margin: 5px auto;outline: hidden;text-decoration: none">Already registered? Sign in</a></div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
<?php include("includes/footer.php") ?>	
</body>
