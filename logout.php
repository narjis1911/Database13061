<?php 
      if (isset($_GET['logout'])) {
        # code...
        session_destroy();
        unset($_SESSION['id']);
        header("location: homepage.php");
      }
     ?>