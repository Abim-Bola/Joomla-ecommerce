<?php

	session_start();
	include('../db/ecomconfig.php');
	include('../db/authenticate.php');

	$admin_id = $_SESSION['admin_id'];
	$admin = $_SESSION['admin_name'];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
	<link rel="stylesheet" type="text/css" href="../css/view_customer.css">
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

	 

	 	
	 	<h4 style="font-size: 20px;">Welcome, <strong><?php echo $admin ?></strong> <br> to your dashboard</h4>

	 	
	


	 <?php 

	 		$select = mysqli_query($db, "SELECT * FROM customers ") or die (mysqli_error($db));

	 ?>

	 <div class="advert">
	<div class="ad">
		<div class="adver"><p style="text-align: center; color: white; padding-top: 10px; margin-bottom: 40px;"><a href="admin_dashboard.php">20,000 <br>Customers</a></p></div>
		<div class="adve"><p style="text-align: center; color: white; padding-top: 10px; margin-bottom: 40px;"><a href="view_merchants.php"> 50,000 <br>Merchants</a></p></div>
		<div class="adv"><p style="text-align: center; color: white; padding-top: 10px; margin-bottom: 40px;"><a href="">1,000,000<br>Products</p></a></div>
		<div class="adverts"><p style="text-align: center; color: white; padding-top: 10px; margin-bottom: 40px;"><a href="">500,000<br>Orders</a></p></div>
	</div>
</div>

<h1 style="text-align: center; font-size: 50px;">Customers</h1>

	 <table >
	 	<tr class ="Head">
	 		<th>Name</th>
	 		<th>Country</th>
	 		<th>Phone Number</th>
	 		<th>Email</th>
	 		<th>Time and Date</th>
	 		<th>Username</th>
	
	 		
	 	</tr>

	 	<tr>
	 		<?php while ($row = mysqli_fetch_array($select)) { ?>
	 			<div class="data">
	 			<td class="body"><?php echo $row[1]." ".$row[2] ?></td>
	 			<td class="body"><?php echo $row[3] ?></td>
	 			<td class="body"><?php echo $row[4] ?></td>
	 			<td class="body"><?php echo $row[5] ?></td>
	 			<td class="body"><?php echo $row[6] ?></td>
	 			<td class="body"><?php echo $row[7] ?></td>
	 		
	 			
	 		</div>
	 	</tr>
	 <?php } ?>
	 </table>

	 <?php echo "<h3>Number of customers: <strong>". (mysqli_num_rows($select)). "</strong></h3>"?>


</body>
</html>