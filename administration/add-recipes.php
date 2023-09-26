<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>RECIPE SYSTEM|| Add Recipe</title>
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
     <?php include_once('includes/header.php');?>
      <div class="container-fluid page-body-wrapper">
      <?php include_once('includes/sidebar.php');?>
        <div class="main-panel" style="width: 100%">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Add Recipe </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Add Recipe</li>
                </ol>
              </nav>
            </div>
            <div class="row">
          
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
					  <button id="add-step-button" class="btn btn-primary mr-2" name="add" type="button" style="margin-bottom: -15px;float: right;">Add Step</button>
                    <h4 class="card-title" style="text-align: center;">Add Recipe</h4>
                   
                    <form class="forms-sample" method="post" enctype="multipart/form-data">
                      
                      <div class="form-group">
                        <label for="exampleInputName1">Food Name <i class="fa fa-star" style="color: red;font-size: 10px"></i></label>
                        <input type="text" name="dish" value="" class="form-control" required='true'>
                      </div>
                     <div class="form-group">
                        <label for="exampleInputName1">File/Photo (eg pdf, jpeg, png, jpg) <i class="fa fa-star" style="color: red;font-size: 10px"></i></label>
                        <input type="file" name="Image" value="" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Category <i class="fa fa-star" style="color: red;font-size: 10px"></i></label>
                        <select  name="categoryid" class="form-control" >
                          <option value="">Select Category</option>
                         <?php 
$sql2 = "SELECT * from category";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$result2=$query2->fetchAll(PDO::FETCH_OBJ);

foreach($result2 as $row1)
{          
    ?>  
<option value="<?php echo htmlentities($row1->ID);?>"><?php echo htmlentities($row1->Category);?></option>
 <?php } ?> 
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Description <i class="fa fa-star" style="color: red;font-size: 10px"></i></label>
                        <textarea name="desc" value="" class="form-control" required='true' placeholder="Type ingredients and Tools used for preparation"></textarea>
                      </div>
						
					  <div class="form-group">
                        <label for="exampleInputName1">Type<i class="fa fa-star" style="color: red;font-size: 10px"></i></label>
                        <input type="text" name="nick" value="" class="form-control"  placeholder="eg apetizer etc" required='true'>
                      </div>
					<div class="form-group">
                        <label for="exampleInputName1">Duration <i class="fa fa-star" style="color: red;font-size: 10px"></i></label>
                        <input type="text" name="duration" value="" class="form-control"  placeholder="eg 30 mins etc" required='true'>
                      </div>
					 <div class="form-group">
			            <label for="exampleInputName1">Step 1 <i class="fa fa-star" style="color: red;font-size: 10px"></i></label>
                        <input type="text" name="step" value="" class="form-control"  required='true'>
                      </div>
					<div id="steps-container" style="margin-bottom: 40px">
					</div>
                      <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>  
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
	<script>
    var stepCount = 2; // Keep track of the current step

    // Function to add a new step
    function addStep() {
        if (stepCount <= 20) {
            var container = document.getElementById('steps-container');
            var newStep = document.createElement('div');
            newStep.className = 'form-group';
            newStep.innerHTML = '<label for="exampleInputName' + stepCount + '">Step ' + stepCount + '</label>' +
                                '<input type="text" name="step' + (stepCount - 1) + '" value="" class="form-control" placeholder="optional...">';
            container.appendChild(newStep);
            stepCount++;

            // Show the newly added step
            newStep.style.display = 'block';
        }
    }

    // Add an event listener to the button
    document.getElementById('add-step-button').addEventListener('click', addStep);

    // Show the first step initially
    document.querySelector('#steps-container .form-group').style.display = 'block';
