<?php
include('../db/ecomconfig.php');
 session_start();

$merchant_id = $_SESSION['merchant_id'];
 $username = $_SESSION['username'];


?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/uploadproducts.css">
	<title>Product Upload</title>
</head>
<body>
	<?php
	
	if(isset($_POST['submit'])){
		$error = array(); 

		$max_size = 40000000;

	$extention = array("image/jpg", "image/jpeg","image/png");

	if(empty($_FILES['img'])){

			$error['img'] = "Cannot be empty";
		} elseif ($_FILES['img']['size'] > $max_size){

			$error['img']= "File too large";

		} elseif(!in_array($_FILES['img']['type'], $extention)){
			$error['img'] = "File type not supported";
		} else{
			$filename = $_FILES['img']['name'];
			$destination = '../publicimages/images' . $filename;
			move_uploaded_file($_FILES['img']['tmp_name'], $destination);
		}


		if(empty($_POST['name'])){
			$error['name'] = "*";
		} else{
			$name = mysqli_real_escape_string($db, $_POST['name']);
		}


		if(empty($_POST['description'])){
			$error['description'] = "*";
		} else{
			$description = mysqli_real_escape_string($db, $_POST['description']);
		}

		if(empty($_POST['price'])){
			$error['price'] = "*";
		} else{
			$price = mysqli_real_escape_string($db, $_POST['price']);
		}

		if(empty($_POST['category'])){
			$error['category'] = "*";
		} else{
			$category = mysqli_real_escape_string($db, $_POST['category']);
		}


 var_dump($error);
if(empty($error)){
	$upload = mysqli_query($db, "INSERT INTO product_upload VALUES(NULL, 
		                                                           '".$name."',
		                                                           '".$description."',
		                                                           '".$price."',
		                                                           '".$category."',
		                                                           '".$destination."',
		                                                          NOW(),
		                                                           '".$merchant_id."'
		                                                           )") or die (mysqli_error($db));

	echo "<p> Successfully Uploaded </p>";


}


}

	?>

		
<div class="header">
				<ul>
					<li><a href="../public/index.php">Home</a></li>
					<li><a href="../merchants/merchantsignup.php">Sell on Joomla</a></li>
					<li><a href="uploadproducts.php">Upload Products</a></li>
					<li><a href="../customers/customer_form.php">Account</a></li>
					<li><a href="../customers/customer_form.php">Help</a></li>
					<li><a href="">Cart</a></li>
				</ul>
</div>

<div class="container">

<div class="uploadimage">
			<img src="../images/uploadimage.png" width="500" height= "500">
</div>

<div class="body">

	<h4 class= "text">Upload Products</h4>
	<p class= "text">Upload products anywhere and anytime</p>


	<form action="" method="post" enctype="multipart/form-data"><br>
		<input class="input" type="text" name="name" placeholder="Name of Product"><br>
		<input class="input" type="text" name="description" placeholder="Description"><br>
		<input class="input" type="number" name="price" placeholder="Price"><br>
		<select  class= "select" name="category"><option value="">Category</option>
			<?php 
			$option = mysqli_query($db, "SELECT * FROM product_category") or die(mysqli_error($db));

			while($category = mysqli_fetch_array($option)) { ?>

				<option value="<?php echo $category['category_id'] ?>"><?php echo ucfirst($category['category_name']) ?></option>
			}

			<?php } ?>
			
			</select><br>


		
		<input class="browse" type="file" name="img"><br>
		<input  class="upload" type="submit" name="submit" value="Upload">

		
	</form>
</div>

</div>


</body>
</html>