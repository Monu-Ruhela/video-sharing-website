<?php 
session_start();
include "dbconfigure.php";
if(verifyuser())
{
$emailid = $_SESSION['semail'];
$query = "select * from user where emailid='$emailid'";
$rs = my_select($query);
if($row = mysqli_fetch_array($rs))
{
$username = $row[0];
$contact = $row[3];
}
}
else
{
header("location:index.php");
}

?>
<html>
<head>
<?php include "header.php"; ?>

</head>
<body>
<?php include "nav2.php";
echo "<br><br><br><div><b>&nbsp;Welcome</b> <b style = 'text-transform : capitalize ; color : blue'>$username</b></div>";
?>

<div class="container" style = "margin-top : 50px">
<h2 class="text-center" style = "font-family : 'Monotype Corsiva' ; color : #E6120E ; font-weight : bold">Change Password</h2>
<br>
<br>
<form method=post>
<div class="form-group">
<label><b>New Password<b></label>
<input type = password class="form-control" name = "password" >

<label><b>Confirm Password</b></label>
<input type = password name= "cpassword" class="form-control">


<br>
<input type = submit name = "submit" value = "Submit" class="btn btn-info form-control">
</div>
</div>
</form>
</body>
</html>
<?php 
if(isset($_POST['submit']))
{
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];

if($password==$cpassword)
{
$query = "update user set password='$password' where emailid='$emailid'";
$n = my_iud($query);
if($n==1)
{
echo '<script>alert("Password Updated Successfully");
window.location="login.php";
</script>';
}
else
{
echo '<script>alert("Something Went Wrong , Try Again")</script>';
}
}
else
{
echo '<script>alert("Password and ConfirmPassword Not Match")</script>';
}

}
?>