<?php 
    include("conectivity/cone.php");
	$no=$_POST['js_code'];
	$sql="select * from item_master where group_code='$no'";
	$result=mysql_query($sql);
	$count=mysql_num_rows($result);
	if($count<0 || $count=='')
	{
		echo "new";
		
	}
	else
	 {
	    while($row = mysql_fetch_assoc($result)){
				echo $row['group_code'].",".$row['group_name'].",".$row['opening'].",".$row['sales'].",".$row['purchase'].",".$row['closing'].",".$row['exp1'].",".$row['exp2'].",".$row['exp3'].",".$row['inc1'].",".$row['total1'].",".$row['total2'].",".$row['upper_unit'].",".$row['lower_unit'];
	               }
}
?>