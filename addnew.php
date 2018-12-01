<?php
	include('conn.php');
	if(isset($_POST['add'])){
		$INVOICEID=$_POST['INVOICEID'];
		$DATE=$_POST['DATE'];
		$CID=$_POST['CID'];
						
		if(!mysqli_query($conn,"insert into INVOICEHEADER values ('$INVOICEID', '$DATE','$CID')"))
			echo 'Failed to add. Make sure INVOICE ID is unique';
	}
	else if(isset($_POST['additem'])){
		$INVOICEID=$_POST['INVOICEID'];
		$PID=$_POST['PID'];
		$QUANTITY=$_POST['QUANTITY'];
		$DISCOUNT=$_POST['DISCOUNT'];
						
		if(!mysqli_query($conn,"insert into INVOICE13061(INVOICEID,PID,QUANTITY,DISCOUNT) values ('$INVOICEID', '$PID','$QUANTITY','$DISCOUNT')"))
			echo "Failed to add.";
	}
?>
