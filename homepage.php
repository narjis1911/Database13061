<?php include('server.php'); 
session_start();
//if user is not logged in they cant access thiis page
if (!isset($_SESSION['id'])) {
  # code...
  $_SESSION['message']= "You need to log in first";
  header('location: userlogin.php');
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Home Page</title>
  <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="homepagestyle.css">

</head>
<body>
   
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
    <!--user logged in home page-->
    
    <?php if (isset($_SESSION['id'])):  ?>
      <p>Welcome <strong><?php  ; ?></strong></p>
    <table>

    <tr>
        <div align="center" style="margin: 20px">
        <p><a href="homepage.php?logout='1' " style="color: red;" >Logout</a></p>
    <?php endif ?>

      <?php if (isset($_SESSION['id'])):?>
        <p><a href="infoCUST.php"  style="color: green" >Customer</a></p>
        
      <?php endif ?>


    <?php if (isset($_SESSION['id'])):?>
      <p><a href="infopro.php" style="color: green" >Products</a></p>



    <?php endif ?>

    <?php if (isset($_SESSION['id'])):?>
      <p><a href="infoSALES.php" style="color: green" >Sales Person</a></p>



    <?php endif ?>

    <?php if (isset($_SESSION['id'])):?>
      <p><a href="infoUSERS.php" style="color: green" >Users</a></p>



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

     </div>
    </tr>
    
    
    </table> 
   
 </body>

   

</html>

