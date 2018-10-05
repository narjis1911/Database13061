 <?php
	define('host', 'localhost');
	define('user', 'root');
	define('password', '');
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