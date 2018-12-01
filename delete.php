<?php
	include('conn.php');
	if(isset($_POST['del'])){
		$id=$_POST['id'];
		mysqli_query($conn,"delete from INVOICE13061 where INVOICEID='$id'");
		mysqli_query($conn,"delete from INVOICEHEADER where INVOICEID='$id'");
	}
	else if(isset($_POST['delitem'])){
		$id=$_POST['id'];
		mysqli_query($conn,"delete from INVOICE13061 where ID='$id'");
	}
?>
