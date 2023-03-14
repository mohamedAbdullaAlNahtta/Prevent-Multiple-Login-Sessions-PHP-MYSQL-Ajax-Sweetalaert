<?php 
session_start();
error_reporting(0);
include("include/config.php");

$username = $_GET['username'];
$token = $_GET['token'];



$result =mysqli_query($connection,"SELECT * FROM `login-sessions` WHERE `username`='".$username."' AND `token`='".$token."' AND `loginOut` IS NULL");

$num_row=mysqli_num_rows($result);

if ($num_row>0) {
	echo"valid";
}else{
	echo "not valid";

} 




?>