<script>
function delete_account(acc_code_new,gr_type_new)
{
	var a=confirm("Are you sure want to delete this account ?");
		if(a)
		{
			var gr_no=acc_code_new;
			
			var gr_type=gr_type_new;
	
			$("#demo").load("forms/account_master/account_delete.php",{gr_no:gr_no,gr_type:gr_type},function(responseText){  
				alert(responseText)
				 $("#my_sub_div").load("forms/account_master/view_account_all.php",{},function(responseText){  
                             //  alert(responseText)
					$("#view_account_all").dataTable({sPaginationType: "full_numbers"});
					$("#view_account_all_filter").css('height','31px');
	         });
			});
		 }
		 else
		 {
			alert("Account deletion process is cancelled")
		 }
}

function modify_account(acc_code_new,gr_type_new)
{

			document.getElementById("my_div").style.width="1000px";
			document.getElementById("my_sub_div").style.padding="0px";
			document.getElementById("ques_header").innerHTML="Account Master";
			document.getElementById("upper_menu").innerHTML="<ul><li><a href='#' class='mws-ic-16 ic-add' id='add_update_account'>Add / Update Account</a></li><li><a href='#' class='mws-ic-16 ic-cross' id='delete_account'>Delete Account</a></li><li><a href='#' class='mws-ic-16 ic-arrow-refresh' id='view_account'>View Account</a></li></ul>";
			var load="<img src='images/ajax-loader.gif' alt='loading...' />";
			$("#my_sub_div").html(load).load("forms/account_master/acc_det_info.php",function(rt){
				
			var acc_code=acc_code_new;	
			
				var gr_type=gr_type_new;
				//	 var name=document.getElementById("name").value;
				var name='';	
			
			if((gr_type=='' && name==''))
			{
			
			}
			else
			{
	     	/* here "demo" is the id of the div element where u want to write response */
				$("#demo").load("forms/account_master/acc_det_info_up1.php",{gr_type:gr_type,acc_code:acc_code,name:name},function(responseText){  
				//alert(responseText);
					if(responseText.indexOf("new")!=-1)
					{
						query_type="new";
						document.getElementById("shr_nm").value='';
						document.getElementById("add").value='';	
						document.getElementById("a_city").value='';
						document.getElementById("phno").value='';
						document.getElementById("fax").value='';
						document.getElementById("email").value='';
						document.getElementById("cst").value='';
						document.getElementById("tin").value='';
						document.getElementById("pan").value='';
						document.getElementById("person1").value='';
						document.getElementById("person2").value='';
						document.getElementById("bank_name").value='';
						document.getElementById("bank_no").value='';
						document.getElementById("bazar_day").value='';
						document.getElementById("dis").value='';
						document.getElementById("scheme1").value='';
						document.getElementById("scheme2").value='';
						document.getElementById("dr").value='';
						document.getElementById("cr").value='';
						document.getElementById("dr1").value='';
						document.getElementById("cr1").value='';
					}
					else
					{
						query_type="update";
						var str=responseText;
						//alert(str);
						var str1=str.split("::");						
						document.getElementById("shr_nm").value=str1[0];
						document.getElementById("add").value=str1[1];	
						document.getElementById("a_city").value=str1[2];
						document.getElementById("phno").value=str1[3];
						document.getElementById("fax").value=str1[4];
						document.getElementById("email").value=str1[5];
						document.getElementById("cst").value=str1[6];
						document.getElementById("tin").value=str1[7];
						document.getElementById("pan").value=str1[8];
						document.getElementById("person1").value=str1[11];
						document.getElementById("person2").value=str1[12];
						document.getElementById("bank_name").value=str1[9];
						document.getElementById("bank_no").value=str1[10];
						document.getElementById("bazar_day").value=str1[13];
						document.getElementById("dis").value=str1[14];
						document.getElementById("scheme1").value=str1[15];
						document.getElementById("scheme2").value=str1[16];
						document.getElementById("name").value=str1[17];
						document.getElementById("code").value=str1[18];
						//document.getElementById("name").value=str1[18];
						document.getElementById("dr").value=str1[19];
						document.getElementById("cr").value=str1[20];
						document.getElementById("dr1").value=str1[21];
						document.getElementById("cr1").value=str1[22];
						
						document.getElementById("gr_no").value=acc_code;
						grp_no_change();
						
					
					}
			  })
					  
      		         	
        }
	
			
			});	


}
</script>
<?php 
    include("../conectivity/cone.php");
	
	$sql="select * from acc_det_information";
	$result=mysql_query($sql);
	$count=mysql_num_rows($result);
	if($count<0 || $count=='')
	{
		echo "No Records";
		
	}
	else 
	{
	
		$str.='<table id="view_account_all" class="mws-datatable mws-table">
			<thead>
				<tr>
					<th>Account Code</th>
					<th>Account Name</th>
					<th>Type(Code)</th>
					<th>Debit</th>
					<th>Credit</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>';
		while($row = mysql_fetch_assoc($result))
		{
			$query="select `ASSET_HEADING` from group_master where `BSNO`='".$row['acc_code']."'";
			//echo $query;
			$as_name=mysql_query($query);
			$as_name_row=mysql_fetch_array($as_name);
			$str.='<tr>
					<td>'.$row['gr_type'].'</td>
					<td>'.$row['acc_name'].'</td>
					<td>'.$as_name_row[0].'('.$row['acc_code'].')</td>
					<td>'.$row['dr'].'</td>
					<td>'.$row['cr'].'</td>
					<td><img src="css/icons/16/application_edit.png" style="cursor:pointer" original-title="Click to Edit" onclick="modify_account('.$row['acc_code'].','.$row['gr_type'].')"/>&nbsp;&nbsp;&nbsp;<img src="css/icons/16/cross.png" style="cursor:pointer" original-title="Click to Delete" onclick="delete_account('.$row['acc_code'].','.$row['gr_type'].')"/></td>
				</tr>';
		}
	}
	$str.='</tbody></table><div class="mws-button-row">
				
</div><div id="demo" style="visibility:hidden;position:absolute" ></div>';
	echo "$str";
?> 