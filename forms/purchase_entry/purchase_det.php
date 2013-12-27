<?php

include("../conectivity/cone.php");
$sql1="SELECT max(ID) FROM purchase_det";
$result=mysql_query($sql1,$con);
while($myrow=mysql_fetch_row($result))
{
$id_value=$myrow[0]+1;
}
$entry_id='P';
$entry_id1=$entry_id.(1000+$id_value);

?>
<style type="text/css">
#basic-modal-content-purchase_broker{
position: relative;
border: 0;
padding: 18px 24px;
background: none;
zoom: 1;
background-color: #f8f8f8;
border: solid #9e9e9e;
border-width: 0 1px;
}

#basic-modal-content-purchase_broker .mws-button-row
{
padding: 16px 24px;
border-top: 1px solid #bcbcbc;
text-align: right;
background: url(images/core/mws-inset.png);
margin-left: -31px;
margin-right: -24px;
margin-bottom: -18px;
}
</style>
<script type="text/javascript"> 
		//alert(1);
		$(document).ready(function() {

		$("#container").notify();	
		//
		var broker//=new Array();
		$("#demo").load("forms/broker/broker_drpdwn.php",function(responceText){
			broker=responceText.split(",");
			
			$( "#broker_name" ).autocomplete({
				source: broker
			});
		});	
		
		$('#new_broker').click(function (e) {
		//$('#basic-modal-content-purchase_broker').css('background-color','white');						

	//$('#basic-modal-content-purchase_broker').dialog({width:'500px',height:'1000px',title:'Add New Broker',modal:true});
	$('#basic-modal-content-purchase_broker').dialog({autoOpen: true,
				title:"Add Broker",
                modal: true,
                width: "640"});	
		/*$('#basic-modal-content-purchase_broker').dialog({autoOpen: false,
                title: "jQuery-UI Dialog",
                modal: true,
                width: "640",
                buttons: [{
                    text: "Close Dialog",
                    click: function () {
                        $(this).dialog("close");
                    },
                }]});
		*/
		
						//$(".ui-dialog").css('height','480px');
		//$("#basic-modal-content-purchase").css('height','480px');
		//$('#basic-modal-content-purchase_broker').modal();
		
	});
		
		var suplier//=new Array();
		$("#demo").load("forms/purchase_entry/cust_drpdwn.php",function(responceText){
			suplier=responceText.split(",");
			
			$( "#sup_name" ).autocomplete({
				source: suplier
			});
		});	
	   
	   	   
	   $( "#sup_name" ).bind( "autocompletechange", function() {
	     	var name=document.getElementById("sup_name").value;
	     	/* here "demo" is the id of the div element where u want to write response */
			if(name=='')
			{
			}
			else
			{
			$("#demo").load("forms/purchase_entry/cust.php",{js_name:name},function(responseText){  
				var str=responseText;
				
				var str1=str.split(",");
				document.getElementById("add").value=str1[0];
                document.getElementById("contact1").value=str1[1];
 				//document.getElementById("dis").value=str1[2];
                
          });
		  
		 } 
     
	 });

	   
	   
	   $( "#dt" ).datepicker();
		  var a='dd/mm/yy';
		  $( "#dt" ).datepicker("option","dateFormat",a);
	      $("#dt").change(function(){
	     	var name=document.getElementById("dt").value;
	     	/* here "demo" is the id of the div element where u want to write response */
			$("#demo").load("forms/purchase_entry/dt.php",{js_name:name},function(responseText){  
				document.getElementById("day").value=responseText;
				       
          });
       });

    $( "#bill_dt" ).datepicker();
		  var b='dd/mm/yy';
		  $( "#bill_dt" ).datepicker("option","dateFormat",b);

     $('#brand_name').click(function (e) {
								//	  alert(1)
		$('#basic-modal-content-purchase').dialog({width:'500px',title:'Select Item From Below',modal:true});
	});
	

     $("#delete_purchase").click(function(){
	   
	   var bill_no=document.getElementById("bill_no").value;
	   
	               $("#demo").load("forms/purchase_entry/purchase_delete.php",{bill_no:bill_no},function(responseText){  
                             //  alert(responseText)
						$("#container").notify("create", {
						  title: 'Purchase Entry',
						  text: responseText
						});
						
						$("#my_sub_div").load("forms/purchase_entry/purchase_det.php",function(rt){
							//alert(rt);
							//$("#basic-modal-content").remove();
							//$("#basic-modal-content").hide();
						});


             });
			 
		});	 
         	   
	
		$("#add_purchase").click(function(){
			document.getElementById("my_div").style.width="1000px";
			document.getElementById("my_sub_div").style.padding="0px";
			document.getElementById("ques_header").innerHTML="Purchase Entry";
			document.getElementById("upper_menu").innerHTML="<ul><li><a href='#' class='mws-ic-16 ic-add' id='add_purchase'>Add / Update Purchase Account</a></li><li><a href='#' class='mws-ic-16 ic-arrow-refresh' id='view_purchase'>View Purchase Entry</a></li></ul>";
			var load="<img src='images/ajax-loader.gif' alt='loading...' />";
			$("#basic-modal-content").show();
			$("#my_sub_div").load("forms/purchase_entry/purchase_det.php",function(rt){
				//alert(rt);
				/*$("#container").notify("create", {
						  title: 'Purchase Entry Form',
				});*/
						
				$("#basic-modal-content").remove();
				$("#basic-modal-content").hide();
				
			});	
					
		});
		
		
		$("#view_purchase").click(function(){
			document.getElementById("my_div").style.width="95%";
	   		document.getElementById("ques_header").innerHTML="View All Purchase Detalis";
			$("#basic-modal-content").show();
	         $("#my_sub_div").load("forms/purchase_entry/view_purchase_all.php",{},function(responseText){  
                             //  alert(responseText)
					$("#basic-modal-content").hide();		 
					$("#view_purchase_all").dataTable({sPaginationType: "full_numbers"});
					$("#view_purchase_all_filter").css('height','31px');
	         });
			 
		});	 
			
 });
	 
