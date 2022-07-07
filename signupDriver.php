<?php
	// Connecting Configuration file of data base connection to the index

session_start();
require('con.php');
if (isset($_POST['signupbutton'])) {

$script = <<< JS

$(function Dequeue(s)
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
                });
$(function show()
                {
                    document.getElementById("demo") = "yes";
                    var phoneNumber = document.getElementById("phoneNumber");
                    phoneNumber = "+92" + phoneNumber;
                    document.getElementById("phoneNumber") = phoneNumber;

                    if(document.getElementById("password").value == document.getElementById("confirmPassword").value)
                    {
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
                        document.getElementById("confirmPassword").value = pass;
                    }
                });
JS;
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
									header("location: vehicleRegister.php");
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

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!-- Use to enable the view port for reponsive website -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Your website title should have to be written in title tag child of head tag -->
	<title>Become a Driver</title>
	<!-- use to link the stylesheet to your index file path should have to be written in href -->
	<link rel="stylesheet" type="text/css" href="stylesignupDriver.css">
	<!-- CDN of Jquery (Content Delivery Network of Jquery a link to online liberary) -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</head>
<body>
	<div class="signup">
		<h2>Become a Driver</h2>
		<p id = "demo"></p>
		<!-- form tag use to get data from the user -->
		<form action="signupDriver.php" method="post" enctype="multipart/form-data">
			<!-- child element of a form to get the data from user types can be text, password, email, date etc -->
			<!--<label for="profilePicture">Profile Picture</label>
  			<input type="file" id="profilePicture" name="profilePicture" accept="image/*">-->
			<label for="name">Name</label><br>
			<input type="text" name="name" placeholder="Your Name Here" required> <br>
			<label for="phoneNumber">Phone Number</label><br>
			<input type="tel" name="phoneNumber" pattern="[0-9]{11}" placeholder="03148485712" required> <br>
			<label for="email">Email Address</label><br>
			<input type="email" name="email" placeholder="Your Email Here" required> <br>
			<label for="DOB">Date Of Birth</label><br>
			<input type="date" name="DOB" required> <br>
			<label for="password">Password</label><br>
			<input type="password" name="password" id="password" placeholder="Your Password Here" required> <br>
			<label for="confirmPassword">Confirm Password</label><br>
			<input type="password" name="confirmPassword" id="confirmPassword" placeholder="Your Password Again" required> <br>
			<!-- Button tag can be use for some multiple purpose such submittion or perform some on page action using JS -->
			<button type="submit" name="signupbutton" onclick="show();">Sign Up</button>
			
			<p> Already have an Account. <a href="loginDriver.php" style="color:seagreen;"> Just Login. </a> <!-- link to html -->
			</form>
		</div>
	</body>
	</html>