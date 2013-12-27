
<?php 
   include("../conectivity/cone.php");
	$name=$_POST['b_name'];
	$sql="delete from broker where (name='$name' or code='$name')";
	
  if(mysql_query($sql))
	{
		echo "deleted broker";
		
	}
	else {
	
	echo"error";
	
	}
?>