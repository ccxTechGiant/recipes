
<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>ONLINE RECIPE|| @ SETTING PROFILE</title>
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
      <div class="container-fluid page-body-wrapper">
      <?php include_once('includes/sidebar.php');?>
        <!-- partial -->
        <div class="main-panel" style="width:  100%">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Recipe Admin Profile </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Admin Profile</li>
                </ol>
              </nav>
            </div>
            <div class="row">
          
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="text-align: center;">Recipe Administration Profile</h4>
                   
                    <form class="forms-sample" method="post">
                      <?php
$aid= $_SESSION['contact'];
$aid1= $_SESSION['mail'];
$sql="SELECT * from  designers where phone='$aid'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() >0)
{
foreach($results as $row)
{               ?>
                      <div class="form-group">
                        <label for="exampleInputName1">First Name</label>
                        <input type="text" name="firstname" value="<?php  echo $row->First_name;?>" class="form-control" required='true'>
					 </div>
                      <div>
						 <label for="exampleInputName1">Surname</label>
                        <input type="text" name="surname" value="<?php  echo $row->Surname;?>" class="form-control" required='true'>
                      </div>
						<br/>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Username</label>
                        <input type="text" name="username" value="<?php  echo $row->Username;?>" class="form-control" readonly="">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Contact Number</label>
                        <input type="text" name="mobilenumber" value="<?php  echo $row->Phone;?>"  class="form-control" maxlength='10' required='true' pattern="[0-9]+" readonly>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">Email</label>
                         <input type="email" name="email" value="<?php  echo $row->Email;?>" class="form-control" required='true'>
                      </div>
						
						<div class="form-group">
						 <label for="exampleInputName1">Country</label>
                        <input type="text" name="Country" value="<?php  echo $row->Country;?>" class="form-control" required='true'>
                      </div>
						<div class="form-group">
                        <label for="exampleInputCity1">Branding Name</label>
                         <input type="text" name="organization" value="<?php  echo $row->Brand;?>" class="form-control" required='true' placeholder="Golden Company">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">Account Creation Date</label>
                         <input type="text" name="" value="<?php  echo $row->CreationDate;?>" readonly="" class="form-control">
                      </div><?php }} ?> 
                      <button type="submit" class="btn btn-primary mr-2" name="submit">Update</button>
                      <button style="background-color: gainsboro" type="submit" class="btn btn-primary mr-2" name="upload"><a href="change-profile-images.php?Upload=<?php echo $row->Phone;?>">Upload Profile Image</a></button>
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
	  	  	  	  <!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
	<?php
	if (strlen($_SESSION['contact']==0)) {
		header('location:logout.php');
	} else{
		if(isset($_POST['submit']))
		{
			$firstname=$_POST['firstname'];
			$surname=$_POST['surname'];
			$phone =$_POST['mobilenumber'];
			$email=$_POST['email'];
			$Org=$_POST['organization'];
			$Username=$_POST['username'];
			$Country = $_POST['Country'];
			
			$sql="update designers set first_name=:firstname,Surname=:surname,Phone=:mobilenumber,Email=:email,Brand=:organization,username=:username,Country=:Country where Phone=:aid";
			$query = $dbh->prepare($sql);
			$query->bindParam(':firstname',$firstname,PDO::PARAM_STR);
			$query->bindParam(':surname',$surname,PDO::PARAM_STR);
			$query->bindParam(':mobilenumber',$phone,PDO::PARAM_STR);
			$query->bindParam(':email',$email,PDO::PARAM_STR);
			$query->bindParam(':username',$Username,PDO::PARAM_STR);
			$query->bindParam(':organization',$Org,PDO::PARAM_STR);
			$query->bindParam(':Country',$Country,PDO::PARAM_STR);
		    $query->bindParam(':aid',$aid,PDO::PARAM_STR);
			
			$query->execute();
				echo "Swal.fire({
                    icon: 'success',
                    title: 'Update Profile',
                    text: 'Updating Profile...',
                    showConfirmButton: true,
                    timer: 2000,
                    timerProgressBar: true,
                    willClose: () => {
                        window.location.href = './';
                    }
                });";
			} 
		}
    ?>
</script>
	   <script src="assets/js/main.js"></script>
  </body>
</html>