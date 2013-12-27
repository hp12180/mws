<script type="text/javascript"> 
$(document).ready(function() {

		  var salesman//=new Array();
		  $("#container").notify();	
		  
		  $("#view_salesman").click(function(){
				document.getElementById("my_div").style.width="95%";
				document.getElementById("ques_header").innerHTML="View All List of Salesmans";
				$("#basic-modal-content").show();
				$("#my_sub_div").load("forms/salesman/view_salesman.php",{},function(responseText){  
								 //  alert(responseText)
						$("#basic-modal-content").hide();		 
						$("#view_all_salesman").dataTable({sPaginationType: "full_numbers"});
						$("#view_all_salesman_filter").css('height','31px');
				});
				 
			});	 
		  
		$("#demo").load("forms/salesman/salesman_drpdwn.php",function(responceText){
			salesman=responceText.split(",");
			
			$( "#s_name" ).autocomplete({
				source: salesman
			});
		});	
		
	   var query_type='Temp';
	   	
	     $( "#s_name" ).bind( "autocompletechange", function() {
		 
	      	//alert("hiiiii")
	     	var a=document.getElementById("s_name").value;
	     	/* here "demo" is the id of the div element where u want to write response */
			//alert(a);
			$("#demo").load("forms/salesman/salesman_up1.php",{js_name:a},function(responseText){  
				
				if(responseText.indexOf("new")!=-1)
				{
					query_type="new";
				}
				else
				{
					query_type="update";
					var str=responseText;
	             //	alert(str);
   					var str1=str.split(",");
					document.getElementById("s_code").value=str1[0];
					document.getElementById("s_name").value=str1[1];
					document.getElementById("s_add1").value=str1[2];
					document.getElementById("s_add2").value=str1[3];
					document.getElementById("s_add3").value=str1[4];
					document.getElementById("s_phno").value=str1[6];
					document.getElementById("s_city").value=str1[5];
					
				}
          });
                 // alert(query_type);  
       });
       	
		$("#add_salesman").click(function(){
			$("#basic-modal-content").show();	
			document.getElementById("ques_header").innerHTML="Add Salesman";
			$("#my_sub_div").load("forms/salesman/salesman_details.php",function(){
				$("#basic-modal-content").hide();
			});	
		});	
			
       	$("#ok").click(function(){
	     	
	     	
			        var s_code=document.getElementById("s_code").value;
					var s_name=document.getElementById("s_name").value;
					var s_add1=document.getElementById("s_add1").value;
					var s_add2=document.getElementById("s_add2").value;
					var s_add3=document.getElementById("s_add3").value;
					var s_phno=document.getElementById("s_phno").value;
					var city=document.getElementById("s_city").value;
	     	/* here "demo" is the id of the div element where u want to write response */
			$("#demo").load("forms/salesman/salesman_up2.php",{query_type:query_type,s_code:s_code,s_name:s_name,s_add1:s_add1,s_add2:s_add2,s_add3:s_add3,s_phno:s_phno,city:city},function(responseText){  
				//alert(responseText)
				$("#container").notify("create", {
				  title: 'Salesman Master',
				  text: responseText
				});
          });
                 // alert(query_type);  
       });
	   
	   
    $("#delete_salesman").click(function(){
	   
	   var s_name=document.getElementById("s_name").value;
	   
	        $("#demo").load("forms/salesman/salesman_delete.php",{s_name:s_name},function(responseText){  
                               //alert(responseText)
				$("#container").notify("create", {
				  title: 'Salesman Master',
				  text: responseText
				});


             });
	   });       	
	    
		var availableTags//=new Array();
		$("#demo").load("forms/city/city.php",function(responceText){
			//alert(responceText);
			availableTags=responceText.split(",");
			$( "#s_city" ).autocomplete({
				source: availableTags
			});
		});	
		
  });
//alert(1);				
function fetch_salesman_detalis(name)
{
	var a=name;
	//alert(name)
	     	/* here "demo" is the id of the div element where u want to write response */
			//alert(a);
			$("#demo").load("forms/salesman/salesman_up1.php",{js_name:a},function(responseText){  
				
				if(responseText.indexOf("new")!=-1)
				{
					query_type="new";
					$("#container").notify("create", {
					  title: 'Salesman Master',
					  text: 'New Entry'
					});

				}
				else
				{
					query_type="update";
					$("#container").notify("create", {
					  title: 'Salesman Master',
					  text: 'Old Entry'
					});
					var str=responseText;
	             //	alert(str);
   					var str1=str.split(",");
					document.getElementById("s_code").value=str1[0];
					document.getElementById("s_name").value=str1[1];
					document.getElementById("s_add1").value=str1[2];
					document.getElementById("s_add2").value=str1[3];
					document.getElementById("s_add3").value=str1[4];
					document.getElementById("s_phno").value=str1[6];
					document.getElementById("s_city").value=str1[5];
					
				}
          });
}


</script>

<?php

echo"
<table style='border-spacing:10px;border-collapse:separate;padding-left:30px;padding-top:20px;width:400px'>
<tr>
<td><label>Salesman Code</label></td><td style=''><input type='text' name='s_code' id='s_code' class='mws-textinput'/></td>
</tr>
<tr>
<td><label>Salesman Name</label></td><td><input type='text' name='s_name' id='s_name' class='mws-textinput' class='basic' /></td>
</tr>
<tr>
<td><label>Address 1</label></td><td><input type='text' name='s_add1' id='s_add1'  class='mws-textinput'/></td>
</tr>
<tr>
<td><label>Address 2</label></td><td><input type='text' name='s_add2' id='s_add2'  class='mws-textinput'/></td>
</tr>
<tr>
<td><label>Address 3</label></td><td><input type='text' name='s_add3' id='s_add3'  class='mws-textinput'/></td>
</tr>
<tr>
<td><label>Phone No.</label></td><td><input type='text' name='s_phno' id='s_phno'  class='mws-textinput'/></td>
</tr>
<tr>
<td><label>City</label></td><td><input type='text' name='city' id='s_city'  class='mws-textinput'/></td>
</tr>
<tr></tr>

</table>

<div class='mws-button-row'>
				<input type='button' name='ok' id='ok' value='Confirm' class='mws-button red' />
				<input type='reset' name='reset' value='RESET' class='mws-button gray'/>
			<div id='main2' style='visibility:hidden'></div><div id='demo' style='visibility:hidden' ></div></div>";
			
?>