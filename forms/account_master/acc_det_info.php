<script type="text/javascript"> 
function grp_no_change()
	{
		//alert("asdasds")
		var gr_code=document.getElementById("gr_no").value;
		 var temp=Array();
		 temp=gr_code.split("(");
		 // alert(temp)
		 $("#basic-modal-content").show();	
		 
		  $('#msg').load("forms/account_master/fetch_grp.php",{gr_code:temp[0]},function(responseText){
		 // alert(responseText)
		 //responseText=[{value : '121',label : '121----nitin kumar'},];
			$("#basic-modal-content").hide();
			
			 $("#gr_nm").val(responseText);
			 
			var acc_code= document.getElementById("gr_no").value;
			
			var availableTags//=new Array();
			$("#demo").load("forms/account_master/fetch_code.php",{acc_code:acc_code},function(responceText){
				//alert(responceText);
				availableTags=responceText.split(",");
				
				$( "#code" ).autocomplete({
					source: availableTags
				});
			});
			
			var availableTags//=new Array();
			$("#demo").load("forms/account_master/fetch_name.php",{acc_code:acc_code},function(responceText){
				//alert(responceText);
				availableTags=responceText.split(",");
				
				$( "#name" ).autocomplete({
					source: availableTags
				});
			});

		});
	}

function code_change()
{
	//alert(1);
			 update_acc_info();
}

$(document).ready(function(){
		
		$("#container").notify();
		 
	   	$("#ok").click(function(){
				  //alert("hellooooo");
	     	
			        var gr_no=document.getElementById("gr_no").value;
					//var gr_nm=document.getElementById("gr_nm").value;
        	     	var gr_type=document.getElementById("code").value;
					var name=document.getElementById("name").value;
					var add=document.getElementById("add").value;	
					var city=document.getElementById("a_city").value;
					var phno=document.getElementById("phno").value;
					var shr_nm=document.getElementById("shr_nm").value;
					var fax=document.getElementById("fax").value;
					var email=document.getElementById("email").value;
					var cst=document.getElementById("cst").value;
					var tin=document.getElementById("tin").value;
					var pan=document.getElementById("pan").value;
					var person1=document.getElementById("person1").value;
					var person2=document.getElementById("person2").value;
					var bank_name=document.getElementById("bank_name").value;
					var bank_no=document.getElementById("bank_no").value;
					var bazar_day=document.getElementById("bazar_day").value;
					var dis=document.getElementById("dis").value;
					var scheme1=document.getElementById("scheme1").value;
					var scheme2=document.getElementById("scheme2").value;
			  		var dr=document.getElementById("dr").value;
					var dr1=document.getElementById("dr1").value;
					var cr=document.getElementById("cr").value;	
					var cr1=document.getElementById("cr1").value;
					
					$("#basic-modal-content").show();	
					
			//alert("hhhhhhhhhhhhh");
	     	/* here "demo" is the id of the div element where u want to write response */
			$("#demo").load("forms/account_master/acc_det_info_up2.php",{query_type:query_type,gr_no:gr_no,gr_type:gr_type,name:name,add:add,city:city,phno:phno,shr_nm:shr_nm,fax:fax,email:email,cst:cst,tin:tin,pan:pan,person1:person1,person2:person2,bank_name:bank_name,bank_no:bank_no,bazar_day:bazar_day,dis:dis,scheme1:scheme1,scheme2:scheme2,dr:dr,dr1:dr1,cr:cr,cr1:cr1},function(responseText){  
				//alert(responseText)
				$("#basic-modal-content").hide();	
			if(responseText.indexOf('Insert')!=-1)
				{	
					if(responseText.indexOf('success')!=-1)
					{
						$("#container").notify("create", {
						  title: 'Account Master',
						  text: 'Account Entry is Inserted Successfully.'
						});
						$("#my_sub_div").load("forms/account_master/acc_det_info.php");
					 }
					 else
					 {
					 	$("#container").notify("create", {
						  title: 'Account Master',
						  text: 'Account Entry is not Inserted.'
						});
					 
					 }
				}
				else
				{
					if(responseText.indexOf('success')!=-1)
					{
						$("#container").notify("create", {
						  title: 'Account Master',
						  text: 'Account Entry is Updated Successfully.'
						});
						$("#my_sub_div").load("forms/account_master/acc_det_info.php");
					 }
					 else
					 {
					 	$("#container").notify("create", {
						  title: 'Account Master',
						  text: 'Account Entry is not Updated.'
						});
					 
					 }
				
				}
          });
                 // alert(query_type);  
       });
	   	
	$(".flip").click(function(){
  
          $(".panel").slideToggle("slow");
    });
	

	
	$('#gr_no').change(function (e) {								
		 var gr_code=document.getElementById("gr_no").value;
		 var temp=Array();
		 temp=gr_code.split("(");
		 
		 $("#basic-modal-content").show();	
		 
		  //alert(1)
		  $('#msg').load("forms/account_master/fetch_grp.php",{gr_code:temp[0]},function(responseText){
			$("#basic-modal-content").hide();
	});
								//alert(1)
	
	});
	
	$("#add_update_account").click(function(){
			//alert(1);
			document.getElementById("my_div").style.width="1000px";
			document.getElementById("my_sub_div").style.padding="0px";
			document.getElementById("ques_header").innerHTML="Account Master";
			
			$("#basic-modal-content").show();	
			
			document.getElementById("upper_menu").innerHTML="<ul><li><a href='#' class='mws-ic-16 ic-add' id='add_update_account'>Add / Update Account</a></li><li><a href='#' class='mws-ic-16 ic-cross' id='delete_account'>Delete Account</a></li><li><a href='#' class='mws-ic-16 ic-arrow-refresh' id='view_account'>View Account</a></li></ul>";
			var load="<img src='images/ajax-loader.gif' alt='loading...' />";
			$("#my_sub_div").load("forms/account_master/acc_det_info.php",function(){
				$("#basic-modal-content").hide();
			});	
			
			
		})
		
	
	
	 $("#view_account").click(function(){
	 
		 $("#basic-modal-content").show();	
	   		document.getElementById("ques_header").innerHTML="View All Account Detalis";
	         $("#my_sub_div").load("forms/account_master/view_account_all.php",{},function(responseText){  
                             //  alert(responseText)
					$("#basic-modal-content").hide();
					$("#view_account_all").dataTable({sPaginationType: "full_numbers"});
					$("#view_account_all_filter").css('height','31px');
	         });
			 
	});	 
	
	
	$("#delete_account").click(function(){
		//alert(1);
		$("#basic-modal-content").show();	
			document.getElementById("ques_header").innerHTML="Delete Account";
			 $("#my_sub_div").load("forms/account_master/acccount_detele_gui.php",{},function(responseText){  
			 	$("#basic-modal-content").hide();
			 
			});
		
			 
	});
	
	
	    var availableTags//=new Array();
		$("#demo").load("forms/account_master/city.php",function(responceText){
						availableTags=responceText.split(",");
			
			$( "#a_city" ).autocomplete({
				source: availableTags
			});
		});
});	



	
	var query_type='Temp';

