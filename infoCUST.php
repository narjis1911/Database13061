<?php 
include('serverCUST.php');
if (!isset($_SESSION['id'])) {
	# code...
	$_SESSION['message']= "You need to log in first";
	header('location: userlogin.php');
}
//edit func
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM customer WHERE id=$id");

		while ($row = mysqli_fetch_array($record))
		{
			$id = $row[0];
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
	<link rel="stylesheet" type="text/css" href="stylePRO.css">
</head>
<body>
	<?php if (isset($_SESSION['message'])): ?>
		<div class="msg">
			<?php 
				echo $_SESSION['message']; 
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>

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
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['SHOPNAME']; ?></td>
			<td><?php echo $row['ADDRESS']; ?></td>
			<td><?php echo $row['CONTACT']; ?></td>
			<td><?php echo $row['CONTACTNUM']; ?></td>
			<td><?php echo $row['AREA']; ?></td>
			<td><?php echo $row['COORDINATES']; ?></td>
			
			<td>
				<a href="infoCUST.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			
				<a href="serverCUST.php?delCUST=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	


<form method="post" action="serverCUST.php" >

	<input type="hidden" name="id" value="<?php echo $id; ?>">
	<div class="input-group">

	<div class="input-group">
		<label>ID</label>
		<input type="text" name="id" value="<?php echo $id; ?>">
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