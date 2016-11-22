
<?php

session_start() ;

if( $_SESSION['userstatus'] != 'true' )
{
		header('Location: index.php');
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
					<meta http-equiv="refresh" content="10">

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
					<img src="assets/img/iot2.png" alt="Logo" height="39" width="280">
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

				
					<form action="update.php" method="post" >

					<!--=== Parallax Counter ===-->
					<div class="parallax-counter-v2 parallaxBg1">
						<div class="container">
							<ul class="row list-row">
								<li class="col-md-3 col-sm-6 col-xs-12 md-margin-bottom-30">
									<div class="counters rounded">
										<span><?php echo $row['mo_sensor'] ; ?></span>
										<h4>Soil Moisture <br />Sensor</h4>
										<p>Current Pump State: <?php echo $row['mo_value'] ; ?></p>
											<select name="motor">
												<option value="0" <?php if($row['mo_value']==0) { echo 'selected' ;} ?>>Off</option>
												<option value="1" <?php if($row['mo_value']==1) { echo 'selected' ;} ?>>On</option>
											</select><br />	<br />	
									</div>
								</li>
								<li class="col-md-3 col-sm-6 col-xs-12 md-margin-bottom-30">
									<div class="counters rounded">
										<span><?php echo $row['te_sensor'] ; ?></span>
										<h4>Temperature <br />Sensor</h4>
										<p>Current Fan State: <?php echo $row['te_value'] ; ?></p>
											<select name="fan">
												<option value="0" <?php if($row['te_value']==0) { echo 'selected' ;} ?>>Off</option>
												<option value="1" <?php if($row['te_value']==1) { echo 'selected' ;} ?>>On</option>
											</select><br />	<br />	
									</div>

								</li>
								<li class="col-md-3 col-sm-6 col-xs-12 sm-margin-bottom-30">
									<div class="counters rounded">
										<span><?php echo $row['ul_sensor'] ; ?> cm<br /></span>
										<br /><h4>Ultrasonic <br /> Sensor</h4><br /><br />
									</div>
								</li>
								<li class="col-md-3 col-sm-6 col-xs-12">
									<div class="counters rounded">
										<br /><h4>Light <br />State :</h4><br />
										<p>Current Light State:<?php echo $row['light_value'] ; ?></p>
											<select name="light">
												<option value="0" <?php if($row['light_value']==0) { echo 'selected' ;} ?>>Off</option>
												<option value="1" <?php if($row['light_value']==1) { echo 'selected' ;} ?>>On</option>
											</select><br />	<br />	<br />
									</div>
								</li>
							</ul>

							<button type="submit" style="margin-left:auto;margin-right:auto;display:block;margin-top:2%;margin-bottom:0%" class="btn-u">Submit</button>
						</div>

					</div>
					<!--=== End Parallax Counter ===-->
					

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
