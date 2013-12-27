
<?php 
     include("../conectivity/cone.php");
	$name=$_POST['js_name'];
	$sql="select * from narration where heading='$name'";
	$result=mysql_query($sql);
	$count=mysql_num_rows($result);
	if($count<0 || $count=='')
	{
		echo "new";
		
	}
	else {
	while($row = mysql_fetch_assoc($result)){
		
		echo $row['narration_no'].",".$row['heading'].",".$row['narration'];
	}
	}
?>