<?php 
   include("../conectivity/cone.php");
   $gr_code=$_POST['gr_code'];
	//echo "$gr_code";
 $sql="select * from group_master where BSNO='$gr_code'";
 //echo "$sql";
 $result = mysql_query($sql);
 $count=mysql_num_rows($result);		
 if($count>0)
 {
		while($row=mysql_fetch_assoc($result))
		{
			//$str.="{value : '".$row['gr_type']."',label : '".$row['gr_type']."----".$row['acc_name']."'},";
			$str=$row['IN_OUT']."::".$row['ASSET_HEADING']."::".$row['SCHD']."::".$row['GROUP_NAME'];
			
		}
		//$str.="]";
		//str=json_encode($str);
		echo "$str";
 }
 else
 {
 	echo "|new|";
 }

	
	?>