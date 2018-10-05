<?php 


DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'loginsystem');


	session_start();
	$db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	// initialize variables
	
	$username = "";
	$ContactNum = "";
	$CustList = "";
	
	

	$id = 0;
	$update = false;
#insert data
	if (isset($_POST['saveSALES'])) {

		$id = $_POST['id'];
		$username = $_POST['username'];
		$ContactNum = $_POST['ContactNum'];
		$CustList = $_POST['CustList'];
		
		



		mysqli_query($db, "INSERT INTO salesperson
			VALUES ('$id','$username', '$ContactNum', '$CustList')"); 
		$_SESSION['message'] = "ADDED"; 
		header('location: infoSALES.php');
	}
	#update

	if (isset($_POST['updateSALES'])) {
		$id = $_POST['id'];
		$username = $_POST['username'];
		$ContactNum = $_POST['ContactNum'];
		$CustList = $_POST['CustList'];


		mysqli_query($db, "UPDATE salesperson SET username = '$username', ContactNum = '$ContactNum', CustList = '$CustList' WHERE id=$id");
		$_SESSION['message'] = "EDITED"; 
		header('location: infoSALES.php');
	}
#delete
if (isset($_GET['delSALES'])) {
	$id = $_GET['delSALES'];
	mysqli_query($db, "DELETE FROM salesperson WHERE id=$id");
	$_SESSION['message'] = "REMOVED"; 
	header('location: infoSALES.php');
}


	$results = mysqli_query($db, "SELECT * FROM salesperson");


?>