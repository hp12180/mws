<?php 
    include("conectivity/cone.php");
	$name=$_POST['code'];
	$sql="delete from item_master where group_code='$name'";
	
  if(mysql_query($sql))
	{
		echo "deleted item";
		
	}
	else {
	
	echo"error";
	
	}
?>