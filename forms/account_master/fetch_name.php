<?php
	include("../conectivity/cone.php");
	
	$acc_code=$_POST['acc_code'];
	$sql="select acc_name from acc_det_information where acc_code='$acc_code'";
	//echo "$sql";
	$result=mysql_query($sql) or die(mysql_error());
	while($row=mysql_fetch_assoc($result))
	{
		$str.=$row['acc_name'].',';
	}
	echo "$str";
?>