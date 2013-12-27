<?php 
    include("../conectivity/cone.php");
	$name=$_POST['gr_code'];
	$sql="delete from item_master where group_code='$name'";
	
  if(mysql_query($sql))
	{
		echo "Item is Deleted Successfully.";
		
	}
	else {
	
	echo "Sorry....Server Error. Please Try After Some Time";
	
	}
?>