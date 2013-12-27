
<table id="fetch_item_details_table" style="width:100%" class="mws-datatable mws-table">
	<thead><tr><th>Sr No</th><th>Item Code</th><th>Item Name</th><th>Action</th></tr></thead><tbody>					
						<?php
							$j=$_POST['i'];
							include("../conectivity/cone.php");
							$query="select * from item_master";
							$result=mysql_query($query,$con);
							//echo "<tr>";
							$i=0;
							while($row=mysql_fetch_assoc($result))
							{
								echo "<tr><td>".($i+1)."</td><td id='$i-$i'>".$row['group_code']."</td>"."<td  ondblclick=''>".$row['group_name']."</td><td><label href='#' id='$i' onclick='get_next_data(\"".$row['group_name']."\",$j)' style='color:blue;text-decoration:none;font-weight:bold;cursor:pointer'>Click to Add</label></td></tr>";
								$i++;
							}
							
							
							//echo "</tr>";
						?>
						
					
				
				</tbody>
			</table>	