<?php 
   include("../conectivity/cone.php");
   $gr_code=$_POST['gr_code'];
	//echo "$gr_code";
 $sql="select ASSET_HEADING from group_master where BSNO='$gr_code'";
 //echo "$sql";
 $result = mysql_query($sql);
 		//$str="[";
		while($row=mysql_fetch_assoc($result))
		{
			//$str.="{value : '".$row['gr_type']."',label : '".$row['gr_type']."----".$row['acc_name']."'},";
			$str=$row['ASSET_HEADING'];
			
		}
		//$str.="]";
		//str=json_encode($str);
		echo "$str";
	

	
	?>