function update_acc_info(flag)
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
	 
	 
	 
		
	 //alert(gr_type);
			if((gr_type=='' && name==''))
			{
			
			}
			else
			{
				$("#basic-modal-content").show();	
	     	/* here "demo" is the id of the div element where u want to write response */
				$("#demo").load("forms/account_master/acc_det_info_up1.php",{gr_type:gr_type,acc_code:acc_code,name:name},function(responseText){  
				//alert(responseText);
				$("#basic-modal-content").hide();
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

					
					}
			  })
					  
      		         	
        }
		  
		    
	
	}			

	
		
  
  	


function get_item_values(b)
	{
		//alert(b)
		var items=b.split("-");
		var gr_no=document.getElementById(items[0]).innerHTML;
		var gr_name=document.getElementById(items[0]+"-"+items[0]).innerHTML;
		document.getElementById("gr_no").value=gr_no;
		document.getElementById("gr_nm").value=gr_name;
		event.preventDefault();
		
	}
	
	function get_grp_values(a)
	{
	 // alert(a)
		var grp=a.split("-");
		var code=document.getElementById(grp[0]).innerHTML;
		var name=document.getElementById(grp[0]+"-"+grp[0]).innerHTML;
		document.getElementById("code").value=code;
		document.getElementById("name").value=name;
		event.preventDefault();
		
		    	//$.modal.close();
	
	}
	
function close_window()
	{
	
	   //$.modal.close();
	}

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
							include("../conectivity/cone.php");
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

		 

		
		
		                 