function get_brand_name(i)
{
	$('#basic-modal-content-purchase').load("forms/purchase_entry/fetch_items.php",{i:i},function(responseText){  
                               //alert(responseText)
			$('#basic-modal-content-purchase').dialog({width:'auto',title:'Select Item From Below',modal:true});
			$("#fetch_item_details_table").dataTable({sPaginationType: "full_numbers"});
				$("#fetch_item_details_table_filter").css('height','31px');
        });

}

function pur_cal()
{
	var count=$("#count").val();
	total_tax=0;
	total_amnt=0;
	for(i=0;i<=count;i++)
	{
		var qty1=document.getElementById("qty_"+i).value;
		var rt=document.getElementById("rt_"+i).value;
		var qty2=document.getElementById("qty1_"+i).value;
		var rt1=document.getElementById("rt1_"+i).value;
		var amnt=qty1*rt+qty2*rt1;
		var sal_tax=document.getElementById("sal_tax_"+i).value;
		tax_amt=((amnt*sal_tax)/100);
		total_tax=total_tax+tax_amt;
		total_amnt=total_amnt+amnt;
		//amnt=amnt-tax_amt;
		document.getElementById("total_"+i).value=amnt.toFixed(2);
	}
	
	var main_total=(parseFloat(total_amnt.toFixed(2))+(parseFloat(total_tax.toFixed(2))));
	
		document.getElementById("material_amt").innerHTML="Rs. "+total_amnt.toFixed(2);
		document.getElementById("total").innerHTML="Rs. "+main_total.toFixed(2);
		document.getElementById("tax_amnt").innerHTML="Rs. "+total_tax.toFixed(2);
	
}

j=1;

