<?php
session_start();
error_reporting(0);


include("include/config.php");

$username = $_SESSION['username'];
$password = $_SESSION['password'];
$token = $_SESSION['token'];

echo $token."<br>";

if (isset($_POST['please_login'])) {
	$sql = "UPDATE `login-sessions` SET `loginOut` = NOW() WHERE `login-sessions`.`username`='".$_SESSION['username']."'AND `login-sessions`.`loginOut` IS NULL;";
	$sql.="INSERT INTO `login-sessions` ( `username`, `token`, `loginTme`) VALUES ('".$_SESSION['username']."', '$token', NOW())";
	$res=mysqli_multi_query($connection,$sql);
	header("location:index.php");
	
}


$reso=mysqli_query($connection,"SELECT * FROM `login-sessions` WHERE `username`='$username' AND `token`='$token' AND `loginOut` IS NULL");

$numo=mysqli_fetch_array($reso);

if ($numo<=0) {
  header("location:process.php");
  $_SESSION['errormsg']="Your Account is Already logged in from else where";
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>index</title>
</head>
<body>

<center><h1>Page one</h1></center>
<br>
<center><h1>
<?php

echo "Session for User Name : ".$username;

?>	
</h1></center>

<br>
<a href="index.php"> index page </a>
<br>
<a href="pageone.php">page one</a>
<br>
<a href="pagetwo.php">page two</a>
<br>
<a href="pagethree.php">page three</a>

</body>
</html>