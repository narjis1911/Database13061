 <?php

	DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD','');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'loginsystem');


	$db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	
	
 $errors= array();
 

 #logout
 if (isset($_GET['logout'])) {
 	session_destroy();
 	unset($_SESSION['id']);
 	header('location: userlogin.php');
 }


 ?>