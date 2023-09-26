<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>RECIPE SYSTEM|| Edit Recipe</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
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
              <h3 class="page-title">Edit Recipe </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Edit Recipe</li>
                </ol>
              </nav>
            </div>
            <div class="row">
          
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="text-align: center;">Edit Recipe</h4>
                   
                    <form class="forms-sample" method="post" enctype="multipart/form-data">
                                         <?php
	$aid= $_SESSION['contact'];
$eid=$_GET['editid'];
$sql="SELECT recipes.ID,food_name,about,category,Duration,step1,step2,step3,step4,step5,step6,step7,step8,step9,step10,step11,step12,step13,step14,step15,step16,step17,step18,step19,step20,Nick FROM recipes join designers on designers.phone=recipes.phone join category on category.ID = recipes.categoryid where designers.phone = recipes.phone && recipes.phone='$aid' AND recipes.ID=:eid";
$query = $dbh -> prepare($sql);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                      <div class="form-group">
                        <label for="exampleInputName1">Food Name</label>
                        <input type="text" name="dish" value="<?php echo htmlentities($row->food_name);?>" class="form-control" required='true'>
                      </div>
					<div class="form-group" hidden>
                        <label for="exampleInputName1">ID</label>
                        <input type="text" name="id" value="<?php echo htmlentities($row->ID);?>" class="form-control" required='true'>
                      </div>
                     <div class="form-group">
                        <label for="exampleInputName1">File/Photo (eg pdf, jpeg, png, jpg) <i class="fa fa-star" style="color: red;font-size: 10px"></i></label>
                        <input type="file" name="Image" value="" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Category</label>
                        <select  name="categoryid" class="form-control" >
                          <option value="<?php echo htmlentities($row->food_name);?>"><?php echo htmlentities($row->category);?></option>
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
                        <label for="exampleInputName1">Description</label>
                        <textarea name="desc" value="" class="form-control" required='true' placeholder="Type ingredients and Tools used for preparation"><?php echo htmlentities($row->about);?></textarea>
                      </div>
						
					  <div class="form-group">
                        <label for="exampleInputName1">Nick name</label>
                        <input type="text" name="nick" value="<?php echo htmlentities($row->Nick);?>" class="form-control"  placeholder="eg apetizer, aroma etc" required='true'>
                      </div>
					<div class="form-group">
                        <label for="exampleInputName1">Duration</label>
                        <input type="text" name="duration" value="<?php echo htmlentities($row->Duration);?>" class="form-control"  placeholder="eg 30 mins etc" required='true'>
                      </div>
					 <div class="form-group">
                        <label for="exampleInputName1">Step 1</label>
                        <input type="text" name="step" value="<?php echo htmlentities($row->step1);?>" class="form-control"  required='true'>
                      </div>
						<div class="form-group">
                        <label for="exampleInputName1">Step 2</label>
                        <input type="text" name="step1" value="<?php echo htmlentities($row->step2);?>" class="form-control" placeholder="optional..." >
                      </div>
						<div class="form-group">
                        <label for="exampleInputName1">Step 3</label>
                        <input type="text" name="step2" value="<?php echo htmlentities($row->step3);?>" class="form-control"  placeholder="optional...">
                      </div>
						<div class="form-group">
                        <label for="exampleInputName1">Step 4</label>
                        <input type="text" name="step3" value="<?php echo htmlentities($row->step4);?>" class="form-control"  placeholder="optional...">
                      </div>
						<div class="form-group">
                        <label for="exampleInputName1">Step 5</label>
                        <input type="text" name="step4" value="<?php echo htmlentities($row->step5);?>" class="form-control"  placeholder="optional...">
                      </div>
						<div class="form-group">
                        <label for="exampleInputName1">Step 6</label>
                        <input type="text" name="step5" value="<?php echo htmlentities($row->step6);?>" class="form-control" placeholder="optional..." >
                      </div>
						<div class="form-group">
                        <label for="exampleInputName1">Step 7</label>
                        <input type="text" name="step6" value="<?php echo htmlentities($row->step7);?>" class="form-control"  placeholder="optional...">
                      </div>
						<div class="form-group">
                        <label for="exampleInputName1">Step 8</label>
                        <input type="text" name="step7" value="<?php echo htmlentities($row->step8);?>" class="form-control"  placeholder="optional...">
                      </div>
						<div class="form-group">
                        <label for="exampleInputName1">Step 9</label>
                        <input type="text" name="step8" value="<?php echo htmlentities($row->step9);?>" class="form-control"  placeholder="optional...">
                      </div>
						<div class="form-group">
                        <label for="exampleInputName1">Step 10</label>
                        <input type="text" name="step9" value="<?php echo htmlentities($row->step10);?>" class="form-control"  placeholder="optional...">
                      </div>
						<div class="form-group">
                        <label for="exampleInputName1">Step 11</label>
                        <input type="text" name="step10" value="<?php echo htmlentities($row->step11);?>" class="form-control"  placeholder="optional...">
                      </div>
						<div class="form-group">
                        <label for="exampleInputName1">Step 12</label>
                        <input type="text" name="step11" value="<?php echo htmlentities($row->step12);?>" class="form-control"  placeholder="optional...">
                      </div>
						<div class="form-group">
                        <label for="exampleInputName1">Step 13</label>
                        <input type="text" name="step12" value="<?php echo htmlentities($row->step13);?>" class="form-control"  placeholder="optional...">
                      </div>
						<div class="form-group">
                        <label for="exampleInputName1">Step 14</label>
                        <input type="text" name="step13" value="<?php echo htmlentities($row->step14);?>" class="form-control"  placeholder="optional...">
                      </div>
						<div class="form-group">
                        <label for="exampleInputName1">Step 15</label>
                        <input type="text" name="step14" value="<?php echo htmlentities($row->step15);?>" class="form-control"  placeholder="optional...">
                      </div>
						<div class="form-group">
                        <label for="exampleInputName1">Step 16</label>
                        <input type="text" name="step15" value="<?php echo htmlentities($row->step16);?>" class="form-control"  placeholder="optional...">
                      </div>
						<div class="form-group">
                        <label for="exampleInputName1">Step 17</label>
                        <input type="text" name="step16" value="<?php echo htmlentities($row->step17);?>" class="form-control"  placeholder="optional...">
                      </div>
						<div class="form-group">
                        <label for="exampleInputName1">Step 18</label>
                        <input type="text" name="step17" value="<?php echo htmlentities($row->step18);?>" class="form-control"  placeholder="optional...">
                      </div>
						<div class="form-group">
                        <label for="exampleInputName1">Step 19</label>
                        <input type="text" name="step18" value="<?php echo htmlentities($row->step19);?>" class="form-control" placeholder="optional..." >
                      </div>
						<div class="form-group">
                        <label for="exampleInputName1">Step 20</label>
                        <input type="text" name="step19" value="<?php echo htmlentities($row->step20);?>" class="form-control"  placeholder="optional...">
                      </div><?php }} ?>
                   
                      <button type="submit" class="btn btn-primary mr-2" name="submit">Update</button>
                     
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
    </div>	</main><?php include_once('includes/footer.php');?>
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
			$Photo = $_FILES["Image"]["name"];
			$aid= $_SESSION['contact'];
			
			$dish=$_POST['dish'];
			$id=$_POST['id'];
			$desc=$_POST['desc'];
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
			$nick=$_POST['nick'];
			
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
		}
		else {			
			$Photo=md5($Photo).time().$extension;
			move_uploaded_file($_FILES["Image"]["tmp_name"],"images/recipes/".$Photo);
			$sql="UPDATE recipes SET food_name=:dish,about=:desc,Duration=:duration,step1=:step1,step2=:step2,step3=:step3,step4=:step4,step5=:step5,step6=:step6,step7=:step7,step8=:step8,step9=:step9,step10=:step10,step11=:step11,step12=:step12,step13=:step13,step14=:step14,step15=:step15,step16=:step16,step17=:step17,step18=:step18,step19=:step19,step20=:step20,Nick=:nick,Image=:Photo where recipes.phone=:aid AND recipes.ID=:id";
			$query=$dbh->prepare($sql);
			$query->bindParam(':dish',$dish,PDO::PARAM_STR);
			$query->bindParam(':desc',$desc,PDO::PARAM_STR);
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
			$query->bindParam(':Photo',$Photo,PDO::PARAM_STR);
			$query->bindParam(':aid',$aid,PDO::PARAM_STR);
			$query->bindParam(':id',$id,PDO::PARAM_STR);
			$query->execute();
				echo "Swal.fire({
                    icon: 'success',
                    title: 'Recipe has been updated!',
                    text: 'Redirecting to Dashboard',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    willClose: () => {
                        window.location.href = 'manage-recipes.php';
                    }
                });";
				
			}
		}		
	}
    ?>
</script>
<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </body>
</html>