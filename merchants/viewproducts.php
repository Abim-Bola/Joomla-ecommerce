<?php
include('../db/ecomconfig.php');
session_start();
$merchant_id = $_SESSION['merchant_id'];
$username = $_SESSION['username'];

?>


<!DOCTYPE html>
<html>
<head>
	<title>View Fashion</title>
	<link rel="stylesheet" type="text/css" href="../css/viewproducts.css">
	
</head>
<body>
	<?php 

//     $status ="";
// 	if(isset($_POST['product_id']) && $_POST['product_id'] != ""){
// 	$product_id = $_POST['product_id'];

// 	$result = mysqli_query($db, "SELECT * FROM product_upload WHERE 'product_id' = $product_id");

// 	$row = mysqli_fetch_assoc($result);
// 		$name = $_POST['product_name'];
// 		$price = $_POST['price'];
// 		$product_id = $_POST['product_id'];
// 		$image = $_POST['image_path'];

// 		$cart_array = array(
// 			$product_id => array(
// 				'product_name' => $name,
// 				'product_id' => $product_id,
// 				'price' => $price,
// 				'image_path' => $image,
// 				'quantity' => 1 )
// 		);

// 		if(isset($_SESSION['shopping_cart'])) {

// 			$_SESSION['shopping_cart'] = $cart_array;

// 			$status = "ADDED";


// 		} else{
// 			$array_key = array_keys($_SESSION['shopping_cart']);

// 		if(in_array($product_id, $array_key)){
// 			$status = "Already added to cart";
// 		} else{
// 			$_SESSION['shopping_cart'] = array_merge($_SESSION['shopping_cart'], $cart_array);
// 			$status = "Product is added";
// 		}



//     }
// }


	//FOR PAGINATION ---- GET CURRENT PAGE NUMBER
		// if(isset($_GET['page_no']) && $_GET['page_no'] != ""){
		// 	$page_no = $_GET['page_no'];
		// }	else {
		// 	$page_no = 1;
		// }

		// //SET TOTAL RECORDS PER PAGE
		// $total_records_per_page = 10;

		// //CALCULATE OFFSET VALUE AND SET OTHER VARIABLES
		// $offset = ($page_no - 1) * $total_records_per_page;
		// $previous_page = $page_no - 1;
		// $next_page = $page_no + 1;
		// // $adjacents = "2";

		// //GET THE TOTAL NUMBER OF PAGES FOR PAGINATION
		// $result_count = mysqli_query($db, "SELECT COUNT(*) AS total_records FROM product_upload WHERE category_id = 5") or die(mysqli_error($db));

		// $total_records = mysqli_fetch_array($result_count);
	
		// $total_records = $total_records['total_records'];
		// $total_no_of_pages = ceil($total_records / $total_records_per_page);
		// $second_last = $total_no_of_pages;

		// //SQL QUERY FOR FETCHING LIMITED RECORDS USING LIMIT CLAUSE AND OFFSET
		// $select = mysqli_query($db, "SELECT * FROM product_upload WHERE category_id = 5 ORDER BY created_time DESC LIMIT $offset, $total_records_per_page ")
		// 	or die(mysqli_error($db));

		// mysqli_close($db);


// if(isset($_POST['Buy'])){

// 	if(isset($_SESSION['customer_id'])){
// 		header('location:order.php');
// 	} else {
// 		header('location:../customers/customer_login.php');
// 	}
	
// }


?>


	
<div class="container2">
				
	<div class="header">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="../merchants/merchantsignup.php">Sell on Joomla</a></li>
					<!-- <li><a href="">Category</a></li> -->
					<li><a href="../customers/customer_form.php">Account</a></li>
					<li><a href="../customers/customer_form.php">Help</a></li>
					<li><a href="cart.php">Cart</a></li>
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
	$select = mysqli_query($db, "SELECT * FROM product_upload WHERE merchant_id = $merchant_id  ") or die (mysqli_error($db));

	while($products = mysqli_fetch_array($select)) { ?>

	
	
	<form action="" method="post">
		
		
			<div class="picture">
		<img  class= "body" src="<?php echo $products['image_path'] ?>" width="200" height="200">
		<p  class= "body" ><?php echo $products['product_name']; ?></p>
		<p class= "body" ><?php echo  "N" . $products['price']; ?></p>
		 <!-- <select class= "body"  name="quantity"><option value="">Quantity</option>
			<?php for($i = 1; $i<100; $i++) {?>
			<option value="<?php echo $i?>"> <?php echo $i ?></option>
		<?php } ?>
	</select> -->
		<!-- <input class= "button"  type="submit" name="Add" value="Add to Cart">
		<input class= "button" type="submit" name="Buy" value="Buy">  -->
	</div>
	
	</form>



<?php } ?>

</div>


</body>
</html>