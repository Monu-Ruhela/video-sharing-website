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
<style>
th{color : brown}
td{color : blue ; font-weight : bold}
</style>
</head>
<body>
<?php include "nav2.php";
echo "<br><br><br><div><b>&nbsp;Welcome</b> <b style = 'text-transform : capitalize ; color : blue'>$username</b></div>";
?>

<div class="container" style = "margin-top : 50px">
<h2 class="text-center" style = "font-family : 'Monotype Corsiva' ; color : #E6120E ; font-weight : bold">Edit Profile</h2>
<br>
<br>
<form method=post>
<div class="form-group">
<label><b>UserName<b></label>
<input type = text class="form-control" name = "username" value="<?php echo $username ?>">

<label><b>Email ID</b></label>
<input type = email readonly class="form-control" value="<?php echo $emailid ?>">

<label><b>Contact</b></label>
<input type = text class="form-control" name = "contact" value="<?php echo $contact ?>">
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
$username1 = $_POST['username'];
$contact1 = $_POST['contact'];

$query = "update user set username='$username1',contact='$contact1' where emailid='$emailid'";
$n = my_iud($query);
if($n==1)
{
echo '<script>alert("Profile Updated Successfully");
window.location="userhome.php";
</script>';
}
else
{
echo '<script>alert("Something Went Wrong , Try Again")</script>';
}

}
?>