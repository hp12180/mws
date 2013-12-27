<?php 
    include("../conectivity/cone.php");
	$no=$_POST['js_name'];
	$sql="select * from purchase_det where bill_no='$no'";
	$result=mysql_query($sql);
	$count=mysql_num_rows($result);
	if($count<0 || $count=='')
	{
		echo "new";
		
	}
	else {
	$row = mysql_fetch_assoc($result);
	
	echo $row['date'].",".$row['entry_id'].",".$row['bill_no'].",".$row['bill_date'].",".$row['supplier'].",".$row['payment_mode'].",".$row['broker'].",".$row['day'].",";

	$sql="select * from  order_item where bill_no='$no'";
	$result=mysql_query($sql);
	$count=mysql_num_rows($result);
	echo ":*:$count:*:";
	while($row = mysql_fetch_assoc($result))
	{	
		echo $row['b_code'].",".$row['b_name'].",".$row['qty1'].",".$row['qty2'].",".$row['rt1'].",".$row['rt2'].",".$row['s_tax'].",".$row['total']."::";
	
	}
}	
?>