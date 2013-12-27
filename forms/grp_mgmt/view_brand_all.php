<script>
function delete_account(gr_code)
{
	var a=confirm("Are you sure want to delete this account ?");
		if(a)
		{
		
		
			$("#demo").load("forms/brand_master/brand_delete.php",{br_code:gr_code},function(responseText){  
				//alert(responseText)
				$("#container").notify("create", {
						  title: 'Brand Master',
						  text: responseText
					});
				 	
					$("#my_sub_div").load("forms/brand_master/view_brand_all.php",{},function(responseText){  
                             //  alert(responseText)
					//$("#basic-modal-content").hide();		 
					$("#view_item_all").dataTable({sPaginationType: "full_numbers"});
					$("#view_item_all_filter").css('height','31px');
	         		});
			});
		 }
		 else
		 {
			alert("Account deletion process is cancelled")
		 }
}

function modify_account(gr_code)
{
		document.getElementById("my_sub_div").style.padding="0px";
		var load="<img src='images/ajax-loader.gif' alt='loading...' />";
							
		document.getElementById("upper_menu").innerHTML="<ul><li><a href='#' class='mws-ic-16 ic-add' id='add_group_html'>Add / Update Group</a></li><li><a href='#' class='mws-ic-16 ic-arrow-refresh' id='view_group'>View Groups</a></li></ul>";
			
			$("#basic-modal-content").show();
		
			$("#my_sub_div").load("forms/grp_mgmt/asset_grp.php",function(rt){
						$("#basic-modal-content").hide();
						fetch_group_details(gr_code);
	
						
			});
			
			

}
</script>
<?php 
    include("../conectivity/cone.php");
	
	$sql="select * from group_master";
	$result=mysql_query($sql);
	$count=mysql_num_rows($result);
	if($count<0 || $count=='')
	{
		echo "No Records";
		
	}
	else 
	{
	
		$str.='<table id="view_group_all" class="mws-datatable mws-table">
			<thead>
				<tr>
					<th>BSNO</th>
					<th>IN / OUT</th>
					<th>Heading</th>
					<th>SCHD(Y/N)</th>
					<th>Group Name</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>';
			
		while($row = mysql_fetch_assoc($result))
		{
			$str.='<tr>
					<td>'.$row['BSNO'].'</td>
					<td>'.$row['IN_OUT'].'</td>
					<td>'.$row['ASSET_HEADING'].'</td>
					<td>'.$row['SCHD'].'</td>
					<td>'.$row['GROUP_NAME'].'</td>
					<td><img src="css/icons/16/application_edit.png" style="cursor:pointer" original-title="Click to Edit" onclick="modify_account(\''.$row['BSNO'].'\')"/>&nbsp;&nbsp;&nbsp;<img src="css/icons/16/cross.png" style="cursor:pointer" original-title="Click to Delete" onclick="delete_account(\''.$row['BSNO'].'\')"/></td>
				</tr>';
		}
	}
	$str.='</tbody></table><div class="mws-button-row">
				
</div><div id="demo" style="visibility:hidden;position:absolute" ></div>';
	echo "$str";
?> 