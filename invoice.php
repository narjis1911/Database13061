<!DOCTYPE html>
<html>
<head>
	<title></title>
	<div id="live_data"></div>

</head>
<body>

</body>
</html>
<?php 
      function fetch_data()  

      {  
           $.ajax({  
                url:"select.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           }); 
      } 


 ?>