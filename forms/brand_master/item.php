<?php 

    include("../conectivity/cone.php");
	$name=$_POST['js_name'];
	$sql="select *from item_master where group_name='$name'";
	$result = mysql_query($sql);
	$count=mysql_num_rows($result);
	if($count>0)
	{
		while($row = mysql_fetch_array($result))
		{
			   echo $row['group_code']."::".$row['opening']."::".$row['upper_unit']."::".$row['lower_unit']."::".$row['op_upper']."::".$row['op_lower'];
		}
	}
	else
	{
		echo "No Item Found. Please Try Again";
	}
	
?>