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

$sql = "SELECT * FROM tripfare INNER JOIN fare ON tripfare.tripfare_id = fare.fare_id";
$result = mysqli_query($db, $sql);

while ($row = mysqli_fetch_array($result)){
	$surcharges = $row['surcharges'];
	$duration = $row['duration'];
	$distance = $row['distance'];
	$peak = $row['peak'];
	$vehicleRate = $row['vehicleRate'];
	$tripfare = $row['tripfare'];

	$initialWaiting = $row['initialWaiting'];
	$subtotal = $row['subtotal'];
	$promo = $row['promo'];
	$fare = $row['fare'];
}

?>
<html>
<head>
	<meta charset="utf-8">
	<!-- Use to enable the view port for reponsive website -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Your website title should have to be written in title tag child of head tag -->
	<title>Fare</title>
	<!-- use to link the stylesheet to your index file path should have to be written in href -->
	<link rel="stylesheet" type="text/css" href="styleFare.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap">
	<!-- CDN of Jquery (Content Delivery Network of Jquery a link to online liberary) -->
	<script src="https://kit.fontawesome.com/8563a1c9e8.js" crossorigin="anonymous"></script>
	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
</head>
<body>
		<p id="demo" ></p>
		<div class="fare">
		<h1 onclick="">Fare Breakdown</h1>
			<table class="styled-table">
			    <thead>
			        <tr>
			            <th></th>
			            <th>Price</th>
			        </tr>
			    </thead>
			    <tbody>
			        <tr>
			            <td>Surcharges</td>
			            <td><?php echo $surcharges; ?></td>
			        </tr>
			        <tr>
			            <td>Duration</td>
			            <td><?php echo $duration; ?></td>
			        </tr>
			        <tr>
			            <td>Distance</td>
			            <td><?php echo $distance; ?></td>
			        </tr>
			        <tr>
			            <td>Peak</td>
			            <td><?php echo $peak; ?></td>
			        </tr>
			        <tr>
			            <td>Vehicle Rate</td>
			            <td><?php echo $vehicleRate; ?></td>
			        </tr>
			        <tr class="active-row">
			            <td>Trip Fare</td>
			            <td><?php echo $tripfare; ?></td>
			        </tr>
			        <tr>
			            <td>Initial Waiting</td>
			            <td><?php echo $initialWaiting; ?></td>
			        </tr>
			        <tr class="active-row">
			            <td>Sub-Total</td>
			            <td><?php echo $subtotal; ?></td>
			        </tr>
			        <tr>
			            <td>Promo</td>
			            <td><?php echo $promo; ?></td>
			        </tr>
			        <tr class="active-row">
			            <td>Fare</td>
			            <td><?php echo $fare; ?></td>
			        </tr>
			    </tbody>
			</table>
		</div>
</body>
</html>