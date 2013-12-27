<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<script type="text/javascript">

$(document).ready(function() {

	$("#container").notify();
	
	$("#view_item").click(function(){
		document.getElementById("my_div").style.width="95%";
	   		document.getElementById("ques_header").innerHTML="View All Item Detalis";
			$("#basic-modal-content").show();
	         $("#my_sub_div").load("forms/item_master/view_item_all.php",{},function(responseText){  
                             //  alert(responseText)
					$("#basic-modal-content").hide();		 
					$("#view_item_all").dataTable({sPaginationType: "full_numbers"});
					$("#view_item_all_filter").css('height','31px');
	         });
			 
	});	 
	

	$("#ok").click(function(){
	     	
	   				//alert(1);
			        var code=document.getElementById("code").value;
					//alert(2);
					var name=document.getElementById("name").value;
					//alert(3);
					var ope=document.getElementById("open").value;
					//alert(4);
					var sale=document.getElementById("sale_item").value;
					//alert(sale);
					var pur=document.getElementById("pur").value;
					//alert(6);
					var clos=document.getElementById("close").value;
					//alert(7);
					var exp1=document.getElementById("exp1").value;
					//alert(8);
					var exp2=document.getElementById("exp2").value;
					//alert(9);
					var exp3=document.getElementById("exp3").value;
					//alert(10);
					var inc1=document.getElementById("inc1").value;
					//alert(11);
					var total1=document.getElementById("total1").value;
					//alert(12);
					var total2=document.getElementById("total2").value;
					//alert(13);
					var upper=document.getElementById("upper").value;
					//alert(14);
					var lower=document.getElementById("lower").value;
					//alert(15);
					$("#basic-modal-content").show();
					  	//alert("okkkk");
					//alert(lower);
	     	/* here "demo" is the id of the div element where u want to write response */
			$("#demo").load("forms/item_master/item_up2.php",{query_type:query_type,code:code,name:name,ope:ope,sale:sale,pur:pur,clos:clos,exp1:exp1,exp2:exp2,exp3:exp3,inc1:inc1,total1:total1,total2:total2,upper:upper,lower:lower},function(responseText){  
				//alert(responseText)
				$("#basic-modal-content").hide();
				$("#container").notify("create", {
						  title: 'Item Master',
						  text: responseText
				});
				$("#my_sub_div").load("forms/item_master/item_master.php");	
				
          });
                 // alert(query_type);  
       });

$("#add_update_item").click(function(){
			//alert(1);
			document.getElementById("my_div").style.width="90%";
			document.getElementById("my_sub_div").style.padding="0px";
			document.getElementById("ques_header").innerHTML="Item Master";
			document.getElementById("upper_menu").innerHTML="<ul><li><a href='#' class='mws-ic-16  ic-add' id='add_update_item'>Add / Update Item</a></li><li><a href='#' class='mws-ic-16 ic-arrow-refresh' id='view_item'>View Item</a></li></ul>";
			var load="<img src='images/ajax-loader.gif' alt='loading...' />";
			$("#basic-modal-content").show();
			$("#my_sub_div").html(load).load("forms/item_master/item_master.php",function(){
				$("#basic-modal-content").hide();
			});	
					
});
     	
	
});	

</script>

<script type="text/javascript">
	
 var query_type='Temp';
 function item_update(gr_code)
	{
	
	// alert(gr_code);
	 if(!gr_code)
	 {
	 	var group_code=document.getElementById("code").value;
	 }
	 else
	 {
	 	var group_code=gr_code;
	 }
	 
	// alert(group_code);
			if(group_code=='')
			{
					$("#container").notify("create", {
						  title: 'Item Master',
						  text: 'Error : Item Code Can Not be Empty'
					});
			}
			else
			{
		   //alert(group_code);
		   $("#basic-modal-content").show();
			$("#demo").load("forms/item_master/item_up1.php",{js_code:group_code},function(responseText){  
				//alert(responseText);
				 $("#basic-modal-content").hide();
				if(responseText.indexOf("new")!=-1)
				{
					$("#basic-modal-content").hide();
					query_type="new";
					$("#container").notify("create", {
						  title: 'Item Master',
						  text: 'New Entry'
					});
				}
				else
				{
				  //  alert("up");
					query_type="update";
										$("#container").notify("create", {
						  title: 'Item Master',
						  text: 'Old Entry'
					});
					
					var str=responseText;
	             	//alert(str);
   					var str1=str.split(",");
					if(gr_code!='')
					{
						document.getElementById("code").value=str1[0];
					}
					document.getElementById("name").value=str1[1];
					my_func();
					document.getElementById("open").value=str1[2];
					//alert(str1[2]);
					document.getElementById("sale_item").value=str1[3];
					document.getElementById("pur").value=str1[4];
					document.getElementById("close").value=str1[5];
					document.getElementById("exp1").value=str1[6];
					document.getElementById("exp2").value=str1[7];
					document.getElementById("exp3").value=str1[8];
					document.getElementById("inc1").value=str1[9];
					//document.getElementById("total1").value=str1[10];
					//document.getElementById("total2").value=str1[11];
					document.getElementById("upper").value=str1[12];
					document.getElementById("lower").value=str1[13];
					calculate_total_1();
					
					
				}
          })
                 // alert(query_type);  
       }
       		
	   
	   
   }


