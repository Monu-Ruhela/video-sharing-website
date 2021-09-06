<?php
$dbserver="127.0.0.1";	//localhost
$dbuser="root";
$dbpwd="";
$dbname="videosharingphp";


function my_iud($query)//insert , update , delete
{
global $dbserver,$dbuser,$dbpwd,$dbname;
$cid=mysqli_connect($dbserver,$dbuser,$dbpwd,$dbname) or die("connection failed");
//mysql_select_db($dbname,$cid);
mysqli_query($cid,$query);
$n=mysqli_affected_rows($cid);
mysqli_close($cid);
return $n;
}


function my_select($query)
{
global $dbserver,$dbuser,$dbpwd,$dbname;
$cid=mysqli_connect($dbserver,$dbuser,$dbpwd,$dbname) or die("connection failed");
//mysql_select_db($dbname,$cid);
$rs=mysqli_query($cid,$query);
mysqli_close($cid);
return $rs;
}

//to be used when sql query returns a single value
function my_one($query)
{
global $dbserver,$dbuser,$dbpwd,$dbname;
$cid=mysqli_connect($dbserver,$dbuser,$dbpwd,$dbname) or die("connection failed");
//mysql_select_db($dbname,$cid);
$rs=mysqli_query($cid,$query);
$row=mysqli_fetch_array($rs,MYSQLI_NUM);

mysqli_close($cid);
return $row[0];
}


function verifyuser()
{
$u="";
$p="";
if(isset($_COOKIE['cname']) && isset($_COOKIE['cpwd']))
{
$u=$_COOKIE['cname'];
$p=$_COOKIE['cpwd'];
}
else
{
if(isset($_SESSION['sname']) && isset($_SESSION['spwd']))
{
$u=$_SESSION['sname'];
$p=$_SESSION['spwd'];
}
}
$query="select count(*) from admin where adminname='$u' and password='$p'";
$n=my_one($query);
if($n==1)
{
return true;
}
else
{
return false;
}
}


?>