function delete_item(i){
	//alert(i)
	i=parseInt(i);
	j=$("#count").val();	
	if(parseInt(j)=='0')
	{
		//alert("");
		$("#container").notify("create", {
						  title: 'Purchase Master',
						  text: 'You Cannot Delete Last Single Item'
				});
		
	}else
	{
		$("#"+i).remove();
		$("#e"+(j-1)).attr('onclick','add_item('+(i-1)+')');
		$("#d"+(j-1)).attr('onclick','delete_item('+(i-1)+')');		
		$("#e"+(j-1)).html('<img src="css/icons/16/add.png" style="margin-top: 6px;">');
		$("#d"+(j-1)).html('<img src="css/icons/16/cancel.png" style="margin-top: 6px;">');
		j--;
		$("#count").val(j);
	}
}

function sup_name_change()
{
	var name=document.getElementById("sup_name").value;
	     	/* here "demo" is the id of the div element where u want to write response */
			if(name=='')
			{
			}
			else
			{
			$("#demo").load("forms/purchase_entry/cust.php",{js_name:name},function(responseText){  
				var str=responseText;
				
				var str1=str.split(",");
				document.getElementById("add").value=str1[0];
                document.getElementById("contact1").value=str1[1];
 				//document.getElementById("dis").value=str1[2];
            });
		  
		 } 

}

function add_item(i){
	//alert(j)
	i=parseInt(i);
	//$("#100 span").attr('onclick','');
	if(j=='0')
	{
		$("#e0").attr('onclick','');
		$("#d0").attr('onclick','');
	
		$("#e0").html('');
		$("#d0").html('');
		j=1;

	}else
	{
		$("#e"+(j-1)).attr('onclick','');
		$("#d"+(j-1)).attr('onclick','');
	
		$("#e"+(j-1)).html('');
		$("#d"+(j-1)).html('');
	}
		
	$("#"+i).after('<tr id="'+(i+1)+'"><td><input style="width: 70px;" class="mws-textinput" type="text" name="brand_code[]" id="brand_code_'+j+'" value="0"></td><td><input style="width: 195px;" class="mws-textinput" onclick="get_brand_name('+j+')" type="text" name="brand_name[]" id="brand_name_'+j+'" value="0"></td><td><input style="width: 30px;" class="mws-textinput" type="text" name="qty[]" id="qty_'+j+'" value="0" onchange="pur_cal();"></td><td><input class="mws-textinput" style="width: 30px;" type="text" name="qty1[]" id="qty1_'+j+'" value="0" onchange="pur_cal();"></td><td><input class="mws-textinput" style="width: 50px;" type="text" name="rt[]" id="rt_'+j+'" value="0" onchange="pur_cal();"></td><td><input class="mws-textinput" style="width: 50px;" type="text" name="rt1[]" id="rt1_'+j+'" value="0" onchange="pur_cal();"></td><td><input class="mws-textinput"  style="width: 60px;" type="text" name="sal_tax[]" id="sal_tax_'+j+'"  value="0" onChange="pur_cal();"/><span>%</span></td><td><select class="mws-textinput"  style="width: 70px;" type="text" name="type[]" id="type_'+j+'"  onChange="pur_cal();">	<option>Dependon</option><option>Inclusive</option></select></td><td><input class="mws-textinput"  style="width: 70px;" type="text" name="total[]" id="total_'+j+'"  value="0" onChange="pur_cal();"/></td><td><div class="">					<span id="e'+(j)+'" style="cursor:pointer" onclick="add_item('+(i+1)+')"><img src="css/icons/16/add.png" style="margin-top: 6px;"></span>&nbsp;&nbsp;<span id="d'+(j)+'" style="cursor:pointer" onclick="delete_item('+(i+1)+')"><img src="css/icons/16/cancel.png" style="margin-top: 6px;"></span></div></td></tr>');
	$("#count").val(j);
	j++;
	
}

