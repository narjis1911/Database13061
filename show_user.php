<?php
	include('conn.php');
	if(isset($_POST['show'])){
		?>
		
		<table class = "table table-bordered alert-warning table-hover">
			<thead>
				<th>INVOICE ID</th>
				<th>DATE(YYYY-MM-DD)</th>
				<th>CUSTOMER ID</th>
				<th>ADDRESS</th>
				<th>CUSTOMER NAME</th>
				
				<th>AREA</th>
				<th>COORDINATES</th>
				<th>ACTIONS</th>
			</thead>
				<tbody>
					<?php
					$CID = $_POST['CID'];
					$INVOICEID = $_POST['INVOICEID'];
					if($CID != "" || $INVOICEID != "" || $INVOICEID != 'NOT ASSIGNED'){
					$qinv = mysqli_query($conn, "SELECT * FROM INVOICEHEADER WHERE INVOICEID = '$INVOICEID'");
					$invrow = mysqli_fetch_array($qinv);
					if($invrow != NULL){
						$quser=mysqli_query($conn,"SELECT * FROM customer WHERE CID = '$CID'");
						$urow=mysqli_fetch_array($quser);
							?>
								<tr>
									<td><?php echo $invrow['INVOICEID'];?> </td>
									<td><?php echo $invrow['DATE'];?> </td>
									<td><?php echo $invrow['CID'];?> </td>
									<td><?php echo $urow['ADDRESS']; ?></td>
									<td><?php echo $urow['CONTACT']; ?></td>
									<td><?php echo $urow['AREA']; ?></td>
									<td><?php echo $urow['COORDINATES']; ?></td>
									<td > <button class="btn btn-danger delete" value="<?php echo $invrow['INVOICEID']; ?>"><span class = "glyphicon glyphicon-trash"></span> Delete</button>
									
									</td>
								</tr>
							<?php } }?>
				</tbody>
			</table>
			<center><h2 class = "text-primary">INVOICE</h2></center>
			<hr>

					<table class = "table table-bordered alert-warning table-hover">
			<thead>
				<th>ID</th>
				<th>INVOICE ID</th>
				<th>PRODUCT</th>
				<th>SALES PRICE</th>
				<th>QUANTITY</th>
				<th>DISCOUNT(%)</th>
				<th>TOTAL</th>
			</thead>
				<tbody>
					<?php
						$quser=mysqli_query($conn,"SELECT I.ID, I.INVOICEID, P.brand, P.salesprice, I.QUANTITY, I.DISCOUNT, (100-I.DISCOUNT)/100*(I.QUANTITY*P.salesprice)  AS TOTAL FROM INVOICE13061 I, products P WHERE I.INVOICEID = '$INVOICEID' AND I.PID = P.PID");  // ///CAST(....AS INT)
						while($urow=mysqli_fetch_array($quser)){
							?>
								<tr>
									<td><?php echo $urow['ID']; ?></td>
									<td><?php echo $urow['INVOICEID']; ?></td>
									<td><?php echo $urow['brand']; ?></td>
									<td><?php echo $urow['salesprice']; ?></td>
									<td><?php echo $urow['QUANTITY']; ?></td>
									<td><?php echo $urow['DISCOUNT']; ?></td>
									<td><?php echo $urow['TOTAL']; ?></td>
									<td style = "width: 210px"><button class="btn btn-success" data-toggle="modal" data-target="#edit<?php echo $urow['ID']; ?>"><span class = "glyphicon glyphicon-pencil"></span> Edit</button> | <button class="btn btn-danger deleteitem" value="<?php echo $urow['ID']; ?>"><span class = "glyphicon glyphicon-trash"></span> Delete</button>
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
