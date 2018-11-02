<?php 
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD','');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'loginsystem');


	session_start();
	$db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	 $output = '';  
	 $result = mysqli_query($connect, $sql);  
     $output .= '
     <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="10%">id</th>  
                     <th width="40%"></th>  
                     <th width="40%">customerID</th>  
                     <th width="40%">productID</th>  
                     
                </tr>';  


 ?>