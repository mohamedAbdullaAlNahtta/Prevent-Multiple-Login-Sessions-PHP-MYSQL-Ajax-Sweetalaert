<?php
session_start();
error_reporting(0);

include("include/config.php");

$username = $_SESSION['username'];
$password = $_SESSION['password'];
$token = $_SESSION['token'];
$sql = "UPDATE `login-sessions` SET `loginOut` = NOW() WHERE `login-sessions`.`username`='".$_SESSION['username']."'AND `login-sessions`.`token`='".$token."' AND `login-sessions`.`loginOut` IS NULL;";
$res=mysqli_multi_query($connection,$sql);

$_SESSION['username']=="";
$_SESSION['password']=="";
$_SESSION['token']=="";
$_SESSION['errormsg']="";

$errormsg=$_SESSION['errormsg'];
session_destroy();
session_unset();

session_start();
error_reporting(0);
$_SESSION['errormsg']=$errormsg;

header("location:login.php");

?>
