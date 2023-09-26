<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
  <aside id="sidebar" class="sidebar">
 <?php
					$aid= $_SESSION['contact'];
	                $aid1= $_SESSION['mail'];
					$sql="SELECT * from designers where phone=:aid";
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
    <ul class="sidebar-nav" id="sidebar-nav">
	<div class="profile-image" style="background-color: antiquewhite;padding: 5px">
					<img class="img-xs rounded-circle" src="<?php echo $imagePath; ?>" style="height: 50px;width: 50px; margin-left: 40%">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper" style="align-content: center;text-align: center;background-color: antiquewhite;padding-bottom:2px;">
                  <p class="profile-name" style="margin-bottom: -3"><?php  echo htmlentities($row->Username);?></p>
                  <p class="designation"><?php  echo htmlentities($row->Email);?></p>
                </div>

      <li class="nav-item" style="margin-top: 7px;margin-bottom: -15px">
        <a class="nav-link " href="./">
          <i class="bi bi-grid"></i>
          <span>DASHBOARD</span>
        </a>
      </li><!-- End Dashboard Nav -->
 <li class="nav-heading" style="margin-top:40px;">Management</li>
		   <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav1"   data-bs-toggle="collapse" href="#components-nav1" arial-bs-expanded="false" arial-bs-control="ui-basic">
          <i class="bi bi-menu-button-wide"></i><span>RECIPES</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav1" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="add-recipes.php">
              <i class="bi bi-plus-circle"></i><span>Add Recipe</span>
            </a>
          </li>
          <li>
            <a href="manage-recipes.php">
              <i class="bi bi-arrows-angle-expand"></i><span>Manage Recipes</span>
            </a>
          </li>
        </ul>
		</li>

		  <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav12" data-bs-toggle="collapse" href="#">
          <i class="bi bi-search"></i><span>Search</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav12" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="search-recipe.php">
              <i class="bi bi-arrows-angle-expand"></i><span>Recipe</span>
            </a>
          </li>
        </ul>
		</li>	
		  <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav13" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person-fill-lock"></i><span>Account</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav13" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="change-password.php">
              <i class="bi bi-arrows-angle-expand"></i><span>Settings</span>
            </a>
          </li>
          <li>
            <a href="profile.php">
              <i class="bi bi-arrows-angle-expand"></i><span>Update Profile</span>
            </a>
          </li>
		  <li>
            <a class="nav-link" href="#" id="exitLink">
              <i class="bi bi-arrows-angle-expand"></i><span>Sign Out</span>
            </a>
          </li>
			<script>
					// Add a click event listener to the "Sign out" link
					document.getElementById('exitLink').addEventListener('click', function(e) {
						e.preventDefault(); // Prevent the default link behavior

						// Display a confirmation dialog using SweetAlert
						Swal.fire({
							title: 'Confirm Sign Out',
							text: 'Are you sure you want to sign out?',
							icon: 'warning',
							showCancelButton: true,
							confirmButtonText: 'Yes, sign out',
							cancelButtonText: 'Cancel'
						}).then((result) => {
							if (result.isConfirmed) {
								// If the user confirms, you can perform the sign-out actions here
								window.location.href = 'logout.php'; // Redirect to the logout page
							}
						});
					});
				</script>
        </ul>
		</li>
<!-- End Components Nav -->

      <li class="nav-heading" style="margin-top:30px;">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="profile-view.php">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->
		<!-- End Contact Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->
<!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/js/main.js"></script><?php $cnt=$cnt+1;}} ?>