<script type="text/javascript"> 
$(document).ready(function() {

		  var salesman//=new Array();
		  $("#container").notify();	
		  
		  $("#view_narration").click(function(){
				document.getElementById("my_div").style.width="95%";
				document.getElementById("ques_header").innerHTML="View All List of Salesmans";
				$("#basic-modal-content").show();
				$("#my_sub_div").load("forms/narration/view_narration.php",{},function(responseText){  
								 //  alert(responseText)
						$("#basic-modal-content").hide();		 
						$("#view_all_narration").dataTable({sPaginationType: "full_numbers"});
						$("#view_all_narration_filter").css('height','31px');
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
       	
		$("#add_narration").click(function(){
			$("#basic-modal-content").show();	
			document.getElementById("ques_header").innerHTML="Add Narration";
			document.getElementById("my_div").style.width="750px";
			$("#my_sub_div").load("forms/narration/narattion_det.php",function(){
				$("#basic-modal-content").hide();
			});	
		});	
			
       	$("#ok").click(function(){
	     	
	     	
			        var narration_no=document.getElementById("narration_no").value;
					var heading=document.getElementById("heading").value;
					var narration=document.getElementById("narration_body").value;
					
	     	/* here "demo" is the id of the div element where u want to write response */
			$("#demo").load("forms/narration/add_narration.php",{narration_no:narration_no,heading:heading,narration:narration},function(responseText){  
				//alert(responseText)
				$("#container").notify("create", {
				  title: 'Narration Master',
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
function fetch_narration_detalis(name)
{
	var a=name;
	//alert(name)
	     	/* here "demo" is the id of the div element where u want to write response */
			//alert(a);
			$("#demo").load("forms/narration/narration_up1.php",{js_name:a},function(responseText){  
				
				if(responseText.indexOf("new")!=-1)
				{
					query_type="new";
					$("#container").notify("create", {
					  title: 'Narration Master',
					  text: 'New Entry'
					});

				}
				else
				{
					query_type="update";
					$("#container").notify("create", {
					  title: 'Narration Master',
					  text: 'Old Entry'
					});
					var str=responseText;
	             //	alert(str);
   					var str1=str.split(",");
					document.getElementById("narration_no").value=str1[0];
					document.getElementById("heading").value=str1[1];
					document.getElementById("narration_body").value=str1[2];
					
					
				}
          });
}


</script>
<form action="#" method="post">
<table style='border-spacing:10px;border-collapse:separate;width:100%;padding:30px'>
<tr>
<td>Narration No </td><td><input type="text" name="narration_no" id="narration_no"  class='mws-textinput'/></td>
<td></td>
<td>Heading </td><td><input type="text" name="heading" id="heading" class='mws-textinput' /></td>
</tr>
<tr></tr><tr></tr>
<tr>
<td>Narration </td><td  colspan="3"><textarea name="narration" id="narration_body" style="width:400px"></textarea></td>
</tr>
</table>
</form>
<div class='mws-button-row'>
				<input type='button' name='ok' id="ok" value='Submit' class='mws-button red'/>
				<input type='reset' name='reset' value='Reset'  class='mws-button gray'/>
</div>
<div id="demo" style="display:none" ></div>