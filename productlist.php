<?php
	include('conn.php');
	$sql = "SELECT * FROM products";
	$result = mysqli_query($conn, $sql);
	echo "<label>PRODUCT</label>";
	echo "<select type = 'text' id = 'searchinvid' class = 'form-control' name='PRODUCT'>";
	echo "<option value= ''>SELECT PRODUCT</option>";
	while ($row = mysqli_fetch_array($result)) {
	echo "<option value='" . $row['PID'] ."'>" . $row['brand'] ."</option>";
	}
	echo "</select>";
?>



