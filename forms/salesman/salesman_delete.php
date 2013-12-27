<?php 
     include("../conectivity/cone.php");
	$id=$_POST['br_code'];
	$sql="delete from salesman where code='$id'";
	
  if(mysql_query($sql))
	{
		echo "deleted salesman";
		
	}
	else {
	
	echo"error";
	
	}
?>