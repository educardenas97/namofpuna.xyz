<?php
$conexion = mysqli_connect("localhost","u713209196_namo","educardenas97","u713209196_namofpuna");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }else{
      echo "<script>alert('test')</script>";
  }
?>