<?php

		
		include('../db/ecomconfig.php');
		session_start();
		$merchant_id = $_SESSION['merchant_id'];
		$username = $_SESSION['username'];


?>

<!DOCTYPE html>
<html>
<head>
	<title>View Orders</title>
</head>
<body>


		<a href="uploadproducts.php">Upload Products</a>
		<a href="vieworders.php">View Orders</a>

		<h2>View Orders</h2><hr/>

				<?php

				 echo "<p>Current Merchant: <strong>" .$username.  "</strong></p>"; 
				 echo "<p>Merchant ID: <strong>". $merchant_id. "</strong></p><hr/>";
				 ?>

				 <?php

				 		$pick = mysqli_query($db, "SELECT * FROM orders WHERE merchant_id = merchant_id") or die (mysqli_error($db));

				 ?>

			<table border="1">
				<tr>
					<th>Product Name</th>
					<th>Description</th>
					<th>Price</th>
					<th>Order Date</th>
					<th>Quantity</th>
					<th>Mailing Address</th>
					<th>Customer Name</th>
					<th>Customer Number</th>
				</tr>
				<tr>
					<?php while ($row = mysqli_fetch_array($pick)) { ?>
				 			<td><?php echo $row[1] ?></td>
				 			<td><?php echo $row[2] ?></td>
				 			<td><?php echo $row[3] ?></td>
				 			<td><?php echo $row[5] ?></td>
				 			<td><?php echo $row[4] ?></td>
				 			<td><?php echo $row[7] ?></td>
				 			<td><?php echo $row[6] ?></td>
				 			<td><?php echo $row[8] ?></td>
					
				</tr>
				<?php } ?>
			</table>

</body>
</html>