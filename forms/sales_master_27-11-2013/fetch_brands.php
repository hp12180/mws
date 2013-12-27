<?php 

    include("../conectivity/cone.php");

	$item_name=$_POST['item_name'];
	$j=$_POST['i'];
 $sql="select brand_name,brand_code,type,sales_tax,mrp from brand_master where item_name='$item_name'";
 $result = mysql_query($sql);
	echo '<table id="fetch_brand_details_table" style="width:700px" class="mws-datatable mws-table">
			<thead><tr><th>Sr. No.</th><th>Brand Code</th><th>Brand Name</th><th>Type</th><th>Sales Tax</th><th>MRP</th><th>Action</th></tr></thead><tbody>'; 
	$i=0;
 	while($row = mysql_fetch_assoc($result))
	{
            //echo "$row[0]";
			echo "<tr><td>".($i+1)."</td>"."<td id='$i-$i'>".$row['brand_code']."</td><td id='$i'>".$row['brand_name']."</td><td id='$i'>".$row['type']."</td><td id='$i'>".$row['sales_tax']."</td><td id='$i'>".$row['mrp']."</td><td><label id='$i' onclick='get_item_values(\"".$row['brand_name']."\",\"".$row['brand_code']."\",$j)' style='color:blue;text-decoration:none;font-weight:bold;cursor:pointer'>Click to Add</label></td></tr>";
			$i++;
    }
	echo "</tbody></table>"; 


?>