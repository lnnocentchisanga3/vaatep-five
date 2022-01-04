<?php
include("dbconnection.php");

$num = $_GET['cnum'];
$childid = $_GET['number'];

$sql = "UPDATE weight SET weight='$num' WHERE childs_number='$childid'";
$query = mysqli_query($con,$sql);

if ($query) {
	echo '<div class="bg-green col-md-4 py-2">Weight updated successfully</div>';
}else{
	echo '<div class="bg-red col-md-4 py-2">Opps! an error occoured please try again</div>';
}


?>