<!DOCTYPE html>
<html>
<head>
	<title> Login Process</title>
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
    data-has-cancel-button="true"
    data-has-confirm-button="true"
    data-allow-outside-click="false"
    data-has-done-function="true"
    data-animation="pop"
    data-timer="null"
    id="Choose"
    style="display: block; margin-top: -195px;width: 550px;"
>

    <div class="sa-icon sa-warning pulseWarning" style="display: block;">
        <span class="sa-body pulseWarningIns"></span>
        <span class="sa-dot pulseWarningIns"></span>
    </div>

    <h2>Are you sure?</h2>
    <p style="display: block;">Your Account Already Logged In from elsewhere With a different Token.!!! </p>
    <p style="display: block;"> Thanks for trusting US!</p>
    <p style="display: block;">Arabicss Software Development Team!</p>
    <fieldset>
        <input type="text" tabindex="3" placeholder="" />
        <div class="sa-input-error"></div>
    </fieldset>
    <div class="sa-button-container">
        <button id="No-cancel-Login" onclick="NoCancelLogin();" class="cancel" tabindex="2" style="display: inline-block;">No, cancel Login!</button>
        <div class="sa-confirm-button-container">
            <button id="Yes-Login-here-please" onclick="YesLoginHerePlease();" class="confirm" tabindex="1" style="display: inline-block; background-color: rgb(221, 107, 85); box-shadow: rgba(221, 107, 85, 0.8) 0px 0px 2px, rgba(0, 0, 0, 0.05) 0px 0px 0px 1px inset;">
                Yes, Login here please!
            </button>
            <div class="la-ball-fall">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
</div>
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
    style="display: none; margin-top: -175px;"
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
            <form action="logout.php"  method="post">  
	            <button class="confirm" tabindex="1" style="display: inline-block; background-color: rgb(3, 38, 3); box-shadow: rgba(3, 38, 3, 0.8) 0px 0px 2px, rgba(0, 0, 0, 0.05) 0px 0px 0px 1px inset;">Thanks</button>
	        </form>    
            <div class="la-ball-fall">
            </div>
        </div>
    </div>
</div>
<div
    class="sweet-alert showSweetAlert visible"
    data-custom-class=""
    data-has-cancel-button="false"
    data-has-confirm-button="true"
    data-allow-outside-click="false"
    data-has-done-function="true"
    data-animation="pop"
    data-timer="null"
    id="procced-login"
    style="display: none; margin-top: -175px;"
>
 
    <div class="sa-icon sa-success animate" style="display: block;">
        <span class="sa-line sa-tip animateSuccessTip"></span>
        <span class="sa-line sa-long animateSuccessLong"></span>
    </div>
    <h2>Logging in</h2>
    <p style="display: block;">Login process looks Good</p>
    <div class="sa-button-container">
        <div class="sa-confirm-button-container">
            <form action="token.login.process.php"  method="post">  
	            <button class="confirm" tabindex="1" style="display: inline-block; background-color: rgb(3, 38, 3); box-shadow: rgba(3, 38, 3, 0.8) 0px 0px 2px, rgba(0, 0, 0, 0.05) 0px 0px 0px 1px inset;">Greate</button>
                <input type="text" name="please_login" value="please_login" style="display: none">
	        </form>
        </div>
    </div>
</div>

<script type="text/javascript">
function NoCancelLogin(){
	document.getElementById("Choose").style.display = "none"; 
	document.getElementById("procced-login").style.display = "none"; 
	document.getElementById("cancel-login").style.display = "block"; 

}
function YesLoginHerePlease(){
	document.getElementById("Choose").style.display = "none"; 
	document.getElementById("procced-login").style.display = "block"; 
	document.getElementById("cancel-login").style.display = "none"; 
	
	
}

</script>
<!-- reset form values after refresh  -->
<script type="text/javascript">
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

</body>

</html>