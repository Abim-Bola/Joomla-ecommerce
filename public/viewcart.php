<?php

	session_start();
	include('../db/ecomconfig.php');


	$customer_id = $_SESSION['customer_id'];
	$username = $_SESSION['username'];

	$select = mysqli_query($db, "SELECT product_name, price, image_path, quantity, price * quantity AS 'newprice' FROM cart WHERE customer_id = '$customer_id'") or die (mysqli_error($db));

	// echo mysqli_num_rows($select);
	$lamba = mysqli_query($db, "SELECT * FROM cart WHERE customer_id = '$customer_id'") or die (mysqli_error($db));

	$beamer = mysqli_fetch_array($lamba);

	// $price = $beamer['price'];
	// $quantity = $beamer['quantity'];
	$cart_id = $beamer['cart_id'];

	// 		foreach($product_id as $product_id)
	// 		{
	// 			$price = $price * $quantity;
	// 		}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
</head>
<body>


	<a href="index.php">Home</a>

	<?php

				 echo "<p>Customer Name: <strong>" .$username.  "</strong></p>"; 
				 echo "<p>Customer ID: <strong>". $customer_id. "</strong></p><hr/>";
	 ?>
	 <table border="1">
	 	<tr>
	 		<th>Product Name</th>
	 		<th>Quantity</th>
	 		<th>Price</th>
	 		<th>Image</th>
	 	</tr>

	 	<tr>
	 		<?php while ($row = mysqli_fetch_array($select)) { ?>
	 				<td><?php echo $row['product_name'] ?></td>
	 				<td><?php echo $row['quantity'] ?></td>
	 				<td><?php echo $row['newprice'] ?></td>
	 				<td><?php echo "<img src='$row[image_path]' width='150' height='150'> "?></td>
	 		
	 				<td><?php echo "<form action='delete.php' method='post'><input type='submit' name='remove' value='Remove From Cart'>"; ?></td>
	 							<?php echo "<input type='hidden' name='cartid' value='$cart_id'>"; ?>
	 				<?php echo"</form>"; ?>
	 			
	 		
	 	</tr>
	 	<?php } ?>
	 </table>
	 <br/><br/>
	 <a href="checkout.php"><input type="submit" name="checkout" value="Proceed to checkout"></a>
</body>
</html>