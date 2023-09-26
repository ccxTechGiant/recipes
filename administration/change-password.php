<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>ONLINE RECIPE|| Change Password</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/select2/select2.min.css">
    <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
	  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link rel="stylesheet" href="css/style.css" />
    <script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
Swal.fire({
	title: 'Error',
	text: 'New password doesn`t match!',
	icon: 'error'
});
document.changepassword.confirmpassword.focus();
return false;
}
return true;
}   

</script>
  </head>
  <body>
   <main id="main" class="main">  
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
     <?php include_once('includes/header.php');?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
      <?php include_once('includes/sidebar.php');?>
        <!-- partial -->
        <div class="main-panel" style="width:  100%">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Change Password </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                </ol>
              </nav>
            </div>
            <div class="row">
          
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="text-align: center;">Change Password</h4>
                   
                    <form class="forms-sample" name="changepassword" method="post" onsubmit="return checkpass();">
                      
                      <div class="form-group">
                        <label for="exampleInputName1">Current Password</label>
                        <input type="password" name="currentpassword" id="currentpassword" class="form-control" required="true">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">New Password</label>
                        <input type="password" name="newpassword"  class="form-control" required="true">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Confirm Password</label>
                        <input type="password" name="confirmpassword" id="confirmpassword" value=""  class="form-control" required="true">
                      </div>
                      
                      <button type="submit" class="btn btn-primary mr-2" name="submit">Change</button>
                     
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div> 
	</main><?php include_once('includes/footer.php');?><?php include_once('react.php');?>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="vendors/select2/select2.min.js"></script>
    <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="js/typeahead.js"></script>
    <script src="js/select2.js"></script>
    <!-- End custom js for this page -->
	  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	  <script>
		  <?php
		  if (strlen($_SESSION['contact']==0)) {
			  header('location:logout.php');
		  }
		  else{
			  if(isset($_POST['submit']))
			  {
				  $aid= $_SESSION['contact'];
				  $cpassword=md5($_POST['currentpassword']);
				  $newpassword=md5($_POST['newpassword']);
				  $sql ="SELECT Phone FROM designers WHERE Phone=:aid && Password=:cpassword";
				  $query= $dbh -> prepare($sql);
				  $query-> bindParam(':aid', $aid, PDO::PARAM_STR);
				  $query-> bindParam(':cpassword', $cpassword, PDO::PARAM_STR);
				  $query-> execute();
				  $results = $query -> fetchAll(PDO::FETCH_OBJ);
				  if($query -> rowCount() > 0)
				  {
					  $con="update designers set Password=:newpassword where Phone=:aid";
					  $chngpwd1 = $dbh->prepare($con);
					  $chngpwd1-> bindParam(':aid', $aid, PDO::PARAM_STR);
					  $chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
					  $chngpwd1->execute();
					  echo "Swal.fire({
					      icon: 'success',
						  title: 'Password Changed Successfully',
						  text: 'Finishing your reguest...',
						  showConfirmButton: true,
						  timer: 2000,
						  timerProgressBar: true,
						  willClose: () => {
						  window.location.href = 'change-password.php';
                    }
                });";
			}
			else{
			echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
				   <script>
				      Swal.fire({
					  title: 'Error',
					  text: 'The current password is incorrect!',
					  icon: 'error'
					  });
				</script>";
		}
		}
	}
    ?>
</script>
	  <script src="../js/sweet.js"></script>
  </body>
</html>