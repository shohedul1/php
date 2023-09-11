<?php
      $servername = "localhost";
      $username = "root";
      $password = "";

      $dbname = 'newssitedb';
  
      // Create connection
      $con = mysqli_connect($servername, $username, $password);
      $selectdb = mysqli_select_db($con, $dbname);
  
      // Check connection
    //   if (!$selectdb) {
    //       die("Connection failed: " . mysqli_connect_error());
    //   }else{

    //       echo "Connected ";
    //   }
?>