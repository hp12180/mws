<?php 
     include("../conectivity/cone.php");
	$id=$_POST['br_code'];
	$sql="delete from narration where narration_no='$id'";
	
  if(mysql_query($sql))
	{
		echo "Narration is deleted Successfully.";
		
	}
	else {
	
	echo"error";
	
	}
?>