function my_func()
			{
				var nam=document.getElementById("name").value;
			document.getElementById("d1").innerHTML="<table style='border-spacing:10px;border-collapse:separate;width:750px;background-color:#E0E9E9;border-radius:10px;padding:20px;width:90%'><tr><td>"+nam+" Opening</td> <td><input type='text' name='open' id='open' value='0.00' class='mws-textinput'/></td><td>"+nam+" Sales</td> <td><input class='mws-textinput' type='text' name='sale_item' id='sale_item' value='0.00' /></td></tr><tr><td>"+nam+" Purchase</td><td><input class='mws-textinput' type='text' name='pur' id='pur' value='0.00' /></td><td>"+nam+" Closing</td><td><input class='mws-textinput' type='text' name='close' id='close' value='0.00' /></td></tr><tr><td>"+nam+" Exp(1) A/c</td><td><input type='text' name='exp1' id='exp1' value='0.00' class='mws-textinput'/></td><td>"+nam+" Inc(1) A/c</td><td><input class='mws-textinput' type='text' name='inc1' id='inc1' value='0.00' /></td></tr><tr><td>"+nam+" Purchase return</td><td><input class='mws-textinput' type='text' name='exp2' id='exp2' value='0.00' /></td><td>"+nam+" Sales Return</td><td><input class='mws-textinput' type='text' name='exp3' id='exp3' value='0.00'/></td></tr></table>";
			
			}

function calculate_total_1()
{
	var opening_bal=document.getElementById("open").value;
	var purchase=document.getElementById("pur").value;
	var expenditure=document.getElementById("exp1").value;
	var purchase_return=document.getElementById("exp2").value;
	var total=parseFloat(opening_bal)+parseFloat(purchase)+parseFloat(expenditure)+parseFloat(purchase_return);
	document.getElementById('total1').value=parseFloat(total);
	
	var sale=document.getElementById("sale_item").value;
	var close_1=document.getElementById("close").value;
	var inc1=document.getElementById("inc1").value;
	var exp3=document.getElementById("exp3").value;
	var total=parseFloat(sale)+parseFloat(close_1)+parseFloat(inc1)+parseFloat(exp3);
	document.getElementById('total2').value=parseFloat(total);
	
}



</script>
</head>

<body>
<div style="padding:30px;padding-left:50px" >
<table style="border-spacing:10px;border-collapse:separate;width:560px;margin-bottom:0px">
<tr>
<td><label>Group Code</td></label>
<td><input type="text" name="code" id="code" onChange="item_update()"  class='mws-textinput'/></td>
<td><label>Group Name</td></label>
<td><input type="text" name="name" id="name"  onChange="my_func()"  class='mws-textinput'/></td>
</tr>
</table>

<div id="d1" style="position:relative;top:10px;">
<table style="border-spacing:10px;border-collapse:separate;width:350px;background-color:#E0E9E9;border-radius:10px;padding:20px;width:90%">
<tr>
<td><label>Opening </td></label>
<td><input type="text" name="open" id="open" value="0" readonly="" class='mws-textinput'/></td>

<td><label>Sales</label></td></label>
<td><input type="text" name="sale_item" id="sale_item" value="0"  readonly="" class='mws-textinput'/></td>
</tr>
<tr>
<td><label>Purchase</td></label>
<td><input type="text" name="pur" id="pur" value="0" readonly="" class='mws-textinput'/></td>

<td><label>Closing</td></label>
<td><input type="text" name="close" id="close" value="0" readonly="" class='mws-textinput'/></td>
</tr>
<tr>
<td><label>Exp(1) A/c</td></label>
<td><input type="text" name="exp1" id="exp1" value="0" readonly="" class='mws-textinput'/></td>

<td><label>Inc(1) A/c</td></label>
<td><input type="text" name="inc1" id="inc1" value="0" readonly="" class='mws-textinput'/></td>
</tr>
<tr>
<td><label>Purchase return</td></label>
<td><input type="text" name="exp2" id="exp2" value="0" readonly="" class='mws-textinput'/></td>

<td><label>Sales Return</td></label>

<td><input type="text" name="exp3" id="exp3" value="0" readonly="" class='mws-textinput'/></td>

</tr>
</table>
</div>

<table style="border-spacing:10px;border-collapse:separate;width:780px;padding:20px">
<tr>
<td><label>Total</td></label>
<td><input type="text" name="total1" id="total1" value="0" readonly="" class='mws-textinput'/></td>

<td><label>Total </td></label>
<td><input type="text" name="total2" id="total2" value="0" readonly="" class='mws-textinput'/></td>
</tr>

<tr>
<td><label>Upper_unit</td></label>
<td><input type="text" name="upper" id="upper"  class='mws-textinput'/></td>

<td><label>Lower_unit</td></label>
<td><input type="text" name="lower" id="lower"  class='mws-textinput'/></td>
</tr>
</table>
</div>
<div id="demo" style="visibility:hidden" ></div>
<div class='mws-button-row'>
				<input type="button" name="ok" value="Confirm" id="ok" class='mws-button red'/>
				<input type="reset" name="reset" value="Reset"  class='mws-button gray'/>
</div>
<div id='demo' style='visibility:hidden;position:absolute' ></div>
</body>
</html>
