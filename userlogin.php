
<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header"> 
		<h2>Login</h2>

	</div>
	<form method="post" action="userlogin.php">
		<!-- display validation errors here -->
		<div class="input-group">
			<label>User ID</label>
			<input type="text" name="id">

		</div> 
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">

		</div>
	
		<div class="input-group">
			<button type="submit" name="login" class="btn">Login</button>
		</div>
		
			 

	</form>

</body>
</html>


<?php 
session_start();
include('server.php');
$id= "";
$password="";
$salesperson = "";
 if (isset($_POST['login'])) {
 	$id=$_POST['id'];
 	$password = $_POST['password'];
 
 	if (empty($id)) {
 		echo "user id/password is required";
 	}
 	else
 	{
		if(count($errors)==0)
		{

			$query= "SELECT * FROM users WHERE id='$id' AND password='$password'";
			$results = mysqli_query($db, $query);
			if (mysqli_num_rows($results) ==1) 
			{
					 	# log user in
						$_SESSION['id'] = $id;
			 			$_SESSION['success'] = "You are now logged in";
			 			header('location: homepage.php '); //redirect to homepage 

			}else {
			  	echo "wrong id/password combination";
					 	
				  } 			
		}
	}

}









 ?>
 