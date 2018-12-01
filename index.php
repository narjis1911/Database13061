<?php
	include('conn.php');
	session_start();
if (!isset($_SESSION['id'])) {
	# code...
	
	header('location: userlogin.php');
}
?>
<html lang = "en">
	<head>
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<title>INVOICE</title>

		
	<link rel="stylesheet" type="text/css" href="styleHOME.css">
  <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="homepage.js"></script>

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

	<div style="height:30px;"></div>
	<div class = "row">	
		<div class = "col-md-1">
		</div>
		<div class = "col-md-10 well">
			<div class="row">
                <div class="col-lg-12">
                    <center><h2 class = "text-primary">SELECT INVOICE</h2></center>
					<hr>
					<form  id = "invform" class = "form-horizontal">
						<div class = "form-group">
							<label>CUSTOMER ID</label>
							<?php
									$sql = "SELECT CID FROM customer";
									$result = mysqli_query($conn, $sql);
									echo "<select type = 'text' id = 'searchid' class = 'form-control'>";
									echo "<option value= ''>SELECT CUSTOMER</option>";
									while ($row = mysqli_fetch_array($result)) {
										echo "<option value='" . $row['CID'] ."'>" . $row['CID'] ."</option>";
									}
									echo "</select>";
							?>
						</div>
						<div class = "form-group">
							<div id = "searchinv"></div>
						</div>
					</form>
					<button class="btn btn-success" data-toggle="modal" data-target="#createinvoice"><span class = "glyphicon glyphicon-pencil"></span>ADD NEW INVOICE</button>
					<hr>
					
					<div id="userTable"></div>

					<button class="btn btn-success" id = "add1" data-toggle="modal" data-target="#addentry" disabled="true"><span class = "glyphicon glyphicon-pencil" ></span>ADD ITEM</button>


					<div class="modal fade" id="createinvoice" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
   						 <div class="modal-content">
						<div class = "modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<center><h3 class = "text-success modal-title">Create Invoice</h3></center>
					</div>
					<div class="modal-body">
					<form  id = "addform" class = "form-horizontal">
						<div class = "form-group">
							<label>INVOICE ID</label>
							<input type  = "text" id = "INVOICEID" class = "form-control">
						</div>
						<div class = "form-group">
							<label>DATE</label>
							<input type  = "date" id = "DATE" class = "form-control">
						</div>
						<div class = "form-group">
							<label>CUSTOMER ID</label>
							<input type  = "text" id = "CID" class = "form-control">
						</div>
						<div class = "form-group">
							<label>SHOP NAME</label>
							<input type  = "text" id = "SHOPNAME" class = "form-control" readonly>
						</div>
						<div class = "form-group">
							<label>ADDRESS</label>
							<input type  = "text" id = "ADDRESS" class = "form-control" readonly>
						</div>
						<div class = "form-group">
							<label>CUSTOMER NAME</label>
							<input type  = "text" id = "CONTACT" class = "form-control" readonly>
						</div>
						<div class = "form-group">
							<label>CONTACT NO.</label>
							<input type  = "text" id = "CONTACTNUM" class = "form-control" readonly>
						</div>
						
						<div class = "form-group">
							<label>AREA</label>
							<input type  = "text" id = "AREA" class = "form-control" readonly>
						</div>
						<div class = "form-group">
							<label>COORDINATES</label>
							<input type  = "text" id = "COORDINATES" class = "form-control" readonly>
						</div>

					</form>
					</div>
				<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal"><span class = "glyphicon glyphicon-remove"></span> Cancel</button> | <button type="button" class="btn btn-success" id="addnew"><span class = "glyphicon glyphicon-floppy-disk"></span> Save</button>
		</div>			
