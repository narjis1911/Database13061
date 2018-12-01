<?php
	include('conn.php');
	if(isset($_POST['edit'])){
		$id=$_POST['id']; /////// ID
		$QUANTITY=$_POST['QUANTITY'];
		$DISCOUNT=$_POST['DISCOUNT'];
		mysqli_query($conn,"UPDATE INVOICE13061 SET QUANTITY='$QUANTITY', DISCOUNT='$DISCOUNT' WHERE id ='$id'"); /////////
	}
?>
