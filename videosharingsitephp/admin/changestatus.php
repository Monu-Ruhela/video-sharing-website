<?php
session_start();
include "dbconfigure.php";
if(verifyuser())
{
$name = $_SESSION['sname'];
 
}

else
{
header("location:index.php");
}

?>

<html>
<head>
<?php include "header.php"; ?>
<?php include "nav2.php"; ?>
</head>
<body>

<form method = post class="container" style = "margin-top : 150px">
<h2 class="text-center" style = "font-family : 'Monotype Corsiva' ; color : #E6120E ; font-weight : bold">Change Status</h2>
<br>
<div class="form-group">
<label><b>Status</b></label>
 <select name="status" class="form-control">
 <option value="Accept">Accept</option>
 <option value="Reject">Reject</option>
 </select>
 <br>
<input type = submit value="Submit" name = submit class='form-control btn btn-danger'> 
</div>
</form>
</body>
</html>

<?php 
$id = $_GET['id'];
if(isset($_POST['submit']))
{
$status = $_POST['status'];
$query = "update video set status='$status' where id=$id";
$n = my_iud($query);
if($n==1)
{
echo '<script>alert("Status Updated Successfully");
window.location="viewvideorequest.php";
</script>';

}
else
{
echo '<script>alert("Something Went Wrong,Try Again!");
window.location="viewvideorequest.php";
</script>';
}
}
?>