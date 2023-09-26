<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  
    <title>Tasty Recipes ||| RESET PASSWORD</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="css/style.css">
	  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
   <script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
Swal.fire({
	title: 'Error',
	text: 'New password doesn`t match!',
	icon: 'error'
});
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <style>
					.brand-logo {
							display: flex;
							flex-direction: column;
							justify-content: center; 
							align-items: center;
							height: 2%; 
						}

						/* Style the logo as needed */
						.logo {
							max-width: 30%; 
							height: 50px; 
						
						}
					
					</style>
					<div class="auth-form-light text-left p-5">
                        <div class="brand-logo">
                            <img style="" class="logo"src="../img/recipe.png">
                </div>
                <h4><RE>RESET</RE> PASSWORD</h4>
                <h6 class="font-weight-light">Enter your email and hone number to reset password!</h6>
                <form class="pt-3" id="login" method="post" name="login">
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg" placeholder="Email Address" required="true" name="email">
                  </div>
                  <div class="form-group">
                    
                     <input type="text" class="form-control form-control-lg"  name="mobile" placeholder="Mobile Number" required="true" maxlength="10" pattern="[0-9]+">
                  </div>
                  <div class="form-group">
                   
                    <input class="form-control form-control-lg" type="password" name="newpassword" placeholder="New Password" required="true"/>
                  </div>
                  <div class="form-group">
                    
                   <input class="form-control form-control-lg" type="password" name="confirmpassword" placeholder="Confirm Password" required="true" />
                  </div>
                  <div class="mt-3">
                    <button class="btn btn-success btn-block loginbtn" name="submit" type="submit">Reset</button>
                  </div>
                  <div class="mb-2" style="margin-top: 5px;">
                    <a href="pages-login.php" class="btn btn-block btn-facebook auth-form-btn">
                      <i class="icon-social-home mr-2"></i>Back Login </a>
                  </div>
                  
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->    <script src="vendors/js/vendor.bundle.base.js"></script>
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- plugins:js -->

<script>
	<?php
	if(isset($_POST['submit']))
	{
		$email=$_POST['email'];
		$mobile=$_POST['mobile'];
		$newpassword=md5($_POST['newpassword']);
		$sql ="SELECT Email FROM designers WHERE Email=:email and phone=:mobile";
		$query= $dbh -> prepare($sql);
		$query-> bindParam(':email', $email, PDO::PARAM_STR);
		$query-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
		$query-> execute();
		$results = $query -> fetchAll(PDO::FETCH_OBJ);
		if($query -> rowCount() > 0)
		{
			$con="update designers set Password=:newpassword where Email=:email and Phone=:mobile";
			$chngpwd1 = $dbh->prepare($con);
			$chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
			$chngpwd1-> bindParam(':mobile', $mobile, PDO::PARAM_STR);
			$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
			$chngpwd1->execute();
				echo "Swal.fire({
                    icon: 'success',
                    title: 'Password Changed Successfully',
                    text: 'Finishing your regust...',
                    showConfirmButton: true,
                    timer: 2000,
                    timerProgressBar: true,
                    willClose: () => {
                        window.location.href = 'pages-login.php';
                    }
                });";
			} 
		else{
			echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
				   <script>
				      Swal.fire({
					  title: 'Error',
					  text: 'Email id or Mobile No is invalid',
					  icon: 'error'
					  });
				</script>";
		}
		}
    ?>
</script>
	  <script src="../js/sweet.js"></script>
  </body>
</html>