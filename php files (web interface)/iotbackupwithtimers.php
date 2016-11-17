
<?php

session_start() ;

if( $_SESSION['userstatus'] != 'true' )
{
		header('Location: login.php');
}

else
{



				$con = mysqli_connect("localhost","iotdb_user","iotdb_pass123word","iot_db");

				// Check connection
				if (mysqli_connect_errno())
				  {
				  echo "Failed to connect to MySQL: " . mysqli_connect_error();
				  }

						$query = 		" SELECT * FROM iot_db_table LIMIT 1" ; 
										
						$result = mysqli_query($con,$query) ;

						$row = mysqli_fetch_assoc($result) ;
						//print_r($row) ;



				//$query = "select * from orders where username='".$username."'" ;
				//$result = performQuery($query) ;
				/*
				$numOfRows = mysqli_num_rows($result) ;

				for($i=0;$i<$numOfRows;$i++)
				{
								$rows = mysqli_fetch_assoc($result) ;
								$orderid = $rows['orderid'] ;
								$date = $rows['date'] ;        
								$amount = $rows['amount'] ;
								$status = $rows['order_status'] ;
								$shipPincode = $rows['ship_pincode'] ;
								$shipContact = $rows['ship_contact'] ;
				*/




				?>

				<!DOCTYPE html>
				<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
				<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
				<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
				<head>
					<title>Automated & IOT Enabled Plant Monitoring</title>

					<!-- Meta -->
					<meta charset="utf-8">
					<meta name="viewport" content="width=device-width, initial-scale=1.0">
					<meta name="description" content="">
					<meta name="author" content="">

					<!-- CSS Global Compulsory -->
					<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
					<link rel="stylesheet" href="assets/css/style.css">

					<!-- CSS Header and Footer -->
					<link rel="stylesheet" href="assets/css/headers/header-default.css">
					<link rel="stylesheet" href="assets/css/footers/footer-v1.css">

					<!-- CSS Implementing Plugins -->
					<link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css">

				</head>

				<body>
					<div class="wrapper">
						<!--=== Header ===-->
						<div class="header">
							<div class="container">
								<!-- Logo -->
								<a class="logo" href="iot.php">
									<img src="assets/img/logo1-default.png" alt="Logo">
								</a>
								<!-- End Logo -->

							</div><!--/end container-->

							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse mega-menu navbar-responsive-collapse">
								<div class="container">
									<ul class="nav navbar-nav">

										<!-- Logout -->
										<li class="">
											<a href="logout.php">
												LOGOUT
											</a>
										</li>
										<!-- End Logout -->

									</ul>
								</div><!--/end container-->
							</div><!--/navbar-collapse-->
						</div>
						<!--=== End Header ===-->

								<div class="container content">
							<div class="row">
							<!-- Begin Content -->
								<div class="col-md-12">
										<!-- Heading v1 -->
										<div class="heading">
											<h2>Automated & IOT Enabled Plant Monitoring</h2>
										</div>
										<!-- End Heading v1 -->
										</div></div></div>


					<!--=== Parallax Counter ===-->
					<div class="parallax-counter-v2 parallaxBg1">
						<div class="container">
							<ul class="row list-row">
								<li class="col-md-3 col-sm-6 col-xs-12 md-margin-bottom-30">
									<div class="counters rounded">
										<span><?php echo $row['mo_sensor'] ; ?></span>
										<h4>Soil Moisture <br />Sensor</h4>
									</div>
								</li>
								<li class="col-md-3 col-sm-6 col-xs-12 md-margin-bottom-30">
									<div class="counters rounded">
										<span><?php echo $row['te_sensor'] ; ?></span>
										<h4>Temperature <br />Sensor</h4>
									</div>
								</li>
								<li class="col-md-3 col-sm-6 col-xs-12 sm-margin-bottom-30">
									<div class="counters rounded">
										<span><?php echo $row['ul_sensor'] ; ?></span>
										<h4>Ultrasonic <br /> Sensor</h4>
									</div>
								</li>
								<li class="col-md-3 col-sm-6 col-xs-12">
									<div class="counters rounded">
										<span>--</span>
										<h4>Photo<br />Resistor</h4>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<!--=== End Parallax Counter ===-->



					<!--=== Container Part ===-->
										<form action="#" class="sky-form">
					<div class="bg-grey">
						<div class="container content-md">
							<ul class="row list-row margin-bottom-30">

								<li class="col-md-3 md-margin-bottom-30">
									<div class="content-boxes-v3 block-grid-v1 rounded">
										<i class="icon-custom icon-sm rounded-x icon-bg-red fa fa-line-chart"></i>
										<div class="content-boxes-in-v3">
											<h3><a href="#">Soil Moisture Sensor</a></h3>
											<ul class="star-vote">
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star-half-o"></i></li>
												<li><i class="fa fa-star-o"></i></li>
												<li><i class="fa fa-star-o"></i></li>
											</ul>
											<ul class="list-inline margin-bottom-5">
												<li class="text-highlights"> Value : <?php echo $row['mo_sensor'] ; ?> </li>

											</ul>
											<p>Run Sprinkler :</p>
											<ul class="list-inline block-grid-v1-add-info">
												<li><a href="#"><i class="fa fa-retweet"></i> 5 sec</a></li>
												<li><a href="#"><i class="fa fa-retweet"></i> 10 sec</a></li>
												<li><a href="#"><i class="fa fa-retweet"></i> 15 sec</a></li>
												<li><a href="#"><i class="fa fa-retweet"></i> 20 sec</a></li>
											</ul>

										</div>

							<fieldset>
								<section>
								<label class="label">Select</label>
								<label class="select">
									<select>
										<option value="0">Off</option>
										<option value="1">On</option>
									</select>
									<i></i>
								</label>
								</section>
							</fieldset>

									</div>
								</li>



								<li class="col-md-3 md-margin-bottom-30">
									<div class="content-boxes-v3 block-grid-v1 rounded">
										<i class="icon-custom icon-sm rounded-x icon-bg-red fa fa-line-chart"></i>
										<div class="content-boxes-in-v3">
											<h3><a href="#">Temperature Sensor</a></h3>
											<ul class="star-vote">
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star-half-o"></i></li>
												<li><i class="fa fa-star-o"></i></li>
												<li><i class="fa fa-star-o"></i></li>
											</ul>
											<ul class="list-inline margin-bottom-5">
												<li class="text-highlights"> Value : <?php echo $row['te_sensor'] ; ?> </li>

											</ul>
											<p>Run Fan :</p>
											<ul class="list-inline block-grid-v1-add-info">
												<li><a href="#"><i class="fa fa-retweet"></i> 5 sec</a></li>
												<li><a href="#"><i class="fa fa-retweet"></i> 10 sec</a></li>
												<li><a href="#"><i class="fa fa-retweet"></i> 15 sec</a></li>
												<li><a href="#"><i class="fa fa-retweet"></i> 20 sec</a></li>
											</ul>
										</div>
							<fieldset>
								<section>
								<label class="label">Select</label>
								<label class="select">
									<select>
										<option value="0">Off</option>
										<option value="1">On</option>
									</select>
									<i></i>
								</label>
								</section>
							</fieldset>

									</div>
								</li>

								<li class="col-md-3 md-margin-bottom-30">
									<div class="content-boxes-v3 block-grid-v1 rounded">
										<i class="icon-custom icon-sm rounded-x icon-bg-red fa fa-line-chart"></i>
										<div class="content-boxes-in-v3">
											<h3><a href="#">Ultrasonic Sensor</a></h3>
											<ul class="star-vote">
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star-half-o"></i></li>
												<li><i class="fa fa-star-o"></i></li>
												<li><i class="fa fa-star-o"></i></li>
											</ul>
											<ul class="list-inline margin-bottom-5">
												<li class="text-highlights"> Value : <?php echo $row['ul_sensor'] ; ?> </li>

											</ul>
											<p>Water level : 78%</p>
											<ul class="list-inline block-grid-v1-add-info">
												<li><a href="#"><i class="fa fa-retweet"></i> 5 sec</a></li>
												<li><a href="#"><i class="fa fa-retweet"></i> 10 sec</a></li>
												<li><a href="#"><i class="fa fa-retweet"></i> 15 sec</a></li>
												<li><a href="#"><i class="fa fa-retweet"></i> 20 sec</a></li>
											</ul>
										</div>
									</div>
								</li>

								<li class="col-md-3 md-margin-bottom-30">
									<div class="content-boxes-v3 block-grid-v1 rounded">
										<i class="icon-custom icon-sm rounded-x icon-bg-red fa fa-line-chart"></i>
										<div class="content-boxes-in-v3">
											<h3><a href="#">Photoresistor</a></h3>
											<br />
											<ul class="star-vote">
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star-half-o"></i></li>
												<li><i class="fa fa-star-o"></i></li>
												<li><i class="fa fa-star-o"></i></li>
											</ul>
											<ul class="list-inline margin-bottom-5">
												<li class="text-highlights"> Value : -- </li>
											</ul>
											<p>Run Light :</p>
											<ul class="list-inline block-grid-v1-add-info">
												<li><a href="#"><i class="fa fa-retweet"></i> 5 sec</a></li>
												<li><a href="#"><i class="fa fa-retweet"></i> 10 sec</a></li>
												<li><a href="#"><i class="fa fa-retweet"></i> 15 sec</a></li>
												<li><a href="#"><i class="fa fa-retweet"></i> 20 sec</a></li>
											</ul>
										</div>
									</div>
								</li>

							</ul>

						</div>
					</div>
					</form>

						<!--=== Footer Version 1 ===-->
						<div class="footer-v1">
							<div class="copyright">
								<div class="container">
									<div class="row">
										<div class="col-md-12">
											<p>
												2016 &copy; All Rights Reserved.
											</p>
										</div>

									</div>
								</div>
							</div><!--/copyright-->
						</div>
						<!--=== End Footer Version 1 ===-->
					</div><!--/End Wrapepr-->


			</body>
			</html>

<?php

}  // else block ends here




?>