<?php 
include('serverPRO.php');
if (!isset($_SESSION['id'])) {
	# code...
	$_SESSION['message']= "";
	header('location: userlogin.php');
}  
//edit func
	if (isset($_GET['edit'])) {
		$PID = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM products WHERE PID=$PID");

		 while ($row = mysqli_fetch_array($record))
		{
			$PID = $row[0];
			$brand = $row[1];
			$type = $row[2];
			$shade =$row[3];
			$size =  $row[4];
			$salesprice = $row[5];

			
			
		}

	}  
?>
<!DOCTYPE html>
<html>
<head>
	<title> PRODUCTS MySQL </title>
	
	<link rel="stylesheet" type="text/css" href="styleHOME.css">
  <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="homepage.js"></script>

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    

</head>
<body>
	 <div id="background">
    <img src="stalen.jpg" class="stretch" alt="" />
</div>

	<?php if (isset($_SESSION['message'])): ?>
		<div class="msg">
			<?php 
				echo $_SESSION['message']; 
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>
<nav >
                <div >
                  <div class="navbar-head">
                      <h5>THE SHELBYS</h5>

                    </div>


                    <ul class="nav navbar-nav">
     
      <div class="topnav">
       <a  class ="" href="homepage.php" >Home</a>
      <li><a class="w3-bar-item w3-button" href='infoUSERS.php' title='Users'>Users</a></li>
      <li ><a class="w3-bar-item w3-button" href='infoSALES.php' title='Sales Persons'>Sales Persons</a></li>
      <li ><a class="w3-bar-item w3-button" href='infopro.php' title='Products'>Products</a></li>
      <li ><a class="w3-bar-item w3-button" href='infoCUST.php' title='Customers'>Customers</a></li>    
       <li><a class="w3-bar-item w3-button" href='index.php' title='invoice'>Invoice</a></li>
      <div class="topnav-right">
     <p> <a class="w3-bar-item w3-button w3-right" id='topnavbtn_examples' href="homepage.php?logout='1'" onclick='w3_open_nav("logout")' title='Logout'>Logout </a></p>
</div>
</div>

</ul>
</div>
</nav>

</div>

<?php $results = mysqli_query($db, "SELECT * FROM products"); ?>

<table>
	<thead>
		<tr>

			<h3>  PRODUCTS </h3>


			<th>PID</th>
			<th>BRAND</th>
			<th>TYPE</th>
			<th>SHADE</th>
			<th>SIZE</th>
			<th>SALES PRICE</th>
					
			<th>ACTIONS</th>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['PID']; ?></td>
			<td><?php echo $row['brand']; ?></td>
			<td><?php echo $row['type']; ?></td>
			<td><?php echo $row['shade']; ?></td>
			<td><?php echo $row['size']; ?></td>
			<td><?php echo $row['salesprice']; ?></td>
			
			
			<td>
				<a href="infopro.php?edit=<?php echo $row['PID']; ?>" class="edit_btn" >Edit</a>
			
				<a href="infopro.php?delpro=<?php echo $row['PID']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	


<form method="post" action="serverPRO.php" >

	<input type="hidden" name="PID" value="<?php echo $PID; ?>">
	<div class="input-group">

	<div class="input-group">
		<label>PID</label>
		<input type="text" name="PID" value="<?php echo $PID; ?>">
	</div>	

	<div class="input-group">
		<label>BRAND</label>
		<input type="text" name="brand" value="<?php echo $brand; ?>">
	</div>

	<div class="input-group">
		<label>TYPE</label>
		<input type="text" name="type" value="<?php echo $type; ?>">
	</div>

	<div class="input-group">
		<label>SHADE</label>
		<input type="text" name="shade" value="<?php echo $shade; ?>">
	</div>

	<div class="input-group">
		<label>SIZE</label>
		<input type="text" name="size" value="<?php echo $size; ?>">
	</div>

	<div class="input-group">
		<label>SALESPRICE</label>
		<input type="text" name="salesprice" value="<?php echo $salesprice; ?>">
	</div>

	


	<div class="input-group">

		<?php if ($update == true): ?>
			<button class="btn" type="submit" name="updatepro" style="background: #556B2F;" >Edit</button>
		<?php else: ?>
			<button class="btn" type="submit" name="savepro" >Add</button>
		<?php endif ?>
	</div>
</form>
</body>
</html>