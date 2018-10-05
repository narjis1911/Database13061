<?php 
include('serverPRO.php');
if (!isset($_SESSION['id'])) {
	# code...
	$_SESSION['message']= "You need to log in first";
	header('location: userlogin.php');
}
//edit func
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM products WHERE id=$id");

		while ($row = mysqli_fetch_array($record))
		{
			$id = $row[0];
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

<?php $results = mysqli_query($db, "SELECT * FROM products"); ?>

<table>
	<thead>
		<tr>

			<h3> PRODUCTS DATABASE </h3>


			<th>ID</th>
			<th>BRAND</th>
			<th>TYPE</th>
			<th>SHADE</th>
			<th>SIZE</th>
			<th>SALES PRICE</th>
					
			<th>ACTIONS</th>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['brand']; ?></td>
			<td><?php echo $row['type']; ?></td>
			<td><?php echo $row['shade']; ?></td>
			<td><?php echo $row['size']; ?></td>
			<td><?php echo $row['salesprice']; ?></td>
			
			
			<td>
				<a href="infopro.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			
				<a href="infopro.php?delpro=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	


<form method="post" action="serverPRO.php" >

	<input type="hidden" name="id" value="<?php echo $id; ?>">
	<div class="input-group">

	<div class="input-group">
		<label>ID</label>
		<input type="text" name="id" value="<?php echo $id; ?>">
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