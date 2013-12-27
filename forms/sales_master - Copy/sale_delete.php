<?php 
    include("conectivity/cone.php");
	$bill_no=$_POST['bill_no'];
	$sql="delete from sale_det where bill_no='$bill_no'";
	
  if(mysql_query($sql))
	{
		echo "Deleted Sales Account...";
		
	}
	else {
	
	echo"error";
	
	}
?>