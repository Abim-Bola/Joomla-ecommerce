<?php 

	function authenticate_admin(){
		if(empty($_SESSION['admin_name']) && empty($_SESSION['admin_id'] )){
			header("location:admin_login.php");
		}
	}


	function authenticate_merchant(){
		if(empty($_SESSION['merchant_username']) && empty($_SESSION['merchant_id'])){
			header("location:merchant_login.php");
		}
	}

	function authenticate_customer(){
		if(empty($_SESSION['customer_username']) && empty($_SESSION['customer_id'])){
			header("location:customer_login.php");
		}
	}
 ?>