 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>WEB-COOKBOOK SYSTEM</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
 <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<style> 
	textarea{
		resize: none;
	}
	</style>
<body>
<?php
         $aid= $_SESSION['contact'];
		 $sql="SELECT * from designers where phone=:aid";
		 $query = $dbh -> prepare($sql);
		 $query->bindParam(':aid',$aid,PDO::PARAM_STR);
		 $query->execute();
		 $results=$query->fetchAll(PDO::FETCH_OBJ);
//$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
	 <?php
	 $imagePath = !empty($row->Image) ? "images/profile/$row->Image" : 'images/faces/face8.jpg';
	 
	 ?>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">  
      <a href="./" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block" style="margin-left: 10px;font-stretch: ultra-expanded;font-size: 18px;font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'"><span style="color: red;font-size: 18px">Web</span><i style="color: deepskyblue;font-weight: 700;font-size: 16px">-</i>COOKBOOK &copy;2023</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn" style="margin-top: 7px;"></i>
    </div><!-- End Logo -->

    <div class="search-bar" style="margin-top: 20px;">
      <form class="search-form d-flex align-items-center" method="POST" action="./search-recipe.php">
        <input type="text" name="searchdata" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->
		  
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="<?php echo $imagePath;?>" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php  echo htmlentities($row->Username);?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile" style="border-radius: 1em;border-style: 2px dotted;border-color: red;">
            <li class="dropdown-header">
               <div class="dropdown-header text-center">
                  <img style="height: 120px;width: 120px;" class="img-md rounded-circle" src="<?php echo $imagePath;?>">
                  <p class="mb-1 mt-3"><?php  echo htmlentities($row->First_name);?><?php  echo '   '. htmlentities($row->Surname);?></p>
                  <p class="font-weight-light text-muted mb-0"><?php  echo htmlentities($row->Email);?></p>
                </div><?php }} ?>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="profile-view.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="change-password.php">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item sign-out-link" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get all elements with the "sign-out-link" class
    var signOutLinks = document.querySelectorAll('.sign-out-link');
    
    // Attach the event listener to each link
    signOutLinks.forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default link behavior
            
            Swal.fire({
                title: 'Confirm Sign Out',
                text: 'Are you sure you want to sign out?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Sign Out',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to the logout page
                    window.location.href = link.getAttribute('href');
                }
            });
        });
    });
});
</script>
  <script src="../../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../../assets/vendor/quill/quill.min.js"></script>
  <script src="../../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../../assets/vendor/php-email-form/validate.js"></script>
   <script src="assets/js/main.js"></script>