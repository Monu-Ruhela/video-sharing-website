<html>
<head>
<?php include "header.php"; ?>

</head>
<body>
<?php include "nav1.php" ?>

<form method = post class="container" style = "margin-top : 120px">
<h2 class="text-center" style = "font-family : 'Monotype Corsiva' ; color : #E6120E ; font-weight : bold">User Login</h2>
<br>
<div class="form-group">
<label><b>EmailID</b></label>
 <input type = email name='emailid' class="form-control" placeholder="Enter Your Email Here">
 <label><b>Password</b></label>
 <input type = password name='password' class="form-control" placeholder="Enter Password"> 
 Remember Me <input type = checkbox name=rem>
<br>
<input type = submit value="Login" name = submit class='btn btn-primary'> 
</div>
</form>

</body>
</html>
<?php 
include "dbconfigure.php";

if(isset($_POST['submit']))
{
session_start();
$emailid = $_POST['emailid'];
$password = $_POST['password'];

if(isset($_POST['rem']))
{
$remember = "yes";
}
else
{
$remember = "no";
}

$query = "select count(*) from user where emailid='$emailid' and password='$password'";
$n = my_one($query);
if($n==1)
{
$_SESSION['semail']=$emailid;
$_SESSION['spwd']=$password;

if($remember=='yes')
{
setcookie('cemail',$emailid,time()+60*60*24*7);
setcookie('cpwd',$password,time()+60*60*24*7);
}

header('location:userhome.php');
}
else
{
echo '<script>alert("Invalid Login Credentials,Try Again")</script>';
}
}
?>