</div>
</div>
</div>
</div>
</div>
		<div class="modal fade" id="addentry" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog" role="document">
   						 <div class="modal-content">
						<div class = "modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<center><h3 class = "text-success modal-title">Add Entry</h3></center>
					</div>
					<div class="modal-body">
					<form  class = "form-horizontal">
						
						<div class = "form-group">
							<label>ITEM</label>
							<?php
									$sql = "SELECT * FROM products";
									$result = mysqli_query($conn, $sql);
									echo "<select type = 'text' id = 'PID' class = 'form-control' name='PRODUCT'>";
									echo "<option value= ''>SELECT PRODUCT</option>";
									while ($row = mysqli_fetch_array($result)) {
										echo "<option value='" . $row['PID'] ."'>" . $row['brand'] ."</option>";
									}
									echo "</select>";
							?>
						</div>
						<div class = "form-group">
							<label>QUANTITY</label>
							<input type  = "number" id = "QUANTITY" class = "form-control">
						</div>
						<div class = "form-group">
							<label>DISCOUNT</label>
							<input type  = "number" id = "DISCOUNT" value = '0' class = "form-control">
						</div>
						<div class = "form-group">
							<label>TOTAL</label>
							<input type  = "number" id = "TOTAL" class = "form-control" readonly>
						</div>
						<div class = "form-group">
							<label>TYPE</label>
							<input type  = "text" id = "type" class = "form-control" readonly>
						</div>
						<div class = "form-group">
							<label>SHADE</label>
							<input type  = "text" id = "shade" class = "form-control" readonly>
						</div>
						<div class = "form-group">
							<label>SIZE</label>
							<input type  = "text" id = "size" class = "form-control" readonly>
						</div>
						<div class = "form-group">
							<label>SALES PRICE</label>
							<input type  = "number" id = "salesprice" class = "form-control" readonly>
						</div>
						
					</form>
					</div>
				<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal"><span class = "glyphicon glyphicon-remove"></span> Cancel</button> | <button type="button" class="btn btn-success" id="additem"><span class = "glyphicon glyphicon-floppy-disk"></span> Save</button>
		</div>
				</div>
				</div><br>
			
		</div>
	</div>
</body>
<script src = "js/jquery-3.1.1.js"></script>	
<script src = "js/bootstrap.js"></script>

