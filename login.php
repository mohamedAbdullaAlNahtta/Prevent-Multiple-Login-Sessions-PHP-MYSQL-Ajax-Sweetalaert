<?php
session_start();
error_reporting(0);

include("include/config.php");

$errormsg=$_SESSION['errormsg'];

// this part for error check 
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$token = $_SESSION['token'];

var_dump($username);
echo '<br>';
var_dump($password);
echo '<br>';
var_dump($token);
echo '<br>';
// end this part for error check 

if (isset($_POST['submit'])) {
    $_SESSION['username']=$_POST['username'];
    $_SESSION['password']=$_POST['password'];

$result=mysqli_query($connection,"SELECT * FROM `users` WHERE `username`='".$_POST['username']."' AND `password`='".$_POST['password']."'");

$num=mysqli_fetch_array($result);

if ($num>0){
  $token =md5(getToken(50)).getToken(50);
    $_SESSION['token'] = $token;


  $result00=mysqli_query($connection,"INSERT INTO `login-sessions` ( `username`, `token`, `loginTme`) VALUES ('".$_SESSION['username']."', '$token', NOW())");
  if ($result00===true) {
    header("location:index.php");
    
  }

} else {
$errormsg="Invalid username or password";
  
}
  
}




function getToken($length){
  $token = "";
  $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
  $codeAlphabet.= "0123456789";
  $max = strlen($codeAlphabet); // edited

  for ($i=0; $i < $length; $i++) {
    $token .= $codeAlphabet[random_int(0, $max-1)];
  }

  return $token;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
<div class="container">
  <section id="content">
    <form action="login.php" method="post">
      <h1>Login Form</h1>
      <div>
        <input type="text" placeholder="Username" required="" id="username" name="username" />
      </div>
      <br>
      <div>
        <input type="password" placeholder="Password" required="" id="password" name="password" />
      </div>
      <br>
      <div>
        <input type="submit" name="submit" value="Log in" />
        <br>
        <p>
          <?php if($errormsg){
            echo htmlentities($errormsg);
          }?>
        </p>
        <br>
      </div>
    </form><!-- form -->
    
  </section><!-- content -->
</div><!-- container -->
</body>
</html>
