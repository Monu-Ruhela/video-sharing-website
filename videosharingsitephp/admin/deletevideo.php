<?php 
$id = $_GET['id'];
include "dbconfigure.php";
$query = "delete from video where id=$id";
my_iud($query);
header("location:viewallvideo.php");
?>