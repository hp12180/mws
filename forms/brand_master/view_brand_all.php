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
		document.getElementById("my_div").style.width="1000px";
		document.getElementById("my_sub_div").style.padding="0px";
		document.getElementById("ques_header").innerHTML="Brand Master";
		document.getElementById("upper_menu").innerHTML="<ul><li><a href='#' class='mws-ic-16 ic-add' id='add_brand'>Add / Update Brand</a></li><li><a href='#' class='mws-ic-16 ic-arrow-refresh' id='view_brand'>View Brands</a></li></ul>";
			
			$("#basic-modal-content").show();
		
			$("#my_sub_div").load("forms/brand_master/brand_master.php",function(rt){
						$("#basic-modal-content").hide();
						fetch_item_details(gr_code);	
						
			});
			
			

}
</script>
<?php 
    include("../conectivity/cone.php");
	
	$sql="select * from brand_master";
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
					<th>Brand Code</th>
					<th>Brand Name</th>
					<th>Item Quantity One</th>
					<th>Item Quantity Two</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>';
			
		while($row = mysql_fetch_assoc($result))
		{
			$str.='<tr>
					<td>'.$row['brand_code'].'</td>
					<td>'.$row['brand_name'].'</td>
					<td>'.$row['qty1'].'</td>
					<td>'.$row['qty2'].'</td>
					<td><img src="css/icons/16/application_edit.png" style="cursor:pointer" original-title="Click to Edit" onclick="modify_account(\''.$row['brand_code'].'\')"/>&nbsp;&nbsp;&nbsp;<img src="css/icons/16/cross.png" style="cursor:pointer" original-title="Click to Delete" onclick="delete_account(\''.$row['brand_code'].'\')"/></td>
				</tr>';
		}
	}
	$str.='</tbody></table><div class="mws-button-row">
				
</div><div id="demo" style="visibility:hidden;position:absolute" ></div>';
	echo "$str";
?> 