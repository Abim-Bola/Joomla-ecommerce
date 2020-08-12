<?php
include('../db/ecomconfig.php');
session_start();
$merchant_id = $_SESSION['merchant_id'];
$username = $_SESSION['username'];
// $select = mysqli_query($db, "SELECT * FROM product_upload WHERE merchant_id = merchant_id") or die(mysqli_error($db));

?>


<!DOCTYPE html>
<html>
<head>
	<title>Merchant Dashboard</title>
	<link rel="stylesheet" type="text/css" href="../css/merchant_dashboard.css">
</head>
<body>

	<div class="header">
			<ul>
				<li><a href="../public/index.php">Home</a></li>
			<li><a href="../merchants/merchantsignup.php">Sell on Joomla</a></li>
			<!-- <li><a href="">Category</a></li> -->
			<li><a href="../customers/customer_form.php">Account</a></li>
			<li><a href="../customers/customer_form.php">Help</a></li>
			<li><a href="cart.php">Cart</a></li>
		</ul>
		</div>

	 

	 	
	 	<h4 style="font-size: 20px;">Welcome, <?php echo $username ?> <br> to your dashboard</h4>

	 	
	


	 <?php 

	 		$select = mysqli_query($db, "SELECT * FROM ecommerce_order WHERE merchant_id = $merchant_id  ") or die (mysqli_error($db));

	 ?>
<div class="advert">
    <div class="ad">
		<div class="adver"><p style="text-align: center; color: white; padding-top: 33.5px; margin-bottom: 40px;"><a href="viewproducts.php">Your Products</a></p></div>
		<div class="adve"><p style="text-align: center; color: white; padding-top: 33.5px; margin-bottom: 40px;"><a href="merchant_dashboard.php">Orders</a></p></div>
		<div class="adv"><p style="text-align: center; color: white; padding-top: 33.5px; margin-bottom: 40px;"><a href="uploadproducts.php">Upload Products</p></a></div>
	</div>
</div>

<h1 style="text-align: center; font-size: 50px;">Orders</h1>

	<table >
	 	<tr class ="Head">
	 		<th>Product Name</th>
	 		<th>Quantity</th>
	 		<th>Price</th>
	 		<th>Order Date</th>
	 		<th>Customer Name</th>
	 		<th>Phone Number</th>
	
	 		
	 	</tr>

	 	<tr>
	 		<?php while ($row = mysqli_fetch_array($select)) { ?>
	 			<div class="data">
	 			<td class="body"><?php echo $row[1]?></td>
	 			<td class="body"><?php echo $row[2] ?></td>
	 			<td class="body"><?php echo $row[3] ?></td>
	 			<td class="body"><?php echo $row[4] ?></td>
	 			<td class="body"><?php echo $row[6] ?></td>
	 			<td class="body"><?php echo $row[7] ?></td>
	 			<!-- <td class="body"><?php echo $merchant_id ?></td> -->
	 			
	 		
	 			
	 		</div>
	 	</tr>
	 <?php } ?>
	 </table>

	 <?php echo "<h3>Number of Orders: <strong>". (mysqli_num_rows($select)). "</strong></h3>"?>


</body>
</html>