</script>
  
	  </main><?php include_once('includes/footer.php');?>
	  <?php include_once('react.php');?>

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
	   <!-- container-scroller -->
    <!-- plugins:js -->
	  <script src="vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
	<?php
	if (strlen($_SESSION['contact']==0)) {
		header('location:logout.php');
	} 
	else{
		if(isset($_POST['submit']))
		{
			session_start();
			$Photo = $_FILES["Image"]["name"];
			$aid= $_SESSION['contact'];
			$aid1= $_SESSION['mail'];
			
			$dish=$_POST['dish'];
			$desc=$_POST['desc'];
			$categoryid=$_POST['categoryid'];
			$nick=$_POST['nick'];
			$duration=$_POST['duration'];
			$step1=$_POST['step'];
			$step2=$_POST['step1'];
			$step3=$_POST['step2'];
			$step4=$_POST['step3'];
			$step5=$_POST['step4'];
			$step6=$_POST['step5'];
			$step7=$_POST['step6'];
			$step8=$_POST['step7'];
			$step9=$_POST['step8'];
			$step10=$_POST['step9'];
			$step11=$_POST['step10'];
			$step12=$_POST['step11'];
			$step13=$_POST['step12'];
			$step14=$_POST['step13'];
			$step15=$_POST['step14'];
			$step16=$_POST['step15'];
			$step17=$_POST['step16'];
			$step18=$_POST['step17'];
			$step19=$_POST['step18'];
			$step20=$_POST['step19'];
			
            $extension = substr($Photo,strlen($Photo)-4,strlen($Photo));
		$allowed_extensions = array(".jpg", ".jpeg", ".png", ".gif", "jpg", "jpeg", "png","gif", ".PNG","PNG", "pdf", ".pdf",".avif", "avif", ".webp", "webp");
		if (
			!in_array($extension, $allowed_extensions)
		) {
			echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
				<script>
                    Swal.fire({
                    title: 'Error',
                    text: 'Some image(s) have invalid formats. Only jpg / jpeg / png / gif format allowed!',
                    icon: 'error'
					});
					</script>";
	   // Handle invalid image format, such as not saving the image
		}
		else {			
			$Photo=md5($Photo).time().$extension;
			move_uploaded_file($_FILES["Image"]["tmp_name"],"images/recipes/".$Photo);
			
			$sql="insert into recipes(food_name,about,categoryid,Duration,step1,step2,step3,step4,step5,step6,step7,step8,step9,step10,step11,step12,step13,step14,step15,step16,step17,step18,step19,step20,Nick,Phone,Image) values(:dish,:desc,:categoryid,:duration,:step1,:step2,:step3,:step4,:step5,:step6,:step7,:step8,:step9,:step10,:step11,:step12,:step13,:step14,:step15,:step16,:step17,:step18,:step19,:step20,:nick,:aid,:Photo)";
			$query=$dbh->prepare($sql);
			$query->bindParam(':dish',$dish,PDO::PARAM_STR);
			$query->bindParam(':desc',$desc,PDO::PARAM_STR);
			$query->bindParam(':categoryid',$categoryid,PDO::PARAM_STR);
			$query->bindParam(':duration',$duration,PDO::PARAM_STR);
			$query->bindParam(':step1',$step1,PDO::PARAM_STR);
			$query->bindParam(':step2',$step2,PDO::PARAM_STR);
			$query->bindParam(':step3',$step3,PDO::PARAM_STR);
			$query->bindParam(':step4',$step4,PDO::PARAM_STR);
			$query->bindParam(':step5',$step5,PDO::PARAM_STR);
			$query->bindParam(':step6',$step6,PDO::PARAM_STR);
			$query->bindParam(':step7',$step7,PDO::PARAM_STR);
			$query->bindParam(':step8',$step8,PDO::PARAM_STR);
			$query->bindParam(':step9',$step9,PDO::PARAM_STR);
			$query->bindParam(':step10',$step10,PDO::PARAM_STR);
			$query->bindParam(':step11',$step11,PDO::PARAM_STR);
			$query->bindParam(':step12',$step12,PDO::PARAM_STR);
			$query->bindParam(':step13',$step13,PDO::PARAM_STR);
			$query->bindParam(':step14',$step14,PDO::PARAM_STR);
			$query->bindParam(':step15',$step15,PDO::PARAM_STR);
			$query->bindParam(':step16',$step16,PDO::PARAM_STR);
			$query->bindParam(':step17',$step17,PDO::PARAM_STR);
			$query->bindParam(':step18',$step18,PDO::PARAM_STR);
			$query->bindParam(':step19',$step19,PDO::PARAM_STR);
			$query->bindParam(':step20',$step20,PDO::PARAM_STR);
			$query->bindParam(':nick',$nick,PDO::PARAM_STR);
			$query->bindParam(':aid',$aid,PDO::PARAM_STR);
			$query->bindParam(':Photo',$Photo,PDO::PARAM_STR);
			$query->execute();
			$LastInsertId=$dbh->lastInsertId();
			if ($LastInsertId>0) {
				echo "Swal.fire({
                    icon: 'success',
                    title: 'Recipe has been posted!',
                    text: 'Redirecting to Dashboard',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    willClose: () => {
                        window.location.href = 'add-recipes.php';
                    }
                });";
			} else {
				echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
				   <script>
				      Swal.fire({
					  title: 'Error',
					  text: 'Something Went Wrong. Please try again',
					  icon: 'error'
					  });
				</script>";
			}
		}		
	}
	}
    ?>
</script>
<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	 <script src="main.js"></script>
  </body>
</html>