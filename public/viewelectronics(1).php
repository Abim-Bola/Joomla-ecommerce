<?php

	session_start();
	include('../db/ecomconfig.php');


	$customer_id = $_SESSION['customer_id'];
	$username = $_SESSION['username'];

		$select = mysqli_query($db, "SELECT * FROM product_upload WHERE category_id = 2") or die (mysqli_error($db));

?>



<!DOCTYPE html>
<html>
<head>
	<title>View Electronics</title>
</head>
<body>

	<a href="viewcart.php">View Cart</a>

	<?php

				 echo "<p>Customer Name: <strong>" .$username.  "</strong></p>"; 
				 echo "<p>Customer ID: <strong>". $customer_id. "</strong></p><hr/>";
	 ?>


		<table border="1">
			<tr>
				<th>Name</th>
				<th>Description</th>
				<th>Price</th>
				<th>Image</th>
				<th>Quantity</th>
			</tr>

			<tr>
				<?php while($row = mysqli_fetch_array($select)) {  ?>

				<td><?php echo $row[1]  ?></td>
				<td><?php echo $row[2] ?></td>
				<td><?php echo $row[3] ?></td>
				<td>
					<img src="../publicimages/<?php echo $row[5] ?>" width="150" height="150"/>
				</td>
					<?php echo "<form action='cart.php' method='post'>" ?>
					<td><?php echo "<input type='number' min='0' name='quantity' value='".$row[6]."'>"; ?></td>
					<td><?php echo "<input type='submit' name='acart' value='Add to Cart'>"; ?>
						<?php echo "<input type='hidden' name='id' value='".$row[0]."'>"; ?>
						<?php echo "<input type='hidden' name='name' value='".$row[1]."'>"; ?>
						<?php echo "<input type='hidden' name='description' value='".$row[2]."'>"; ?>
						<?php echo "<input type='hidden' name='price' value='".$row[3]."'>"; ?>
						<?php echo "<input type='hidden' name='image' value='".$row[5]."'>"; ?>
						<?php echo "<input type='hidden' name='custid' value='$customer_id'>"; ?>
					<?php echo "</form>"; ?></td>
			</tr>
		<?php } ?>
			
		</table>
	

</body>
</html>