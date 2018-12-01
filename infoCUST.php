<?php 
include('serverCUST.php');
if (!isset($_SESSION['id'])) {
	# code...
	
	header('location: userlogin.php');
}

$output='';


//edit func
	if (isset($_GET['edit'])) {
		$CID = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM customer WHERE CID=$CID");

		while ($row = mysqli_fetch_array($record))
		{

			$CID = $row[0];
			$SHOPNAME = $row[1];
			$ADDRESS = $row[2];
			$CONTACT = $row[3];
			$CONTACTNUM = $row[4];
			$AREA  = $row[5];
			$COORDINATES  = $row[6]; 
			
			
		}

	}  
?>
<!DOCTYPE html>
<html>
<head>
	<title> CUSTOMER MySQL </title>
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


	<div id= "live_data"></div>
	
	
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

<?php $results = mysqli_query($db, "SELECT * FROM customer"); ?>

<table>
	<thead>
		<tr>

			<h3> CUSTOMER DATABASE </h3>


			<th>SHOP ID</th>
			<th>SHOP NAME</th>
			<th>ADDRESS</th>
			<th>CONTACT</th>
			<th>CONTACT NUMBER</th>
			<th>AREA</th>
			<th>COORDINATES</th>			
			<th>ACTIONS</th>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['CID']; ?></td>
			<td><?php echo $row['SHOPNAME']; ?></td>
			<td><?php echo $row['ADDRESS']; ?></td>
			<td><?php echo $row['CONTACT']; ?></td>
			<td><?php echo $row['CONTACTNUM']; ?></td>
			<td><?php echo $row['AREA']; ?></td>
			<td><?php echo $row['COORDINATES']; ?></td>
			
			<td>
				<a href="infoCUST.php?edit=<?php echo $row['CID']; ?>" class="edit_btn" >Edit</a>
			
				<a href="serverCUST.php?delCUST=<?php echo $row['CID']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	


<form method="post" action="serverCUST.php" >

	<input type="hidden" name="CID" value="<?php echo $CID; ?>">
	<div class="input-group">

	<div class="input-group">
		<label>ID</label>
		<input type="text" name="CID" value="<?php echo $CID; ?>">
	</div>	

	<div class="input-group">
		<label>SHOP NAME</label>
		<input type="text" name="name" value="<?php echo $SHOPNAME; ?>">
	</div>

	<div class="input-group">
		<label>SHOP ADDRESS</label>
		<input type="text" name="address" value="<?php echo $ADDRESS; ?>">
	</div>

	<div class="input-group">
		<label>CONTACT PERSON</label>
		<input type="text" name="contact" value="<?php echo $CONTACT; ?>">
	</div>

	<div class="input-group">
		<label>CONTACT NUMBER</label>
		<input type="text" name="contactnum" value="<?php echo $CONTACTNUM; ?>">
	</div>

	<div class="input-group">
		<label>AREA</label>
		<input type="text" name="area" value="<?php echo $AREA; ?>">
	</div>

	<div class="input-group">
		<label>COORDINATES</label>
		<input type="text" name="coordinates" value="<?php echo $COORDINATES; ?>">
	</div>


	<div class="input-group">

		<?php if ($update == true): ?>
			<button class="btn" type="submit" name="updateCUST" style="background: #556B2F;" >Edit</button>
		<?php else: ?>
			<button class="btn" type="submit" name="saveCUST" >Add</button>
		<?php endif ?>
	</div>
</form>
</body>
</html>