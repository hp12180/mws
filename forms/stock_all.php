<?php 

    include("../conectivity/cone.php");

	/*	$from=$_POST['from'];
		$to=$_POST['to'];
		$selection=$_POST['selection'];
		$csv=$_POST['csv'];
	*/	

 $query="select * from brand_master";
 $result_2=mysql_query($query);
	 $str="<div style='padding-left:50px;padding-top:10px'><table class='my_table' border='1' cellpadding='10'><tr class='my_table'><th class='my_table'>Brand Name</th><th class='my_table' colspan='2'>Opening</th><th class='my_table' colspan='2'>Closing</th></tr><tr class='my_table'><th class='my_table'></th><th class='my_table'>Upper</th><th class='my_table'>Lower</th><th class='my_table'>Upper</th><th class='my_table'>Lower</th></tr>";
	$i=0;
 	while($row=mysql_fetch_assoc($result_2))
	{
		$str.="<tr  class='my_table'><td class='my_table' id='".$i."_brand_name' onclick='get_brand_details(this.id)'>".$row['brand_name']."</td><td class='my_table' id='".$i."_opening_upper'>".$row['upper_available']."</td><td class='my_table' id='".$i."_opening_lower'>".$row['lower_available']."</td><td class='my_table' id='".$i."_closing_upper'>".$row['qty1']."</td><td class='my_table' id='".$i."_closing_lower'>".$row['qty2']."</tr>";
		$i++;
    }
	
	$str.="</table></div><div id='container' style='min-width: 400px; height: 400px; margin: 0 auto'></div><input id='count' value='$i' type='hidden' />";
	echo "$str"
?>