function get_next_data(name,i)
	{
		
		$("#basic-modal-content-purchase").load("forms/purchase_entry/fetch_brands.php",{item_name:name,i:i},function(responseText){  
				//alert(responseText)
				$('#basic-modal-content-purchase').dialog('close');
				$('#basic-modal-content-purchase').dialog({width:'auto',title:'Select Brand From Below',modal:true});
				//$("#ui-dialog-title-basic-modal-content-purchase").html('Select Brand From Below');
				$("#fetch_brand_details_table").dataTable({sPaginationType: "full_numbers"});
				$("#fetch_brand_details_table_filter").css('height','31px');
		});
		
	}

	function get_item_values(item_name,item_code,i)
	{
		//alert(b);
		//var items=b.split("-");
		//var item_name=document.getElementById(items[0]).innerHTML;
		//var item_code=document.getElementById(items[0]+"-"+items[0]).innerHTML;
		document.getElementById("brand_name_"+i).value=item_name;
		document.getElementById("brand_code_"+i).value=item_code;
		//event.preventDefault();
		//$.modal.close();
				var code=document.getElementById("brand_code_"+i).value;
		//alert(name);
	     	/* here "demo" is the id of the div element where u want to write response */
			$("#msg").load("forms/purchase_entry/shw_unit.php",{js_code:code},function(responseText){  
				//alert(responseText);
				var str_unit=responseText;
				
				var str1_unit=str_unit.split(",");
	    		  
				  document.getElementById("rt_"+i).value=str1_unit[0];
				  document.getElementById("rt1_"+i).value=str1_unit[1];
				  
				  document.getElementById("sal_tax_"+i).value=str1_unit[4];
				  document.getElementById("type_"+i).value=str1_unit[5];
				  
				  if(responseText)
				  {
				  	//alert(responseText);
				  	//$.modal.close();
					//window.close();
					$('#basic-modal-content-purchase').dialog('close')
				  }
				  
	        });
			

	}
	
	function fetch_item_details()
	{
		var code=document.getElementById("brand_code").value;
		//alert(name);
	     	/* here "demo" is the id of the div element where u want to write response */
			$("#demo").load("forms/purchase_entry/shw_unit.php",{js_code:code},function(responseText){  
				
				var str_unit=responseText;
				
				var str1_unit=str_unit.split(",");
	              var unit_str="1".concat(" ",str1_unit[0]);
				  var unit_str1=unit_str.concat("=",str1_unit[2],str1_unit[1]);
				  document.getElementById("shw_unit").value=unit_str1;
                  document.getElementById("mrp").value=str1_unit[3];
				  document.getElementById("vat").value=str1_unit[4];
				  document.getElementById("tax_typ").value=str1_unit[5];
				  document.getElementById("rt").value=str1_unit[8];
				  document.getElementById("rt1").value=str1_unit[9];
				  
				  
				  if(responseText)
				  {
				  	//alert(responseText);
				  	$.modal.close();
					//window.close();
				  }
				  
	        });
			
			
		
	}
