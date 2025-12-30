<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));

   $select = mysqli_query($conn, "SELECT * FROM `user_info` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'user already exist!';
   }else{
      if($pass != $cpass){
         $message[] = 'password not matched!';
      }else{
         mysqli_query($conn, "INSERT INTO `user_info`(name, email, password) VALUES('$name', '$email', '$pass')") or die('query failed');
         $message[] = 'registered successfully!';
         header('location:login.php');
      }
   }
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="css/register.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta charset="UTF-8">
   	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<?php
if (isset($message)) {
    foreach ($message as $msg) {
        echo "<script>alert(" . json_encode($msg) . ");</script>";
    }
}

?>

	<img class="wave" src="images/wave.png">
	<div class="container">
		<div class="img">
			<img class="sintakart" src="images/sintakart.png">
		</div>
		<div class="login-content">
			<form action="" method="post">
				<img src="images/user-icon.png">
				<h2 class="title">Create Account</h2>
           		<div class="input-div one">
           			<div class="div">
           		   		<h5>Name</h5>
           		   		<input type="text" class="input" name="name" required>
           		   </div>
           		</div>
           		<div class="input-div one">
           			<div class="div">
           		   		<h5>Email</h5>
           		   		<input type="email" class="input" name="email" required>
           		   </div>
           		</div>
           		<div class="input-div pass">
           			<div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" name="password" required>
            	        </div>
            		</div>
            		<div class="input-div pass">
           			<div class="div">
           		    	<h5>Confirm Password</h5>
           		    	<input type="password" class="input" name="cpassword" required>
            	        </div>
            		</div>
            	<input type="submit" name="submit" class="btn" value="register now">
			<div class="account-check">
                    <p>Already have an account? </p>
                    <a href="login.php">Login now</a>
               </div>
               </form>
        </div>
    </div>
    <script type="text/javascript" src="js/login-signup.js"></script>
</body>
</html>

