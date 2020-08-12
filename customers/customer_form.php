<?php

	session_start();
	include('../db/ecomconfig.php');

?>



<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
	<link rel="stylesheet" type="text/css" href="../css/customer_form.css">

</head>
<body>
	<div class="heading">
	
		
		<div class="header">
			<ul>
			<li><a href="../public/index.php">Home</a></li>
			<li><a href="../merchants/merchantsignup.php">Sell on Joomla</a></li>
			<!-- <li><a href="">Category</a></li> -->
			<li><a href="../customers/customer_form.php">Account</a></li>
			<li><a href="../customers/customer_form.php">Help</a></li>
			<li><a href="../public/cart.php">Cart</a></li>
		 	</ul>
		</div>

	

	<?php

		if(isset($_POST['submit']))
		{
			$error = array();

			if (empty($_POST['fname']))
			{
				$error['fname'] = "Enter your firstname";
			} else {
				$fname = mysqli_real_escape_string($db,$_POST['fname']);
			}

			if (empty($_POST['lname']))
			{
				$error['lname'] = "Enter your lastname";
			} else {
				$lname = mysqli_real_escape_string($db,$_POST['lname']);
			}

			if (empty($_POST['country']))
			{
				$error['country'] = "Enter your country";
			} else {
				$country = mysqli_real_escape_string($db,$_POST['country']);
			}

			

			if (empty($_POST['tell']))
			{
				$error['tell'] = "Enter your phone number";
			} else {
				$tell = mysqli_real_escape_string($db,$_POST['tell']);
			}

			if (empty($_POST['email']))
			{
				$error['email'] = "Enter your email";
			} else {
				$email = mysqli_real_escape_string($db,$_POST['email']);
			}

			if (empty($_POST['uname']))
			{
				$error['uname'] = "Enter your username";
			} else {
				$uname = mysqli_real_escape_string($db,$_POST['uname']);

			}
			if (empty($_POST['password']))
			{
				$error['password'] = "Enter your password";
			} else {
				$password = mysqli_real_escape_string($db,$_POST['password']);
			}


			if(empty($error))

			{
				$insert = mysqli_query($db, "INSERT INTO customers
											 VALUES (NULL,
													 '".$fname."',
													 '".$lname."',
													 '".$country."',
													 
													 '".$tell."',
													 '".$email."',
													 NOW(),
													 '".$uname."',
													 '".$password."'	
											 )") or die (mysqli_error($db));
				echo "<em>Registration Successful</em>";
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
			<div class="container2">
			<p>Create Account</p>

				<div class="first"> 
					 <input  class="name" type="text" name="fname" placeholder="Firstname"/>
					 <input  class="name" type="text" name="lname" placeholder="Lastname" />
				</div>

			<div class="select">

				<?php $countrys = array("America", "Australia", "Armenia", "Botswana", "Zimbabwe", "Nigeria", "Benin", "Burkina-faso", "South Africa", "Canada", "Germany", "Brazil", "Dominican Republic", "Mauritius", "Guinea", "Malaysia", "Thailand", "Japan", "Spain", "Turkey", "Cyprus", "Ghana", "Togo", "Trinidad and Tobago", "Bahams", "China", "South Korea", "North Korea", "Sudan", "Kenya", "Rwanda", "Senegal", "France", "Cape Verde", "Myanmar", "Singapore", "Russia", "Ukraine", "Poland", "Ireland", "UK", "New-Zealand", "Cuba", "Congo", "Cameroun", "Venezuela", "Niger", "Egypt", "Iran", "Lebanon","Saudi Arabia", "UAE", "Ethiopia", "Morroco", "Israel", "Syria", "Yemen", "Iraq", "Pakistan"); ?>


				<select  class="select-item" name="country"><option value="">Country</option>
					<?php foreach($countrys as $country) {?>
						<option value="<?php echo $country ?>"><?php  echo $country?></option>
					<?php } ?>
				</select> 
			</div>
			<div class="info">
				
				 <input  class="information" type="text" name="tell" placeholder="Phone Number"/><br>
				 <input class="information" type="text" name="email" placeholder="Email" /><br>
				 <input class="information" type="text" name="uname" placeholder="Username"/><br>
				<input class="information" type="password" name="password" placeholder="Password:"/><br>
				<input  class="signup" type="submit"  name="submit" value="Sign Up"/>
			</div>
			<p class="login">Already have an account? <a href="customer_login.php">Login</a></p>
		</div class="container2">
		</div>
	</form>

</body>
</html>