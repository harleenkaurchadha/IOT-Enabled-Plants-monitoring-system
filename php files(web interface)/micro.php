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


//connection to the database
$con = mysqli_connect("localhost","iotdb_user","iotdb_pass123word","iot_db");

// Check db connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


//get sensor values coming from esp module and set their value in a php variable 

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



// here, the email logic starts


if( isset($te) && isset($mo) && isset($ul) )
{

	$query = "SELECT * FROM iot_db_table LIMIT 1" ;
	
	$result = mysqli_query($con,$query) ;

	$row = mysqli_fetch_assoc($result) ;


// first -->> we get the values of email parameters from db

	$te_mail = $row['te_mail'] ;
	$ul_mail = $row['ul_mail'] ;
	$mo_mail = $row['mo_mail'] ;


//second --->>  email logic for temperature sensor

//this code will run in the scenario where the value coming from the sensor is in alert level..
//$te_mail -->> this variable is used to make sure that the email is sent only once during one
//alert cycle..

	if( $te>33 && $te_mail == 0 )
	{
		$to      = 'yourmail@gmail.com';
		$subject = 'Alert - High Temperature';
		$message = 'Please switch on the fan to reduce the temperature.';
		

		mail($to, $subject, $message);
		$te_mail = 1 ;
		$query = 	"UPDATE iot_db_table
					SET 
					te_mail=$te_mail
					WHERE id=1 " ; 	
		mysqli_query($con,$query) ;
	}

	if($te<33 && $te_mail != 0)
	{
		$te_mail = 0 ;
		$query = 		"UPDATE iot_db_table
						SET 
						te_mail=$te_mail
						WHERE id=1 " ; 
						
		mysqli_query($con,$query) ;
	}


//  email logic for moisture sensor

	if($mo<40 && $mo_mail == 0)
	{
		$to      = 'yourmail@gmail.com';
		$subject = 'Alert - Low Moisture';
		$message = 'Please switch on the sprinkler to increase moisture content.';
		
		mail($to, $subject, $message);
		$mo_mail = 1 ;
		$query = "UPDATE iot_db_table
				SET 
				mo_mail=$mo_mail
				WHERE id=1 " ; 
						
		mysqli_query($con,$query) ;
	}


	if($mo>40 && $mo_mail != 0)
	{
		$mo_mail = 0 ;
		$query = "UPDATE iot_db_table
				SET 
				mo_mail=$mo_mail
				WHERE id=1 " ; 
						
		mysqli_query($con,$query) ;
	}


//  email logic for ultrasonic sensor


	if($ul>9.9 && $ul_mail == 0)
	{
		$to      = 'yourmail@gmail.com';
		$subject = 'Alert - Low Water Level';
		$message = 'Please refill the water container.';
		
		mail($to, $subject, $message);
		$ul_mail = 1 ;
		$query = "UPDATE iot_db_table
				SET 
				ul_mail=$ul_mail
				WHERE id=1 " ; 
						
		mysqli_query($con,$query) ;
	}

	if($ul<9.9 && $ul_mail != 0)
	{
		$ul_mail = 0 ;
		$query = "UPDATE iot_db_table
				SET 
				ul_mail=$ul_mail
				WHERE id=1 " ; 
						
		mysqli_query($con,$query) ;
	}

//email logic ends here


//here, we are updating the sensor values coming from esp into our database

		$query = 		" UPDATE iot_db_table
						SET 
						te_sensor=$te, 
						mo_sensor=$mo,
						ul_sensor=$ul
						WHERE id=1 " ; 
						
		mysqli_query($con,$query) ;

}


//here, we are connecting to the db to pull out the values from the db of the 'device on/off state' 
//which has been set by the user in the frontend.. these are then given as output in  '_f0#_p0#_l0#'
//form which is then picked up by esp module and forwarded to the arduino


$query = "SELECT * FROM iot_db_table LIMIT 1" ; 
				
$result = mysqli_query($con,$query) ;

$row = mysqli_fetch_assoc($result) ;

$fan = $row['te_value'] ;
$motor =  $row['mo_value'] ;
$light = $row['light_value'] ;

echo '_f'.$fan.'#_p'.$motor.'#_l'.$light.'#'  ;


?>



</body>
</html>
