<?php
$email_address = "vaatepfive@gmail.com";
$email_password = "vaatepfive123";
// Create connection
$con=mysqli_connect("localhost","root","","vaatepfive");

// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }/*else{
    echo "Connection is established";
  }*/
?>