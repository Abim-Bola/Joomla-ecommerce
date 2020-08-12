<?php
session_start();
include('../db/ecomconfig.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
	<link rel="stylesheet" type="text/css" href="../css/cart.css">
</head>
<body>

<div class="container">
	
		
		<div class="header">
			<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="../merchants/merchantsignup.php">Sell on Joomla</a></li>
			<!-- <li><a href="">Category</a></li> -->
			<li><a href="../customers/customer_form.php">Buy</a></li>
			<li><a href="../customers/customer_form.php">Help</a></li>
			<li><a href="cart.php">Cart</a></li>
		 	</ul>
		</div>

<?php 
		if(isset($_SESSION['shopping_cart'])) { 
			$total_price = 0;

			?>


	
<table id="cart-items">
	<tbody>
	<tr>
		<th>Product</th>
		<th>Quantity</th>
		<th>Price</th>
		<th>Price of Quantity</th>
	</tr>

<!-- this loop continues to add products to the cart, the $product as key is meant to display the items and not their values -->
		<?php foreach($_SESSION['shopping_cart'] as $product) { ?>

	<tr>
	<!-- 	first column -->
		<td class="product">
			<img src='<?php echo $product['image_path']?>'  width="40" heigth="40">
			<p><?php echo $product['product_name']; ?></p>
		</td>

   <!-- second column this creates a loop of the quantity -->
		<td>
	<select name="quantity">
		<?php 
		for($i=1; $i<=20; $i++){ ?>
		<option  value="<?php echo $i; ?>"><?php echo $i; ?></option>
		<?php } ?>
	</select>
		</td>


		<!-- this is the third and fourth column which includes calculation of the price per quantity which is the price multiplied by the quantity -->

		

		<td><?php echo "$" . $product['price']; ?></td>

		<?php $total = $product['price'] * $i; ?>

		<td><?php  echo "$" . $total; ?></td>

		
	</tr>

<?php $total_price += ($product['price'] * $i);  ?>



	<tr class="total">
		<td>Total: </td>
		<td></td>
		<td></td>
		 <td><?php echo "$". $total_price; } ?></td>

	</tr>
</tbody>
</table>

<div>
 		<form method="post" action="">
 			<input type="submit" name="order" value="Order">
 		</form>
 	</div>

<?php
} else { ?>

	 <div class="mainimage">
		
			<img class="center" src="../images/cart.jpg" width="500" height="400">
		</div>
			<div class="body">
			<h1>Your Cart is Empty</h1>
			<p>Already have an account? <a  href="../customers/customer_login.php" style="color: blue;">Login</a> to see the items in your cart</p>
			</div>

       <div class="button">
			<a href="index.php" style="color: white; text-decoration: none; font-family: Amazon Ember, Arial,sans-serif; font-weight: bold"; ><p>Start Shopping</p></a>
		</div>
	</div>
	</div> 

<?php } ?>



</body>
</html>