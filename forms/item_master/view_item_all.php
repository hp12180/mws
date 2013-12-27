<script>
function delete_account(gr_code)
{
	var a=confirm("Are you sure want to delete this account ?");
		if(a)
		{
		
			$("#demo").load("forms/item_master/item_delete.php",{gr_code:gr_code},function(responseText){  
				//alert(responseText)
				$("#container").notify("create", {
						  title: 'Item Master',
						  text: responseText
					});
				 $("#my_sub_div").load("forms/item_master/view_item_all.php",{},function(responseText){  
                             //  alert(responseText)
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

document.getElementById("my_div").style.width="90%";
			document.getElementById("my_sub_div").style.padding="0px";
			document.getElementById("ques_header").innerHTML="Modify Item Master";
			document.getElementById("upper_menu").innerHTML="<ul><li><a href='#' class='mws-ic-16 ic-add' id='add_update_item'>Add / Update Item</a></li><li><a href='#' class='mws-ic-16 ic-arrow-refresh' id='view_item'>View Item</a></li></ul>";
			var load="<img src='images/ajax-loader.gif' alt='loading...' />";
			$("#my_sub_div").html(load).load("forms/item_master/item_master.php",function(rt){
				
				item_update(gr_code);	
			});
			
			

}
</script>
<?php 
    include("../conectivity/cone.php");
	
	$sql="select * from item_master";
	$result=mysql_query($sql);
	$count=mysql_num_rows($result);
	if($count<0 || $count=='')
	{
		echo "No Records";
		
	}
	else 
	{
	
		$str.='<table id="view_item_all" class="mws-datatable mws-table">
			<thead>
				<tr>
					<th>Item Code</th>
					<th>Item Name</th>
					
					<th>Purchase Account</th>
					<th>Opening Account</th>
					<th>Closing Account</th>
					<th>Expenses Account</th>
					<th>Upper Unit</th>
					<th>Lower Unit</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>';
			
		while($row = mysql_fetch_assoc($result))
		{
			//$query="select `ASSET_HEADING` from group_master where `BSNO`='".$row['acc_code']."'";
			//echo $query;
			//$as_name=mysql_query($query);
			//$as_name_row=mysql_fetch_array($as_name);
			$str.='<tr>
					<td>'.$row['group_code'].'</td>
					<td>'.$row['group_name'].'</td>
					<td>'.$row['purchase'].'</td>
					<td>'.$row['opening'].'</td>
					<td>'.$row['closing'].'</td>
					<td>'.$row['exp1'].'</td>
					<td>'.$row['upper_unit'].'</td>
					<td>'.$row['lower_unit'].'</td>
					<td><img src="css/icons/16/application_edit.png" style="cursor:pointer" original-title="Click to Edit" onclick="modify_account('.$row['group_code'].')"/>&nbsp;&nbsp;&nbsp;<img src="css/icons/16/cross.png" style="cursor:pointer" original-title="Click to Delete" onclick="delete_account('.$row['group_code'].')"/></td>
				</tr>';
		}
	}
	$str.='</tbody></table><div class="mws-button-row">
				
</div><div id="demo" style="visibility:hidden;position:absolute" ></div>';
	echo "$str";
?> 