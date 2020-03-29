<?php

	session_start();
	include('../db/ecomconfig.php');

	$select = mysqli_query($db, "SELECT * FROM product_upload WHERE category_id = 3 ") or die (mysqli_error($db));


?>



<!DOCTYPE html>
<html>
<head>
	<title>View Automobile</title>
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
				<?php while($row = mysqli_fetch_array($select)) { ?>
					<td><?php $row[1] ?></td>
					<td><?php $row[2] ?></td>
					<td><?php $row[3] ?></td>
					<td>
						<img src="../publicimages/<?php echo $row[5] ?>" width="150" height="150"/>
					</td>

			</tr>
		<?php } ?>
		</table>


</body>
</html>