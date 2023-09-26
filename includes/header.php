 <?php
session_start();
error_reporting(0);
include('../administration/includes/dbconnection.php'); 
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
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/themify-icons.css">
    <link rel="stylesheet" href="../css/nice-select.css">
    <link rel="stylesheet" href="../css/flaticon.css">
    <link rel="stylesheet" href="../css/gijgo.css">
    <link rel="stylesheet" href="../css/animate.min.css">
    <link rel="stylesheet" href="../css/slick.css">
    <link rel="stylesheet" href="../css/slicknav.css">
    <link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/custom.css">
	<link href="../administration/assets/img/favicon.png" rel="icon">
  <link href="../administration/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

<header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area ">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-2">
                            <div class="logo">
                                <a href="./">
                                    <img src="img/logo.png" style="height: 100px;width: 150px;border-radius: 50%;position: fixed;" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
							<style>
								#navigation li a{
									color: #ffffff;
									
								}
								#navigation li a:hover{
									color: yellow;
									font-size: 16px;
									font-weight: 700;
									
								}
								#navigation li .submenu li:hover{
								background-color: #fff;
								width: 100%;
								margin:0;
								}
							</style>
                            <div class="main-menu   d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="./">home</a></li>
                                        <li><a href="./about.php">about</a></li>
                                        <li><a href="./Recipes.php">Recipes</a></li>
                                        <li><a href="#">Account <i class="ti-angle-down"></i></a>
                                            <ul class="submenu" style="background-color: #E0FCE1;">
                                                <li><a href="./administration/pages-login.php" style="color: black">Login</a></li>
                                                <li><a href="./account/" style="color: black">Sign up</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="./contact.php">Contact</a></li>
                                    </ul>
                                </nav>
								<br>
                            </div>
                        </div>
                        <div class="col-12">
							
                        <div class="col-12">
							
							<style>
.search-section {
/*    background-color: #f9f9f9;*/
    padding: 20px 0;
    text-align: center;
	margin-top: -30px;
}

.search-section .container {
    max-width: 800px;
    margin: 0 auto;
}

.search-section input[type="text"] {
    width: 70%;
	outline: none;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

.search-section button[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}
@media (max-width: 100px) {
    .search-section .container .row {
        display: flex;
        justify-content: center;
        align-items: center; /* Vertically center items */
        flex-wrap: wrap;
		/* Allow items to wrap on smaller screens */
    }
	
	.error-message {
    top: -40px;
    left: -30%;
    opacity: 1;
/*	transform: translateX(-50%);*/
  }

  .arrow {
    position: absolute;
    width: 0;
    height: 0;
    top: 100%;
	bottom: -8px; 
    left: 10px;
 transform: translateX(-50%) rotate(180deg); /* Rotate the arrow */
	
  }

    .search-section input[type="text"] {
        width: calc(70% - 10px); /* Adjust the width to leave space for margin */
        margin-right: 10px; /* Add some spacing between input and button */
    }
    
    .search-section button[type="submit"] {
        margin: 0;
        padding: 10px;
        width: 30%;
        box-sizing: border-box;
    }
}
@media (max-width: 576px) {
.search-section {
	margin-top: 0px;
	}
		.error-message {
    top: -40px;
    left: -30%;
    opacity: 1;
/*	transform: translateX(-50%);*/
  }

  .arrow {
    position: absolute;
    width: 0;
    height: 0;
    top: 100%;
	bottom: -8px; 
    left: 10px;
 transform: translateX(-50%) rotate(180deg); /* Rotate the arrow */
	
  }
	}
@media (max-width: 767px) {
.search-section {
	margin-top: 0px;
	}
	.error-message {
    top: -40px;
    left: -80;
    opacity: 1;
/*	transform: translateX(-50%);*/
  }

  .arrow {
    position: absolute;
    width: 0;
    height: 0;
    top: 100%;
	bottom: -8px; 
    left: 10px;
 transform: translateX(-50%) rotate(180deg); /* Rotate the arrow */
	
  }
	}
	.error-message {
    color: white;
    background-color: green;
    padding: 5px;
	margin-bottom: 3px;
    border-radius: 8px 0px 8px 0px;
    display: none;
    position: absolute;
    top: -40px;
    left: 80;
    opacity: 1;
/*	transform: translateX(-50%);*/
  }

  .arrow {
    position: absolute;
    width: 0;
    height: 0;
    border-left: 8px solid transparent;
    border-right: 8px solid transparent;
    border-bottom: 8px solid green;
    top: 100%;
	bottom: -8px; 
    left: 10px;
 transform: translateX(-50%) rotate(180deg); /* Rotate the arrow */
	
  }
</style>
<script>
function validateSearchForm() {
  var searchInput = document.getElementById("search").value;
  var errorMessage = document.getElementById("search-error");
  
  if (searchInput.trim() === "") {
    errorMessage.style.display = "block";
    
    setTimeout(function() {
      errorMessage.style.display = "none"; 
    }, 3000); 
    
    return false;
  }
  
  return true;
}
</script>
			<section class="search-section">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<form id="search-form" method="GET" action="recipes-search.php" onsubmit="return validateSearchForm()">
							  <input type="text" name="search" id="search" placeholder="Search for recipe...">
							  <button type="submit">Search</button>
							</form>
							<div id="search-error" class="error-message">
							  <div class="arrow"></div>
							  Please enter dish name..
							</div>
						</div>
					</div>
				</div>
			</section>
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->