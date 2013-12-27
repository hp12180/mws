<script>
function delete_account(gr_code)
{
		//alert(gr_code);
		var a=confirm("Are you sure want to delete this account ?");
		if(a)
		{
			$("#demo").load("forms/salesman/salesman_delete.php",{br_code:gr_code},function(responseText){  
				//alert(responseText)
					$("#container").notify("create", {
						  title: 'Salesman Master',
						  text: responseText
					});
				 	
					$("#my_sub_div").load("forms/salesman/view_salesman.php",{},function(responseText){  
                        // alert(responseText)
						//$("#basic-modal-content").hide();		 
						$("#view_all_salesman").dataTable({sPaginationType: "full_numbers"});
						$("#view_all_salesman_filter").css('height','31px');
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
			document.getElementById("ques_header").innerHTML="Salesman";
			document.getElementById("upper_menu").innerHTML="<ul><li><a href='#' class='mws-ic-16 ic-add' id='add_salesman'>Add Salesman</a></li><li><a href='#' class='mws-ic-16 ic-arrow-refresh' id='view_salesman'>View Salesman</a></li></ul>";
			$("#basic-modal-content").show();	
			$("#my_sub_div").load("forms/salesman/salesman_details.php",function(){
				fetch_salesman_detalis(gr_code);
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
	
	$sql="select * from salesman";
	$result=mysql_query($sql);
	$count=mysql_num_rows($result);
	if($count<0 || $count=='')
	{
		echo "No Records";
		
	}
	else 
	{
	
		$str.='<table id="view_all_salesman" class="mws-datatable mws-table">
			<thead>
				<tr>
					<th>Salesman Code</th>
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