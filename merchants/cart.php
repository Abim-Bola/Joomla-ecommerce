<?php
if(isset($_POST['Add'])){
		if(isset($_SESSION['cart']))
		{
			$item_array_id = array_column($_SESSION['cart'], "product_id");
			if(!in_array($_GET['product_id'], $item_array_id))
			{
				$count = count($_SESSION['cart']);
				$item = array(
				'product_id' => $GET['product_id'],
				'name'=> $_POST['hidden_name'],
				'price' => $_POST['hidden_price'],
				'quantity'	=> $_POST['quanity']
			);
				$SESSION['cart'][$count] = $item;


			}
			else
			{
				echo'<p>Item Already Added</p>';

			}

		} else
		{
			$item = array(
				'product_id' => $GET['product_id'],
				'product_name'=> $_POST['hidden_name'],
				'hidden_price' => $_POST['hidden_price'],
				'quantity'	=> $_POST['quantity']
			);
			$_SESSION['cart'][0] = $item;

		}

	
}

if(isset($_SESSION['cart'])){
	$total = 0;
	foreach($_SESSION['cart']as $keys => $values){
		echo $values['product_name'];
		echo $values['price'];

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
