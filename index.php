<?php
error_reporting(0);
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
    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="single_slider  d-flex align-items-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-8 ">
                        <div class="slider_text text-center">
                            <div class="text">
                                <h3>
                                    Professional Recipes. 
                                </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <!-- slider_area_end -->
    <!-- recepie_area_start  -->
    <div class="recepie_area">
        <div class="container">
            <div class="row">
				<?php
						$limit = 3; // Number of items to display per page
						$stmt = $dbh->prepare("SELECT recipes.ID,recipes.food_name,recipes.about,recipes.Duration,recipes.Nick,recipes.Image FROM recipes JOIN designers ON designers.Phone = recipes.Phone WHERE designers.Phone = recipes.Phone ORDER BY recipes.CreationDate DESC LIMIT :limit");
						$stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
						$stmt->execute();  
						$rowCount = $stmt->rowCount();
						if ($rowCount > 0) {
							while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
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
                </div><?php
						}}
						?>
            </div>
        </div>
    </div>
    <!-- /recepie_area_start  -->

    <!-- recepie_videos   -->
    <div class="recepie_videoes_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="recepie_info">
                        <h3>Recipe videos 
                            that catch all Tasty Meals..</h3>
                    <p>This system make it incredibly convenient to find, organize, and follow recipes. Users can access a vast library of recipes with just a few clicks or taps, saving time and effort in meal planning.</p>
                    <div class="video_watch d-flex align-items-center">
                        <a class="popup-video" href="https://www.youtube.com/watch?v=TanA43G4YB0"> <i class="ti-control-play"></i> </a>
                        <div class="watch_text" >
                            <h4>Watch Video</h4>
                            <p>You will love our execution</p>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="videos_thumb">
                        <div class="big_img">
                            <img src="img/video/big.png" alt="">
                        </div>
                        <div class="small_thumb">
                            <img src="img/video/small_1.png" alt="">
                        </div>
                        <div class="small_thumb_2">
                            <img src="img/video/2.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ recepie_videos   -->
    <!-- dish_area start  -->
    <div class="dish_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="dish_wrap d-flex">
                       
						<div class="single_dish text-center">
                            <div class="thumb">
                                <img src="img/recepie/recpie_4.png" alt="">
                            </div>
                            <h3>Dessert recipes</h3>
                            <p>Fruits or Dried nuts to Multi-ingredients cakes and pies are captured on this platform. Get daily updates on new discovered recipes from across the world shared on this platform and standardize .</p>
                        </div>
						
						
                        <div class="single_dish text-center">
                            <div class="thumb">
                                <img src="img/recepie/recpie_5.png" alt="">
                            </div>
                            <h3>Main-dish recipes</h3>
                            <p>Combined dishes recipes including Subzis, curries or Dal served with Roti,parathas are featured on this CookBook.</p>
                        </div>
						
						
                        <div class="single_dish text-center">
                            <div class="thumb">
                                <img src="stir-fry.jpg" alt="" style="height: 180px;width: 180px;border-radius: 50%">
                            </div>
                            <h3>Appetizer recipes</h3>
                            <p>Our platform has a variety of foods that stimulates appetite like shrimp with cocktail sauce,vegetables and dips,cheeses and fruits among others.</p>
                        </div>
						
						
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ dish_area start  -->

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

    <!-- customer_feedback_area  -->
    <div class="customer_feedback_area">
        <div class="container">
            <div class="row justify-content-center mb-50">
                <div class="col-xl-9">
                    <div class="section_title text-center">
                        <h3>Feedback From Customers</h3>
                       <p>Take a look on testimonies shared by our esteemed customers...!</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="customer_active owl-carousel">
						<?php
							$limit = 4; // Number of categories to display
							$stmt = $dbh->prepare("SELECT DISTINCT(TRIM(Phone)) AS Phone, First_name, Surname FROM Designers ORDER BY CreationDate DESC LIMIT :limit");
							$stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
							$stmt->execute();

							// Define an array of content based on the row count
							$contents = array(
								"`I can't express how much I love my food recipe app! It has truly transformed the way I approach cooking and meal planning. Before, I used to struggle with figuring out what to cook each day, and I often resorted to the same old recipes. But now, everything is so much easier.`",
								"` I`ve always loved cooking, but I used to stick to my tried-and-true recipes. With my food recipe app, I've become an adventurous home chef. I've tackled complex dishes I never thought I could make, and the detailed instructions and video tutorials make it so accessible. Plus, the app's meal planning feature has brought more structure to my cooking, and I now look forward to planning my weekly meals. It's a game-changer for anyone who wants to up their cooking game and elevate their culinary skills.`",
								"`I`m a busy professional with little time to spare for meal planning and cooking. Thanks to my food recipe app, I've rediscovered the joy of cooking. It's like having a personal chef in my pocket! The convenience of finding recipes, creating shopping lists, and getting step-by-step instructions has made my life so much easier. I'm eating healthier, saving time, and actually enjoying the process of preparing meals.`",
								"`As a vegetarian with dietary restrictions, finding exciting and delicious recipes used to be a challenge. But ever since I started using my food recipe system, my culinary world has expanded. I can easily filter recipes to suit my preferences and discover new vegetarian and vegan dishes from various cuisines. It's not just about eating; it's about exploring a world of flavors and enjoying every bite.`"
							);

							$index = 0; // Initialize an index variable

							while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
								$imagePath = !empty($row->Image) ? "administration/images/profile/$row->Image" : 'administration/images/headOfficer.jpg';
								?>

								<div class="single_customer d-flex">
									<div class="thumb">
										<img src="<?php echo $imagePath ?>" alt="" style="width: 50px;height: 50px;border-radius: 50%">
									</div>
									<div class="customer_meta">
										<h3><?php echo htmlentities($row->First_name . ' ' . $row->Surname); ?></h3>
										<span>W-CB Designer</span>
										<?php
										// Get the content for the current index
										$content = isset($contents[$index]) ? $contents[$index] : '';

										echo "<p>$content</p>";

										// Increment the index
										$index++;
										?>
									</div>
								</div>
								<?php
									}
									?>						
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / customer_feedback_area  -->

    <!-- download_app_area -->
    <div class="download_app_area">
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