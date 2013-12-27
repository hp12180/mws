<?php 
     include("conectivity/cone.php");
	 $type=$_POST['query_type'];
     $code=$_POST['code'];
	 $name=$_POST['name'];
	 $ope=$_POST['ope'];
	 $clos=$_POST['clos'];
	 $purchase=$_POST['pur'];
	 $sale=$_POST['sale'];
	 $exp1=$_POST['exp1'];
	 $exp2=$_POST['exp2'];
	 $exp3=$_POST['exp3'];
	 $inc1=$_POST['inc1'];
     $total1=$_POST['total1'];
	 $total2=$_POST['total2'];
	 $upper=$_POST['upper'];
	 $lower=$_POST['lower']; 
	   
	   //echo $type;
	   
	if($type=="new")
	{
	 		 
	  $sql="insert into item_master(group_code,group_name,opening,sales,purchase,closing,exp1,exp2,exp3,inc1,total1,total2,upper_unit,lower_unit)values('$code','$name','$ope','$sale','$purchase','$clos','$exp1','$exp2','$exp3','$inc1','$total1','$total2','$upper','$lower')";

		if (mysql_query($sql,$con))
	  {
	
	   echo "New sales data added succssesfully..";
	 
	 }
	else
	  {
	 echo "Error : " . mysql_error();
	
	  }
	}
	else {
	 
	 $sql="UPDATE item_master SET group_name='$group_name',opening='$ope',sales='$sale',purchase='$purchase',closing='$clos',exp1='$exp1',exp2='$exp2',exp3='$exp3',inc1='$inc1',total1='$total1',total2='$total2',upper='$upper',lower='$lower' WHERE group_code=$code";
	 
	 if(mysql_query($sql,$con))
	 {
	    echo"updated";
	 }
	 
	 
	}
	
	
?>