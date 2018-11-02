 <?php
	define('host', 'localhost');
	define('user', 'narjis');
	define('password', 'narjis123');
	define('dbname','loginsystem');
	
	
	$db= mysqli_connect('localhost','root','','loginsystem');
	
 $errors= array();
 

 #logout
 if (isset($_GET['logout'])) {
 	session_destroy();
 	unset($_SESSION['id']);
 	header('location: userlogin.php');
 }


 ?>
