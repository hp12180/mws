<?php 
     include("../conectivity/cone.php");
	  $type=$_POST['query_type'];
      $item_name=$_POST['item_name'];
	  $op_bal_dr=$_POST['op_bal_dr'];
	  $op_bal_cr=$_POST['op_bal_cr'];
	  $op_bal_pcs=$_POST['op_bal_pcs'];
	  $op_bal=$_POST['op_bal'];
	  $brand_code=$_POST['brand_code'];
	  $brand_name=$_POST['brand_name'];
	  $op_amnt=$_POST['op_amnt'];
	  $upper=$_POST['upper'];
	  $lower=$_POST['lower'];
	  $qty1=$_POST['qty1'];
	  $qty2=$_POST['qty2'];
	  $mrp=$_POST['mrp'];
	  $sales_tax=$_POST['sales_tax'];
	  $typ=$_POST['type'];
	  $hamali=$_POST['hamali'];
      $tolai=$_POST['tolai'];
	  $inventory_control=$_POST['inventory_control'];
	  $pur=$_POST['pur'];
	  $sal=$_POST['sal'];
	  $pur1=$_POST['pur1'];
	  $sal1=$_POST['sal1'];
	  $ul=$_POST['ul'];
	  $pcs_qty=$_POST['pcs_qty'];
	  $grp_code=$_POST['grp_code'];
	  
    if($type=="new")
	{
	 
	
 $sql="insert into brand_master(item_name,op_bal_dr,op_bal_cr,brand_code,brand_name,inventory_control,upper,lower,qty1,qty2,ul,pcs_qty,mrp,sales_tax,type,hamali,tolai,pur,sal,pur1,sal1)values('$item_name','$op_bal_dr','$op_bal_cr','$brand_code','$brand_name','$inventory_control','$upper','$lower','$qty1','$qty2','$ul','$pcs_qty','$mrp','$sales_tax','$typ','$hamali','$tolai','$pur','$sal','$pur1','$sal1')";

$sql_2="update item_master set op_upper='$op_bal_pcs',op_lower='$op_bal',opening='$op_amnt' where group_code='$grp_code'";	
	 if (mysql_query($sql,$con) && mysql_query($sql_2,$con))
	  {
	
	   echo "New Record is Added Succssesfully..";
	 
	 }
	else
	  {
	 echo "Error : " . mysql_error();
	
	  }
	}
else 
	{
	 
	 $sql="UPDATE brand_master SET item_name='$item_name',op_bal_dr='$op_bal_dr',op_bal_cr='$op_bal_cr',brand_name='$brand_name',op_amnt='$op_amnt',inventory_control='$inventory_control',upper='$upper',lower='$lower',qty1='$qty1',qty2='$qty2',ul='$ul',pcs_qty='$pcs_qty',mrp='$mrp',sales_tax='$sales_tax',type='$typ',hamali='$hamali',tolai='$tolai',pur='$pur',sal='$sal',pur1='$pur1',sal1='$sal1' WHERE brand_code='$brand_code'";
	 
	 $sql_2="update item_master set op_upper='$op_bal_pcs',op_lower='$op_bal',opening='$op_amnt' where group_code='$grp_code'";	
	 
	 if(mysql_query($sql,$con) && mysql_query($sql_2,$con))
	 {
	    echo"Old Record is Updated Succssesfully..";
	 }
	 else
	  {
	 echo "Error : " . mysql_error();
	
	  }
	 
	 
	}
	
	
?>