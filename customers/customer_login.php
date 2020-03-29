<?php

	session_start();
	include('../db/ecomconfig.php')

?>


<!DOCTYPE html>
<html>
<head>
	<title>Customer Login</title>
	<link rel="stylesheet" type="text/css" href="../css/customer_login.css">
</head>
<body>

	<div class="header">
			<ul>
				<li><a href="../public/index.php">Home</a></li>
			<li><a href="../merchants/merchantsignup.php">Sell on Joomla</a></li>
			<li><a href="">Category</a></li>
			<li><a href="../customers/customer_form.php">Buy</a></li>
			<li><a href="../customers/customer_form.php">Help</a></li>
			<li><a href="">Cart</a></li>
		</ul>
		</div>


	<?php

		if(array_key_exists('submit', $_POST))
		{
			$error = array();

			if(empty($_POST['uname']))
			{
				$error['uname'] = "Please Enter Your Username";
			} else {
				$uname = mysqli_real_escape_string($db, $_POST['uname']);
			}

			if(empty($_POST['pword']))
			{
				$error['pword'] = "Please Enter Your Password";
			} else {
				$pword = (mysqli_real_escape_string($db, $_POST['pword']));
			}


			if (empty($error))
			{
				$query = mysqli_query($db, "SELECT * FROM customers WHERE username = '".$uname."' AND password = '".$pword."' ") or die(mysqli_error($db));

				if(mysqli_num_rows($query) == 1)
				{
					$confirm = mysqli_fetch_array($query);

					$_SESSION['customer_id'] = $confirm['customer_id'];
					$_SESSION['username'] = $confirm['username'];

			header("location:../public/index.php");
				} else {
					echo "Invalid Username or Password";
				}
			} else {
				foreach($error as $error)
				{
					echo "<P>*$error</p>";
				}
			}


		}

	?>

	<form action="" method="post">

		<div class="container">
			<p>Login</p>
			 <input class="info" type="text" name="uname" placeholder="Username"/><br>
			 <input class="info" type="password" name="pword" placeholder="Password"/><br>
		<input class="login" type="submit" name="submit" value="Login"/>
	</div>
	</form>

</body>
</html