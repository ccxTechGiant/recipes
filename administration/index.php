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
  <main id="main" class="main">
<?php
         $aid= $_SESSION['contact'];
		 $sql="SELECT * from designers where Phone=:aid";
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
	 $imagePath = !empty($row->Image) ? "../images/profile/$row->Image" : 'images/faces/face8.jpg';
	 
	 ?>
    <div class="pagetitle">
      <h1 style="font-weight: 700; font-size: 22px;text-transform: uppercase;font-family: Impact, Haettenschweiler, 'Franklin Gothic Bold', 'Arial Black', 'sans-serif';color: blue;letter-spacing: 1px;"><?php echo htmlentities($row->First_name)?>  Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="./">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li><?php }}?>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">
<style>
	.ps-3{
		text-align: center;
		margin-left: 15%;
		display: flex;
		flex-direction: row;
	}	
	.fa-eye{
		position: relative;
		margin-top: -10;
		margin-left: -4;
	}
			  </style>
            <!-- recipes Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>
				   <?php 
							$aid= $_SESSION['contact'];
	                        $aid1= $_SESSION['mail'];
							$sql1 ="SELECT * from recipes join designers on designers.phone=recipes.phone where designers.phone=recipes.phone && recipes.phone='$aid'";
							$query1 = $dbh -> prepare($sql1);
							$query1->execute();
							$results1=$query1->fetchAll(PDO::FETCH_OBJ);
							$totrecipes=$query1->rowCount();
							?>
                <div class="card-body">
                  <h5 class="card-title">Recipes <span>| Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-table"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo htmlentities($totrecipes);?></h6>
                      <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"><a href="manage-recipes.php"><i class="fa fa-eye"></i></a></span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End recipes Card -->

            <!-- categories Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>
<?php 
						  $sql2 ="SELECT * from category";
						  $query2 = $dbh -> prepare($sql2);
						  $query2->execute();
						  $results2=$query2->fetchAll(PDO::FETCH_OBJ);
						  $totcate=$query2->rowCount();
						  ?>
                <div class="card-body">
                  <h5 class="card-title">Categories <span>| This Month</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-graph-up-arrow"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo htmlentities($totcate);?></h6>
                      <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"><a href="categories.php"><i class="fa fa-eye"></i></a></span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End categories Card -->
			  <!-- Users Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>
