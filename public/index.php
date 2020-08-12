<?php
$db = mysqli_connect("localhost", "root", "", "ecommerce") or die (mysqli_error($db));
$select = mysqli_query($db, "SELECT * FROM product_category") or die(mysqli_error($db));

?>
<!DOCTYPE html>
<html>
<head>
	<title>Public Page</title>
	<link rel="stylesheet" type="text/css" href="../css/index.css">
</head>
<body>

	<div class="container">
	
		
		<div class="header">
			<ul>
				<li><a href="index.php">Home</a></li>
			<li><a href="../merchants/merchantsignup.php">Sell on Joomla</a></li>
			
			<li><a href="../customers/customer_form.php">Account</a></li>
			<li><a href="../customers/customer_form.php">Help</a></li>
			<li><a href="cart.php">Cart</a></li>
		</ul>
		</div>
<!-- 
main image on the webpage -->
<div class="bigimage">
	<img  class="mainimage" src="../images/mainimage.jpg">
	
</div>

<!-- small icons and text with them -->
<div class="advert">
	<div class="ad">
		<div class="adverts"><img class="icons" src="../images/jumiaglobal.png"><p style="text-align: center; color: white; padding-top: 10px; margin-bottom: 40px;">Delivery</p></div>
		<div class="adverts"><img class="icons" src="../images/payments2.png"><p style="text-align: center; color: white; padding-top: 10px; margin-bottom: 40px;">Payments</p></div>
		<div class="adverts"><img class="icons" src="../images/customerservice.png"><p style="text-align: center; color: white; padding-top: 10px; margin-bottom: 40px;">Help Line</p></div>
		<div class="adverts"> <img class="icons" src="../images/promotion-image.jpg"><p style="text-align: center; color: white; padding-top: 10px; margin-bottom: 40px;">Deals</p></div>
	</div>
</div>

<!-- welcome text -->
<div>
		<h1 style="text-align: center; font-family: Amazon Ember,Arial,sans-serif; margin-top: 30px; font-size: 80px;color: /*#2F4F4F*/ 	#708090;">Welcome to Joomla.com</h1>
	
</div>

<div>
		
		<p style="text-align: center; color:#708090; margin-top: 20px; font-size: 30px;">We ship products around the world</p>
</div>


<!-- images according to categories -->
<?php while($product = mysqli_fetch_array($select)) { ?>
 		<div class="small"> 
		 <!-- doing it this way with this hyperlink will redirect to another page displaying
		  all the products no matter which category they pick -->
			 <a href="viewproducts.php?id=<?php echo $product[0]; ?>">
			 <img src="../images/index/<?php echo $product[1] . ".jpg" ;?>" width="150" height="250">
			 <div class="textcontainer"><div class="boxtext" style="left: 10px; right: 10px;">
			<span><?php echo $product[1]; ?></span>
		</div>
		</div>
		</a>
		</div>
 			
	 <?php } ?>


</div>

</body>
</html>