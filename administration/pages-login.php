<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tasty Recipes</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
	  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="card mb-3">
                <div class="card-body">
						<style>
						.bi-facebook,.bi-twitter,.bi-envelope{
							padding: 8px;
						}
					.brand-logo {
							display: flex;
							flex-direction: column;
							justify-content: center; 
							align-items: center;
							height: 10%; 
						    margin-bottom: -10px;
						}

						/* Style the logo as needed */
						.logo {
							max-width: 25%; 
							height: 60px; 
						
						}
					
					</style>
                  <div class="pt-4 pb-2">
					  <div>
						  <button type="button" class="close" data-dismiss="modal" style="float: right; margin: -20px -10px;background-color: #fff;border: none;"><a href="../" style="text-decoration: none;color: blue;font-size: 17px;font-weight: 700"> &times;</a></button>
					  </div>
					  <a href="../">
					   <div class="brand-logo">
                            <img style="" class="logo" src="../img/recipe.png" alt="">
					  </div></a>
                    <h5 class="card-title text-center pb-0 fs-6" style="color: blue;text-transform: uppercase;font-weight: 700">Web-COOKBOOK</h5>
                    
                  </div>

                  <form class="row g-3 needs-validation" novalidate id="login" method="post" name="login">

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend" style="background-color: deepskyblue;color: #FFFFFF"><i class="bi bi-person"></i></span>
                        <input type="text" name="username" class="form-control" id="yourUsername" required="true" placeholder="username" value="<?php if(isset($_COOKIE["user_login"])) { echo $_COOKIE["user_login"]; } ?>" >
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                    <label for="yourUsername" class="form-label">Password</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend" style="background-color:deepskyblue;color: #FFFFFF"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" name="password" class="form-control" id="yourPassword" required="true" placeholder="password" value="<?php if(isset($_COOKIE["userpassword"])) { echo $_COOKIE["userpassword"]; } ?>">
                        <div class="invalid-feedback">Please enter your password.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <div class="form-check" style="display: flex;flex-direction: row;">
                        <input class="form-check-input" type="checkbox" name="remember" <?php if(isset($_COOKIE["user_login"])) { ?> checked <?php } ?> value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe" style="margin-left: 5px"> Remember me</label>
						  <a  href="forgot-password.php" class="auth-link text-blue" style="margin-left: 100px;color: blue">Forgot password?</a>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="login">Login</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="../account/">Create new account</a></p>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits" style="font-weight: 700;color: #000000">
                Powered by: <a href="../">ccn.org</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
<script src="../js/sweet.js"></script>
	  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    <?php
    if(isset($_POST['login'])) 
  {
    $username=$_POST['username'];
    $password=md5($_POST['password']);
	$status = 1;
    $sql ="SELECT Phone FROM Designers WHERE username=:username and Password=:password";
    $query=$dbh->prepare($sql);
    $query-> bindParam(':username', $username, PDO::PARAM_STR);
    $query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
{
foreach ($results as $result) {
$_SESSION['contact']=$result->Phone;
$_SESSION['mail']=$result->Email;
}

  if(!empty($_POST["remember"])) {
//COOKIES for username
setcookie ("user_login",$_POST["username"],time()+ (10 * 365 * 24 * 60 * 60));
//COOKIES for password
setcookie ("userpassword",$_POST["password"],time()+ (10 * 365 * 24 * 60 * 60));
} else {
if(isset($_COOKIE["user_login"])) {
setcookie ("user_login","");
if(isset($_COOKIE["userpassword"])) {
setcookie ("userpassword","");
        }
      }
}
$_SESSION['login']=$_POST['username'];
            echo "Swal.fire({
                    icon: 'success',
                    title: 'Login Successful',
                    text: 'Redirecting to Dashboard',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    willClose: () => {
                        window.location.href = './';
                    }
                });";
        } else {
            echo "Swal.fire({
                    icon: 'error',
                    title: 'Access Denied!',
                    text: 'Please check your username and password'
                });";
        }
    }
    ?>
</script>
</body>

</html>