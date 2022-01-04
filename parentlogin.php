
<?php
session_start();
error_reporting(0);
include("dbconnection.php");
$dt = date("Y-m-d");
$tim = date("H:i:s");

if(isset($_SESSION[child_number]))
{
	echo "<script>window.location='./parents/auth.php';</script>";
}
$err='';
if(isset($_POST[submit]))
{
	$sql = "SELECT * FROM child_account WHERE child_number='$_POST[loginid]' AND password='$_POST[password]' AND status='Active'";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_num_rows($qsql) >= 1)
	{
		$rslogin = mysqli_fetch_array($qsql);
		$_SESSION[child_number]= $rslogin[child_number] ;
		echo "<script>window.location='./parents/auth.php';</script>";
	}
	else
	{
		$err = "<div class='alert alert-danger'>
		<strong>Oh !</strong> Change a few things up and try submitting again.
	</div>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title>Chipokota Health Clinic - Admin</title>
<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

<link rel="shortcut icon" href="images/icon.png" type="image/x-icon">
<link rel="icon" href="images/icon.png" type="image/x-icon">
<!-- Custom Css -->
<link href="assets/css/main.css" rel="stylesheet">
<link href="assets/css/login.css" rel="stylesheet">

<!-- Swift Themes. You can choose a theme from css/themes instead of get all themes -->
<link href="assets/css/themes/all-themes.css" rel="stylesheet" />
</head>
<body class="theme-blue login-page authentication">
<!-- header section -->



<div class="container">
	<div id = "err"><?php echo $err;
	
?></div>
    <div class="card-top"></div>
    <div class="card">
        <h1 class="title"><span>Chipokota Health Clinic</span>Login <span class="msg" id="greetings"></span></h1>
        <div class="col-md-12">

    <form method="post" action="" name="frmadminlogin" id="sign_in" onSubmit="return validateform()">
    <div class="input-group"> <span class="input-group-addon"> <i class="zmdi zmdi-account"></i> </span>
                    <div class="form-line">
					<input type="text" name="loginid" id="loginid" class="form-control" placeholder="Child's number" /></div>
                </div>
                <div class="input-group"> <span class="input-group-addon"> <i class="zmdi zmdi-lock"></i> </span>
                    <div class="form-line">
					<input type="password" name="password" id="password" class="form-control"  placeholder="Password" /> </div>
                </div>
                <div>
                    <!-- <div class="">
                        <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                        <label for="rememberme">Remember Me</label>
                    </div> -->
                    <div class="text-center">
					<input type="submit" name="submit" id="submit" value="Login" class="btn btn-raised waves-effect g-bg-cyan" /></div>
                    <div class="text-center"> <a href="forgot-password.html">Forgot Password?</a></div>
                </div>
            </form>
        </div>
    </div>    
</div>
 <div class="clear"></div>
 <div class="theme-bg"></div>
  </div>
</div>
<script type="application/javascript">
var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

function validateform()
{
	if(document.frmpatlogin.loginid.value == "")
	{
		alert("Login ID should not be empty..");
		document.frmpatlogin.loginid.focus();
		return false;
	}
	else if(document.frmpatlogin.password.value == "")
	{
		alert("Password should not be empty..");
		document.frmpatlogin.password.focus();
		return false;
	}
	else if(document.frmpatlogin.password.value.length < 8)
	{
		alert("Password length should be more than 8 characters...");
		document.frmpatlogin.password.focus();
		return false;
	}
}


window.addEventListener('load',function(){
	var date = new Date();
	var hours = date.getHours();
	var min = date.getMinutes();

	var hrs = hours+":"+min;

	if (hrs < "12:00"){
		document.getElementById("greetings").innerHTML = "Good Morning, Parents";
	}else if (hrs >= "12:00" && hrs <= "18:00") {
		document.getElementById("greetings").innerHTML = "Good Afternoon, Parents";
	}else{
		document.getElementById("greetings").innerHTML = "Good Evening, Parents";
	}
});
	</script>