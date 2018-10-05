<?php 
include('serverUSERS.php');
if (!isset($_SESSION['id'])) {
	# code...
	$_SESSION['message']= "You need to log in first";
	header('location: userlogin.php');
}
//edit func
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM users WHERE id=$id");

		while ($row = mysqli_fetch_array($record))
		{
			$id = $row[0];
			$password = $row[1];
			$active = $row[2];
			$salesperson = $row[3];
			
		}

	}  
?>
<!DOCTYPE html>
<html>
<head>
	<title> USERS MySQL </title>
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

<?php $results = mysqli_query($db, "SELECT * FROM users"); ?>

<table>
	<thead>
		<tr>

			<h3> USERS  </h3>


			<th>ID</th>
			<th>PASSWORD</th>
			
			<th>ACTIVE</th>
			<th>SALES PERSON</th>
			<th>ACTIONS</th>
	
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['password']; ?></td>
			<td><?php echo $row['active']; ?></td>
			<td><?php echo $row['salesperson']; ?></td>

			
			<td>
				<a href="infoUSERS.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			
				<a href="serverUSERS.php?delUSERS=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	


<form method="post" action="serverUSERS.php" >

	<input type="hidden" name="id" value="<?php echo $id; ?>">
	<div class="input-group">

	<div class="input-group">
		<label>ID</label>
		<input type="text" name="id" value="<?php echo $id; ?>">
	</div>	

	<div class="input-group">
		<label>PASSWORD</label>
		<input type="text" name="password" value="<?php echo $password; ?>">
	</div>

	<div class="input-group">
		<label>ACTIVE</label>
		<input type="text" name="active" value="<?php echo $active; ?>">
	</div>

	<div class="input-group">
		<label>SALESPERSON</label>
		<input type="text" name="salesperson" value="<?php echo $salesperson; ?>">
	</div>

	

	<div class="input-group">

		<?php if ($update == true): ?>
			<button class="btn" type="submit" name="updateUSERS" style="background: #556B2F;" >Edit</button>
		<?php else: ?>
			<button class="btn" type="submit" name="saveUSERS" >Add</button>
		<?php endif ?>
	</div>
</form>
</body>
</html>