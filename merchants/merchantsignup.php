<?php
	
	session_start();
	include("../db/ecomconfig.php")

?>


<!DOCTYPE html>
<html>
<head>
	<title>Merchant Sign up</title>
	<link rel="stylesheet" type="text/css" href="../css/merchant_signup.css">
</head>
<body>

	
	<?php

		if (array_key_exists('submit', $_POST))
		{
			$error = array();

			if(empty($_POST['bname']))
			{
				$error['bname'] = "Please enter your business name";
			} else {
				$bname = mysqli_real_escape_string($db, $_POST['bname']);
			}

			
			if(empty($_POST['tell']))
			{
				$error['tell'] = "Please enter your phone number";
			} else {
				$tell = mysqli_real_escape_string($db, $_POST['tell']);
			}

			if(empty($_POST['email']))
			{
				$error['email'] = "Please enter your email";
			} else {
				$email = mysqli_real_escape_string($db, $_POST['email']);
			}

			if(empty($_POST['pword']))
			{
				$error['pword'] = "Please enter your password";
			} else {
				$pword = mysqli_real_escape_string($db, $_POST['pword']);
			}

			if(empty($_POST['uname']))
			{
				$error['uname'] = "Please enter your username";
			} else {
				$uname = mysqli_real_escape_string($db, $_POST['uname']);
			}

			if (empty($error))
			{
				$insert = mysqli_query($db, "INSERT INTO merchants
											 VALUES (NULL,
											 		 '".$bname."',
											 		 
											 		 '".$tell."',
											 		 '".$email."',
											 		 NOW(),
											 		 '".$pword."',
											 		 '".$uname."'
											 		 )") or die (mysqli_error($db));
				$status="<p>Registration Successull</p>";
			} else {
				foreach ($error as $error)
				{
					echo "<p>*$error</p>";
				}
			}
		}



	?>

	<form action="" method="post">
		<div class="container">
			<p>Create Account</p>
		 <input  class="information" type="text" name="bname"placeholder="Business Name"/><br>
		<input  class="information" type="text" name="tell" placeholder="Phone Number"/><br>
		 <input class="information" type="text" name="email" placeholder="Email"/><br>
		 <input class="information"type="password" name="pword" placeholder="Password"/><br>
		 <input class="information" type="text" name="uname"placeholder="Username"/><br>
		<input class="signup" type="submit" name="submit" value="Register"/><br>
		<p class="login">Already have an account? <a href="merchantlogin.php">Login</a></p>
		<?php echo $status ?>

	</form>

</body>
</html>