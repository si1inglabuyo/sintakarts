<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `user_info` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      header('location:index.php');
   }else{
      $message[] = 'incorrect password or email!';
   }
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
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
				<h2 class="title">Welcome Back!</h2>
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
            	<input type="submit" name="submit" class="btn" value="login now">
			<div class="account-check">
                    <p>Don't have an account? </p>
                    <a href="register.php">Register now</a>
               </div>
               </form>
        </div>
    </div>
    <script type="text/javascript" src="js/login-signup.js"></script>
</body>
</html>
