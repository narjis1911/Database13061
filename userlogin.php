
<!DOCTYPE html>

<html>
<link rel="stylesheet" type="text/css" href="temp.html">
<head>
	<title>User Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="main.css">
	<link rel="stylesheet" type="text/css" href="main.js">
		

</head>
<body>
<div align="center" style="margin: 10px">
	<a class="navbar-brand" href="" align ='center'>The Shelbys</a>
</div>


	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="post" action="userlogin.php">
					<span class="login100-form-title">
						Sign In
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
						<input class="input100" type="text" name="id" placeholder="Username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Please enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
					</div>

					<br/ >

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="login">
							Sign in
						</button>
					</div>
					<br/ >
				</form>
			</div>
		</div>
	</div>

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

 		?>
				<!DOCTYPE html>
				<html>
				<head>
					<title><strong></strong></title>
				</head>
				<body>
				<div align="center" style="margin: 10px">

				<strong><?php echo "user id/password is required"; ?></strong>
				</div>
				</body>
				</html>
				
<?php 
 		
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
			 			$_SESSION['success'] = "";
			 			header('location: homepage.php '); //redirect to homepage 

			}else {
				 	?>
				<!DOCTYPE html>
				<html>
				<head>
					<title></title>
				</head>
				<body>
				<div align="center" style="margin: 10px">

				<strong><?php echo "wrong id/password combination"; ?></strong>
				</div>
				</body>
				</html>
				
<?php 
        			

        		
      
			  	
					 	
				  } 			
		}
	}

}



 ?>
 