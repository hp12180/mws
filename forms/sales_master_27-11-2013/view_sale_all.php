<script>
function delete_account(bill_no)
{
	var a=confirm("Are you sure want to delete this account ?");
		if(a)
		{
		
		
			$("#demo").load("forms/sales_master/sale_delete.php",{bill_no:bill_no},function(responseText){  
				
					$("#container").notify("create", {
						  title: 'Purchase Entry',
						  text: responseText
					});
				 	
					$("#my_sub_div").load("forms/sales_master/view_sale_all.php",function(rt){
						
						$("#basic-modal-content").remove();
						$("#basic-modal-content").hide();	 
					$("#view_purchase_all").dataTable({sPaginationType: "full_numbers"});
					$("#view_purchase_all_filter").css('height','31px');
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
			document.getElementById("ques_header").innerHTML="Purchase Entry";
			//document.getElementById("upper_menu").innerHTML="<ul><li><a href='#' class='mws-ic-16 ic-add' id='add_purchase'>Add / Update Purchase Account</a></li><li><a href='#' class='mws-ic-16 ic-arrow-refresh' id='view_purchase'>View Purchase Entry</a></li></ul>";
			var load="<img src='images/ajax-loader.gif' alt='loading...' />";
			$("#basic-modal-content").show();
		
			$("#my_sub_div").load("forms/sales_master/sale_det.php",function(rt){
						$("#basic-modal-content").remove();
						$("#basic-modal-content").hide();	 
						update_purchase(gr_code);					
			});
}
</script>
<?php 
    include("../conectivity/cone.php");
	
	$sql="select * from sale_det";
	$result=mysql_query($sql);
	$count=mysql_num_rows($result);
	if($count<0 || $count=='')
	{
		echo "No Records";
		
	}
	else 
	{
	
		$str.='<table id="view_sale_all" class="mws-datatable mws-table">
			<thead>
				<tr>
					<th>Entry ID</th>
					<th>Bill No</th>
					<th>Date</th>
					<th>Party Name</th>
					<th>Broker Name</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>';
			
		while($row = mysql_fetch_assoc($result))
		{
			$str.='<tr>
					<td>'.$row['entry_id'].'</td>
					<td>'.$row['bill_no'].'</td>
					<td>'.$row['date'].'</td>
					<td>'.$row['supplier'].'</td>
					<td>'.$row['broker'].'</td>					
					<td><img src="css/icons/16/application_edit.png" style="cursor:pointer" original-title="Click to Edit" onclick="modify_account(\''.$row['bill_no'].'\')"/>&nbsp;&nbsp;&nbsp;<img src="css/icons/16/cross.png" style="cursor:pointer" original-title="Click to Delete" onclick="delete_account(\''.$row['bill_no'].'\')"/></td>
				</tr>';
		}
	}
	$str.='</tbody></table><div class="mws-button-row">
				
</div><div id="demo" style="visibility:hidden;position:absolute" ></div>';
	echo "$str";
?> 