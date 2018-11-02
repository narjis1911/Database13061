<?php 


DEFINE ('DB_USER', 'narjis');
DEFINE ('DB_PASSWORD','narjis123');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'loginsystem');


	session_start();
	$db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


	// initialize variables
	$SHOPNAME = "";
	$ADDRESS = "";
	$CONTACT = "";
	$CONTACTNUM = "";
	$AREA = "";
	$COORDINATES = "";
	

	$id = 0;
	$update = false;
#insert data
	if (isset($_POST['saveCUST'])) {

		$id = $_POST['id'];
		$SHOPNAME = $_POST['name'];
		$ADDRESS = $_POST['address'];
		$CONTACT = $_POST['contact'];
		$CONTACTNUM = $_POST['contactnum'];
		$AREA = $_POST['area'];
		$COORDINATES = $_POST['coordinates'];
		



		mysqli_query($db, "INSERT INTO customer
			VALUES ('$id','$SHOPNAME', '$ADDRESS', '$CONTACT', '$CONTACTNUM', '$AREA', 
			'$COORDINATES')"); 
		$_SESSION['message'] = "ADDED"; 
		header('location: infoCUST.php');
	}
	#update

	if (isset($_POST['updateCUST'])) {
		$id = $_POST['id'];
		$SHOPNAME = $_POST['name'];
		$ADDRESS = $_POST['address'];
		$CONTACT = $_POST['contact'];
		$CONTACTNUM = $_POST['contactnum'];
		$AREA = $_POST['area'];
		$COORDINATES = $_POST['coordinates'];
		


		mysqli_query($db, "UPDATE customer SET SHOPNAME = '$SHOPNAME', ADDRESS = '$ADDRESS', CONTACT = '$CONTACT', CONTACTNUM = '$CONTACTNUM', AREA = '$AREA', COORDINATES = '$COORDINATES' WHERE id=$id");
		$_SESSION['message'] = "EDITED"; 
		header('location: infoCUST.php');
	}
#delete
if (isset($_GET['delCUST'])) {
	$id = $_GET['delCUST'];
	mysqli_query($db, "DELETE FROM customer WHERE id=$id");
	$_SESSION['message'] = "REMOVED"; 
	header('location: infoCUST.php');
}


	$results = mysqli_query($db, "SELECT * FROM customer");



?>