var query_type='Temp';
	   	/* here "click_me" is the id of the button that's why I have used # sign to access an element from his id */
	    // $("#broker").change(function(){
	     function update_purchase(billno)
		 {	
		 	//alert(1);
			if(billno)
			{
			
			}
			else
			{
	     		var billno=document.getElementById("bill_no").value;
			}
			
			
			if(billno=='')
			{
			}
			else
			{
	     	/* here "demo" is the id of the div element where u want to write response */
				$("#demo").load("forms/purchase_entry/purchase_up1.php",{js_name:billno},function(responseText){  
					if(responseText.indexOf("new")!=-1)
					{
						query_type="new";
						$("#container").notify("create", {
						  title: 'Purchase Entry',
						  text: 'New Entry'
						});
					}
					else
					{
						query_type="update";
						
						$("#container").notify("create", {
						  title: 'Purchase Entry',
						  text: 'Old Entry'
						});
						
						var str=responseText;
						var str1=str.split(",");
						var count=responseText.split(":*:");
					//alert(count[1]);
					
					document.getElementById("dt").value=str1[0];	
					document.getElementById("bill_no").value=str1[2];
					document.getElementById("entry_id").value=str1[1];
					document.getElementById("bill_dt").value=str1[3];
					//document.getElementById("day").value=str1[22];
					document.getElementById("sup_name").value=str1[4];
					sup_name_change();			
					//document.getElementById("addr").value=str1[4];
					//document.getElementById("contact").value=str1[6];
					//document.getElementById("mode").value=str1[5];
					document.getElementById("broker_name").value=str1[6];
					//new_data=new Array();
					new_data=count[2].split("::");
						
					for(i=0;i<(count[1]);i++)
					{
						//alert(i+"----"+count[1]);
						if(i==(count[1]-1))
						{
						
						}else
						{
							add_item(100+i);
						}
						//alert(count[2]);
						//new_data_new=new Array();
						//alert(new_data[i]);
						
						new_data_new=new_data[i].split(",");
						//alert(i+"================"+new_data_new);
						document.getElementById("brand_code_"+i).value=new_data_new[0];
						document.getElementById("brand_name_"+i).value=new_data_new[1];
						document.getElementById("qty_"+i).value=new_data_new[2];
						document.getElementById("qty1_"+i).value=new_data_new[3];
						document.getElementById("rt_"+i).value=new_data_new[4];
						document.getElementById("rt1_"+i).value=new_data_new[5];
						document.getElementById("sal_tax_"+i).value=new_data_new[6];
						document.getElementById("total_"+i).value=new_data_new[7];
						
					}
					
					pur_cal();
					
					}
			  })
			}		  
		  
		       	$("#done").click(function(){
				//alert("okkk");
	     	
			        var date=document.getElementById("dt").value;
					var entry_id=document.getElementById("entry_id").value;
        	     	var bill_no=document.getElementById("bill_no").value;
					var bill_dt=document.getElementById("bill_dt").value;

					var day=document.getElementById("day").value;
					
					var sup_name=document.getElementById("sup_name").value;
					var add=document.getElementById("add").value;
					var contact1=document.getElementById("contact1").value;					
					
					var mod=document.getElementById("mode").value;
					var broker=document.getElementById("broker_name").value;
					
					var count=$("#count").val();
					total_tax=0;
					total_amnt=new Array();
					
					var brand_code=new Array();
					var brand_name=new Array();
					var qty1=new Array();
					var qty2=new Array();
					var rt=new Array();
					var rt1=new Array();
					var amnt=new Array();
					var sal_tax=new Array();
					var tax_amt=new Array();
					for(i=0;i<=count;i++)
					{
						brand_code[i]=document.getElementById("brand_code_"+i).value;
						brand_name[i]=document.getElementById("brand_name_"+i).value;
						qty1[i]=document.getElementById("qty_"+i).value;
						rt[i]=document.getElementById("rt_"+i).value;
						qty2[i]=document.getElementById("qty1_"+i).value;
						rt1[i]=document.getElementById("rt1_"+i).value;
						amnt[i]=parseFloat(qty1[i]*rt[i])+parseFloat(qty2[i]*rt1[i]);
						sal_tax[i]=document.getElementById("sal_tax_"+i).value;
						tax_amt[i]=((amnt[i]*sal_tax[i])/100);
						total_tax[i]=total_tax[i]+tax_amt[i];
						total_amnt[i]=total_amnt[i]+amnt[i];
						//amnt=amnt-tax_amt;
						//document.getElementById("total_"+i).value=amnt[i].toFixed(2);
					}	
			
			//alert(brand_code);
	     	/* here "demo" is the id of the div element where u want to write response */
			$("#demo").load("forms/purchase_entry/purchase_up2.php",{brand_code:brand_code,brand_name:brand_name,query_type:query_type,date:date,entry_id:entry_id,bill_no:bill_no,bill_dt:bill_dt,day:day,sup_name:sup_name,mod:mod,broker:broker,add:add,contact1:contact1,qty1:qty1,rt:rt,qty2:qty2,rt1:rt1,amnt:amnt,sal_tax:sal_tax,tax_amt:tax_amt,total_amnt:total_amnt},function(responseText){  
				//alert(responseText)
						$("#container").notify("create", {
						  title: 'Purchase Entry',
						  text: responseText,
						});
						
						$("#my_sub_div").load("forms/purchase_entry/purchase_det.php",function(rt){
							//alert(rt);
							$("#basic-modal-content").remove();
							$("#basic-modal-content").hide();
						});
          });
                 // alert(query_type);  
       });
	 
	}  

		
		
