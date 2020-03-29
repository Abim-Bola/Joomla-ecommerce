<?php

	session_start();
	include("../db/ecomconfig.php");

	$select = mysqli_query($db, "SELECT * FROM product_upload WHERE category_id = 1")

?>

<!DOCTYPE html>
<html>
<head>
	<title>View Furniture</title>
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
				<?php  while ($row = mysqli_fetch_array($select)) { ?>
				<td><?php echo $row[1]  ?></td>
				<td><?php echo $row[2] ?></td>
				<td><?php echo $row[3] ?></td>
				<td>
					<img src="../publicimages/<?php echo $row[5] ?>" width="150" height="150"/>
				</td>
			</tr>
		<?php } ?>
		</table>

</body>
</html>