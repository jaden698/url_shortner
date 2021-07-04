<?php
  $conn=mysqli_connect("localhost","root","","urlshortner");

  if(!$conn){
      echo "Database connection error".mysqli_connect_error();
  }
  

?>