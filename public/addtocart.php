<?php
include('../db/ecomconfig.php');
session_start();
$customer_id = $_SESSION['customer_id'];
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
	<title></thitle>
</head>
<body>
<?php 
	//initialize the error message variable
	$message = "";
	$product = mqsli_query($db, "SELECT * FROM product_upload WHERE product_id = 'product_id')


?>


	<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<?php echo $cart_count; ?></span></a>
<?php
}
?>

</body>
</html>