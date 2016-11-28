<?php 


$con = mysqli_connect("localhost","iotdb_user","iotdb_pass123word","iot_db");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

if(isset($_POST['fan']))
{
	$fan = $_POST['fan'] ;
}

if(isset($_POST['motor']))
{
	$motor = $_POST['motor'] ;
}

if(isset($_POST['light']))
{
	$light = $_POST['light'] ;
}

if( isset($fan) && isset($motor) && isset($light) )
{
 
	// Perform queries 
		//mysqli_query($con,"SELECT * FROM Persons");

		//$query = "INSERT INTO iot_db_table (id,te_sensor,mo_sensor,ul_sensor)
		//VALUES ('1','.$te.','.$mo.','.$ul.')" ;

		$query = 		" UPDATE iot_db_table
						SET 
						te_value=$fan, 
						mo_value=$motor,
						light_value=$light
						WHERE id=1 " ; 
						
		mysqli_query($con,$query) ;

}



header('Location: iot.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title>Updation File</title>
</head>
<body>



<a href="iot.php"> Your values have been changed. Go Back ! </a>

</body>
</html>