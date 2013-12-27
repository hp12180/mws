<?php 

   include("../conectivity/cone.php");
   $type=$_POST['query_type'];
   $date=$_POST['date'];
   $entry=$_POST['entry_id'];
   $bill_no=$_POST['bill_no']; 
   $date1=$_POST['bill_dt'];
   $sup=$_POST['sup_name'];
   $mode=$_POST['mod'];
   $broker=$_POST['broker'];
   $day=$_POST['day'];

   $brand_code=$_POST['brand_code'];
   $brand_name=$_POST['brand_name'];	
   
   $qty1=$_POST['qty1'];
   $rt=$_POST['rt'];
   $qty2=$_POST['qty2'];
   $rt1=$_POST['rt1'];
   
   $amnt=$_POST['amnt'];
   $sal_tax=$_POST['sal_tax'];
   $tax_amt=$_POST['tax_amt'];
   $total_amnt=$_POST['total_amnt'];
   
	if($type=="new")
	{
	 //$qry="update brand_master set avl_qty1=avl_qty1+'$qty',avl_qty2=avl_qty2+'$qty1' where brand_name='$brand_name'";
	  // mysql_query($qry,$con);
	   
	//echo"$entry";
$sql="insert into purchase_det(date,entry_id,bill_no,bill_date,supplier,payment_mode,broker,day)values(now(),'$entry','$bill_no','$date1','$sup','$mode','$broker','$day')";

	if (mysql_query($sql,$con))
	  {

		/*$qty1=explode(",",$qty1);
		$qty2=explode(",",$qty2);
		$rt=explode(",",$rt);
		$rt1=explode(",",$rt1);
		$sal_tax=explode(",",$sal_tax);
		$tax_amt=explode(",",$tax_amt);
		$total_amnt=explode(",",$total_amnt);		*/
		for($i=0;$i<count($qty1);$i++)
		{
			$sql2="INSERT INTO `vattrad`.`order_item` (`bill_no`, `b_code`, `b_name`, `qty1`, `qty2`, `rt1`, `rt2`, `s_tax`, `tax_amt`, `total`) VALUES  ('".$bill_no."', '".$brand_code[$i]."', '".$brand_name[$i]."', '".$qty1[$i]."', '".$qty2[$i]."', '".$rt[$i]."', '".$rt1[$i]."', '".$sal_tax[$i]."', '".$tax_amt[$i]."','".$amnt[$i]."');";			
			$rs_insert=mysql_query($sql2) OR die("Error : ".mysql_error());
			
			$sql2="select qty1,qty2 from brand_master where brand_code='".$brand_code[$i]."'";
			//echo "----$sql2----";
			$result=mysql_query($sql2) OR die("Error : ".mysql_error());
			$data=mysql_fetch_array($result);
			
	$sql2="update brand_master set qty1='".($data[0]+$qty1[$i])."', qty2='".($data[1]+$qty2[$i])."' where brand_code='".$brand_code[$i]."'";
			//echo "----$sql2----";
			$rs_update=mysql_query($sql2) OR die("Error : ".mysql_error());
		}			
	  
	  if($rs_update && $result && $rs_insert)
	  {
	   	echo "New Purchase data added succssesfully and Stock is Updated Successfully.";
	  }
	 
	 }
	else
	  {
	 echo "Error : " . mysql_error();
	
	  }
	}
	else 
	{
	 
	 $sql="update purchase_det set date=now(),entry_id='$entry',bill_date='$date1',supplier='$sup',payment_mode='$mode',broker='$broker',day='$day' where bill_no='$bill_no'";

	if (mysql_query($sql,$con))
	  {

		for($i=0;$i<count($qty1);$i++)
		{
		
			$sql2="select count(*) from order_item where `b_code`='".$brand_code[$i]."' and `bill_no`='".$bill_no."'";
			//echo "----$sql2----";
			$result_asd=mysql_query($sql2) OR die("Error : ".mysql_error());
			$temp_count=mysql_fetch_array($result_asd);
			//echo "$sql2----".$temp_count[0];
			if($temp_count[0]>0)
			{
				$sql2="update `order_item` set `b_name`='".$brand_name[$i]."', `qty1`='".$qty1[$i]."', `qty2`='".$qty2[$i]."', `rt1`='".$rt[$i]."', `rt2`='".$rt1[$i]."', `s_tax`='".$sal_tax[$i]."', `tax_amt`='".$tax_amt[$i]."', `total`='".$amnt[$i]."' where `b_code`='".$brand_code[$i]."' and `bill_no`='".$bill_no."'";
			}
			else
			{
				$sql2="INSERT INTO `vattrad`.`order_item` (`bill_no`, `b_code`, `b_name`, `qty1`, `qty2`, `rt1`, `rt2`, `s_tax`, `tax_amt`, `total`) VALUES  ('".$bill_no."', '".$brand_code[$i]."', '".$brand_name[$i]."', '".$qty1[$i]."', '".$qty2[$i]."', '".$rt[$i]."', '".$rt1[$i]."', '".$sal_tax[$i]."', '".$tax_amt[$i]."','".$amnt[$i]."');";							
			}
			//echo "$sql2";
						
			$rs_insert=mysql_query($sql2) OR die("Error : ".mysql_error());
			
			$sql2="select qty1,qty2 from brand_master where brand_code='".$brand_code[$i]."'";
			//echo "----$sql2----";
			$result=mysql_query($sql2) OR die("Error : ".mysql_error());
			$data=mysql_fetch_array($result);
			
	$sql2="update brand_master set qty1='".($data[0]+$qty1[$i])."', qty2='".($data[1]+$qty2[$i])."' where brand_code='".$brand_code[$i]."'";
			//echo "----$sql2----";
			$rs_update=mysql_query($sql2) OR die("Error : ".mysql_error());
		
		}	
		
		  if($rs_update && $result && $rs_insert)
		  {
			echo "New Purchase data updated succssesfully and Stock is Updated Successfully.";
		  } 
		 
	}
	
	}
?>