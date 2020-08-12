<?php
session_start();
include('../db/ecomconfig.php');

  // unset($_SESSION['shopping_cart']); 

$fash = mysqli_query($db, "SELECT * FROM product_upload WHERE category_id = 5 ") or die(mysqli_error($error));
?>


<!DOCTYPE html>
<html>
<head>
	<title>View Fashion</title>
	<link rel="stylesheet" type="text/css" href="../css/view_fashion.css">
	
</head>
<body>
	<?php 

	//initialize the error message variable
	$message = "";
	//if the product key is present, and it does not bring an empty error message it should run the code below
	if(isset($_POST['product_id']) && $_POST['product_id'] != "") {
		$product_id = $_POST['product_id'];

		//if the product id is present and the add to cart is clicked, it should fetch information about that product from the db.
		$fetch_product = mysqli_query($db, "SELECT * FROM product_upload WHERE product_id = '$product_id' ") or die(mysqli_error($db));

		//put all the fetched data into variables

		$product = mysqli_fetch_array($fetch_product);
        $product_name = $product['product_name'];
		$product_id = $product['product_id'];
		$price = $product['price'];
		$image = $product['image_path'];

		//put all the information about the product that was fetched into an array and into another variable.
		$cart_array = array($product_id => array('product_id' => $product_id, 'product_name' => $product_name, 'price'=> $price, 'image_path' => $image ));

		//we move to the initialization of the sessioncart

		if(empty($_SESSION['shopping_cart'])) {
			$_SESSION['shopping_cart'] = $cart_array;
			 echo $message = "<p>Product added to cart</p>";
		} else {
			//this code puts all the keys in an array into the variable
			$array_keys = array_keys($_SESSION['shopping_cart']);
			//checks if the product has already been added to the session cart
			if(in_array($product_id, $array_keys)){

			echo $message = "<p>product already added to cart</p>";
		}else{
			//if the product has already been added to the cart, then merge the previous cart and the new product array that has now been added.
			$_SESSION['shopping_cart'] = array_merge($_SESSION['shopping_cart'], $cart_array);
			echo $message = "<p>product added to cart</p>";
		}
	 }

	}


if(isset($_POST['Buy'])){

	if(isset($_SESSION['customer_id'])){
		header('location:order.php');
	} else {
		header('location:../customers/customer_login.php');
	}
	
}


?>
 <?php echo $message ?> 



<div class="container2">
				
	<div class="header">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="../merchants/merchantsignup.php">Sell on Joomla</a></li>
					<li><a href="../customers/customer_form.php">Account</a></li>
					<li><a href="../customers/customer_form.php">Help</a></li>
					<li><a href="cart.php">Cart</a></li>
				</ul>
	</div>


<div class= "container">

	<?php
	// fetching data from the db to display on the page

	while($fashion = mysqli_fetch_array($fash)) { ?>
		
		<div class="product">
			<form action="" method="post">
			<input type="hidden" name="id" value="<?php $fashion['product_id'] ?>">
			<img  class= "body" src="<?php echo $fashion['image_path'] ?>" width="200" height="200">
			<p  class= "body" ><?php echo $fashion['product_name']; ?></p>
			<p class= "body" ><?php echo  "N" . $fashion['price']; ?></p>
			<input class= "button"  type="submit" name="product_id" value="Add to Cart">
			<input class= "button" type="submit" name="Buy" value="Buy">
			</form> 
		</div>

<?php } ?>

<?php unset($_SESSION['shopping_cart']); ?>
 


</div>


</body>
</html>