<style type="text/css">
	.my_css td{
		padding:5px;
		border:1px solid #cccccc;
	
	}
	
	.my_css {
    background-color: white;
	cursor:pointer;
	}
	
	.my_css:hover {
    background-color: #c5d52b;
	cursor:pointer;
	}
</style>
<?php 

    include("../conectivity/cone.php");

	$item_name=$_POST['item_name'];

 $sql="select brand_name,brand_code from brand_master where item_name='$item_name'";
 $result = mysql_query($sql);
 $count=mysql_num_rows($result);
 if($count>0)
 {
	echo "<table border='1' cellpadding='5' class='mws-table' style='border:1px solid #cccccc' style='width:400px'>
			<thead><tr><th>Sr. No.</th><th>Brand Code</th><th>Brand Name</th></tr></thead><tbody>"; 
	$i=0;
 	while($row = mysql_fetch_assoc($result))
	{
            //echo "$row[0]";
			echo "<tr class='my_css'><td class='my_css'>".($i+1)."</td>"."<td id='$i-$i' onclick='get_item_values(this.id)'  class='my_css'>".$row['brand_code']."</td><td class='my_css' id='$i' onclick='get_item_values(this.id)'>".$row['brand_name']."</td></tr>";
			$i++;
    }
	echo "</tbody></table>"; 
  }
  else
  {
  	echo "<p>Sorry!!! No Brands Found</p>";
  }

?>