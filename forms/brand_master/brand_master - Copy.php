<style type="text/css">
.my_a
{
text-decoration: none;
font-family: "Segoe UI Light","Segoe UI",Tahoma,Helvetica,sans-serif!important;
color: #93C90A;
font-weight: bolder;
text-shadow: 0 0 6px rgba(197, 213, 42, 0.5);
}
</style>
<script type="text/javascript">
$(document).ready(function(){
	$("#container").notify();	
	$("#view_brand").click(function(){
		document.getElementById("my_div").style.width="95%";
	   		document.getElementById("ques_header").innerHTML="View All Item Detalis";
			$("#basic-modal-content").show();
	         $("#my_sub_div").load("forms/brand_master/view_brand_all.php",{},function(responseText){  
                             //  alert(responseText)
					$("#basic-modal-content").hide();		 
					$("#view_item_all").dataTable({sPaginationType: "full_numbers"});
					$("#view_item_all_filter").css('height','31px');
	         });
			 
	});	 

	//add_brand
	
	$("#add_brand").click(function(){
			document.getElementById("my_div").style.width="1000px";
			document.getElementById("my_sub_div").style.padding="0px";
			document.getElementById("ques_header").innerHTML="Brand Master";
			document.getElementById("upper_menu").innerHTML="<ul><li><a href='#' class='mws-ic-16 ic-add' id='add_brand'>Add / Update Brand</a></li><li><a href='#' class='mws-ic-16 ic-arrow-refresh' id='view_brand'>View Brands</a></li></ul>";
			
			$("#basic-modal-content").show();
			$("#my_sub_div").load("forms/brand_master/brand_master.php",function(){
				$("#basic-modal-content").hide();
			});			
			 
	});
	
	$('#view_all_brands_dialog').click(function (e) {
		 var item_name=document.getElementById("item_name").value;
		 if(item_name=='')
		 {
		 	$("#container").notify("create", {
						  title: 'Brand Master',
						  text: 'Please Enter the Item Details First'
				});
		 }else
		 {
			  //alert(item_name);
			  $('#brand_code_name').load("forms/brand_master/fetch_brands.php",{item_name:item_name},function(responseText){
			  //alert(responseText)
			  $('#brand_code_name').dialog({title:'All Brand List',width: 'auto',modal: true});
			});
		}	
								
		
	});

	
	//$("#item_name").autocomplete("item_drpdwn.php");
        var item_name//=new Array();
		$("#demo").load("forms/brand_master/item_drpdwn.php",function(responceText){
		//alert(responceText);
						item_name=responceText.split(",");
			
			$( "#item_name" ).autocomplete({
				source: item_name
			});
		});
		
		
	
	$( "#item_name" ).bind( "autocompletechange", function() {
	                var name=document.getElementById("item_name").value;
			        $("#demo").load("forms/brand_master/item.php",{js_name:name},function(responseText){  
				    //alert(responseText);
					var data=responseText.split("::");
					document.getElementById("grp_code").value=data[0];
					document.getElementById("bal").value=data[1];
					document.getElementById("item_upper_unit").innerHTML=data[2];
					document.getElementById("upr").value=data[2];
					document.getElementById("lwr").value=data[3];
					ul_unit();
					//document.getElementById("bal").value=data[1];
					
			
    	});
		
    });	
	 $("#delete_brand").click(function(){
	   
	   var brand_code=document.getElementById("b_code").value;
	   
	               $("#demo").load("forms/brand_master/brand_delete.php",{brand_code:brand_code},function(responseText){  
                               //alert(responseText)
							   $("#container").notify("create", {
						  title: 'Brand Master',
						  text: responseText
						});

             });
			 
		});	 
	
  $("#ok").click(function(){
		     //		alert("ok");
	     	
			      var item_name=document.getElementById("item_name").value;	
				  var op_bal_dr=document.getElementById("dr").value;
				  var op_bal_cr=document.getElementById("cr").value;
				  var op_bal_pcs=document.getElementById("pcs").value;
				  var op_bal=document.getElementById("bal").value;
				  var brand_code=document.getElementById("b_code").value;
					//document.getElementById("addr").value=str1[4];
					//document.getElementById("contact").value=str1[6];
				  var brand_name=document.getElementById("b_name").value;
				  var op_amnt=document.getElementById("o_amnt").value;
				  var inventory_control=document.getElementById("I_control").value;
				  var upper=document.getElementById("upr").value;
				  var lower=document.getElementById("lwr").value;
				  var qty1=document.getElementById("qty1").value;
				  var qty2=document.getElementById("qty2").value;
     			  var ul=document.getElementById("ul").value;
				  var pcs_qty=document.getElementById("pcs_qty").value;
				  var mrp=document.getElementById("mrp").value;
				  var sales_tax=document.getElementById("s_tax").value;
				  var type=document.getElementById("type").value;
				  var hamali=document.getElementById("hamali").value;
				  var tolai=document.getElementById("tolai").value;
				  var pur=document.getElementById("pur").value;
				  var sal=document.getElementById("sal").value;
				  var pur1=document.getElementById("pur1").value;
				  var sal1=document.getElementById("sal1").value;
			
			
	     	/* here "demo" is the id of the div element where u want to write response */
			$("#demo").load("forms/brand_master/brand_master_up2.php",{query_type:query_type,item_name:item_name,op_bal_dr:op_bal_dr,op_bal_cr:op_bal_cr,op_bal_pcs:op_bal_pcs,op_bal:op_bal,brand_code:brand_code,brand_name:brand_name,op_amnt:op_amnt,inventory_control:inventory_control,upper:upper,lower:lower,qty1:qty1,qty2:qty2,ul:ul,pcs_qty:pcs_qty,mrp:mrp,sales_tax:sales_tax,type:type,hamali:hamali,tolai:tolai,pur:pur,sal:sal,pur1:pur1,sal1:sal1},function(responseText){  
				//alert(responseText)
				$("#container").notify("create", {
								  title: 'Brand Master',
								  text: responseText
								});
				
          });
  
  
});	

function ul_unit()
{
 var upr=document.getElementById("upr").value;
 var lwr=document.getElementById("lwr").value;
 var str="1";
 var str2=str.concat(" ",upr," ","="," ",lwr);
 document.getElementById("ul").value=str2
document.getElementById("upper").value=upr;
document.getElementById("lower").value=lwr;
}

function cal_pcs()

{
var up_num=document.getElementById("qty1").value;
var qty=document.getElementById("pcs_qty").value;
var total=up_num*qty;
document.getElementById("qty2").value=total;
}

function pur_sal_cal()
{
   var upper_lower=parseFloat(document.getElementById("pcs_qty").value);
   var sal=parseFloat(document.getElementById("sal").value);
   var pur=parseFloat(document.getElementById("pur").value);
   
   
}

function pur_sal_cal_old_not_working()
{ 
   var num_qty=document.getElementById("pcs_qty").value;
   var pur_val=document.getElementById("pur").value;
   if(parseFloat(num_qty)==0)
   {
   	var pur_val1=0;
   }
   else
   {
   	var pur_val1=parseFloat(pur_val)/parseFloat(num_qty);
   }
   
   alert(pur_val1)

    document.getElementById("pur1").value=Math.round(pur_val1);
   var sal_val=document.getElementById("sal").value;  
   if(parseFloat(num_qty)==0)
   {
   		var sal_val1=0;
   }else
   {
   	var sal_val1=parseFloat(sal_val)/parseFloat(num_qty);
   }
   
   document.getElementById("sal1").value=Math.round(sal_val1);
 alert("Sal Val : "+sal_val1);

}

function get_next_data(a)
	{
		var items=a.split("-");
		var name=document.getElementById(items[0]).innerHTML;
		//alert(name);
		$("#brand_code_name").load("forms/brand_master/fetch_brands.php",{item_name:name},function(responseText){  
				//alert('GetNextData : '+responseText)
		});
		
	}

function get_item_values(b)
	{
		//alert(b)
		var items=b.split("-");
		var item_name=document.getElementById(items[0]).innerHTML;
		var item_code=document.getElementById(items[0]+"-"+items[0]).innerHTML;
		document.getElementById("b_name").value=item_name;
		document.getElementById("b_code").value=item_code;
		//event.preventDefault();
		//$.modal.close()
		fetch_item_details();
		
	}
	
var query_type='Temp';

function fetch_item_details(code_2)
  {

	if(code_2)
	{
		 var code=code_2; 
	}else
	{	
	var code=document.getElementById("b_code").value;	
		 
	}

  //alert("Code : "+code);
  	$("#demo").load("forms/brand_master/brand_master_up1.php",{js_code:code},function(responseText){  
					if(responseText.indexOf("new")!=-1)
					{
					   //alert("new")
						query_type="new";
						
	               $("#demo").load("forms/brand_master/brand_delete.php",{brand_code:brand_code},function(responseText){  
                               //alert(responseText)
							   $("#container").notify("create", {
						  title: 'Brand Master',
						  text: 'New Entry'
						});
					});
						//$('#brand_code_name').dialog('close');
					}
					else
					{
						query_type="update";
						
	               $("#demo").load("forms/brand_master/brand_delete.php",{brand_code:brand_code},function(responseText){  
                               //alert(responseText)
							   $("#container").notify("create", {
								  title: 'Brand Master',
								  text: 'Old Entry'
							});
						var str=responseText;
						
						var str1=str.split(",");
						//alert("--------"+str1[0]+"---------")
					document.getElementById("item_name").value=str1[0];	
					document.getElementById("dr").value=str1[1];
					document.getElementById("cr").value=str1[2];
					document.getElementById("pcs").value=str1[3];
					document.getElementById("bal").value=str1[4];
					document.getElementById("b_code").value=str1[5];
					//document.getElementById("addr").value=str1[4];
					//document.getElementById("contact").value=str1[6];
					//alert("1--------"+responseText);
					document.getElementById("b_name").value=str1[6];
					document.getElementById("o_amnt").value=str1[7];
					document.getElementById("I_control").value=str1[8];
					document.getElementById("upr").value=str1[9];
					document.getElementById("lwr").value=str1[10];
					document.getElementById("qty1").value=str1[11];
					document.getElementById("qty2").value=str1[12];
     				document.getElementById("ul").value=str1[13];
					document.getElementById("pcs_qty").value=str1[14];
					//alert("2--------"+responseText);
					document.getElementById("mrp").value=str1[15];
					document.getElementById("s_tax").value=str1[16];
					document.getElementById("type").value=str1[17];
					document.getElementById("hamali").value=str1[18];
					document.getElementById("tolai").value=str1[19];
					document.getElementById("pur").value=str1[20];
					document.getElementById("sal").value=str1[21];
					//alert("3--------"+responseText);
					document.getElementById("pur1").value=str1[22];
					document.getElementById("sal1").value=str1[23];
	//				document.getElementById("balance").value=str1[30];
					//alert("4--------"+responseText);
					$('#brand_code_name').dialog('close');
				if(code_2)
				{
					var name=document.getElementById("item_name").value;
					//	alert('name : '+name);
			        $("#demo").load("forms/brand_master/item.php",{js_name:name},function(responseText){  
				    	document.getElementById("grp_code").value=responseText;
						//alert(responseText);
						
					   $("#demo").load("forms/brand_master/brand_delete.php",{brand_code:brand_code},function(responseText){  
								   //alert(responseText)
								   $("#container").notify("create", {
									  title: 'Brand Master',
									  text: responseText
									});
						});
				
					});
			
		 		 }
		       	
                 // alert(query_type);  
     	});   
	   
	   }
	   
	 });  

 
  }
	


	
</script>

<?php

echo"<div id='brand_code_name' style='padding-left:10px;' >";
echo"</div>";
echo"
<center><br />
<table style='border-spacing:5px;border-collapse:separate;padding-left:10px;padding-top:20px'>
<tr>
<td>Item Name</td>
<td><input type='text' name='item_name' id='item_name' class='mws-textinput' style='width:130px'/></td>
<td>Item Group Code</td>
<td><input type='text' name='grp_code' id='grp_code' class='mws-textinput' style='width:130px'/></td>
</tr>
<tr>
<td>Op Bal Dr.</td>
<td><input type='text' name='dr' id='dr'  value='0' class='mws-textinput' style='width:130px'/></td>
<td>Op Bal Cr.</td>
<td><input type='text' name='cr' id='cr'  value='0' class='mws-textinput' style='width:130px'/></td>
<td>Op Bal <span id='item_upper_unit' style='font-weight:bold'></span></td><td><input type='text' name='pcs' id='pcs'  value='0' class='mws-textinput' style='width:130px'/></td>
<td>Op Bal</td><td><input type='text' name='bal' id='bal' value='0' class='mws-textinput' style='width:130px'/></td>
</tr>
<tr>
<td>Brand Code</td>
<td><input type='text' name='b_code' id='b_code' class='mws-textinput' style='width:130px' class='basic' onchange='fetch_item_details();'/><br><a href='#' id='view_all_brands_dialog' class='my_a'>Click Here to View all Brands</a></td>
<td>Brand Name</td>
<td><input type='text' name='b_name' id='b_name' class='mws-textinput' style='width:130px'/></td>
<td>Opening Amount</td>
<td><input type='text' name='o_amnt' id='o_amnt'  value='0' class='mws-textinput' style='width:130px'/></td>
</tr>
</table>

<center>
<table>
<tr>
<td> <label><strong>Inventory Control</strong></label></td> 
<td style='padding-left:15px'>Upper <input type='radio' name='I_control' id='I_control' value='u'  /></td>
<td style='padding-left:5px'>Lower <input type='radio' name='I_control' id='I_control' value='l'  /></td>
</tr>
</table>
<div style=''>
	<table style='border-spacing:0px;border-collapse:separate;width:750px;background-color:#E0E9E9;border-radius:10px;padding:20px'>
	<tr><th style='text-align:center'><strong>Unit</strong></th><th style='text-align:center'><strong>Opening Qty</strong></th><th style='text-align:center'><strong>Packing</strong></th></tr>
	
	<tr><td>Upper&nbsp;&nbsp;&nbsp;<input type='text' name='upr' id='upr' class='mws-textinput'/></td>
	<td><input type='text' name='qty1' id='qty1'  value='0' onChange='cal_pcs();' class='mws-textinput'/></td>
	<td>
	
	<table><tr>
	<td style='padding-left: 50px;'><input type='text' name='ul' id='ul' onChange='ul_unit();' class='mws-textinput'/></td></tr><tr>
	
	<td style='padding-left: 50px;'><input type='text' name='pcs_qty' id='pcs_qty' value='0' onChange='cal_pcs();' class='mws-textinput'/></td></tr></table></td></tr>
	
	<tr>
	<td>Lower&nbsp;&nbsp;&nbsp;<input type='text' name='lwr' id='lwr' onChange='ul_unit();' class='mws-textinput'/></td>
	<td><input type='text' name='qty2' id='qty2'  value='0' class='mws-textinput'/></td>
	<td>M.R.P.&nbsp;&nbsp;&nbsp;<input type='text' name='mrp' id='mrp' value='0.00' class='mws-textinput'/></td>
	</tr>
	
	</table>
</div>
<table style='border-spacing:5px;border-collapse:separate;width:800px;'>
<tr>
<td>Sales tax</td><td><input type='text' name='s_tax' id='s_tax' value='0' class='mws-textinput'/></td>
<td><select name='type' id='type'><option>Dependon</option><option>Inclusive</option></select></td>
<td>Hamali</td><td><input type='text' name='hamali' id='hamali' value='0'  class='mws-textinput'/></td>
<td>Tolai</td><td><input type='text' name='total' id='tolai' value='0'  class='mws-textinput'/></td>
</tr>
<tr><td></td></tr>
</table>

<table border='2' height='40' cellspacing='1' style='border-spacing:5px;border-collapse:separate;width:750px;background-color:#E0E9E9;border-radius:10px;padding:20px'>
<tr><th style='text-align:center'><strong>Unit</strong></th><th style='text-align:center'><strong>Fix Rate</strong></th></tr>
<tr>
<td><input type='text' name='upper' id='upper'  class='mws-textinput'/></td>
<td>Purchase&nbsp;&nbsp;&nbsp;<input type='text' name='pur' id='pur' value='0' onChange='pur_sal_cal();'  class='mws-textinput'/>
   &nbsp;&nbsp;&nbsp; sale &nbsp;&nbsp;&nbsp;<input type='text' name='sal' id='sal' value='0'  onchange='pur_sal_cal();' class='mws-textinput'/></td>
</tr>
<tr>
<td><input type='text' name='lower' id='lower'  class='mws-textinput' /></td>
<td>Purchase&nbsp;&nbsp;&nbsp; <input type='text' name='pur1' id='pur1'  value='0' readonly='' class='mws-textinput' />
    &nbsp;&nbsp;&nbsp;sale &nbsp;&nbsp;&nbsp;<input type='text' name='sal1' id='sal1' value='0' readonly='' class='mws-textinput' /></td>
</tr>
</table>

<table>
 
 </table>


<div class='mws-button-row'>
				<input type='button' name='b' value='Confirm' id='ok' class='mws-button red'/>
				<input type='reset' name='reset' value='Reset'  class='mws-button gray'/>
			<div id='main2' style='visibility:hidden'></div>
</center>
<div id='demo' style='visibility:hidden;position:absolute' ></div>";
?>