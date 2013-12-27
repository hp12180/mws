<script type="text/javascript"> 


function update_acc_info_delete(flag)
{
	 //alert("hiiiii");
	 var acc_code=document.getElementById("gr_no").value;	
	 if(flag==1)
	 {
	 	var gr_type=document.getElementById("code").value;
		//	 var name=document.getElementById("name").value;
		var name='';	
	 }else if(flag==2)
	 {
	 	//var gr_type=document.getElementById("code").value;
		var name=document.getElementById("name").value;
	 	gr_type='';
	 }
	 
	 
	if((gr_type=='' && name==''))
	{
	
	}
	else
	{
	/* here "demo" is the id of the div element where u want to write response */
		$("#demo").load("forms/acc_det_info_up1.php",{gr_type:gr_type,acc_code:acc_code,name:name},function(responseText){  
		//alert(responseText);
			if(responseText.indexOf("new")!=-1)
			{
				query_type="new";
				//document.getElementById("name").value='';
				//document.getElementById("code").value='';
			}
			else
			{
				query_type="update";
				var str=responseText;
				//alert(str);
				var str1=str.split("::");						
				document.getElementById("name").value=str1[17];
				document.getElementById("code").value=str1[18];
				//document.getElementById("name").value=str1[18];
			
			}
		});
				
	 }
		  
		       	
}

$(document).ready(function(){
	$("#ok").click(function(){
				  
		var a=confirm("Are you sure want to delete this account ?");
		if(a)
		{
			var gr_no=document.getElementById("gr_no").value;
			
			var gr_type=document.getElementById("code").value;
	
			$("#demo").load("forms/account_delete.php",{gr_no:gr_no,gr_type:gr_type},function(responseText){  
				alert(responseText)
				
			});
		 }
		 else
		 {
			alert("Account deletion process is cancelled")
		 }
    });
	

});
</script>
 
<style type="text/css"> 
div.panel,p.flip
{
	margin:0px;
	padding:5px;
	text-align:center;
}
div.panel
{
/*height:120px;*/
display:none;
}
</style>


<?php
echo"<div id='basic-modal-content_group' style='height:600px;width:400px;padding-left:300px;overflow:scroll' >
				<table border='1' cellpadding='2' style='color:#CCCCCC'>";
							include("conectivity/cone.php");
							$query="select * from group_master";
							$result=mysql_query($query,$con);
							//echo "<tr>";
							$i=0;
							while($row=mysql_fetch_assoc($result))
							{
								echo "<tr><td id='$i' ondblclick='get_item_values(this.id)'>".$row['BSNO']."</td>"."<td id='$i-$i' ondblclick='get_item_values(this.id)'>".$row['ASSET_HEADING']."</td></tr>";
								$i++;
							}
						
	 echo"<tr><td id='td3' colspan='2'></td></tr></table>
     	<br /><br /><center><table><tr><input class='modalCloseImg simplemodal-close' type='button' name='b1' value='OK' id='btn-close'        onclick='close_window()' /></tr></table></center></div>";
		
	    echo"<div id='basic-modal-content_code' style='height:300px;width:400px;padding-left:300px;overflow:scroll' >";
				
				echo"</div>";

		 

		
		
		                 

echo"<div id='demo' style='visibility:hidden;position:absolute' ></div>
<div>
<div style='padding:40px'>
<table style='border-spacing:10px;border-collapse:separate;width:580px;'>
<tr>
<td>Group_no<input onblur='grp_no_change()'  type='text' name='gr_no' id='gr_no' class='mws-textinput' class='basic'/></span></td><td></td>
<td>Group_name<input class='mws-textinput' type='text' name='gr_nm' id='gr_nm' class='basic'/></td>   
<td>Code<input class='mws-textinput' type='text' name='code' id='code' class='basic' onblur='update_acc_info_delete(1)' /></td><td></td>
<td>Name<input class='mws-textinput' type='text' name='name'  id='name' class='basic' onblur='update_acc_info_delete(2)' /></td>
</tr>
</table>

</form>
</div>
<div class='mws-button-row'>
				<input type='button' name='ok' value='Delete Account' id='ok' class='mws-button red'/>
				<input type='reset' name='reset' value='Reset'  class='mws-button gray'/>
</div>
</div><div style=\"visibility:hidden\" ></div>";
?>
