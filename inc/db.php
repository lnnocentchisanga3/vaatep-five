<?php
// Create connection
$conn=mysqli_connect("localhost","root","","vaatepfive");

// Check connection
if (mysqli_connect_error($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }/*else{
    echo "DB Connected";
  }*/
?>