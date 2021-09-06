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

</head>
<body style = "background-image : url(bg.jpg) ; background-size : 100% 100%">
<?php include "nav2.php" ?>

<div class="container" style = "margin-top:200px">
<div class="row">
<div class="col-sm-4">
<h2 class="text-center" style = "color : #D3521B">Total Video Request</h2>
<br>
<p class="text-center" style = "color : #D05335 ; font-weight : bold"><?php echo videorequest();?></p>
</div>
<div class="col-sm-4">
<h2 class="text-center" style = "color : #D3521B">Total Videos</h2>
<br>
<p class="text-center" style = "color : #D05335 ; font-weight : bold"><?php echo totalvideo();?></p>
</div>
<div class="col-sm-4">
<h2 class="text-center" style = "color : #D3521B">Total Users</h2>
<br>
<p class="text-center" style = "color : #D05335 ; font-weight : bold"><?php echo totalusers();?></p>
</div>
</div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php include "footer.php"; ?>

</body>
</html>

<?php 
function videorequest()
{
$query = "select * from video where status='pending'";
$rs = my_select($query);
$n = mysqli_num_rows($rs);
return $n;
}

function totalvideo()
{
$query = "select * from video";
$rs = my_select($query);
$n = mysqli_num_rows($rs);
return $n;
}

function totalusers()
{
$query = "select * from user";
$rs = my_select($query);
$n = mysqli_num_rows($rs);
return $n;
}
?>