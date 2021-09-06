<html>
<head>
<?php include "header.php"; ?>

</head>
<body>
<?php include "nav1.php" ?>


<form method = post class="container" style = "margin-top : 100px">
<h2 class="text-center" style = "font-family : 'Monotype Corsiva' ; color : #E6120E ; font-weight : bold">Admin Login</h2>
<br>
<div class="form-group">
<label><b>UserName</b></label>
 <input type = text name='adminname' class="form-control" placeholder="Enter UserName">
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
$adminname = $_POST['adminname'];
$password = $_POST['password'];

if(isset($_POST['rem']))
{
$remember = "yes";
}
else
{
$remember = "no";
}

$query = "select count(*) from admin where adminname='$adminname' and password='$password'";
$n = my_one($query);
if($n==1)
{
$_SESSION['sname']=$adminname;
$_SESSION['spwd']=$password;

if($remember=='yes')
{
setcookie('cname',$adminname,time()+60*60*24*7);
setcookie('cpwd',$password,time()+60*60*24*7);
}

header('location:adminhome.php');
}
else
{
echo '<script>alert("Invalid Login Credentials,Try Again")</script>';
}
}
?>

<br>
<br>
<br>
<br>
<br>
<?php include "footer.php"; ?>
</body>
</html>