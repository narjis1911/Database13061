<?php 
include('serverSALES.php');
if (!isset($_SESSION['id'])) {
	# code...
	$_SESSION['message']= "";
	header('location: userlogin.php');
}
if (isset($_SESSION['id'])) {
	# code...
	if($id = 'id'){
	$active = true;
}
    else {
	$active=false;
}
}

//edit func
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM salesperson WHERE id=$id");

		while ($row = mysqli_fetch_array($record))
		{
			$id = $row[0];
			$username = $row[1];
			$ContactNum = $row[2];
			$CustList = $row[3];
			
		}

	}  
?>
<!DOCTYPE html>
<html>
<head>
	<title> SALESPERSON MySQL </title>
	<link rel="stylesheet" type="text/css" href="stylePRO.css">
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
      
      <div class="topnav-right">
     <p> <a class="w3-bar-item w3-button w3-right" id='topnavbtn_examples' href="homepage.php?logout='1'" onclick='w3_open_nav("logout")' title='Logout'>Logout </a></p>
</div>
</div>

</ul>
</div>
</nav>

</div>


<?php $results = mysqli_query($db, "SELECT * FROM salesperson"); ?>

<table>
	<thead>
		<tr>

			<h3> SALESPERSON  </h3>


			<th>ID</th>
			<th>USERNAME</th>
			
			<th>CONTACT NUMBER</th>
			<th>CUSTOMERS ASSIGNED</th>
			<th>ACTIONS</th>
	
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['username']; ?></td>
			<td><?php echo $row['ContactNum']; ?></td>
			<td><?php echo $row['CustList']; ?></td>

			
			<td>
				<a href="infoSALES.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			
				<a href="serverSALES.php?delSALES=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	


<form method="post" action="serverSALES.php" >

	<input type="hidden" name="id" value="<?php echo $id; ?>">
	<div class="input-group">

	<div class="input-group">
		<label>ID</label>
		<input type="text" name="id" value="<?php echo $id; ?>">
	</div>	

	<div class="input-group">
		<label>username</label>
		<input type="text" name="username" value="<?php echo $username; ?>">
	</div>

	<div class="input-group">
		<label>Contact Number</label>
		<input type="text" name="ContactNum" value="<?php echo $ContactNum; ?>">
	</div>

	<div class="input-group">
		<label>Customers Assigned</label>
		<input type="text" name="CustList" value="<?php echo $CustList; ?>">
	</div>

	

	<div class="input-group">

		<?php if ($update == true): ?>
			<button class="btn" type="submit" name="updateSALES" style="background: #556B2F;" >Edit</button>
		<?php else: ?>
			<button class="btn" type="submit" name="saveSALES" >Add</button>
		<?php endif ?>
	</div>
</form>
</body>
</html>