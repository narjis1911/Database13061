<?php
	include('conn.php');
	$CID = $_POST['searchid'];
	$sql = "SELECT * FROM INVOICEHEADER WHERE CID = '$CID'";
	$result = mysqli_query($conn, $sql);
	echo "<label>INVOICE ID</label>";
	echo "<select type = 'text' id = 'searchinvid' class = 'form-control' name='CUSTOMER ID'>";
	echo "<option value= ''>SELECT INVOICE</option>";
	while ($row = mysqli_fetch_array($result)) {
	echo "<option value='" . $row['INVOICEID'] ."'>" . $row['INVOICEID'] ."</option>";
	}
	echo "</select>";
?>


