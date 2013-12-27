<?php 

    include("../conectivity/cone.php");

	$from=$_POST['from'];
	$to=$_POST['to'];
	$s1=$_POST['s1'];
	$csv=$_POST['csv'];
	
	$from_temp=split("/",$from);
	$from=$from_temp[2]."-".$from_temp[0]."-".$from_temp[1];
	
	$to_temp=split("/",$to);
	$to=$to_temp[2]."-".$to_temp[0]."-".$to_temp[1];
	
	$flag=0;
	if($s1[0]=="All Items")
	{
		$query="select brand_name from brand_master";
 		$result_all=mysql_query($query);
		$count_all=mysql_num_rows($result_all);
		$i=0;
		while($i<$count_all)
		{
			$all=mysql_fetch_array($result_all);
			
			$query="select avg(sal),avg(pur),avg(mrp) from brand_master where brand_name='".$all[0]."'";
			$result_temp=mysql_query($query);
			$selected_avg_val=mysql_fetch_array($result_temp);
			//print_r($all);
			$all_new[$i]=$all[0];
			$all_sal[$i]=$selected_avg_val[0];
			$all_pur[$i]=$selected_avg_val[1];
			$all_mrp[$i]=$selected_avg_val[2];
			$i++;
		}
		//mysql_fetch
		
	}
	else
	{
		$l=0;
		while($s1[$l])
		{
			$query="select brand_name from brand_master where item_name='$s1[$l]'";
			$result_all=mysql_query($query);
			$count_all=mysql_num_rows($result_all);
			//echo "Count :$count_all";
			$j=0;
			$k=0;
			while($j<$count_all)
			{
				$all=mysql_fetch_array($result_all);
				$query="select brand_name,avg(sal),avg(pur),avg(mrp) from brand_master where brand_name='$all[0]'";
				//echo "----$query------";
				$result_sub=mysql_query($query);			
				$row_sub=mysql_fetch_array($result_sub);
				if($row_sub[0]!='')
				{
					$all_new[$j]=$row_sub[0];
					$all_sal[$j]=$row_sub[1];
					$all_pur[$j]=$row_sub[2];
					$all_mrp[$j]=$row_sub[3];
					//print_r($all_new);
				}
							
				$j++;
			}
			$l++;
		}
		//print_r("asd".$all_sal);		
		//$all_new=$s1;
		//$flag=1;
	}
	//echo "$from--------$to---------$s1[0]------$csv";
	//print_r($all_new);
	//echo "Count : $count_all";
	$p=0;
	 $str="<div style='padding-left:50px;padding-top:10px'><table class='my_table' border='1' cellpadding='10'><tr class='my_table'><th class='my_table'>Brand Name</th><th class='my_table' colspan='2'>Sale</th><th class='my_table' colspan='2'>Purchase</th><th class='my_table'>Avg Sale Rate</th><th class='my_table'>Avg Purchase Rate</th><th class='my_table'>Avg M. R. P.</th></tr><tr class='my_table'><th class='my_table'></th><th class='my_table'>Upper</th><th class='my_table'>Lower</th><th class='my_table'>Upper</th><th class='my_table'>Lower</th><th class='my_table'></th><th class='my_table'></th><th class='my_table'></th></tr>";
	// print_r($all);
while($all_new[$p])
{	
	 $query="select sum(qty) as qty,sum(qty1) as qty1 from sale_det where brand_name='".$all_new[$p]."' AND date between '$from' AND '$to'";
	 //echo "$query";
	 $result_sale=mysql_query($query);
	 $count_sale=mysql_num_rows($result_sale);
	 
	 $query="select sum(qty) as qty,sum(qty1) as qty1 from purchase_det where brand_name='".$all_new[$p]."' AND date between '$from' AND '$to'";
	 //echo "$query";
	 $result_pur=mysql_query($query);
	 $count_pur=mysql_num_rows($result_pur);
	 //$query="select * from brand_master";
	 //$result_2=mysql_query($query);
		//echo "Sale : $count_sale------------Pur : $count_pur";
			$str.="<tr class='my_table'><td class='my_table' id='".$p."_brand_name' onclick='get_brand_details(this.id)'>".$all_new[$p]."</td>";
			if($row_sale=mysql_fetch_assoc($result_sale))//$p<=$count_sale
			{
				if($row_sale['qty1']=='')
				{
					$row_sale['qty1']=0;
				}
				
				if($row_sale['qty']=='')
				{
					$row_sale['qty']=0;
				}
				
				
				$str.="<td class='my_table' id='".$p."_sale_upper'>".$row_sale['qty']."</td>
					  <td class='my_table' id='".$p."_sale_lower'>".$row_sale['qty1']."</td>";
			}
			else
			{
				$str.="<td class='my_table' id='".$p."_sale_upper'>0</td><td class='my_table' id='".$p."_sale_lower'>0</td>";
			}
			
			if($row_pur=mysql_fetch_assoc($result_pur))//$p<=$count_pur
			{
				//$row_pur=mysql_fetch_assoc($result_pur);
				
				if($row_pur['qty']=='')
				{
					$row_pur['qty']=0;
				}
				
				 if($row_pur['qty1']=='')
				{
					$row_pur['qty1']=0;
				}
				
				$str.="<td class='my_table' id='".$p."_pur_upper'>".$row_pur['qty']."</td>
					   <td class='my_table' id='".$p."_pur_lower'>".$row_pur['qty1']."</td>";
			}
			else
			{
				$str.="<td class='my_table' id='".$p."_pur_upper'>0</td>
					   <td class='my_table' id='".$p."_pur_lower'>0</td>";
			}
			$str.="<td class='my_table' id='".$p."_avg_sale'>".$all_sal[$p]."</td>
					  <td class='my_table' id='".$p."_avg_pur'>".$all_pur[$p]."</td>
					  <td class='my_table' id='".$p."_avg_mrp'>".$all_mrp[$p]."</td></tr>";
		//print_r($all_sal);
		
	$p++;	
}

$str.="</table></div><div id='container' style='min-width: 400px; height: 400px; margin: 0 auto'></div><input id='count' value='$p' type='hidden' />";
		echo "$str";
?>