</script>		


<div id="basic-modal-content-purchase_broker" style="padding-left:30px;height:1000px;">
  <?php
           include("../broker/broker_details.php");
  
  ?>
  
</div>

<div id="basic-modal-content-purchase" style="background-color:#f2f2f2;width:100%;">
				
		</div>


<table style="border-spacing:10px;border-collapse:separate;width:900px;padding:20px">
<tr>
<td>Date</td>
<td><input class='mws-textinput' type="text" name="dt" id="dt" <?php echo "value='".date('d/m/Y')."'"; ?>/></td>
<td>Day</td>
<td><input class='mws-textinput'type="text" name="day" id="day"  <?php echo "value='".date('l', strtotime(date('m/d/Y')))."'"; ?> /></td>
</tr>
<tr>
<td>Entry Id </td>
<td><input class='mws-textinput'type="text" name="entry_id" id="entry_id" value="<?php echo $entry_id1 ?>" /></td>
<td>Bill No</td>
<td><input class='mws-textinput'type="text" name="bill_no" id="bill_no" onChange="update_purchase()"/></td>
<td>Date</td>
<td><input class='mws-textinput'type="text" name="bill_dt" id="bill_dt" /></td>
</tr>
<tr>
	<td colspan="8">
		<table cellpadding="5" style="border-spacing: 10px;border-collapse: separate;width: 580px;background-color: #E0E9E9;border-radius: 10px;padding: 20px;width: 96%;" title="Supplier Detalis">
			<tr>
				<td>Supplier</td><td><input class='mws-textinput'type="text" name="sup_name" id="sup_name" /></td>
				<td>Address</td><td><input class='mws-textinput'type="text" name="add" id="add" /></td>
				<td>Contact 1</td><td><input class='mws-textinput'type="text" name="contact1" id="contact1" /></td>
			</tr>
		</table>
	</td>
</tr>
<tr>
<td>Payment Mode</td>
<td><select name="mode" id="mode"><option>Credit</option><option>Cash</option></select></td>
<td>Broker</td>
<td><input class='mws-textinput'type="text" name="broker" id="broker_name"  /></td>
<td><input type="button" name="b" value="Add New Broker" id="new_broker" class="basic mws-button gray"/></td>
</tr>
<!--
<tr>
<td>Brand Name</td>
<td><input class='mws-textinput'type="text" name="brand_name" id="brand_name" class="basic" /></td>
<td>Brand Code</td>
<td><input class='mws-textinput'type="text" name="brand_code" id="brand_code" /></td>

<td>Purchase Type</td>
<td><select name="typ" id="typ" style="width:70x"><option>TaxFree</option>
                                <option >RD</option>
								<option >URD</option>
								<option >EXEMPT</option>
								<option >OMS</option></select>  </td>
