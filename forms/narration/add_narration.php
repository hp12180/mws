<?php

	include("../conectivity/cone.php");
	$code=$_POST['narration_no'];
	$heading=$_POST['heading'];
	$narration=$_POST['narration'];
	
	$check="select count(*) from narration where narration_no='$code'";
	$count_result=mysql_query($check);
	$count=mysql_num_rows($count_result);
	$flag=0;
	if($count==0)
	{
		$sql="insert into narration(narration_no,heading,narration)values('$code','$heading','$narration')";
	}else
	{
		$sql="update narration set heading='$heading',narration='$narration' where narration_no='$code'";
		$flag=1;
	}
	
	$result=mysql_query($sql);
	
	if ($flag==1)
	  {
		
			 echo "New narration data Updated succssesfully..";
		
	 
	 }
	else if($result)	
	  {
	   echo "New narration data added succssesfully..";
	  }
	  else
	  {
	  		 echo "Error : " . mysql_error();
	  }


?>