echo"
<div>
<div style='padding:40px'>
<table style='border-spacing:10px;border-collapse:separate;width:580px;'>
<tr>
<td>Group_no<input onblur='grp_no_change()'  type='text' name='gr_no' id='gr_no' class='mws-textinput' class='basic'/></span></td><td></td>
<td>Group_name<input class='mws-textinput' type='text' name='gr_nm' id='gr_nm' class='basic'/></td>   
<td>Code<input class='mws-textinput' type='text' name='code' id='code' class='basic' onblur='update_acc_info(1)' /></td><td></td>
<td>Name<input class='mws-textinput' type='text' name='name'  id='name' class='basic' onblur='update_acc_info(2)' /></td>
</tr>
</table>

<table style='border-spacing:10px;border-collapse:separate;width:580px;background-color:#E0E9E9;border-radius:10px;padding:20px;width:90%'>
<tr>
<td style='text-align:center' colspan='4'><strong>Opening Balance </strong></td><td colspan='4' style='text-align:center'><strong>Closing Balance</strong></td>
</tr>
<!--<tr>
<td style='text-align:center' colspan='4'><hr></td><td colspan='4' style='text-align:center'><hr></td>
</tr>-->

<tr>
<td>Dr.</td><td><input class='mws-textinput' type='text' name='dr' id='dr'  /></td>
<td>Cr.</td><td><input class='mws-textinput' type='text' name='cr' id='cr'  /></td>
<td>Dr.</td><td><input class='mws-textinput' type='text' name='dr1' id='dr1'  /></td>
<td>Cr.</td><td><input class='mws-textinput' type='text' name='cr1' id='cr1'  /></td>
</tr>
</table>

<table style='border-spacing:10px;border-collapse:separate;width:780px;padding:20px'>
<tr>
<td>Address<input class='mws-textinput' type='text' name='add' id='add'  /></td>
<td>City<input class='mws-textinput' type='text' name='city' id='a_city'  /></td>
<td>Phno<input class='mws-textinput' type='text' name='phno' id='phno'  /></td>
<td>Short_name<input class='mws-textinput' type='text' name='shr_nm' id='shr_nm'  /></td>
</tr>
<tr>
<td>Fax<input class='mws-textinput' type='text' name='fax' id='fax'  /></td>
<td>E.mail<input class='mws-textinput' type='text' name='email' id='email'  /></td>
</tr><tr></tr>
<tr>
<td>CST<input class='mws-textinput' type='text' name='cst' id='cst'  /></td>
<td>TIN_NO<input class='mws-textinput' type='text' name='tin' id='tin'  /></td>
<td>PAN<input class='mws-textinput' type='text' name='pan' id='pan'  /></td>
</tr>
</table>

<div class='panel'>

<table style='border-spacing:10px;border-collapse:separate;width:780px;padding:20px;background-color:#E0E9E9;border-radius:10px;padding:20px;width:90%'>
<tr>
<td>Person1</td>
<td><input class='mws-textinput' type='text' name='person1' id='person1' ></td>
<td>Person2</td>
<td><input class='mws-textinput' type='text' name='person2' id='person2' ></td>
</tr>
<tr>
<td>Bank Name</td>
<td><input class='mws-textinput' type='text' name='bank_name' id='bank_name'></td>
<td>Bank_no</td>
<td><input class='mws-textinput' type='text' name='bank_no' id='bank_no' ></td>
</tr>
<tr>
<td>Bazar day</td>
<td><input class='mws-textinput' type='text' name='bazar_day' id='bazar_day' ></td>
<td>Discount</td>
<td><input class='mws-textinput' type='text' name='dis' id='dis'  /></td>
</tr>
<tr>
<td>Scheme1</td>
<td><input class='mws-textinput' type='text' name='scheme1' id='scheme1'  /></td>
<td>Scheme2</td>
<td><input class='mws-textinput' type='text' name='scheme2' id='scheme2'  /></td>
</tr>

</table>

</div>

<p class='flip' style='cursor:pointer;font-size:20px'><strong>More Info</strong></p>
</form>
</div>
<div class='mws-button-row'>
				<input type='button' name='ok' value='Confirm' id='ok' class='mws-button red'/>
				<input type='reset' name='reset' value='Reset'  class='mws-button gray'/>
</div>
</div><div style=\"visibility:hidden\" ></div><div id='demo' style='visibility:hidden;position:absolute' ></div>";
?>
