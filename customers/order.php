<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
<?php 



if(isset($_POST['Add'])){
	header('location:addtocart.php');
}

if(isset($_POST['Buy'])){
	header('location:Checkout.php');
}

// $insert = mysqli_query($db, "INSERT INTO orders VALUES(NULL, '".$quantity."', NOW(), )")



?>

	<form action="" method="">

		<input type="submit" name="Add" value="Add">
		<input type="submit" name="Buy" value="Buy">
	</form>

</body>
</html>