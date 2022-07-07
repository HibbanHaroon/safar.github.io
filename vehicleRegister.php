<?php
	// Connecting Configuration file of data base connection to the index

session_start();
require('con.php');
if(!isset($_SESSION['phoneNumber']))
{
	if($_SESSION['userType'] == "R")
	{
		header("location: loginRider.php");
	}
	elseif ($_SESSION['userType'] == "D") {
		header("location: loginDriver.php");
	}
}
$phone=$_SESSION['phoneNumber'];
$vehicleType = " ";
if(isset($_POST['carS'])){
	$vehicleType = "car";
	$carType = "carS";
}
if(isset($_POST['carL'])){
	$vehicleType = "car";
	$carType = "carL";
}
if(isset($_POST['carXL'])){
	$vehicleType = "car";
	$carType = "carXL";
}
if(isset($_POST['bike'])){
	$vehicleType = "bike";
}
	if($vehicleType == "car" || $vehicleType == "bike")
	{
		$db = mysqli_connect('localhost','root','','careem');
		$sql = "SELECT driver_id from driver where phoneNumber = '$phone'";
		$run = mysqli_query($db, $sql);
		while ($row = mysqli_fetch_array($run)){
			$driver_id = $row['driver_id'];
		}
		$modelNumber = $_POST['modelNumber'];
		$numberPlate = $_POST['numberPlate'];
		$sql = "INSERT INTO vehicle(`vehicle_id`, `modelNumber`, `numberPlate`, `vehicleType`, `driver_id`) VALUES (NULL,'$modelNumber','$numberPlate','$vehicleType','$driver_id')";
		$run = mysqli_query($db, $sql);
		if($run)
		{
			if($vehicleType == "car")
			{
				$sql = "SELECT vehicle_id from vehicle where driver_id = '$driver_id'";
				$run = mysqli_query($db, $sql);
				while ($row = mysqli_fetch_array($run)){
					$vehicle_id = $row['vehicle_id'];
				}
				$sql = "INSERT INTO car(`car_id`, `carType`, `vehicle_id`) VALUES (NULL, '$carType','$vehicle_id')";
				$run = mysqli_query($db, $sql);
			}
			
			if($run)
			{
				header("location: booking.php");
			}
		}
		else
		{
			header("location: signupDriver.php?success=".urldecode("Error"));
		}
	}
/*
if (isset($_POST['signupbutton'])) {

				// $u_name will store the value of username and send it to DB
				//$file = addslashes(file_get_contents($_FILES['profilePicture']['tmp_name']));
				//

				$name = mysqli_real_escape_string($con, $_POST['name']);
				// $u_name will store the value of username and send it to DB
				$phoneNumber = mysqli_real_escape_string($con, $_POST['phoneNumber']);
				// $u_name will store the value of username and send it to DB
				$email = mysqli_real_escape_string($con, $_POST['email']);
				// $u_name will store the value of username and send it to DB
				$DOB = mysqli_real_escape_string($con, $_POST['DOB']);
				// $u_pass will store the value of userpass and send it to DB
				$password = mysqli_real_escape_string($con, $_POST['password']);
				// $u_pass will store the value of userpass and send it to DB
				$confirmPassword = mysqli_real_escape_string($con, $_POST['confirmPassword']);
				if($password == $confirmPassword)
				{
					$query = "SELECT `id`, `phoneNumber` FROM `login`";
						// $run will check the query and the connection of DB
					$result = $con->query($query);
					$user_found = false;
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							if($phoneNumber == $row["phoneNumber"])
							{
								$user_found = true;
							}
						}
					}
					if($user_found == false)
					{
							// This query will send the data stored in the upper variables to Database
						//console.log("error in query");
						$query1 = "INSERT INTO signup(`id`, `name`, `phoneNumber`, `email`, `DOB`, `password`, `confirmPassword`, `profilePicture`) VALUES (NULL, '$name', '$phoneNumber', '$email', '$DOB', '$password', '$confirmPassword', 'blank_picture.png')";
								// $run will check the query and the connection of DB
						$run = mysqli_query($con, $query1);
								// This condition will check and validate all variables and query 
						if ($run) {

								//header("location: signup.php?success=".urldecode("signup successful"));
							$sql = "SELECT * FROM signup WHERE phoneNumber = '$phoneNumber'";
							$result = mysqli_query($con, $sql);
							while ($row = mysqli_fetch_array($result)){
								$driver_id = $row['id'];
								$profilePicture = $row['profilePicture'];
								$rating = 0;
								$salary = 0;
							}

							$query2 = "INSERT INTO login(`id`, `phoneNumber`, `password`) VALUES ($driver_id,'$phoneNumber','$password')";
								// $run will check the query and the connection of DB
							$run1 = mysqli_query($con, $query2);
								// This condition will check and validate all variables and query 
							if ($run1) {
								$query3 = "INSERT INTO driver(`driver_id`, `name`, `phoneNumber`, `email`, `DOB`,`salary`, `rating`, `profilePicture`) VALUES ('$driver_id', '$name', '$phoneNumber', '$email', '$DOB' , '$salary', '$rating', '$profilePicture')";
								// $run will check the query and the connection of DB
								$run2 = mysqli_query($con, $query3);
								// This condition will check and validate all variables and query 
								if ($run2) {
									$_SESSION['phoneNumber']=$_POST['phoneNumber'];
									$_SESSION['userType']= "D";
									//redirect it to ask vehicle details
									header("location: booking.php");
								}
							}
						}
						else{
								header("location: signupDriver.php?success=".urldecode("Error"));
						}
					}
				}
				else 
				{
						//header("location: signup.php?success=".urldecode("Error: Password Not Match"));
				}
			}
*/
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!-- Use to enable the view port for reponsive website -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Your website title should have to be written in title tag child of head tag -->
	<title>Register Your Car</title>
	<!-- use to link the stylesheet to your index file path should have to be written in href -->
	<link rel="stylesheet" type="text/css" href="styleVehicleRegister.css">
	<!-- CDN of Jquery (Content Delivery Network of Jquery a link to online liberary) -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</head>
<body>
	<div class="vehicleRegister">
		<h2>Register Your Car</h2>
		<p id = "demo"></p>
		<!-- form tag use to get data from the user -->
		<form action="vehicleRegister.php" method="post" enctype="multipart/form-data">
			<!-- child element of a form to get the data from user types can be text, password, email, date etc -->
			<!--<label for="profilePicture">Profile Picture</label>
  			<input type="file" id="profilePicture" name="profilePicture" accept="image/*">-->
			<label for="modelNumber">Model Number</label><br>
			<input type="text" name="modelNumber" id="modelNumber" placeholder="Enter the Model Number" required> <br>
			<label for="numberPlate">Number Plate</label><br>
			<input type="tel" name="numberPlate" id="numberPlate" pattern="[A-Z]{3}[0-9]{4}" placeholder="Format: ABCXXXX" required> <br>
			<div class="dropdown">
			  <button class="dropbtn">Vehicle Type</button>
			  <div class="dropdown-content">
			  	<input type="submit" id="carS" name="carS" value="carS">
 				<input type="submit" id="CarL" name="carL" value="carL">
 				<input type="submit" id="carXL" name="carXL" value="carXL">
 				<input type="submit" id="bike" name="bike" value="bike">
			  </div>
			</div>
			<button type="submit" id="registerbutton" name="registerbutton" onclick="show(); >Register</button>
			
			</form>
		</div>
	</body>
	</html>