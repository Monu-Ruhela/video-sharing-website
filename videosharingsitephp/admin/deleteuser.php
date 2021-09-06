<?php 
$id = $_GET['id'];
include "dbconfigure.php";
$query = "delete from user where emailid='$id'";
my_iud($query);
header("location:viewusers.php");
?>