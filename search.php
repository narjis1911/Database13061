<?php
	include('conn.php');
	if(isset($_POST['searchprod'])){
		$PID=$_POST['PID']; //PID=POST[PID]
		$query = mysqli_query($conn, "SELECT * FROM products WHERE PID = '$PID'");
		$row = mysqli_fetch_array($query);
		echo json_encode($row);
	}
	else if(isset($_POST['search'])){
		$CID=$_POST['CID'];
		$query = mysqli_query($conn, "SELECT * FROM customer WHERE CID = '$CID'");
		$row = mysqli_fetch_array($query);
		echo json_encode($row);
	}
?>

