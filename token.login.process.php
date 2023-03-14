<?php
session_start();
error_reporting(0);


include("include/config.php");

$username = $_SESSION['username'];
$password = $_SESSION['password'];
$token = $_SESSION['token'];

$result =mysqli_query($connection,"UPDATE `login-sessions` SET `loginOut` = NOW() WHERE `login-sessions`.`username`='".$_SESSION['username']."' AND `token`!='".$token."';");

if ($result) {
	header("location:index.php");
}else{
	header("location:logout.php");
}

?>


