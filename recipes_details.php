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
    <!-- header-start -->
    <?php include_once("includes/header.php");?>
    <!-- header-end -->

    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Recipe Details</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /bradcam_area  -->

    <div class="recepie_details_area">
        <div class="container">			
            <div class="row align-items-center">
                <div class="col-xl-6 col-md-6">
				
						<?php
					            $recipe = base64_decode($_GET['recipe']);
								$stmt = $dbh->prepare("SELECT  First_name,Surname,recipes.ID,recipes.food_name,recipes.about,recipes.Duration,recipes.Nick,recipes.Image,Category,step1,step2,step3,step4,step5,step6,step7,step8,step9,step10,step11,step12,step13,step14,step15,step16,step17,step18,step19,step20,recipes.Phone FROM recipes JOIN designers ON designers.Phone = recipes.Phone JOIN Category ON Category.ID=recipes.categoryid  WHERE designers.Phone = recipes.Phone && Category.ID=recipes.categoryid && recipes.ID = :recipe");
								$stmt->bindParam(':recipe', $recipe);
								$stmt->execute();
								$rowCount = $stmt->rowCount();
								if ($rowCount == 1) {
								while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
								$description = strip_tags(htmlspecialchars_decode($row->about));
								$words = preg_split('/\s+/', $description, -1, PREG_SPLIT_NO_EMPTY);
								$trimmedWords = array_slice($words, 0, 100);
								$trimmedDescription = implode(' ', $trimmedWords);
								$remainingWords = count($words) - count($trimmedWords);
								$trimmedDescription .= ($remainingWords > 0) ? "..." : "";
								 ?>
							 <?php
						$imagePath = !empty($row->Image) ? "administration/images/recipes/$row->Image" : 'img/recepie/recpie_2.png';
						$fileExtension = pathinfo($imagePath, PATHINFO_EXTENSION);
						?>				
					<?php if (strtolower($fileExtension) === 'pdf') : ?>
					<div class="recepies_thumb">
						<!-- Display a PDF preview pane and a download button -->
						<embed src="<?php echo $imagePath; ?>" type="application/pdf" width="100%" height="300px">
						<br>
						<a href="<?php echo $imagePath; ?>" download="<?php echo $row->food_name?>.pdf" style="font-weight: 600;text-transform: uppercase;font-size: 16px">Download PDF</a>
						<?php $hideShowStepsButton = true; 
						// Set a flag to hide the "Show Steps" button ?>
					</div>
					<?php else : ?>
					<div class="recepies_thumb">
                        <!-- Display the image -->
						<img src="<?php echo $imagePath; ?>" style="height:100%;width: 100%;">
						<?php $hideShowStepsButton = false; // Set a flag to show the "Show Steps" button ?>
                    </div>	
					<?php endif; ?>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="recepies_info">
                        <h3 style="text-decoration: underline;text-decoration-color: red"><?php echo htmlentities($row->food_name) ?> <i class="fa fa-check-circle"></i> </h3>
                        <p style="color: #00000;font-size: 14px;"><?php echo htmlentities($row->about) ?></p>

                        <div class="resepies_details">
                            <ul>
                                <li><p><strong>Rating</strong> : <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> </p></li>
                                <li><p style="color:#000;font-weight: 600"><strong>Time</strong> : <?php echo htmlentities($row->Duration) ?> </p></li>
                                <li><p style="color:#000;font-weight: 600"><strong>Category</strong> : <?php echo htmlentities($row->Category) ?> </p></li>
                                <li><p style="color:#000;font-weight: 600"><strong>Tags</strong> :  <?php echo htmlentities($row->Nick) ?> </p></li>
								<li><p style="color:#000;font-weight: 600"><strong>Posted By</strong> :  <?php echo htmlentities($row->First_name .' '. $row->Surname) ?> </p></li>
                            </ul>
                        </div>
                        <div class="links">
                            <a href="#"> <i class="fa fa-facebook"></i> </a>
                            <a href="#"> <i class="fa fa-twitter"></i> </a>
                            <a href="#"> <i class="fa fa-linkedin"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
			<style>
				.fa-check-circle{
					color: limegreen;
				}
			</style>
			<div class="row">
				<div class="col-xl-12">
					<h1 style="text-decoration: underline;text-align: center">Steps</h1>
					<div class="recepies_text" style="text-align: center">
						<ul class="step-list">
							<?php
							// Loop through your database results
							for ($i = 1; $i <= 20; $i++) {
								$step = $row->{'step' . $i}; // Assuming you have step1, step2, ..., step20 in your database
								if (!empty($step)) {
							?>
							<li class="hidden-step"><i class="fa fa-check-circle"></i> <?php echo htmlentities($step); ?></li>
							<?php
								}
							}
							?>
						</ul>

						<?php if (isset($hideShowStepsButton) && !$hideShowStepsButton) : ?>
						<div id="buttons"><button id="show-more-button">Show Steps</button></div>
						<?php endif; ?>
						<button id="print-button"><a href="print/reportsGenerator/recipe-preview.php?view=<?php echo base64_encode($row->ID)?>" target="_blank" style="color:#FFFFFF;outline: none;text-decoration: none;">Print</a></button></div>
						
							<script>
						document.addEventListener("DOMContentLoaded", function () {
							const stepList = document.querySelector(".step-list");
							const hiddenSteps = stepList.querySelectorAll(".hidden-step");
							const showMoreButton = document.getElementById("show-more-button");
                            const printButton = document.getElementById("print-button");
							let visibleItemCount = 1; // Initially show 1 item

							showMoreButton.addEventListener("click", function () {
								if (visibleItemCount <= hiddenSteps.length) {
									hiddenSteps[visibleItemCount - 1].style.display = "list-item";
									visibleItemCount++; // Increment the number of visible items
								}

								// Hide the "Show More" button when all items are visible
								if (visibleItemCount > hiddenSteps.length) {
									showMoreButton.style.display = "none";
									printButton.style.display = "block";
								}
							});
						});
						</script>
			
                    </div>
                </div>
            </div><?php }} ?>
        </div>
    </div>
    <!-- recepie_area_start  -->
    <div class="recepie_area inc_padding" style="margin-bottom: 40px">
        <div class="container">
			<h1 style="text-align: center;text-decoration: underline;">Related Recipes</h1>
            <div class="row">
				<?php
				          $recipe = base64_decode($_GET['recipe']);
