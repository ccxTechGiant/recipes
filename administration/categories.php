<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>ONLINE RECIPE||| MANAGE GATEGORIES</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="vendors/chartist/chartist.min.css">
    <link rel="stylesheet" href="css/style.css">
	  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- End layout styles -->
   
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
              <h3 class="page-title"> View Categories </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> View Categories</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                      <h4 class="card-title mb-sm-0">View Categories</h4>
                      <a href="#" class="text-dark ml-auto mb-3 mb-sm-0"> View all Categories</a>
                    </div>
                    <div class="table-responsive border rounded p-1">
                      <table class="table">
                        <thead>
                          <tr>
                            <th class="font-weight-bold">S.No</th>
                            <th class="font-weight-bold">Category</th>
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
	    $aid= $_SESSION['contact'];
        $no_of_records_per_page =10;
        $offset = ($pageno-1) * $no_of_records_per_page;
       $ret = "SELECT category.ID FROM category";
$query1 = $dbh -> prepare($ret);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$total_rows=$query1->rowCount();
$total_pages = ceil($total_rows / $no_of_records_per_page);
$sql="SELECT category.ID,Category from category LIMIT $offset, $no_of_records_per_page ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>   
                          <tr>
                           
                           <td><?php  echo htmlentities($cnt);?></td>
							<td><?php  echo htmlentities($row->Category);?></td>
                            <td>
                              <div><a href="#" data-toggle="modal" data-target="#viewModal<?php echo $row->ID; ?>"><i class="icon-eye"></i></a></div></td> 
                          </tr>
					  <?php $cnt=$cnt+1;}} ?>
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
		  <!-- View dpt Details Modal -->
		  <style>
		  .modal-content {
				background-color: #fff;
				border-radius: 10px;
				box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
			}

			.modal-header {
				background-color: #f8f9fa;
				border-bottom: 1px solid #dee2e6;
			}

			.modal-title {
				color: #333;
			}

			.modal-body {
				color: #555;
			}

			.modal-footer {
				background-color: #f8f9fa;
				border-top: 1px solid #dee2e6;
			}

			/* Media queries for responsiveness */
			@media (max-width: 576px) {
				.modal-dialog {
					max-width: 90%;
				}
			}

			@media (max-width: 768px) {
				.modal-dialog {
					max-width: 70%;
				}
			}

			@media (max-width: 992px) {
				.modal-dialog {
					max-width: 60%;
				}
			}
			</style>
			<?php foreach ($results as $row) { ?>
			<div class="modal fade" id="viewModal<?php echo $row->ID; ?>" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="viewModalLabel">View Category</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<p><strong>Name: </strong> <?php echo htmlentities($row->Category); ?></p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" style="background-color:darkblue;color: #FFFFFF" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
          <!-- content-wrapper ends -->
         </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div> 
	</main><?php include_once('includes/footer.php');?><?php include_once('react.php');?>
    <!-- container-scroller -->
	  <script src="vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<script src="vendors/chart.js/Chart.min.js"></script>
<script src="vendors/progressbar.js/progressbar.min.js"></script>
<script src="vendors/jvectormap/jquery-jvectormap.min.js"></script>
<script src="vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="vendors/owl-carousel-2/owl.carousel.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="js/off-canvas.js"></script>
<script src="js/hoverable-collapse.js"></script>
<script src="js/misc.js"></script>
<script src="js/settings.js"></script>
<script src="js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="js/dashboard.js"></script>
<!-- End custom js for this page-->
<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	  <script src="main.js"></script>
  </body>
</html>