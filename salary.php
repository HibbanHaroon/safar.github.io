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

$sql = "SELECT * FROM salary INNER JOIN driver ON driver.driver_id = salary.driver_id AND driver.phoneNumber = '$phone'";
$result = mysqli_query($db, $sql);

if($result)
{
	$basicPay = 0;
	$weeklyBonus = 0;
	$salary = 0;
}
else {
	while ($row = mysqli_fetch_array($result)){
	$basicPay = $row['basicPay'];
	$weeklyBonus = $row['weeklyBonus'];
	$salary = $row[3];
}
}


?>
<html>
<head>
	<meta charset="utf-8">
	<!-- Use to enable the view port for reponsive website -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Your website title should have to be written in title tag child of head tag -->
	<title>Salary</title>
	<!-- use to link the stylesheet to your index file path should have to be written in href -->
	<link rel="stylesheet" type="text/css" href="styleSalary.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap">
	<!-- CDN of Jquery (Content Delivery Network of Jquery a link to online liberary) -->
	<script src="https://kit.fontawesome.com/8563a1c9e8.js" crossorigin="anonymous"></script>
	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
</head>
<body>
		<p id="demo" ></p>
		<div class="salary">
		<h1 onclick="">Salary Breakdown</h1>
			<table class="styled-table">
			    <thead>
			        <tr>
			            <th></th>
			            <th>Income</th>
			        </tr>
			    </thead>
			    <tbody>
			        <tr>
			            <td>Basic Pay</td>
			            <td><?php echo $basicPay; ?></td>
			        </tr>
			        <tr>
			            <td>Weekly Bonuses</td>
			            <td><?php echo $weeklyBonus; ?></td>
			        </tr>
			        <tr class="active-row">
			            <td>Salary</td>
			            <td><?php echo $salary; ?></td>
			        </tr>
			    </tbody>
			</table>
		</div>
</body>
</html>