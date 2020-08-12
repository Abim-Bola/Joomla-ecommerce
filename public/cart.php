<?php
    session_start();
    include('../db/ecomconfig.php');
    //include("../db/db_config.php");

?>
<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
	<link rel="stylesheet" type="text/css" href="../css/cart.css">
	<script src="https://kit.fontawesome.com/653b31a42d.js" crossorigin="anonymous"></script>
</head>
<body>

<div class="container">
	
		
		<div class="header">
			<ul>
			<li><a href="../public/index.php">Home</a></li>
			<li><a href="../merchants/merchantsignup.php">Sell on Joomla</a></li>
			<!-- <li><a href="">Category</a></li> -->
			<li><a href="../customers/customer_form.php">Buy</a></li>
			<li><a href="../customers/customer_form.php">Help</a></li>
			<li><a href="cart1.php">Cart</a></li>
		 	</ul>
		</div>



		<!-- //if user clicks empty cart, it should unset the cart -->
	<?php 
				if(isset($_POST['empty_cart'])){
					unset($_SESSION['shopping_cart']);
					$emp_cart = "Your cart is empty!!!";
				}

				if(!empty($_SESSION['shopping_cart'])){
						$cart_count = count(array_keys($_SESSION['shopping_cart']));
			?>

				 <a href="cart.php">Cart <?php echo $cart_count; ?></a>
			<?php }	?>


<?php 
		if(isset($_SESSION['shopping_cart'])) { 
			$total_price = 0;
			
			?>
	
<table id="cart-items">
	<tbody>
		<!-- //header for the cart -->
	<tr>
		<!-- <th></th> -->
		<th>Product</th>
		<th>Name</th>
		<th>Quantity</th>
		<th style="text-align: center;">Unit Price</th>
		<th>Total</th>
	</tr>

<!-- this loop continues to add products to the cart, the $product as key is meant to display the items and not their values -->
<?php foreach($_SESSION['shopping_cart'] as $product) { ?>

	<tr>
	<!-- 	first  and secondcolumn for the image and the product name -->
		<td class="product">
			<img src='<?php echo $product["image_path"]?>'  width="90" heigth="90">

		</td>
		<td>
			<p><?php echo $product['product_name']; ?></p>
		</td>

   <!-- second column this creates a loop of the quantity -->
		<td>
			<!-- <?php echo $i = $product['quantity']; ?> -->

	<select name="quantity">
		<?php 
		for($i=1; $i<=20; $i++){ ?>
		<option  value="<?php echo $i; ?>"><?php echo $i; ?></option>
		<?php } ?>
	</select>
						
		</td>


		<!-- this is the third and fourth column which includes calculation of the price per quantity which is the price multiplied by the quantity -->

		

		<td><?php echo $product['price']; ?></td>

		<?php $total = $product['price'] * $i; ?>

		<td><?php  echo "₦". $total; ?></td>

		
	</tr>

<?php $total_price += ($product['price']*$i);  }?>


<!-- //row for the total price -->
	<tr class="total">
		<td style="text-align: left;">Total: </td>
		<td></td>
		<td></td>
		<td></td>
		 <td><?php echo "₦". $total_price; ?></td>
	</tr>

	<!-- // order and delete buttons -->

	<tr>
		<td>
		<form method="post" action="" style="display: inline-block;">
		<input type="submit" class="button" id="emp-btn" name="empty_cart" value="Empty Cart">
		</form>
		</td>

		<td></td>
		<td></td>
		<td></td>

		 <td> 
		<form method="post" action="">
 			<input type="button" class="button" id="ord-btn" onclick="checkout()" name="order" value="Order">
 		</form>
		</td>
	</tr>

</tbody>
</table>

<!-- the order summary table will only show when the user clicks on the order button -->
<div style="display: none;" id="checkout">
<table class="table-2">
<tbody>

<tr>
<th colspan="2">Order Summary: <?php echo $cart_count ." " . "Item" ?></th>
</tr>

<tr>
<td style="text-align: left; padding-right: 35px;">Total:</td>
<td style="text-align: right;"> <?php echo "₦". $total_price; ?> </td>
</tr>

<tr>
	<td style="text-align: left; padding-right: 35px;">Shipping: </td>
	<td style="text-align: right;"> Flat rate of <br> ₦1500 to lagos </td>
</tr>

<tr>
<td colspan="2" style="text-align: center;"> <input type="submit" class="button" id="chk-btn" name="checkout" value="Checkout"></td>
</tr>

</tbody>
</table>
</div>

<?php }else{
		 ?>
		 <!-- if the cart is completely empty, then this code should run -->

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


<script src="../javascript/cart.js"></script>
</body>
</html>