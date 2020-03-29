<?php  


	session_start();
	include('../db/ecomconfig.php');

	$delete = mysqli_query($db, "DELETE FROM cart WHERE cart_id = '$_POST[cartid]'") or die (mysqli_error($db));

	header("location:viewcart.php")

?>