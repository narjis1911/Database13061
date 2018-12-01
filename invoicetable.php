<?php
	include('conn.php');
	if(isset($_POST['show'])){
		?>
		<table class = "table table-bordered alert-warning table-hover">
			<thead>
				<th>CID</th>
				<th>SHOP NAME</th>
				<th>ADDRESS</th>
				<th>CUSTOMER NAME</th>
				<th>CONTACT NUM</th>
				<th>AREA</th>
				<th>COORDINATES</th>
			</thead>
				<tbody>
					<?php
						$quser=mysqli_query($conn,'SELECT * FROM customer');
						while($urow=mysqli_fetch_array($quser)){
							?>
								<tr>
									<td><?php echo $urow['CID']; ?></td>
									<td><?php echo $urow['SHOPNAME']; ?></td>
									<td><?php echo $urow['ADDRESS']; ?></td>
									<td><?php echo $urow['CONTACT']; ?></td>
									<td><?php echo $urow['CONTACTNUM']; ?></td>
									<td><?php echo $urow['AREA']; ?></td>
									<td><?php echo $urow['COORDINATES']; ?></td>
									<td style = "width: 210px"><button class="btn btn-success" data-toggle="modal" data-target="#edit<?php echo $urow['CID']; ?>"><span class = "glyphicon glyphicon-pencil"></span> Edit</button> | <button class="btn btn-danger delete" value="<?php echo $urow['CID']; ?>"><span class = "glyphicon glyphicon-trash"></span> Delete</button>
									<?php include('edit_modal.php'); ?>
									</td>
								</tr>
							<?php
						}
					
					?>
				</tbody>
			</table>
		<?php
	}

?>
