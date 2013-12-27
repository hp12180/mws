<?php 
    include("../conectivity/cone.php");
	$gr_no=$_POST['gr_no'];
	$gr_type=$_POST['gr_type'];
	
	$sql="delete from acc_det_information where gr_type='$gr_type' and acc_code='$gr_no'";
	
  if(mysql_query($sql))
	{
		echo "Your Account is Deleted Successfully.";
		
	}
	else {
	
	echo "Server Error.....Please Contact Administrator.";
	
	}
?>