<script type = "text/javascript">
$(document).ready(function(){
		var salesprice = 0;
		$('#searchid').change(function(){
			if ($('#searchid').val() == "")
				$('#searchinvid').prop('disabled', true);
			else
			{
				$('#searchinvid').prop('disabled', false);
				showinvid();
			}
		});
		$('#searchinv').change(function(){
			if ($('#searchinvid').val() == "")
				$('#add1').prop('disabled', true);
			else
			{
				$('#add1').prop('disabled', false);
			}
			show();
		});

$('#QUANTITY').change(function(){
				var total = parseInt((100-$('#DISCOUNT').val())/100 * salesprice * $('#QUANTITY').val()); 
   				$('#total').val(total);
});

$('#DISCOUNT').change(function(){
				var total = parseInt((100-$('#DISCOUNT').val())/100 * salesprice * $('#QUANTITY').val()); 
   				$('#total').val(total);
});

$('#PID').change(function(){
			$PID = $('#PID').val();
   		
   		$.ajax({
   			type: "POST",
   			url: "search.php",
   			data: {
   				PID: $PID,
   				searchprod: 1,
   			},
   			
   			success: function(data)
   			{
   				var obj = JSON.parse(data);
   				$('#shade').val(obj.SHADE);
   				$('#type').val(obj.TYPE);
   				$('#size').val(obj.SIZE);
   				$('#salesprice').val(obj.SALESPRICE);
   				salesprice = parseInt(obj.SALESPRICE);
   			}
   		});
});

$('#CID').change(function(){
			$CID = $('#CID').val();
   		
   		$.ajax({
   			type: "POST",
   			url: "search.php",
   			data: {
   				CID: $CID,
   				search: 1,
   			},
   			
   			success: function(data)
   			{
   				var obj = JSON.parse(data);
   				
   				$('#SHOPNAME').val(obj.SHOPNAME);
   				$('#ADDRESS').val(obj.ADDRESS);
   				$('#CONTACT').val(obj.CONTACT);
   				$('#CONTACTNUM').val(obj.CONTACTNUM);
   				$('#AREA').val(obj.AREA);
   				$('#COORDINATES').val(obj.COORDINATES);
   			}
   		});
});

$(document).on('click', '#additem', function(){
			if ($('#PID').val()=="" || $('#QUANTITY').val()=="" || $('#QUANTITY').val()<=0 || $('#DISCOUNT').val()<0|| $('#DISCOUNT').val() == ''){
				alert('Please input data first');
			}
			else{
			$('#addentry').modal('hide');
			$('body').removeClass('modal-open');
			$('.modal-backdrop').remove();
			$PID=$('#PID').val();
			$QUANTITY=$("#QUANTITY").val();
			$DISCOUNT=$("#DISCOUNT").val();	
			$INVOICEID=$("#searchinvid").val();
			$('#additem').html('Adding..');
			$.ajax({
					type: "POST",
					url: "addnew.php",
					data: {
						PID: $PID,
						INVOICEID: $INVOICEID,
						QUANTITY: $QUANTITY,
						DISCOUNT: $DISCOUNT,
						additem: 1,
					},
					success: function(response){
						$obj = response;
						if($obj != "")
        					alert($obj);
						$('#additem').html('Add');
						show();
						
					}
				});
			}
		});


		//ADD NEW
		$(document).on('click', '#addnew', function(){
			if ($('#CID').val()=="" || $('#INVOICEID').val()=="" || isNaN(Date.parse($('#DATE').val()))){
				alert('Please input data first');
			}
			else{
			$('#createinvoice').modal('hide');
			$('body').removeClass('modal-open');
			$('.modal-backdrop').remove();
			$CID=$('#CID').val();
			$INVOICEID=$("#INVOICEID").val();
			$DATE=$("#DATE").val();	
			$('#addnew').html('Adding..');
			$.ajax({
					type: "POST",
					url: "addnew.php",
					data: {
						CID: $CID,
						INVOICEID: $INVOICEID,
						DATE: $DATE,
						add: 1,
					},
					success: function(response){
						$obj = response;
						if($obj != "")
        					alert($obj);
						$('#addnew').html('Add');
						showinvid();
						
					}
				});
			}
		});
		

		//DELETE
		$(document).on('click', '.delete', function(){
			$id=$(this).val();
			$(this).html('Deleting..');
				$.ajax({
					type: "POST",
					url: "delete.php",
					data: {
						id: $id, //CID: $CID,
						del: 1,
					},
					success: function(response){
						$obj = response;
						if($obj != "")
						{
        					alert($obj);
        					$(this).html('Delete');
						}
        				showinvid();
        				show();
					}
				});
		});

		$(document).on('click', '.deleteitem', function(){
			$id=$(this).val();
			$(this).html('Deleting..');
				$.ajax({
					type: "POST",
					url: "delete.php",
					data: {
						id: $id,
						delitem: 1,
					},
					success: function(response){
						$obj = response;
						if($obj != "")
						{
        					alert($obj);
        					$(this).html('Delete');
						}
        				show();
					}
				});
		});

		//UPDATE
		$(document).on('click', '.updateuser', function(){
			$uid=$(this).val();
			$('#edit'+$uid).modal('hide');
			$('body').removeClass('modal-open');
			$('.modal-backdrop').remove();
			$uQUANTITY=$('#uQUANTITY'+$uid).val(); 
			$uDISCOUNT=$('#uDISCOUNT'+$uid).val();
			$.ajax({
					type: "POST",
					url: "update.php",
					data: {
						id: $uid,
						QUANTITY: $uQUANTITY,
						DISCOUNT: $uDISCOUNT,
						edit: 1,
					},
					success: function(){
						show();
					}
				});
		});
	
	});
	
	function showinvid(){
		$searchid = $('#searchid').val();
		$.ajax({
			url: 'searchinvoice.php',
			type: 'POST',
			data:{
				searchid: $searchid,
			},
			success: function(response){
				$('#searchinv').html(response);
			}
		});
	}
	function show(){
		$CID=$('#searchid').val();
		$INVOICEID=$('#searchinvid').val();
		$.ajax({
			url: 'show_user.php',
			type: 'POST',
			data:{
				INVOICEID: $INVOICEID,
				CID: $CID,
				show: 1,
			},
			success: function(response){
				$('#userTable').html(response);
			}
		});
	}
	
</script>
<style type="text/css">
	#invform{

		padding: 20px 20px;
		border: 2px solid;
	}
/*
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: black;
}
*/
li {
    float: left;
}

li a {
    display: block;
    color: white !important;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none !important;
}

li a:hover:not(.active) {
    background-color: crimson;
}


.active {
    background-color: #0275d8;
}
.active:hover {
    background-color: whitesmoke;
    border-color: maroon;
}



</style>
</html>