</tr>-->
<tr>
<td colspan="6">
	<table style="border-spacing: 15px;border-collapse: separate;width: 580px;background-color: #E0E9E9;border-radius: 10px;padding: 20px;width:106%">
		<tr>
			<td style="text-align:center">Brand Code</td><td style="text-align:center">Brand Name</td><td style="text-align:center">Qty</td><td style="text-align:center">Qty1</td><td style="text-align:center">Rate</td><td style="text-align:center">Rate1</td><td style="text-align:center">Sales Tax</td><td style="text-align:center">Type</td><td style="text-align:center">Total</td>
		</tr>
		<tr id="100">
			
			<td><input style="width: 70px;" class='mws-textinput'type="text" name="brand_code[]" id="brand_code_0"  value="0"/></td>
			
			<td><input style="width: 195px;" class='mws-textinput'type="text" onclick="get_brand_name(0)" name="brand_name[]" id="brand_name_0"  value="0"/></td>
			
			<td><input style="width: 30px;" class='mws-textinput'type="text" name="qty[]" id="qty_0"  value="0" onChange="pur_cal();"/></td>
			
			<td><input class='mws-textinput'  style="width: 30px;" type="text" name="qty1[]" id="qty1_0"  value="0" onChange="pur_cal();"/></td>
			
			<td><input class='mws-textinput'  style="width: 50px;" type="text" name="rt[]" id="rt_0" value="0" onChange="pur_cal();"/></td>
			
			<td><input class='mws-textinput'  style="width: 50px;" type="text" name="rt1[]" id="rt1_0"  value="0" onChange="pur_cal();"/></td>
			<td><input class='mws-textinput'  style="width: 60px;" type="text" name="sal_tax[]" id="sal_tax_0"  value="0" onChange="pur_cal();"/><span>%</span></td>
			<td><select class='mws-textinput'  style="width: 70px;" type="text" name="type[]" id="type_0"  onChange="pur_cal();">
			<option>Dependon</option><option>Inclusive</option>
			</select></td>
			<td><input class='mws-textinput'  style="width: 70px;" type="text" name="total[]" id="total_0"  value="0" onChange="pur_cal();"/></td>
			<td>
				<div class="">
					<span onclick="add_item(100)" id="e0" style="cursor:pointer"><img src="css/icons/16/add.png" style="margin-top: 6px;"/></span>&nbsp;&nbsp;
					<span id="d0" style="cursor:pointer"><img src="css/icons/16/cancel.png" style="margin-top: 6px;"/></span>
				</div>
			</td>
		</tr>
	</table>
</td>
</tr>

</table>
<div style="padding-left: 645px;margin-top: -56px;">
<table style="width: 202px;height: 105px;">
	<tr>
		<td style="font-family: verdana;">Material Amt :</td>
<td><span name="material_amt" id="material_amt" style="font-weight: bold;font-family: verdana;font-size: 14px;">Rs. 0</span></td>

	</tr>
	<tr>
		<td style="font-family: verdana;">Tax Amount :</td>
<td><span name="tax_amnt" id="tax_amnt" style="font-weight: bold;font-family: verdana;font-size: 14px;">Rs. 0</span></td>

	</tr>
	<tr>
	<td style="font-family: verdana;">Bill Amount :</td>
<td>
<span name="total" id="total" style="font-weight: bold;font-family: verdana;font-size: 14px;">Rs. 0</span></td>

	</tr>
</table>
</div></center>
<center>
<div class='mws-button-row'>
				<input type="button" name="ok" id="done" value="Confirm" class='mws-button red'/>
				<input type="reset" name="reset" value="Reset"  class='mws-button gray'/>
</div>
<div id="demo" style="visibility:hidden;display: none;" ></div>
<input type="hidden" value="" id="count" />

<div id="basic-modal-content" style="top:1px;height: 100%; position: absolute; width: 100%; text-align: center; vertical-align: middle; display: none;">

<div id="simplemodal-overlay" class="simplemodal-overlay" style="opacity: 0.5; height: 100%; position: absolute; width: 100%; left: 0px; top: 0px; z-index: 1001;"></div>
<div style="background: #fff;border: 10px solid #aaa;height: 116px;width: 140px;left: 50%;top: 40%;margin: 0 -80px 0;padding: 10px 0;position: absolute;text-align: center;vertical-align: middle;z-index: 999;">
	<img src="images/loader.gif">
</div>

</div>
	