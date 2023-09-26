<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>Tasty Recipes|| Upload Profile Image</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/select2/select2.min.css">
    <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css" />
	  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    
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
              <h3 class="page-title"> UPLOAD PICTURE </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Upload Image</li>
                </ol>
              </nav>
            </div>
            <div class="row">
          
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="text-align: center;">Upload Image</h4>
                   
                    <form class="forms-sample" method="post" enctype="multipart/form-data">
                      <?php
					  $Add=$_GET['Upload'];
					  //$aid= $_SESSION['sturecmsaid'];
					  $sql="SELECT First_name,Phone from designers where designers.phone='$Add'";
					  $query = $dbh -> prepare($sql);
					  $query->execute();
					  $results=$query->fetchAll(PDO::FETCH_OBJ);
					  $cnt=1;
					  if($query->rowCount() > 0)
					  {
					  foreach($results as $row)
					  {               ?>
					  <div class="form-group">
                        <label for="exampleInputName1">FIRST NAME</label>
                        <input type="text" name="" value="<?php  echo htmlentities($row->First_name);?>" class="form-control" readonly='true'>
                      </div>
					  <div class="form-group">
                        <label for="exampleInputName1">Profile Image</label>
                        <input type="file" name="BackImage" value="" class="form-control" required='true'>
<!--						required='true'-->
                      </div>
						<div class="form-group" hidden>
                        <label for="exampleInputName1">Phone</label>
                        <input type="text" name="phone" value="<?php  echo htmlentities($row->Phone);?>" class="form-control" required='true'>
                      </div>
                      <?php $cnt=$cnt+1;}} ?>
                      <button type="submit" class="btn btn-primary mr-2" name="Send">Update</button>
                     
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
  }else {
    if (isset($_POST['Send'])) {
        $Back = $_FILES["BackImage"]["name"];
		$extension = substr($Back,strlen($Back)-4,strlen($Back));
		$allowed_extensions = array(".jpg", ".jpeg", ".png",".PNG","PNG",".avif","avif",".webp","webp");
		if (
			!in_array($extension, $allowed_extensions)
		) {
			echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
				<script>
                    Swal.fire({
                    title: 'Error',
                    text: 'Some image(s) have invalid formats. Only jpg / jpeg / png / webp format allowed!',
                    icon: 'error'
					});
					</script>";
	   // Handle invalid image format, such as not saving the image
		}
		else {
            $aid = $_SESSION['contact'];

            $Back = md5($Back).time().$extension;
            move_uploaded_file($_FILES["BackImage"]["tmp_name"], "images/profile/".$Back);


            $sql = "UPDATE designers SET Image=:Back WHERE Phone=:aid";
            $query = $dbh->prepare($sql);
            $query->bindParam(':Back', $Back, PDO::PARAM_STR);
            $query->bindParam(':aid', $aid, PDO::PARAM_STR);
            $query->execute();
				echo "Swal.fire({
				    icon: 'success',
                    title: 'Upload Images',
                    text: 'Uploading images...',
                    showConfirmButton: true,
                    timer: 2000,
                    timerProgressBar: true,
                    willClose: () => {
                        window.location.href = './';
                    }
                });";
			} 
		}
}
    ?>
</script>
	<script src="../js/sweet.js"></script> 
	   <script src="main.js"></script>
  </body>
</html>