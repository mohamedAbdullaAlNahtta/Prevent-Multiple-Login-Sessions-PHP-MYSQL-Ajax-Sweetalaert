<?php 

session_start();
error_reporting(0);

include("include/config.php");

$username = $_SESSION['username'];
$password = $_SESSION['password'];
$token = $_SESSION['token'];
$sql = "UPDATE `login-sessions` SET `loginOut` = NOW() WHERE `login-sessions`.`username`='".$_SESSION['username']."'AND `login-sessions`.`loginOut` IS NULL AND `token`='".$token."';";
$res=mysqli_multi_query($connection,$sql);

$_SESSION['username']=="";
$_SESSION['password']=="";
$_SESSION['token']=="";

$errormsg=$_SESSION['errormsg'];
session_destroy();
session_unset();

session_start();
error_reporting(0);
$_SESSION['errormsg']=$errormsg;

?>
<!DOCTYPE html>
<html>
<head>
	<title> Login Process </title>
	<!--alerts CSS -->
      <link id="csssweetalert" href="sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php 
//nitiate session
session_start();
error_reporting(0);

?>

<div class="sweet-overlay" tabindex="-1" style="opacity: 1.04; display: block;"></div>
<div
    class="sweet-alert showSweetAlert visible"
    data-custom-class=""
    data-has-cancel-button="false"
    data-has-confirm-button="true"
    data-allow-outside-click="false"
    data-has-done-function="false"
    data-animation="pop"
    data-timer="null"
    id="cancel-login"
    style="display: block; margin-top: -175px;"
>
    <div class="sa-icon sa-error animateErrorIcon" style="display: block;">
        <span class="sa-x-mark animateXMark">
            <span class="sa-line sa-left"></span>
            <span class="sa-line sa-right"></span>
        </span>
    </div>


    <h2>Cancel</h2>
    <p style="display: block;">logging in Process Ended</p>
    <div class="sa-error-container">
        <div class="icon">!</div>
        <p>Not valid!</p>
    </div>
    <div class="sa-button-container">
        <button class="cancel" tabindex="2" style="display: none; box-shadow: none;">Cancel</button>
        <div class="sa-confirm-button-container">
            <form action="login.php"  method="post">  
	            <button onclick="window.location.replace("login.php");" class="confirm" tabindex="1" style="display: inline-block; background-color: rgb(3, 38, 3); box-shadow: rgba(3, 38, 3, 0.8) 0px 0px 2px, rgba(0, 0, 0, 0.05) 0px 0px 0px 1px inset;">Thanks</button>
	        </form>    
            <div class="la-ball-fall">
            </div>
        </div>
    </div>
</div>

<!-- reset form values after refresh  -->
<script type="text/javascript">
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

</body>

</html>