$stmt1 = $dbh->prepare("SELECT r1.food_name FROM recipes AS r1 JOIN category AS r2 ON r1.categoryid = r2.ID WHERE r1.ID = :recipe");
$stmt1->bindParam(':recipe', $recipe);
$stmt1->execute();
$rowCount1 = $stmt1->rowCount();
if ($rowCount1 > 0) {
    while ($row1 = $stmt1->fetch(PDO::FETCH_OBJ)) {
        $relate = $row1->food_name;

        $limit = 3; // Number of items to display per page
        $stmt = $dbh->prepare("SELECT r.ID, r.food_name, r.about, r.Duration, r.Nick, r.Image FROM recipes AS r WHERE r.food_name LIKE :relate && r.ID !='$recipe' ORDER BY r.CreationDate DESC LIMIT :limit");
        $stmt->bindValue(':relate', '%' . $relate . '%', PDO::PARAM_STR);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT); // Bind limit as an integer
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
									<!-- Display a PDF preview and a download button -->
									<embed src="<?php echo $imagePath; ?>" type="application/pdf" width="150px" height="250px">
									</div>
									<br>
									<a href="<?php echo $imagePath; ?>" download="<?php echo $row->food_name?>.pdf" style="font-weight: 600;text-transform: uppercase;font-size: 16px">Download PDF</a>
								<?php else : ?>
									<!-- Display the image -->
							    <div class="recepie_thumb">
									<img src="<?php echo $imagePath ?>" style="height:100%;width:100%">
								</div>
								<?php endif; ?>
								<h3><?php echo htmlentities($row->food_name);?> <i class="fa fa-check-circle"></i> </h3>
								<span><?php echo htmlentities($row->Nick);?></span>
								<p><?php echo htmlentities($row->Duration);?></p><?php ?>
								<a href="recipes_details.php?recipe=<?php echo base64_encode($row->ID);?>" class="line_btn">View Full Recipe</a>

							</div>
						</div>
				
				<?php
								}}
	else echo('No related recipes..!');
	}}
								?>
					</div>
				</div>
			</div>
    <!-- /recepie_area_start  -->

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