<?php 


DEFINE ('DB_USER', 'narjis');
DEFINE ('DB_PASSWORD', 'narjis123');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'loginsystem');


	session_start();
	$db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	// initialize variables
	
	$password = "";
	$active = "";
	$salesperson = "";
	
	

	$id = 0;
	$update = false;
#insert data
	if (isset($_POST['saveUSERS'])) 
	{

		$id = $_POST['id'];
		$password = $_POST['password'];
		$active = $_POST['active'];
		$salesperson = $_POST['salesperson'];
		
			mysqli_query($db, "INSERT INTO users
				VALUES ('$id','$password', '$active', '$salesperson')"); 
			$_SESSION['message'] = "ADDED"; 
			header('location: infoUSERS.php');
		}
		
		
	#update

	if (isset($_POST['updateUSERS'])) {
		$id = $_POST['id'];
		$password = $_POST['password'];
		$active = $_POST['active'];
		$salesperson = $_POST['salesperson'];


		mysqli_query($db, "UPDATE users SET password = '$password', active = '$active', salesperson = '$salesperson' WHERE id=$id");
		$_SESSION['message'] = "EDITED"; 
		header('location: infoUSERS.php');
	}
#delete
if (isset($_GET['delUSERS'])) {
	$id = $_GET['delUSERS'];
	mysqli_query($db, "DELETE FROM users WHERE id=$id");
	$_SESSION['message'] = "REMOVED"; 
	header('location: infoUSERS.php');
}


	$results = mysqli_query($db, "SELECT * FROM users");


?>
