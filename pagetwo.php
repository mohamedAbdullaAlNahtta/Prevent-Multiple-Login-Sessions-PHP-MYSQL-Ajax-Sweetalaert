<?php
session_start();
error_reporting(0);


include("include/config.php");


if ($_SESSION['username'] === NULL) {
  header("location:logout.php");
}
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$token = $_SESSION['token'];



$reso=mysqli_query($connection,"SELECT * FROM `login-sessions` WHERE `username`='".$username."' AND `loginOut` IS NULL");

$num_rows =mysqli_num_rows($reso);

if ($num_rows >1) {
header("location:process.php");
} 

$result =mysqli_query($connection,"SELECT * FROM `login-sessions` WHERE `username`='".$username."' AND `token`='".$token."' AND `loginOut` IS NULL");

$num=mysqli_num_rows($result);

if ($num===0) {
header("location:token.logout.process.php");
} 



?>
<!DOCTYPE html>
<html>
<head>
	<title>Page 2</title>
</head>
<body>

<center>
	<h1>Page 2</h1>
</center>
<br>
<center>
	<h1>
	<?php echo "Session for User Name : ".$username."<br>"; ?>		
	</h1>
	<p>
	<?php echo "Session for token : ".$token; ?>	
	</p>
</center>

<br>
<a href="index.php"> index page </a>
<br>
<a href="pageone.php">page one</a>
<br>
<a href="pagetwo.php">page two</a>
<br>
<a href="pagethree.php">page three</a>

<script type="text/javascript">
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
<script>
function sessionValidationCheckOnTime() {
var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        if (this.responseText==="not valid") {
        	location.replace("token.logout.process.php")
        }else{
        	console.log('session still Valid');
        }
      }
    };
    xmlhttp.open("GET", "ajax.token.php?token=<?php echo $token; ?>&username=<?php echo $username;?>", true);
    xmlhttp.send();
}

setInterval(function(){
    sessionValidationCheckOnTime()
}, 9000)
</script>

</body>
</html>