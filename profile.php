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
else{
	
$phone=$_SESSION['phoneNumber'];

$db = mysqli_connect('localhost','root','','careem');
if($_SESSION['userType'] == "R")
{
	$sql = "SELECT * FROM rider WHERE phoneNumber = '$phone'";
}
else if ($_SESSION['userType'] == "D") {
	$sql = "SELECT * FROM driver WHERE phoneNumber = '$phone'";
}
$result = mysqli_query($db, $sql);

while ($row = mysqli_fetch_array($result)){
	$name = $row['name'];
	$email = $row['email'];
	$DOB = $row['DOB'];
	$profilePicture = $row['profilePicture'];
	$rating = $row['rating'];
}
if(isset($_POST['edit']))
{
	header("location: editProfile.php");
}
if(isset($_POST['salary']))
{
	header("location: salary.php");
}
}
?>
<html>
<head>
	<meta charset="utf-8">
	<!-- Use to enable the view port for reponsive website -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Your website title should have to be written in title tag child of head tag -->
	<title>Profile</title>
	<!-- use to link the stylesheet to your index file path should have to be written in href -->
	<link rel="stylesheet" type="text/css" href="styleprofile.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap">
	<!-- CDN of Jquery (Content Delivery Network of Jquery a link to online liberary) -->
	<script src="https://kit.fontawesome.com/8563a1c9e8.js" crossorigin="anonymous"></script>
	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
</head>

<body>
		<p id="demo" ></p>
		<div class="profile">
		<h1 onclick="">Profile</h1>
			<form action="profile.php" method="post" enctype="multipart/form-data">
 				<?php echo "<img src='images/".$profilePicture."' ><br> "; ?>

		 		<i class="fas fa-star" style="font-size:20px;color:#ff4500;margin-bottom: 40px;margin-top: 20px;margin-left:170px;"></i>
		 		<label for="rating"><?php echo $rating; ?></label><br>
				<label for="name">Name</label><br>
				<input type="text" name="name" value="<?php echo $name; ?>" readonly> <br>
				<label for="phoneNumber">Phone Number</label><br>
				<input type="tel" name="phoneNumber" value="<?php echo $phone; ?>" readonly> <br>
				<label for="email">Email Address</label><br>
				<input type="email" name="email" value="<?php echo $email; ?>" readonly> <br>
				<label for="DOB">Date Of Birth</label><br>
				<input type="date" name="DOB" value="<?php echo $DOB; ?>" readonly> <br>
 				<input type="submit" name="edit" value="Edit Profile">
 				<input type="submit" name="salary" id="salary" <?php if($_SESSION['userType'] == "R") {?> style="display:none" <?php } ?> value="View Salary">
			</form>
		</div>
</body>
</html>