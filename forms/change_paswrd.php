<?php
include("conectivity/cone.php");
$name2=$_POST['nam'];
$pass2=$_POST['pass'];


$sql="UPDATE user SET username='$name2',password='$pass2'
       WHERE id=1";


if(mysql_query($sql,$con))
{
       echo "users/password update succssefully!!!!";  
}
else
{

echo "error";
}




?>
