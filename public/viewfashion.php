<?php
include('../db/ecomconfig.php');


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

    $status ="";
	if(isset($_POST['product_id']) && $_POST['product_id'] != ""){
	$product_id = $_POST['product_id'];

	$result = mysqli_query($db, "SELECT * FROM product_upload WHERE 'product_id' = $product_id");

	$row = mysqli_fetch_assoc($result);
		$name = $_POST['product_name'];
		$price = $_POST['price'];
		$product_id = $_POST['product_id'];
		$image = $_POST['image_path'];

		$cart_array = array(
			$product_id => array(
				'product_name' => $name,
				'product_id' => $product_id,
				'price' => $price,
				'image_path' => $image,
				'quantity' => 1 )
		);

		if(isset($_SESSION['shopping_cart'])) {

			$_SESSION['shopping_cart'] = $cart_array;

			$status = "ADDED";


		} else{
			$array_key = array_keys($_SESSION['shopping_cart']);

		if(in_array($product_id, $array_key)){
			$status = "Already added to cart";
		} else{
			$_SESSION['shopping_cart'] = array_merge($_SESSION['shopping_cart'], $cart_array);
			$status = "Product is added";
		}



    }
}

if(isset($_POST['Buy'])){

	if(isset($_SESSION['customer_id'])){
		header('location:checkout.php');
	} else {
		header('location:customer_login.php');
	}
	
}


	?>

<div class="container2">
				
	<div class="header">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="../merchants/merchantsignup.php">Sell on Joomla</a></li>
					<li><a href="">Category</a></li>
					<li><a href="../customers/customer_form.php">Account</a></li>
					<li><a href="../customers/customer_form.php">Help</a></li>
					<li><a href="">Cart</a></li>
				</ul>
	</div>


<!-- <div class="main-header">
			<div class="bigimage">
				<img src="../images/fashion/bigimage.jpg" width="700" height="400">
			</div>
            
			<div class="smallimage">
					<p><img src="../images/fashion/smallimage1.jpg" width="150" height="200"></p>
			 	<img src="../images/fashion/smallimage2.jpg" width="250" height="200"> 
        	</div>
</div> -->


<div class= "container">

	<?php

	while($fashion = mysqli_fetch_array($fash)) { ?>

	
	
	<form action="" method="post">
		
		
			<div class="picture">
		<img  class= "body" src="<?php echo $fashion['image_path'] ?>" width="200" height="200">
		<p  class= "body" ><?php echo $fashion['product_name']; ?></p>
		<p class= "body" ><?php echo  "N" . $fashion['price']; ?></p>
		 <select class= "body"  name="quantity"><option value="">Quantity</option>
			<?php for($i = 1; $i<100; $i++) {?>
			<option value="<?php echo $i?>"> <?php echo $i ?></option>
		<?php } ?>
	</select>
		<input class= "body"  type="submit" name="Add" value="Add to Cart">
		<input class= "body" type="submit" name="Buy" value="Buy"> 
	</div>
	
	</form>

<?php } ?>
</div>


</body>
</html>