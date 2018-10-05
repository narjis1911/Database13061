<?php 
include('serverSALES.php');
if (!isset($_SESSION['id'])) {
	# code...
	$_SESSION['message']= "You need to log in first";
	header('location: userlogin.php');
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