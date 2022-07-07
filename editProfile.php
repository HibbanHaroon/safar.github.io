<?php
	// Connecting Configuration file of data base connection to the index
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

/*
$msg = " ";
if(isset($_POST['upload'])){
	$target = "images/".basename($_FILES['image']['name']);
	$db = mysqli_connect('localhost','root','','careem');
	$table = 'signup';
	$image = $_FILES['image']['name'];
	echo $image;
	$sql = "UPDATE '$table' SET profilePicture = `'$image'` where phoneNumber = '$phone'";
	mysqli_query($db, $sql);
	if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
		$msg = "Image uploaded successfully";
	}
	else{
		$msg = "There was an error uploading the image";
	}
	echo $msg;
}
*/

$db = mysqli_connect('localhost','root','','careem');
if($_SESSION['userType'] == "R")
{
	$sql = "SELECT * FROM rider WHERE phoneNumber = '$phone'";
}
else if ($_SESSION['userType'] == "D") {
	$sql = "SELECT * FROM driver WHERE phoneNumber = '$phone'";
}
$result = mysqli_query($db, $sql);
$previousPhone = $phone;

while ($row = mysqli_fetch_array($result)){
	$name = $row['name'];
	$email = $row['email'];
	$DOB = $row['DOB'];
	$profilePicture = $row['profilePicture'];
}

if(isset($_POST['confirm']))
{
	$db = mysqli_connect('localhost','root','','careem');
	$name = $_POST['name'];
	$phone = $_POST['phoneNumber'];
	$email = $_POST['email'];
	$DOB = $_POST['DOB'];
	$msg = "";
	if($_FILES['image']['name'] != NULL)
	{
		$target = "images/".basename($_FILES['image']['name']);
		$image = $_FILES['image']['name'];
		$sql = "UPDATE signup SET profilePicture = '$image' where phoneNumber = '$previousPhone'";
		mysqli_query($db, $sql);
		if($_SESSION['userType'] == "R")
		{
			$sql = "UPDATE rider SET profilePicture = '$image' where phoneNumber = '$previousPhone'";
		}
		else if ($_SESSION['userType'] == "D") {
			$sql = "UPDATE driver SET profilePicture = '$image' where phoneNumber = '$previousPhone'";
		}
		
		mysqli_query($db, $sql);
		if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
			$msg = "Image uploaded successfully";
		}
		else{
			$msg = "There was an error uploading the image";
		}
		echo $msg;
	}
	$sql = "UPDATE signup SET name = '$name', phoneNumber = '$phone', email = '$email', DOB = '$DOB' where phoneNumber = '$previousPhone'";
	$run = mysqli_query($db, $sql);

	if($_SESSION['userType'] == "R")
	{
		$sql1 = "UPDATE rider SET name = '$name', phoneNumber = '$phone', email = '$email', DOB = '$DOB' where phoneNumber = '$previousPhone'";
	}
	else if ($_SESSION['userType'] == "D") {
		$sql1 = "UPDATE driver SET name = '$name', phoneNumber = '$phone', email = '$email', DOB = '$DOB' where phoneNumber = '$previousPhone'";
	}

	$run1 = mysqli_query($db, $sql1);
	if($run == true && $run1 == true)
	{
		if($previousPhone != $phone)
		{
			$sql = "UPDATE login SET phoneNumber = '$phone' where phoneNumber = '$previousPhone'";
			$run = mysqli_query($db, $sql);
			$_SESSION['phoneNumber']=$phone;
			if($run)
			{
				header("location: profile.php?changes=".urldecode("saved"));
			}
		}
		else
		{
			header("location: profile.php?changes=".urldecode("saved"));
		}
	}

}
if(isset($_POST['cancel']))
{
	header("location: profile.php?changes=".urldecode("cancelled"));
}

?>
<html>
<head>
	<meta charset="utf-8">
	<!-- Use to enable the view port for reponsive website -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Your website title should have to be written in title tag child of head tag -->
	<title>Edit Profile</title>
	<!-- use to link the stylesheet to your index file path should have to be written in href -->
	<link rel="stylesheet" type="text/css" href="styleeditprofile.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap">
	<!-- CDN of Jquery (Content Delivery Network of Jquery a link to online liberary) -->
	<script src="https://kit.fontawesome.com/1ddad08af2.js" crossorigin="anonymous"></script>
	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
</head>
<body>
		<p id="demo" ></p>
		<div class="editProfile">
		<h1 onclick="">Edit Profile</h1>
			<form action="editProfile.php" method="post" enctype="multipart/form-data">
 				<?php echo "<img src='images/".$profilePicture."' ><br> "; ?>
 				<input type="file" id="image" name="image"><br>
				<label for="name">Name</label><br>
				<input type="text" name="name" value="<?php echo $name; ?>" > <br>
				<label for="phoneNumber">Phone Number</label><br>
				<input type="tel" name="phoneNumber" value="<?php echo $phone; ?>" > <br>
				<label for="email">Email Address</label><br>
				<input type="email" name="email" value="<?php echo $email; ?>" > <br>
				<label for="DOB">Date Of Birth</label><br>
				<input type="date" name="DOB" value="<?php echo $DOB; ?>"> <br>
				<input type="submit" id="confirm" name="confirm" value="Confirm">
 				<input type="submit" id="cancel" name="cancel" value="Cancel">
			</form>
		</div>
</body>
</html>