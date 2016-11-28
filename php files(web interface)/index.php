<?php

session_start() ; 

if ( isset($_SESSION['userstatus']) &&  $_SESSION['userstatus'] == 'true' )
{
	header('Location: iot.php');
}

if( isset($_POST['username']) && isset($_POST['password']))

{
				$username = $_POST['username'] ;
				$password = $_POST['password'] ;
				//echo $username.'....'.$password ;

				$con = mysqli_connect("localhost","iotdb_user","iotdb_pass123word","iot_db");

				// Check connection
				if (mysqli_connect_errno())
				  {
				  echo "Failed to connect to MySQL: " . mysqli_connect_error();
				  }

						$query = "SELECT * FROM users WHERE username='$username' AND password='$password' " ; 
										
						$result = mysqli_query($con,$query) ;

						$numOfRows = mysqli_num_rows($result) ;

						if ($numOfRows > 0)
						{
							$_SESSION['userstatus'] = 'true' ;
							header('Location: iot.php');
							//exit ;
						}

						else

						{ ?>



<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<title>Login</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">

	<!-- Web Fonts -->
	<link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>

	<!-- CSS Global Compulsory -->
	<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">

	<!-- CSS Header and Footer -->
	<link rel="stylesheet" href="assets/css/headers/header-default.css">
	<link rel="stylesheet" href="assets/css/footers/footer-v1.css">

	<!-- CSS Implementing Plugins -->
	<link rel="stylesheet" href="assets/plugins/animate.css">
	<link rel="stylesheet" href="assets/plugins/line-icons/line-icons.css">
	<link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/plugins/owl-carousel/owl-carousel/owl.carousel.css">
	<link rel="stylesheet" href="assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css">
	<link rel="stylesheet" href="assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css">
	<!--[if lt IE 9]><link rel="stylesheet" href="assets/plugins/sky-forms-pro/skyforms/css/sky-forms-ie8.css"><![endif]-->

	<!-- CSS Page Style -->
	<link rel="stylesheet" href="assets/css/pages/page_search.css">

	<!-- CSS Theme -->
	<link rel="stylesheet" href="assets/css/theme-colors/default.css" id="style_color">
	<link rel="stylesheet" href="assets/css/theme-skins/dark.css">

	<!-- CSS Customization -->
	<link rel="stylesheet" href="assets/css/custom.css">
</head>

<body>
	<div class="wrapper">




		<!--=== Content Part ===-->
		<div class="container content">
			<div class="row">

										<div class="col-md-12">
						<!-- Heading v1 -->
						<div class="heading">
							<h2>Automated & IOT Enabled Plant Monitoring</h2>
							<hr>
						</div>
						<!-- End Heading v1 -->
						</div>
	


				<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
					<form action="index.php" method="post" class="reg-page">
						<div class="reg-header">
							<h2>Login to your account</h2>
							<h6>please check username/password combination</h6>
						</div>
							<?php //echo $_POST['username'] ; ?> 
						<div class="input-group margin-bottom-20">
							<span class="input-group-addon"><i class="fa fa-user"></i></span>
							<input name="username" type="text" placeholder="Username" class="form-control">
						</div>
						<div class="input-group margin-bottom-20">
							<span class="input-group-addon"><i class="fa fa-lock"></i></span>
							<input name="password" type="password" placeholder="Password" class="form-control">
						</div>

						<div class="row">
							<div class="col-md-12">
								<button class="btn-u pull-right" type="submit">Login</button>
							</div>
						</div>

						<hr>

					</form>
				</div>
			</div><!--/row-->
		</div><!--/container-->
		<!--=== End Content Part ===-->

	</div><!--/wrapper-->


</body>
</html>

<?php 

}
}//if ends here

?>





<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<title>Login</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">

	<!-- Web Fonts -->
	<link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>

	<!-- CSS Global Compulsory -->
	<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">

	<!-- CSS Header and Footer -->
	<link rel="stylesheet" href="assets/css/headers/header-default.css">
	<link rel="stylesheet" href="assets/css/footers/footer-v1.css">

	<!-- CSS Implementing Plugins -->
	<link rel="stylesheet" href="assets/plugins/animate.css">
	<link rel="stylesheet" href="assets/plugins/line-icons/line-icons.css">
	<link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/plugins/owl-carousel/owl-carousel/owl.carousel.css">
	<link rel="stylesheet" href="assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css">
	<link rel="stylesheet" href="assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css">
	<!--[if lt IE 9]><link rel="stylesheet" href="assets/plugins/sky-forms-pro/skyforms/css/sky-forms-ie8.css"><![endif]-->

	<!-- CSS Page Style -->
	<link rel="stylesheet" href="assets/css/pages/page_search.css">

	<!-- CSS Theme -->
	<link rel="stylesheet" href="assets/css/theme-colors/default.css" id="style_color">
	<link rel="stylesheet" href="assets/css/theme-skins/dark.css">

	<!-- CSS Customization -->
	<link rel="stylesheet" href="assets/css/custom.css">
</head>

<body>
	<div class="wrapper">




		<!--=== Content Part ===-->
		<div class="container content">
			<div class="row">

										<div class="col-md-12">
						<!-- Heading v1 -->
						<div class="heading">
							<h2>Automated & IOT Enabled Plant Monitoring</h2>
							<hr>
						</div>
						<!-- End Heading v1 -->
						</div>
	


				<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
					<form action="index.php" method="post" class="reg-page">
						<div class="reg-header">
							<h2>Login to your account</h2>
						</div>
							<?php //echo $_POST['username'] ; ?> 
						<div class="input-group margin-bottom-20">
							<span class="input-group-addon"><i class="fa fa-user"></i></span>
							<input name="username" type="text" placeholder="Username" class="form-control">
						</div>
						<div class="input-group margin-bottom-20">
							<span class="input-group-addon"><i class="fa fa-lock"></i></span>
							<input name="password" type="password" placeholder="Password" class="form-control">
						</div>

						<div class="row">
							<div class="col-md-12">
								<button class="btn-u pull-right" type="submit">Login</button>
							</div>
						</div>

						<hr>

					</form>
				</div>
			</div><!--/row-->
		</div><!--/container-->
		<!--=== End Content Part ===-->

	</div><!--/wrapper-->


</body>
</html>

