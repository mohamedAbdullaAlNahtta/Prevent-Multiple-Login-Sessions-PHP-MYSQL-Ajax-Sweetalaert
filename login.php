<?php
session_start();
error_reporting(0);

include("include/config.php");

$errormsg=$_SESSION['errormsg'];

// this part for error check 
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$token = $_SESSION['token'];


var_dump($errormsg);
echo '<br>';
var_dump($username);
echo '<br>';
var_dump($password);
echo '<br>';
var_dump($token);
echo '<br>';
// end this part for error check 

if (isset($_POST['submit'])) {


$result=mysqli_query($connection,"SELECT * FROM `users` WHERE `username`='".$_POST['username']."' AND `password`='".$_POST['password']."'");

$num=mysqli_fetch_array($result);

if ($num>0){

  if ($_SESSION['token']===NULL) {

    $token =md5(getToken(50)).getToken(50);
    $_SESSION['username']=$_POST['username'];
    $_SESSION['password']=$_POST['password'];
    $_SESSION['token'] = $token;

    $reso=mysqli_query($connection,"SELECT * FROM `login-sessions` WHERE `username`='".$_POST['username']."' AND `loginOut` IS NULL");
    $numo=mysqli_fetch_array($reso);
    if ($numo>0){
      header("location:process.php");
    } else {
      $sql="INSERT INTO `login-sessions` ( `username`, `token`, `loginTme`) VALUES ('".$_SESSION['username']."', '$token', NOW())";
      $res=mysqli_query($connection,$sql);
      header("location:index.php");
      
    }
    
  } else if($_SESSION['token']!==NULL) {
      $reso=mysqli_query($connection,"SELECT * FROM `login-sessions` WHERE `username`='".$_POST['username']."' AND `token`='".$_SESSION['token']."' AND `loginOut` IS NULL");
      $numo=mysqli_fetch_array($reso);
      if ($numo>0) {
        header("location:index.php");
      } else {
        header("location:process.php");
      }
    
  }




  
  // $sql = "UPDATE `login-sessions` SET `loginOut` = NOW() WHERE `login-sessions`.`username`='".$_SESSION['username']."';";
  // $sql.="INSERT INTO `login-sessions` ( `username`, `token`, `loginTme`) VALUES ('".$_SESSION['username']."', '$token', NOW())";


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
