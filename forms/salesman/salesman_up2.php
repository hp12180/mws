<?php 

      include("../conectivity/cone.php");
	$type=$_POST['query_type'];
	$code=$_POST['s_code'];
	$name=$_POST['s_name'];
	$add1=$_POST['s_add1'];
	$add2=$_POST['s_add2'];
	$add3=$_POST['s_add3'];
	$phno=$_POST['s_phno'];
	$city=$_POST['city'];
    //echo $code;
    $check="select count(*) from salesman where code='$code'";
   	$result=mysql_query($check);
	$count=mysql_fetch_array($result);
	
	if($count[0]==0)
	{
	$sql="insert into salesman(code,name,add1,add2,add3,city,phno) values('$code','$name','$add1','$add2','$add3','$city','$phno')";

		if (mysql_query($sql,$con))
	  {
	
	   echo "New salesman data added succssesfully..";
	 
	 }
	else
	  {
	 echo "Error : " . mysql_error();
	
	  }
	}
	else {
	 
	 $sql="UPDATE salesman SET code='$code',add1='$add1',add2='$add2',add3='$add3',phno='$phno',city='$city',name='$name' 
	 WHERE code='$code'";
	 //echo "$sql----"; 
	 $result=mysql_query($sql,$con);
	 $count=mysql_num_rows($result);
	 if($count>0)
	 {
	    echo"Salesman details updated Successfully";
	 }else
	 {
	 	echo"Salesman details not updated Successfully. Please try again";
	 }
	 
	 
	}
	
	
?>