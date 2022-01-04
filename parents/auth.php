<?php
session_start();
if (isset($_SESSION[child_number])) {
	header("location: index.php?page=dashboard");
}else{
	header("location: ../parentlogin.php");
}

?>