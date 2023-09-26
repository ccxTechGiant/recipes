

<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>ONLINE RECIPE|||@ SEARCH RECIPE</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="vendors/chartist/chartist.min.css">
    <link rel="stylesheet" href="./css/style.css">
	  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  </head>
  <body>
   <main id="main" class="main">  
    <div class="container-scroller">
     <?php include_once('includes/header.php');?>
      <div class="container-fluid page-body-wrapper">
      <?php include_once('includes/sidebar.php');?>
        <div class="main-panel" style="width:  100%">
          <div class="content-wrapper">
             <div class="page-header">
              <h3 class="page-title"> Search Recipe </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Search Recipe</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form method="post">
                                <div class="form-group">
                                   <strong>Search Recipe:</strong>
                                   
                                    <input id="searchdata" type="text" name="searchdata" required="true" class="form-control" placeholder="Search by Name"></div>
                               
                                <button type="submit" class="btn btn-primary" name="search" id="submit">Search</button>
                            </form>
                    <div class="d-sm-flex align-items-center mb-4">
						<?php
						if(isset($_POST['search']))
						{ 
							$sdata=$_POST['searchdata'];
							//$searchTerm = $_GET['search'];
							$aid= $_SESSION['contact'];
						?>
						<h4 align="center">Result for: <?php echo $sdata;?></h4>
                    </div>
                    <div class="table-responsive border rounded p-1">
                      <table class="table">
                        <thead>
                          <tr>
                            <th class="font-weight-bold">S.No</th>
                            <th class="font-weight-bold">Dish Name</th>
                            <th class="font-weight-bold">Category</th>
							<th class="font-weight-bold">About</th> 
                            <th class="font-weight-bold">Creation Date</th>
                            <th class="font-weight-bold">Action</th>
                            
                          </tr>
                        </thead>
                        <tbody>
							<?php
							if (isset($_GET['pageno'])) {
								$pageno = $_GET['pageno'];
							} else {
								$pageno = 1;
							}
							// Formula for pagination
							$no_of_records_per_page = 5;
							$offset = ($pageno-1) * $no_of_records_per_page;
							$ret = "SELECT recipes.ID FROM recipes join designers on designers.phone=recipes.phone join category on category.ID = recipes.categoryid where designers.phone = recipes.phone && recipes.phone='$aid' ORDER BY recipes.CreationDate DESC";
							$query1 = $dbh -> prepare($ret);
							$query1->execute();
							$results1=$query1->fetchAll(PDO::FETCH_OBJ);
							$total_rows=$query1->rowCount();
							$total_pages = ceil($total_rows / $no_of_records_per_page);
							$sql="SELECT recipes.ID AS rid,food_name,category.Category,about,recipes.CreationDate FROM recipes join designers on designers.phone=recipes.phone join category on category.ID=recipes.categoryid where designers.phone = recipes.phone && recipes.phone='$aid' && category.ID=recipes.categoryid && recipes.food_name like '$sdata%' LIMIT $offset, $no_of_records_per_page";
							$query = $dbh -> prepare($sql);
							$query->execute();
							$results=$query->fetchAll(PDO::FETCH_OBJ);
							$cnt=1;
							if($query->rowCount() > 0)
							{
								foreach($results as $row)
								{ 
									$description = strip_tags(htmlspecialchars_decode($row->about));
								$words = preg_split('/\s+/', $description, -1, PREG_SPLIT_NO_EMPTY);
								$trimmedWords = array_slice($words, 0, 6);
								$trimmedDescription = implode(' ', $trimmedWords);
								$remainingWords = count($words) - count($trimmedWords);
								$trimmedDescription .= ($remainingWords > 0) ? "..." : "";  
							?>  
							<tr>
								<td><?php echo htmlentities($cnt);?></td>
								<td><?php  echo htmlentities($row->food_name);?></td>
								<td><?php  echo htmlentities($row->Category);?></td>
								<td><?php  echo htmlentities($trimmedDescription);?></td>
								<td><?php $Date = date('d M, Y',strtotime($row->CreationDate));
									echo htmlentities($Date);?></td>
										<td>
											<div><a href="edit-recipes-details.php?editid=<?php echo htmlentities ($row->rid);?>"><i class="icon-pencil"></i></a>
                                                ||
												<a href="manage-recipes.php?delid=<?php echo ($row->rid);?>" onclick="showSweetAlert(event, '<?php echo ($row->rid);?>')"> <i class="icon-trash"></i></a><script>
										function showSweetAlert(event, rid) {							  event.preventDefault(); // Prevent the default link behavior
																			 Swal.fire({
																				 title: 'Are you sure you want to delete this Recipe?',
																				 text: 'This action cannot be undone.',
																				 icon: 'warning',
																				 showCancelButton: true,
																				 confirmButtonColor: '#3085d6',
																				 cancelButtonColor: '#d33',
																				 confirmButtonText: 'Yes, delete it!',
																				 cancelButtonText: 'Cancel'
																			 }).then((result) => {
																				 if (result.isConfirmed) {
																					 // If user confirms, redirect to the deletion URL
																					 window.location.href = 'manage-recipes.php?delid=' + rid;
																				 }
																			 });
																			}
										</script></div>
							  </td> 
                          </tr>
							<?php  $cnt=$cnt+1;} } else { ?>
							<tr>
								<td colspan="8"> No record found..!	
								</td>
							</tr>
							<?php } }?>
                        </tbody>
                      </table>
                    </div>
                    <div align="left">
						<ul class="pagination" >
							<li><a href="?pageno=1"><strong>First></strong></a></li>
							<li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
								<a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>"><strong style="padding-left: 10px">Prev></strong></a>
							</li>
							<li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
								<a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>"><strong style="padding-left: 10px">Next></strong></a>
							</li>
							<li><a href="?pageno=<?php echo $total_pages; ?>"><strong style="padding-left: 10px">Last</strong></a></li>
						</ul>
					  </div>
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
    <script src="./vendors/chart.js/Chart.min.js"></script>
    <script src="./vendors/moment/moment.min.js"></script>
    <script src="./vendors/daterangepicker/daterangepicker.js"></script>
    <script src="./vendors/chartist/chartist.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="./js/dashboard.js"></script>
    <!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
	<?php
	 if (strlen($_SESSION['contact']==0)) {
		 header('location:logout.php');
	 } else{
		 // Code for deletion
		 if(isset($_GET['delid']))
		 {
			 $aid= $_SESSION['contact'];
	         $aid1= $_SESSION['mail'];
			 $rid=intval($_GET['delid']);
			 $sql="delete from recipes where recipes.ID=:rid && Phone='$aid'";
			 $query=$dbh->prepare($sql);
			 $query->bindParam(':rid',$rid,PDO::PARAM_STR);
			 $query->execute();
				echo "Swal.fire({
                    icon: 'success',
                    title: 'Delete Recipe',
                    text: 'Deleting Recipe...',
                    showConfirmButton: true,
                    timer: 2000,
                    timerProgressBar: true,
                    willClose: () => {
                        window.location.href = manage-recipes.php';
                    }
                });";
			} 
		}
    ?>
</script>
  </body>
</html>