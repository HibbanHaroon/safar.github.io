<?php
	// Connecting Configuration file of data base connection to the index
//session_start();
require('con.php');
session_start();
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


$db = mysqli_connect('localhost','root','','careem');

if($_SESSION['userType'] == "R")
{
	$sql = "SELECT * FROM pastHistory INNER JOIN rider ON rider.rider_id = pastHistory.rider_id AND rider.phoneNumber = '$phone' INNER JOIN driver ON driver.driver_id = pastHistory.driver_id";
}
else if ($_SESSION['userType'] == "D") {
	$sql = "SELECT * FROM pastHistory INNER JOIN driver ON driver.driver_id = pastHistory.driver_id AND driver.phoneNumber = '$phone' INNER JOIN rider ON rider.rider_id = pastHistory.rider_id";
}
//$sql = "SELECT * FROM pastHistory";
$result = mysqli_query($db, $sql);
echo '<div class="pastHistory">';
	echo ' <h1 onclick="">Past History</h1>';

while ($row = mysqli_fetch_array($result)){
	$pickUp = $row['pickUp'];
	$dropOff = $row['dropOff'];
	$date = $row['date'];
	$fare = $row['fare'];
	$rider_id = $row['rider_id'];
	$driver_id = $row['driver_id'];
	$name = $row['name'];
	$profilePicture = $row['profilePicture'];
	$rating = $row['rating'];
	echo '<div class="card">';
		echo "<img src='images/".$profilePicture."' alt='Avatar' style='width: 15%; float:right; margin:50px;' >";
		echo '<div class="locationInfo style="float: left;">';
			echo '<i class="fa-solid fa-location-dot" style="font-size:20px;color:#ff4500;;margin-top: 20px;margin-left:30px;width: 8%"></i>';
			echo '<label for="pickUp">'; echo $pickUp; echo '</label><br>';
			echo '<i class="fa-solid fa-arrow-down-long" style="font-size:20px;color:#000000;;margin-top: 10px;margin-left:30px;width: 8%"></i><br>';
			echo '<i class="fa-solid fa-location-dot" style="font-size:20px;color:#00c07f;margin-bottom: 10px;margin-top: 10px;margin-left:30px;width: 8%"></i>';
			echo '<label for="dropOff">'; echo $dropOff; echo '</label><br>';
		echo '</div>';
		echo '<div class="container" style="text-align:center; width: 40%; position: absolute; top:115px; right: 0px;>';
		    echo '<label for="name" ">'; echo $name; echo '</label><br>';
		    echo '<i class="fas fa-star" style="font-size:20px;color:#f7ba00;margin-top: 2px;"></i>';
		    echo '<label for="rating">'; echo $rating; '</label><br>';
		echo '</div>';
		echo '<div class="container-inline" style="margin-bottom:10px; margin-top:80px">';
			echo '<i class="fa-solid fa-calendar-day" style="font-size:20px;color:#060488;margin-left:30px;width: 8%""></i>';
		    echo '<label for="date">'; echo $date; echo '</label>';
		    echo '<i class="fa-solid fa-money-bill-wave" style="font-size:20px;color:#168118;;margin-left:70px; width: 8%"></i>';
		    echo '<label for="fare" style="font-szie:40px; ">'; echo $fare; echo '</label><br>';
		echo '</div>';
	echo '</div>';
}
echo '</div>';
?>
<html>
<head>
	<meta charset="utf-8">
	<!-- Use to enable the view port for reponsive website -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Your website title should have to be written in title tag child of head tag -->
	<title>Past History</title>
	<!-- use to link the stylesheet to your index file path should have to be written in href -->
	<link rel="stylesheet" type="text/css" href="stylePastHistory.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap">
	<!-- CDN of Jquery (Content Delivery Network of Jquery a link to online liberary) -->
	<script src="https://kit.fontawesome.com/8563a1c9e8.js" crossorigin="anonymous"></script>
	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
</head>
<body>
	<p id="demo" ></p>
</body>
</html>