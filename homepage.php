<?php include('server.php'); 

session_start();
//if user is not logged in they cant access thiis page
if (!isset($_SESSION['id'])) {
  # code...
 
  header('location: userlogin.php');
}


?>

<!DOCTYPE html>
<html>
<head>
  <title>Home Page</title>
  <link rel="stylesheet" type="text/css" href="styleHOME.css">
  <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="homepage.js"></script>

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    

</head>
<body >
  <div id="background">
    <img src="stalen.jpg" class="stretch" alt="" />
</div>

  <link rel="stylesheet" type="text/css" href="styleHOME.css">
   <div id="live_data"></div>

    <div class="content">
      <?php if (isset($_SESSION['success'])): ?>
      <div class="error success">
      <h3>
        <?php 
          echo $_SESSION['success'];
          unset($_SESSION['success']);
        ?>

      </h3>
      </div>

      <?php endif ?>

      <?php if (isset($_SESSION['id'])):?>

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
  
      <?php endif  ?>
    
      
      <div class="topnav-right">
     <p> <a class="w3-bar-item w3-button w3-right" id='topnavbtn_examples' align="right" href="homepage.php?logout='1'" onclick='w3_open_nav("logout")' title='Logout'>Logout </a></p>
</div>
</div>

</ul>
</div>
</nav>

</div>
    <!--user logged in home page-->
    <div class="navbar-head" style="padding-top: 10%"  >
    <?php if (isset($_SESSION['id'])):  ?>
      
      <h4>Welcome Back!<?php  ; ?> </h4> 
    </div>
    <table>

    <tr>
    
        <?php endif ?>

    <?php 
      if (isset($_GET['logout'])) {
        # code...
        session_destroy();
        unset($_SESSION['id']);
        header("location: homepage.php");
      }
     ?>

    </div> 

    
    </tr>
    
    
    </table> 
   
 </body>

   

</html>

