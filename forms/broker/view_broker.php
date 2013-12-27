<script>
function delete_account(b_code)
{
		//alert(gr_code);
		var a=confirm("Are you sure want to delete this account ?");
		if(a)
		{
			$("#demo").load("forms/broker/broker_delete.php",{b_name:b_code},function(responseText){  
				//alert(responseText)
					$("#container").notify("create", {
						  title: 'Broker Master',
						  text: responseText
					});
				 	
					$("#my_sub_div").load("forms/broker/view_broker.php",{},function(responseText){  
                        // alert(responseText)
						//$("#basic-modal-content").hide();		 
						$("#view_all_broker").dataTable({sPaginationType: "full_numbers"});
						$("#view_all_broker_filter").css('height','31px');
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
		
			document.getElementById("my_div").style.width="600px";
			document.getElementById("my_sub_div").style.padding="0px";
			document.getElementById("ques_header").innerHTML="Broker";
			$("#basic-modal-content").show();	
			$("#my_sub_div").load("forms/broker/broker_details.php",function(){
				fetch_broker_detalis(gr_code);
				$("#basic-modal-content").hide();
				
			});	
		
		/*document.getElementById("my_div").style.width="1000px";
		document.getElementById("my_sub_div").style.padding="0px";
		document.getElementById("ques_header").innerHTML="Brand Master";
		document.getElementById("upper_menu").innerHTML="<ul><li><a href='#' class='mws-ic-16 ic-add' id='add_brand'>Add / Update Brand</a></li><li><a href='#' class='mws-ic-16 ic-arrow-refresh' id='view_brand'>View Brands</a></li></ul>";
			
			$("#basic-modal-content").show();
		
			$("#my_sub_div").load("forms/brand_master/brand_master.php",function(rt){
						$("#basic-modal-content").hide();
						fetch_item_details(gr_code);	
						
			});
			
		*/

}
</script>
<?php 
    include("../conectivity/cone.php");
	
	$sql="select * from broker";
	$result=mysql_query($sql);
	$count=mysql_num_rows($result);
	if($count<0 || $count=='')
	{
		echo "No Records";
		
	}
	else 
	{
	
		$str.='<table id="view_all_broker" class="mws-datatable mws-table">
			<thead>
				<tr>
					<th>Broker Code</th>
					<th> Name</th>
					<th>Address 1</th>
					<th>Address 2</th>
					<th>Address 3</th>
					<th>City</th>
					<th>Phone No.</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>';
			
		while($row = mysql_fetch_assoc($result))
		{
			$str.='<tr>
					<td>'.$row['code'].'</td>
					<td>'.$row['name'].'</td>
					<td>'.$row['add1'].'</td>
					<td>'.$row['add2'].'</td>
					<td>'.$row['add3'].'</td>
					<td>'.$row['city'].'</td>
					<td>'.$row['phno'].'</td>
					<td><img src="css/icons/16/application_edit.png" style="cursor:pointer" original-title="Click to Edit" onclick="modify_account(\''.$row['name'].'\')"/>&nbsp;&nbsp;&nbsp;<img src="css/icons/16/cross.png" style="cursor:pointer" original-title="Click to Delete" onclick="delete_account(\''.$row['code'].'\')"/></td>
				</tr>';
		}
	}
	$str.='</tbody></table><div class="mws-button-row">
				
</div><div id="demo" style="visibility:hidden;position:absolute" ></div>';
	echo "$str";
?> 