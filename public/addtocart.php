<?php
include('../db/ecomconfig.php');
session_start();
$merchant_id = $_SESSION['merchant_id'];
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
	<title></thitle>
</head>
<body>

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