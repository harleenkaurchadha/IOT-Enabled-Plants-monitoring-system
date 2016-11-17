<!DOCTYPE html>
<html>
<head>
	<title>Micro's File</title>
</head>
<body>


<?php 


//set the range as follows -- 
// moisture 230.wet-1023.dry (0-100)  70%-itna wet   email<40
// ultrasonic 11.empty-2.full  email>10.5
//temp 20-45     email>34                       



/*

?te=1&mo=1&ul=0

mo=250-1023
temp-2
ul-2

db columns - id,te_sensor,te_value,mo_sensor,mo_value,ul_sensor,ul_value,light_value
iot_db
iot_db_table
iotdb_user
iotdb_pass123word


range validation will be done in finalized version

*/


$con = mysqli_connect("localhost","iotdb_user","iotdb_pass123word","iot_db");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

if(isset($_GET['te']))
{
	$te = $_GET['te'] ;
}

if(isset($_GET['mo']))
{
	$mo = $_GET['mo'] ;
}

if(isset($_GET['ul']))
{
	$ul = $_GET['ul'] ;
}
//mail logic starts
if( isset($te) && isset($mo) && isset($ul) )
{

	$query = "SELECT * FROM iot_db_table LIMIT 1" ;
	
	$result = mysqli_query($con,$query) ;

	$row = mysqli_fetch_assoc($result) ;

	$te_mail = $row['te_mail'] ;
	$ul_mail = $row['ul_mail'] ;
	$mo_mail = $row['mo_mail'] ;
 
	if($te>33 && $te_mail == 0 )
	{
		$to      = 'anmolkaurchadha@gmail.com,newsletter.updates@yahoo.com,gagansuriandroid@gmail.com';
		$subject = 'Alert - High Temperature';
		$message = 'Please switch on the fan to reduce the temperature.';
		//$headers = 'From: webmaster@example.com' . "\r\n" .
		//    'Reply-To: webmaster@example.com' . "\r\n" .
		//    'X-Mailer: PHP/' . phpversion();

		mail($to, $subject, $message);
		$te_mail = 1 ;

		$query = 		" UPDATE iot_db_table
						SET 
						te_mail=$te_mail
						WHERE id=1 " ; 
						
		mysqli_query($con,$query) ;
	}

	if($te<33)
	{
		$te_mail = 0 ;
		$query = 		" UPDATE iot_db_table
						SET 
						te_mail=$te_mail
						WHERE id=1 " ; 
						
		mysqli_query($con,$query) ;
	}

	if($mo<40 && $mo_mail == 0)
	{
		$to      = 'anmolkaurchadha@gmail.com,newsletter.updates@yahoo.com,gagansuriandroid@gmail.com';
		$subject = 'Alert - Low Moisture';
		$message = 'Please switch on the sprinkler to increase moisture content.';
		//$headers = 'From: webmaster@example.com' . "\r\n" .
		//    'Reply-To: webmaster@example.com' . "\r\n" .
		//    'X-Mailer: PHP/' . phpversion();

		mail($to, $subject, $message);
		$mo_mail = 1 ;
	}


	if($mo>40)
	{
		$mo_mail = 0 ;
	}

	if($ul>9.9 && $ul_mail == 0)
	{
		$to      = 'anmolkaurchadha@gmail.com,newsletter.updates@yahoo.com,gagansuriandroid@gmail.com';
		$subject = 'Alert - Low Water Level';
		$message = 'Please refill the water container.';
		//$headers = 'From: webmaster@example.com' . "\r\n" .
		//    'Reply-To: webmaster@example.com' . "\r\n" .
		//    'X-Mailer: PHP/' . phpversion();

		mail($to, $subject, $message);
		$ul_mail = 1 ;
	}

	if($ul<9.9)
	{
		$ul_mail = 0 ;
	}
  //email logic ends
	// Perform queries 
		//mysqli_query($con,"SELECT * FROM Persons");

		//$query = "INSERT INTO iot_db_table (id,te_sensor,mo_sensor,ul_sensor)
		//VALUES ('1','.$te.','.$mo.','.$ul.')" ;

		$query = 		" UPDATE iot_db_table
						SET 
						te_sensor=$te, 
						mo_sensor=$mo,
						ul_sensor=$ul
						WHERE id=1 " ; 
						
		mysqli_query($con,$query) ;

}


		$query = 		" SELECT * FROM iot_db_table LIMIT 1" ; 
						
		$result = mysqli_query($con,$query) ;

		$row = mysqli_fetch_assoc($result) ;

//te mo light
$fan = $row['te_value'] ;
$motor =  $row['mo_value'] ;
$light = $row['light_value'] ;

echo '_f'.$fan.'#_p'.$motor.'#_l'.$light.'#'  ;


?>



</body>
</html>