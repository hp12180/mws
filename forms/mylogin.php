<?php

$name=$_POST['nam'];
$pas=$_POST['pass'];
$branch=$_POST['branch_name'];
//echo "Branch Name :$branch";
@session_start();
$_SESSION['branch_name']=$branch;
$_SESSION['user_name']=$name;
include("conectivity/cone.php");

$sql="select *from user";
$result=mysql_query($sql,$con);

$i=0;
$flag=0;
while($row=mysql_fetch_assoc($result))
{
	if(($row['username']==$name)&&($row['password']==$pas))
	{
	$flag=1;
	}

}

if($flag==1)
{
   echo "login succssesfully";
}
else
{
   echo "error";
}


?>