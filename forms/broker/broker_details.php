<script type="text/javascript"> 
$(document).ready(function() {
		$("#container").notify();	
		var broker//=new Array();
		$("#demo").load("forms/broker/broker_drpdwn.php",function(responceText){
			broker=responceText.split(",");
			$( "#b_name" ).autocomplete({
				source: broker
			});
		});	
		
		var query_type='Temp';

		$("#add_broker").click(function(){
			document.getElementById("ques_header").innerHTML="Broker";
			document.getElementById("my_div").style.width="600px";
			$("#my_sub_div").load("forms/broker/broker_details.php");	
			
		});
		 $( "#b_name" ).bind( "autocompletechange", function() {
			
		  	var a=document.getElementById("b_name").value;
	    	$("#demo").load("forms/broker/broker_up1.php",{js_name:a},function(responseText){  
				
				if(responseText.indexOf("new")!=-1)
				{
					query_type="new";
				}
				else
				{
					query_type="update";
					var str=responseText;
					alert(str);
					var str1=str.split(",");
					document.getElementById("b_code").value=str1[0];
					document.getElementById("b_name").value=str1[1];
					document.getElementById("b_add1").value=str1[2];
					document.getElementById("b_add2").value=str1[3];
					document.getElementById("b_add3").value=str1[4];
					document.getElementById("b_phno").value=str1[6];
					document.getElementById("b_brate").value=str1[7];
					document.getElementById("b_city").value=str1[5];
					
				}
          });
                 // alert(query_type);  
       });
       		
       	$("#ok").click(function(){
	     	
	     	
			        var b_code=document.getElementById("b_code").value;
					var b_name=document.getElementById("b_name").value;
					var b_add1=document.getElementById("b_add1").value;
					var b_add2=document.getElementById("b_add2").value;
					var b_add3=document.getElementById("b_add3").value;
					var b_phno=document.getElementById("b_phno").value;
					var b_brate=document.getElementById("b_brate").value;
					var city=document.getElementById("b_city").value;
					//alert(city)
	     	/* here "demo" is the id of the div element where u want to write response */
			$("#demo").load("forms/broker/broker_up2.php",{query_type:query_type,b_code:b_code,b_name:b_name,b_add1:b_add1,b_add2:b_add2,b_add3:b_add3,b_phno:b_phno,city:city,b_brate:b_brate},function(responseText){  
				//alert(responseText)
				$("#container").notify("create", {
						  title: 'Broker Master',
						  text: responseText
				});
				
				if($('#basic-modal-content-purchase_broker'))
				{
					//$('#basic-modal-content-purchase_broker').load("forms/broker/broker_details.php");
					$('#basic-modal-content-purchase_broker').dialog('close')
					$("#demo").load("forms/broker/broker_drpdwn.php",function(responceText){
					broker=responceText.split(",");
					
						$( "#broker_name" ).autocomplete({
							source: broker
						});
					});	
				}else
				{
					$("#my_sub_div").load("forms/broker/broker_details.php");	
				}
          });
                 // alert(query_type);  
       });
	   
	   $("#view_broker").click(function(){
				document.getElementById("my_div").style.width="95%";
				document.getElementById("ques_header").innerHTML="View All List of Brokers";
				$("#basic-modal-content").show();
				$("#my_sub_div").load("forms/broker/view_broker.php",{},function(responseText){  
								 //  alert(responseText)
						$("#basic-modal-content").hide();		 
						$("#view_all_broker").dataTable({sPaginationType: "full_numbers"});
						$("#view_all_broker_filter").css('height','31px');
				});
				 
			});	 
	   
	   $("#delete_broker").click(function(){
	   
	   var b_name=document.getElementById("b_name").value;
	   
	               $("#demo").load("forms/broker/broker_delete.php",{b_name:b_name},function(responseText){  
                               alert(responseText)

             });
	   });
	   
	       
		var availableTags//=new Array();
		$("#demo").load("forms/city/city.php",function(responceText){
		//alert(responceText);
			availableTags=responceText.split(",");
			
			$( "#b_city" ).autocomplete({
				source: availableTags
			});
		});	
       	
     });
	
	function fetch_broker_detalis(name)
	{
		var a=name;
		//alert(name)
				/* here "demo" is the id of the div element where u want to write response */
				//alert(a);
				$("#demo").load("forms/broker/broker_up1.php",{js_name:a},function(responseText){  
					//alert(responseText);
					if(responseText.indexOf("new")!=-1)
					{
						query_type="new";
						$("#container").notify("create", {
						  title: 'Broker Master',
						  text: 'New Entry'
						});
	
					}
					else
					{
						query_type="update";
						$("#container").notify("create", {
						  title: 'Broker Master',
						  text: 'Old Entry'
						});
						var str=responseText;
					 //	alert(str);
						var str1=str.split(",");
						document.getElementById("b_code").value=str1[0];
						document.getElementById("b_name").value=str1[1];
						document.getElementById("b_add1").value=str1[2];
						document.getElementById("b_add2").value=str1[3];
						document.getElementById("b_add3").value=str1[4];
						document.getElementById("b_phno").value=str1[6];
						document.getElementById("b_city").value=str1[5];
						document.getElementById("b_brate").value=str1[7];
					}
			  });
	}

				
</script>



<?php

echo"
<table style='border-spacing:10px;border-collapse:separate;width:100%;height:100%'>
<tr>
<td>Broker Code </td><td><input class='mws-textinput' type='text' name='b_code' id='b_code' /></td>
</tr>
<tr>
<td>Broker Name </td><td><input class='mws-textinput' type='text' name='b_name' id='b_name'  /></td>
</tr>
<tr>
<td>Broker Address1 </td><td><input class='mws-textinput' type='text' name='b_add1' id='b_add1'  /></td>
</tr>
<tr>
<td>Broker Address2 </td><td><input class='mws-textinput' type='text' name='b_add2' id='b_add2'  /></td>
</tr>
<tr>
<td>Broker Address3 </td><td><input class='mws-textinput' type='text' name='b_add3' id='b_add3'  /></td>
</tr>
<tr>
<td>Broker Phone No.</td><td><input class='mws-textinput' type='text' name='b_phno' id='b_phno'  /></td>
</tr>
<tr>
<td>City </td><td><input class='mws-textinput' type='text' name='city' id='b_city'  /></td>
</tr>
<tr>
<td>Broker's Rate </td><td><input class='mws-textinput' type='text' name='b_brate' id='b_brate'  /></td>
</tr>
</table>
<div class='mws-button-row'>
				<input type='button' name='ok' id='ok' value='Confirm' class='mws-button red'/>
				<input type='reset' name='reset' value='Reset'  class='mws-button gray'/>
</div><div id='demo' style='visibility:hidden' ></div>";

?>