<?php 
						  $sql3 ="SELECT * from designers";
						  $query3 = $dbh -> prepare($sql3);
						  $query3->execute();
						  $results3=$query3->fetchAll(PDO::FETCH_OBJ);
						  $totusers=$query3->rowCount();
						  ?>
                <div class="card-body">
                  <h5 class="card-title">Users <span>| This Month</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-check"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo htmlentities($totusers);?></h6>
                      <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"><a href="users.php"><i class="fa fa-eye"></i></a></span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End users Card -->

           

            <!-- Reports -->
            <div class="col-12">
              <div class="card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Reports <span>/Today</span></h5>

                  <!-- Line Chart -->
                  <div id="reportsChart"></div>

                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [{
                          name: 'Recipes',
                          data: [ <?php echo $totrecipes; ?>, 40, 28, 51, 42, 82,20]
                        }, {
                          name: 'Categories',
                          data: [11, 32, 52, 32, 14, 52,<?php $totcate?>,4]
                        }, {
                          name: 'Users',
                          data: [<?php echo $totusers; ?>, 11, 32, 18, 9, 16, 12]
                        }],
                        chart: {
                          height: 350,
                          type: 'area',
                          toolbar: {
                            show: false
                          },
                        },
                        markers: {
                          size: 4
                        },
                        colors: ['#4154f1', '#2eca6a', '#ff771d'],
                        fill: {
                          type: "gradient",
                          gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.3,
                            opacityTo: 0.4,
                            stops: [0, 90, 100]
                          }
                        },
                        dataLabels: {
                          enabled: false
                        },
                        stroke: {
                          curve: 'smooth',
                          width: 2
                        },
                        xaxis: {
                          type: 'datetime',
                          categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                        },
                        tooltip: {
                          x: {
                            format: 'dd/MM/yy HH:mm'
                          },
                        }
                      }).render();
                    });
                  </script>
                  <!-- End Line Chart -->

                </div>

              </div>
            </div><!-- End Reports -->
			<style>
			  /* Default styles for th and td */
			  #head,#head1,#data,#data1 {
				font-size: 16px; /* Default font size */
			  }

			  /* Media query for screens between 100px and 199px */
			  @media (max-width: 199px) {
				#head,#head1,#data,#data1 {
				  font-size: 14px; /* Font size for 100px to 199px screens */
				}
			  }

			  /* Media query for screens between 200px and 299px */
			  @media (min-width: 200px) and (max-width: 299px) {
				#head,#head1,#data,#data1 {
				  font-size: 12px; /* Font size for 200px to 299px screens */
				}
			  }

			  /* Media query for screens between 300px and 599px */
			  @media (min-width: 300px) and (max-width: 599px) {
				#head,#head1,#data,#data1 {
				  font-size: 10px; /* Font size for 300px to 599px screens */
				}
			  }

			  /* Media query for screens between 600px and 766px */
			  @media (min-width: 600px) and (max-width: 766px) {
				#head,#head1,#data,#data1 {
				  font-size: 8px; /* Font size for 600px to 766px screens */
				}
			  }
				 @media (min-width: 767px) and (max-width: 967px) {
				#head,#head1,#data,#data1 {
				  font-size: 12px; /* Font size for 600px to 766px screens */
				}
			  }
				 @media (min-width: 968px) and (max-width: 1366px) {
				#head,#head1,#data,#data1 {
				  font-size: 14px; /* Font size for 600px to 766px screens */
				}
			  }
			</style>
            <!-- Recent Accounts -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Recent Recipe <span>| Today</span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr id="head">
                        <th scope="col">Preview</th>
                        <th scope="col">Dish Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
					  <?php
				  $sql="SELECT recipes.ID,recipes.Image,food_name,about from  recipes join designers on designers.phone=recipes.phone join category on category.ID =recipes.categoryid where designers.phone=recipes.phone &&category.ID = recipes.categoryid  && recipes.phone='$aid' ORDER BY recipes.CreationDate DESC LIMIT 5";
							$query = $dbh -> prepare($sql);
							$query->execute();
							$results=$query->fetchAll(PDO::FETCH_OBJ);
							$cnt=1;
							if($query->rowCount() >0)
							{
								foreach($results as $row)
								{ 
									$imagePath = !empty($row->Image) ? "images/recipes/$row->Image" : 'images/favicon.png';
							?> 
                    <tbody>
                      <tr id="data">
                        <th scope="row"><a href="#"><img src="<?php echo($imagePath) ?>" style="height: 40px;width: 40px;"></a></th>
                        <td><?php  echo htmlentities($row->food_name);?></td>
                        <td><a href="#" class="text-primary"><?php  echo htmlentities($row->about);?></a></td>
                        <td><span class="badge bg-success"><?php  echo 'Active'?></span></td>
                      </tr><?php $cnt=$cnt+1;}} ?>
                    </tbody>
                  </table>  

                </div>

              </div>
            </div><!-- End Recent Sales -->
           </div>
            <!-- End Top Selling -->
        </div><!-- End Left side columns -->

      <!-- Right side columns -->
        <div class="col-lg-4">
          <!-- Budget Report -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body pb-0">
              <h5 class="card-title">Geospatial Report <span>| This Month</span></h5>

              <div id="budgetChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  var budgetChart = echarts.init(document.querySelector("#budgetChart")).setOption({
                    legend: {
                      data: ['Apparent Population', 'Actual Population']
                    },
                    radar: {
                      // shape: 'circle',
                      indicator: [{
                          name: 'Recipes',
                          max: <?php echo $totrecipes ?>
                        },
                        {
                          name: 'Categories',
                          max: <?php echo $totcate?>
                        },
                        {
                          name: 'Users',
                          max: <?php echo $totusers?>
                        },
                        {
							name: 'Recipes',
							max: <?php echo $totrecipes ?>
                        },
                        {
                         name: 'Users',
                          max: <?php echo $totusers?>
                        },
                        {
                          name: 'Categories',
                          max: <?php echo $totcate?>
                        }
                      ]
                    },
                    series: [{
                      name: 'Actual vs Apparent',
                      type: 'radar',
                      data: [{
                          value: [<?php echo $totrecipes ?>, <?php echo $totcate?>, <?php echo $totusers?>],
                          name: 'Apparent Statistics'
                        },
                        {
                         alue: [<?php echo $totrecipes ?>, <?php echo $totcate?>, <?php echo $totusers?>],
                          name: 'Actual Statistics'
                        }
                      ]
                    }]
                  });
                });
              </script>

            </div>
          </div><!-- End Budget Report -->

          <!-- Website Traffic -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body pb-0">
              <h5 class="card-title">Website Traffic <span>| Today</span></h5>

              <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#trafficChart")).setOption({
                    tooltip: {
                      trigger: 'item'
                    },
                    legend: {
                      top: '5%',
                      left: 'center'
                    },
                    series: [{
                      name: 'Access From',
                      type: 'pie',
                      radius: ['40%', '70%'],
                      avoidLabelOverlap: false,
                      label: {
                        show: false,
                        position: 'center'
                      },
                      emphasis: {
                        label: {
                          show: true,
                          fontSize: '18',
                          fontWeight: 'bold'
                        }
                      },
                      labelLine: {
                        show: false
                      },
                      data: [{
                          value: <?php echo intval($totusers)+1;?>,
                          name: 'Users'
                        },
                        {
                          value: <?php echo $totrecipes?>,
                          name: 'Recipes'
                        },
                        {
                          value: <?php echo $totcate?>,
                          name: 'Categories'
                        }
                      ]
                    }]
                  });
                });
              </script>

            </div>
          </div><!-- End Website Traffic -->

          <!-- News & Updates Traffic -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>
          </div><!-- End News & Updates -->

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
   <?php include_once('includes/footer.php');?>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
 <?php include_once('react.php');?>
<script src="main.js"></script>
</body>

</html><?php }  ?>