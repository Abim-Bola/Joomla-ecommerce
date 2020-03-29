<?php

		session_start();
		include('../db/ecomconfig.php');

		$select = mysqli_query($db, "SELECT * FROM product_upload WHERE category_id = 2 ")
?>




<!DOCTYPE html>
<html>
<head>
	<title>View Electronics</title>
</head>
<body>


	<table border="0">
		<tr>
			<th>Item Name</th>
			<th>Description</th>
			<th>Price</th>
			<th>Image</th>
		</tr>

		<tr>
			<?php while ($r = mysqli_fetch_array($select)) { ?>
				<td><?php echo $r[1]?></td>
				<td><?php echo $r[2]?></td>
				<td><?php echo $r[3]?></td>
				<td>
				<a href="details.php?id=<?php echo $r[0]; ?>"><img src="../publicimages/<?php echo $r[5] ?>" width="150" height="150"/></a>
			</td>
		</tr>
		<?php } ?>
	</table>

</body>
</html>