<?php
	// Connecting Configuration file of data base connection to the index
require('con.php');

session_start();
// If the the button with the name of 'submitform' is set do perform the following procedure
				if (isset($_POST['loginbutton'])) {

					//Access html input in script and get the length
					//Using script in php 
				// $u_name will store the value of username and send it to DB
					$phoneNumber = mysqli_real_escape_string($con, $_POST['phoneNumber']);

				// $u_pass will store the value of userpass and send it to DB
					$password = mysqli_real_escape_string($con, $_POST['password']);
				//If there is time by the end of this week, create labels if username is left blank and for password using if conditions
				// This query will send the data stored in the upper variables to Database
					$query = "SELECT id, phoneNumber, password FROM login";
				// $run will check the query and the connection of DB
					$result = $con->query($query);
					$user_found = false;
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							if($phoneNumber == $row["phoneNumber"] && $password == $row["password"])
							{
								$user_found = true;
								//header("location: login.php?success=".urldecode("Login Successful"));
								//create a new label for login successful and style it her and then redirect to safar
								//header('location: safar.php');
								//$_SESSION['username'] = $username;
								$_SESSION['phoneNumber']=$_POST['phoneNumber'];
								$_SESSION['userType']= "R";
								header("location: booking.php");
								/*echo '<script>';
								echo 'window.location.replace("login.php/?success=\"Login Successfull\"");';
								echo 'window.location.replace("safar.php");';
								echo '</script>';*/
								//sleep(5);
								//exit();
							}
						}
					}
					if($user_found == false)
					{
						//header("location: login.php?success=".urldecode($password));
						header("location: loginRider.php?success=".urldecode("Error"));
					//No login found... Create a New Account
					//alag sey style and create a label to be displayed
					}
				}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!-- Use to enable the view port for reponsive website -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">
	<!-- Your website title should have to be written in title tag child of head tag -->
	<title>Login</title>
	<!-- use to link the stylesheet to your index file path should have to be written in href -->
	<link rel="stylesheet" type="text/css" href="stylelogin.css">
	<!-- CDN of Jquery (Content Delivery Network of Jquery a link to online liberary) -->
	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>
	<div class="login">
		<h2>Login</h2>
		<!-- form tag use to get data from the user -->
		<p id = "demo"></p>
		<form action="loginRider.php" method="post">
			<!-- child element of a form to get the data from user types can be text, password, email, date etc -->

			<label for="phoneNumber">Phone Number</label><br>
			<input type="tel" id="phoneNumber" name="phoneNumber" pattern="[0-9]{11}" placeholder="03355005712" required> <br>
			<label for="password">Password</label><br>
			<input type="password" name="password" id = "password" placeholder="Your Password Here" required> <br>

			<!-- Button tag can be use for some multiple purpose such submittion or perform some on page action using JS -->
			<button type="submit" id = "loginbutton" name="loginbutton" onclick="show();">Login</button>
			<script>
				function Dequeue(s)
				{
					let front = 0;
					let rear = 0;
					let count = 0;
					const size = s; 
					let arr = new Array(s);
					this.isEmpty = function () {
						if(count == 0)
						{
							return true;
						}
						else
						{
							return false;
						}
					}
					this.isFull = function () {
						if(count == size)
						{
							return true;
						}
						else 
						{
							return false;
						}
					}
					this.insert = function (element) {
						if (this.isFull() == true)
						{
							//console.log("Dequeue Overflown");
						}
						else
						{
							arr[rear] = element;
							rear = (rear + 1) % size;
							count++;
						}
					}
					this.remove = function () {
						let element;
						if (this.isEmpty() == true)
						{
							//console.log("Dequeue Underflown");
						}
						else
						{
							element = arr[front];
							console.log(element);
							front = (front + 1) % size;
							count--;
							return element;
						}
					}
					this.insertFromFront = function (element) {
						if (this.isFull() == true)
						{
							//console.log("Dequeue Overflown");
						}
						if (front == 0)
						{
							front = size - 1;
							arr[front] = element;
							count++;
						}
						else
						{
							front--;
							arr[front] = element;
							count++;
						}
					}	
				}
				function show()
				{
					var phoneNumber = document.getElementById('phoneNumber');
					phoneNumber = "+92" + phoneNumber;
					document.getElementById('phoneNumber') = phoneNumber;

					let temp = document.getElementById("password").value;
					let pass = "";
					var obj = new Dequeue(temp.length);
					for (let i = 0; i < temp.length; i++)
					{
						if (i % 2 == 0)
						{
							obj.insertFromFront(temp[i]);
						}
						else if (i % 2 == 1)
						{
							obj.insert(temp[i]);
						}
					}
					for (let i = 0; i < temp.length; i++)
					{
						pass += obj.remove(temp[i]);
					}
					document.getElementById("password").value = pass;
				}					
				</script>
				<div class="g-signin2" data-width="320" data-height="40" data-margin-top= "20" data-longtitle="true" data-onsuccess="onSignIn"></div>
				<p> Don't have an Account. <a href="signupRider.php" > Create a new one. </a> <!-- link to html -->
				</form>
			</div>
		</body>
		</html>