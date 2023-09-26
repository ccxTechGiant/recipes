<?php
error_reporting(1);
include('administration/includes/dbconnection.php'); 
?>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tasty Recipes</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/custom.css">
	<link href="administration/assets/img/favicon.png" rel="icon">
  <link href="administration/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
</head>

<body>
    <?php include_once("includes/header.php");?>
    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Professional Recipes</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /bradcam_area  -->
    <!-- recepie_area_start  -->
    <div class="recepie_area plus_padding">
        <div class="container">
            <div class="row">
				<?php
				$limit = 9; // Number of items to display per page
				$page = isset($_GET['page'])? intval($_GET['page']) : 1; // Ensure $page is an integer
				$offset = ($page - 1) * $limit;		
						$query ="SELECT recipes.ID,recipes.food_name,recipes.about,recipes.Duration,recipes.Nick,recipes.Image FROM recipes JOIN designers ON designers.Phone = recipes.Phone WHERE designers.Phone = recipes.Phone ORDER BY recipes.CreationDate DESC LIMIT :limit OFFSET :offset";
						$stmt = $dbh->prepare($query);
						$stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
						$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
						$stmt->execute(); 
				        $results = $stmt->fetchAll(PDO::FETCH_OBJ);
                        $rowCount = count($results);
                        // Calculate total pages based on accurate row count
                        $totalPages = ceil($rowCount / $limit);
						//$rowCount = $stmt->rowCount();
				
						if ($rowCount > 0) {
                            foreach ($results as $row) {
						?>
						<?php
							 $imagePath = !empty($row->Image) ? "administration/images/recipes/$row->Image" : 'img/recepie/recpie_2.png';
							$fileExtension = pathinfo($imagePath, PATHINFO_EXTENSION);
							?>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single_recepie text-center">
                               
								<?php if (strtolower($fileExtension) === 'pdf') : ?>
						            <div class="recepies_thumb">
									<!-- Display a PDF preview pane and a download button -->
									<embed src="<?php echo $imagePath; ?>" type="application/pdf" width="150px" height="150px">
									</div>
									<br>
									<a href="<?php echo $imagePath; ?>" download="<?php echo $row->food_name?>.pdf" style="font-weight: 600;text-transform: uppercase;font-size: 16px">Download PDF</a>
								<?php else : ?>
									<!-- Display the image -->
							    <div class="recepie_thumb">
									<img src="<?php echo $imagePath ?>">
								</div>
								<?php endif; ?>
                        <h3><?php echo htmlentities($row->food_name);?></h3>
                        <span><?php echo htmlentities($row->Nick);?></span>
                        <p><?php echo htmlentities($row->Duration);?></p><?php ?>
                        <a href="recipes_details.php?recipe=<?php echo base64_encode($row->ID);?>" class="line_btn">View Full Recipe</a>
						
                    </div>
                </div>
				<?php }	} 	?>
            </div>
		<style>
    /* Pagination Styles */
    .pagination {
        margin-top: 50px;
        text-align: center;
    }

    .pagination a {
        display: inline-block;
        padding: 8px 16px;
        text-decoration: none;
        color: #333;
        border: 1px solid #ddd;
        margin: 0 4px;
        border-radius: 4px;
    }

    .pagination a.active {
        background-color: #007bff;
        color: white;
        border: 1px solid #007bff;
    }

    .pagination a:hover {
        background-color: #f2f2f2;
    }

    .pagination a.disabled {
        pointer-events: none;
        cursor: default;
        color: #bbb;
        border: 1px solid #ddd;
    }
</style>

<div class="pagination">
    <?php
    if ($page > 1) {
        echo '<a style="background-color:blue;color:#FFF" href="?page=' . ($page - 1) . '">Previous</a>';
    }

    echo '<a style="background-color:red;color:#FFF;font-weight:600" href="?page=' . $page . '">' . $page . '</a>';

    // Calculate the starting index of the last page
    $lastPageStartIndex = ($totalPages - 1) * $limit;

    // Check if there are more results below the current limit
    $hasMoreResultsBelow = $rowCount > ($lastPageStartIndex + $offset);

    // If there are more results below, show the "Next" link; otherwise, disable it
    if ($hasMoreResultsBelow) {
        $nextPageNumber = $page + 1;
        echo '<a style="background-color:blue;color:#FFF"  href="?page=' . $nextPageNumber . '">Next</a>';
    }
	
	else {
        echo '<a class="disabled" style="background-color:gainsboro;color:#FFF">Next</a>';
    }
    ?>
	</div>
    </div>
		
    </div>
    <!-- /recepie_area_start  -->

    <!-- latest_trand     -->
    <div class="latest_trand_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="trand_info text-center">
                        <p>Thousands of recipes are waiting to be watched</p>
                        <h3>Discover latest trending recipes</h3>
                        <a href="Recipes.php" class="boxed-btn3">View all Recipes</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ latest_trand     -->

    <!-- download_app_area -->
    <div class="download_app_area plus_padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-md-6">
                    <div class="download_thumb">
                        <div class="big_img">
                            <img src="img/video/big_1.png" alt="">
                        </div>
                        <div class="small_01">
                            <img src="img/video/small_sm1.png" alt="">
                        </div>
                        <div class="small_02">
                            <img src="img/video/sm2.png" alt="">
                        </div>
                    </div>
                </div>
				<div class="col-xl-6 col-md-6">
                    <div class="download_text">
                         <h3>Follow us for guidelines on:</h3>
                        <div class="download_android_apple">
                            <a class="active" href="#">
                                <div class="download_link d-flex">
                                    <i class="fa fa-facebook"></i>
                                    <div class="store">
                                        <h5>Follow</h5>
                                        <p>	Facebook</p>
                                    </div>
                                </div>
                            </a>
                            <a href="#">
                                <div class="download_link d-flex">
                                    <i class="fa fa-youtube"></i>
                                    <div class="store">
                                        <h5>Follow</h5>
                                        <p>Youtube</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ download_app_area -->

    <!--    footer start-->
	<?php include_once("includes/footer.php");?>	
<!--	footer end-->

    <!-- JS here -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/ajax-form.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/scrollIt.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/nice-select.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/gijgo.min.js"></script>

    <!--contact js-->
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>

    <script src="js/main.js"></script>
</body>

</html>