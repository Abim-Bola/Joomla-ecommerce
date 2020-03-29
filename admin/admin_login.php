<?php 
	session_start();
	include('../db/ecomconfig.php');
 ?>

<!DOCTYPE html>
<html>
	<head>
		<title>Admin Login</title>
		<link rel="stylesheet" type="text/css" href="../css/admin_login.css">
		<!-- <link rel="stylesheet" type="text/css" href="../css/agent_login.css"> -->
	
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
			if (array_key_exists('login', $_POST)) {
				$error = array();

				if(empty($_POST['uname'])){
					$error ['uname'] = "Please Enter Your Username";
				} else {
					$uname = mysqli_real_escape_string($db, $_POST['username']);
				}

				if(empty($_POST['pword'])){
					$error ['pword'] = "Please Enter Your Password";
				} else {
					$password = md5(mysqli_real_escape_string($db, $_POST['pword']));
				}

				
				if(empty($error)){
					$query = mysqli_query($db, "SELECT * FROM admin WHERE admin_name ='".$uname."' && password = '".$password."'") or die(mysqli_error($db));

					$result = mysqli_fetch_array($query);

					$_SESSION['admin_name'] = $result['admin'];
					$_SESSION['admin_id'] = $result['admin_id'];

					header("location:admin_dashboard.php");
				} else {
					$msg = "Invalid Username or Password";
					header("location:admin_login.php?msg=$msg");
				}
			}

		 ?>
		<form action="" method="post">

			

			<div class="container">
				<h1>Admin Login</h1>
			<?php if(isset($_GET['msg'])){
					echo "<p>".$_GET['msg']."</p>";
				} 
			?>
			 <input class="info" type="text" name="uname" placeholder="password"></p>

			 <input class="info"  type="password" name="pword" placeholder="Password" /></p>
			<input class="login" type="submit" name="login" value="Login">
		</div>

		</form>
	</body>
</html>