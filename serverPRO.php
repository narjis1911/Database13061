<?php 


DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'loginsystem');


	session_start();
	$db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	// initialize variables
	$id = "";
	$brand = "";
	$type = "";
	$shade = "";
	$size = "";
	$salesprice = "";
	

	$id = 0;
	$update = false;
#insert data
	if (isset($_POST['savepro'])) {

		$id = $_POST['id'];
	$brand  = $_POST['brand'];
		$type = $_POST['type'];
		$shade = $_POST['shade'];
		$size = $_POST['size'];
		$salesprice = $_POST['salesprice'];
	
		



		mysqli_query($db, "INSERT INTO products
			VALUES ('$id ','$brand ','$type' ,'$shade ','$size' ,'$salesprice')"); 
		$_SESSION['message'] = "ADDED"; 
		header('location: infopro.php');
	}
	#update

	if (isset($_POST['updatepro'])) {
		
		$id = $_POST['id'];
	$brand  = $_POST['brand'];
		$type = $_POST['type'];
		$shade = $_POST['shade'];
		$size = $_POST['size'];
		$salesprice = $_POST['salesprice'];
		


		mysqli_query($db, "UPDATE products SET brand ='$brand ',type='$type' ,shade='$shade ',size='$size' ,salesprice='$salesprice' WHERE id=$id");
		$_SESSION['message'] = "EDITED"; 
		header('location: infopro.php');
	}
#delete
if (isset($_GET['delpro'])) {
	$id = $_GET['delpro'];
	mysqli_query($db, "DELETE FROM products WHERE id=$id");
	$_SESSION['message'] = "REMOVED"; 
	header('location: infopro.php');
}


	$results = mysqli_query($db, "SELECT * FROM products");


?>