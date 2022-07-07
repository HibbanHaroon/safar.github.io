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

if(isset($_POST['toProfile']))
{
	header("location: profile.php");
}

?>
<html>
<head>
	<meta charset="utf-8">
	<!-- Use to enable the view port for reponsive website -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Your website title should have to be written in title tag child of head tag -->
	<title>Safar</title>
	<!-- use to link the stylesheet to your index file path should have to be written in href -->
	<link rel="stylesheet" type="text/css" href="styleBooking.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap">
	<!-- CDN of Jquery (Content Delivery Network of Jquery a link to online liberary) -->
	<script src="https://kit.fontawesome.com/8563a1c9e8.js" crossorigin="anonymous"></script>
	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
</head>

<body>
<?php 
	require 'header.html';

?>
		<img src="download.jpg" style="width: 100%; object-fit: cover;">
		<p12> Wanna go somewhere. Book a Ride. </p12>

</body>
</html>
<?php 
	require 'footer.php';

?>