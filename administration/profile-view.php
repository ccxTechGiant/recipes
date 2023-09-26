<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="assets/img/favicon.png" rel="icon">
<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['contact']==0)) {
  header('location:logout.php');
  } else{
	$aid= $_SESSION['contact'];
  ?>
 <?php include_once('includes/header.php');?>
 <?php include_once('includes/sidebar.php');?>
<?php
         $aid= $_SESSION['contact'];
		 $sql="SELECT * from designers where  designers.Phone=:aid";
		 $query = $dbh -> prepare($sql);
		 $query->bindParam(':aid',$aid,PDO::PARAM_STR);
		 $query->execute();
		 $results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
	 <?php
	 $imagePath = !empty($row->Image) ? "images/profile/$row->Image" : 'images/faces/face8.jpg';
	 
	 ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Admin</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="<?php echo $imagePath;?>" alt="Profile" class="rounded-circle">
              <h2><?php  echo $row->First_name;?></h2>
              <h3><?php  echo $row->Surname;?></h3>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Full Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target=""><a href="change-password.php">Change Password</a></button>
                </li>
              </ul>
				
              <div class="tab-content pt-2">
                <div class="tab-pane fade show active profile-overview" id="profile-overview">
 
                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8"><?php  echo $row->First_name;?><?php  echo '  '. $row->Surname;?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Brand</div>
                    <div class="col-lg-9 col-md-8"><?php  echo $row->Brand;?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Title</div>
                    <div class="col-lg-9 col-md-8">Recipe Designer</div>
                  </div>
                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                  <!-- Profile Edit Form -->
                  <form action="" method="post">
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="<?php echo $imagePath ?>">
                        <div class="pt-2">
                          <a href="change-profile-images.php?Upload=<?php echo $row->Phone;?>" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                          <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="fullName" type="text" class="form-control" id="fullName" value="<?php echo htmlentities($row->First_name.' '.$row->Surname)?>" disabled>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Brand</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="company" type="text" class="form-control" id="company" value="<?php echo htmlentities($row->Brand)?>" disabled>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label">Title</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="job" type="text" class="form-control" id="Job" value="Recipe Designer" disabled>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="country" type="text" class="form-control" id="Country" value="<?php echo htmlentities($row->Country)?>" disabled>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" type="text" class="form-control" id="Phone" value="<?php echo htmlentities($row->Phone)?>" disabled>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Email" value="<?php echo htmlentities($row->Email)?>" disabled>
                      </div>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div><?php }}  ?>

                <div class="tab-pane fade pt-3" id="profile-settings">
                 
                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
<!-- ======= Footer ======= -->
   <?php include_once('includes/footer.php');?>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
 <?php include_once('react.php');?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html><?php }  ?>