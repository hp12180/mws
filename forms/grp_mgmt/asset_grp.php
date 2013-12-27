		<script type="text/javascript">
			$(document).ready(function() {
				var ajax_load = "<img src='loading.gif' alt='Loading...' />";
				$("#container").notify();
				
				$("#view_group").click(function(){
					document.getElementById("my_div").style.width="95%";
					document.getElementById("ques_header").innerHTML="View All Group Detalis";
					$("#basic-modal-content").show();
					 $("#my_sub_div").load("forms/grp_mgmt/view_brand_all.php",{},function(responseText){  
									 //  alert(responseText)
							$("#basic-modal-content").hide();		 
							$("#view_group_all").dataTable({sPaginationType: "full_numbers"});
							$("#view_group_all_filter").css('height','31px');
							
					 });
			 	});
				
				$("#add_group_html").click(function(){
					document.getElementById("my_sub_div").style.padding="0px";
					var load="<img src='images/ajax-loader.gif' alt='loading...' />";
					
					document.getElementById("upper_menu").innerHTML="<ul><li><a href='#' class='mws-ic-16 ic-add' id='add_group_html'>Add / Update Group</a></li><li><a href='#' class='mws-ic-16 ic-arrow-refresh' id='view_group'>View Groups</a></li></ul>";
					//alert(1);
					$("#basic-modal-content").show();
					$("#my_sub_div").load("forms/grp_mgmt/asset_grp.php",function(){
						$("#basic-modal-content").hide();
					});	
							
				});
				
				$("#add_grp").click(function() {
				
					var bsno = document.getElementById("bsno").value;
					var in_out = document.getElementById("in_out").value;
					var asset_heading = document.getElementById("asset_heading").value;
					var schd = document.getElementById("schd").value;
					var grp_type = document.getElementById("grp_type").value;
					
					
					//alert(bsno+"---"+in_out+"---"+asset_heading+"---"+schd+"---"+grp_type);
					
					$("#msg").load("forms/grp_mgmt/asset_grp_add.php", {
						bsno:bsno,
						in_out:in_out,
						asset_heading:asset_heading,
						schd:schd,
						grp_type:grp_type
					}, function(responseText) {
						//alert("Response:" + responseText);
						$("#container").notify("create", {
								  title: 'Group Master',
								  text: responseText
						});
					});
				});
				
				
					
			});

		function fetch_group_details(gr_code_edit)
		{
			//alert(gr_code_edit)
			if(gr_code_edit)
			{
				var gr_code=gr_code_edit;
				document.getElementById("bsno").value=gr_code_edit;
			}else
			{
				var gr_code=document.getElementById("bsno").value;
			}
			
			//alert(gr_code);
			 var temp=Array();
			 temp=gr_code.split("(");
			 // alert(temp)
			 $("#basic-modal-content").show();	
			 
			  $('#msg').load("forms/grp_mgmt/fetch_grp.php",{gr_code:temp[0]},function(responseText){
				 $("#basic-modal-content").hide();
					if(responseText.indexOf('|new|')!=-1)
					{
						//alert('New');
						$("#container").notify("create", {
								  title: 'Group Master',
								  text: 'New Entry'
						});
						 $("#in_out").val('');
						 $("#asset_heading").val('');
						 $("#schd").val('');
						 $("#grp_type").val('');
					}else
					{
						$("#container").notify("create", {
								  title: 'Group Master',
								  text: 'Old Entry'
						});
					 var str=responseText.split("::");
					 $("#basic-modal-content").hide();
					 $("#in_out").val(str[0]);
					 $("#asset_heading").val(str[1]);
					 $("#schd").val(str[2]);
					 $("#grp_type").val(str[3]);
					}
				});
		}
		</script>

		<?php
		
		$grp=$_GET['grp'];
			echo "
				<div class='mws-form-row'>
					<div class='mws-form-item small'>
					<label>BSNO :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<input type='text' id='bsno' class='mws-textinput' onchange='fetch_group_details()'/>
					</div>
                </div>
				<div class='mws-form-row'>
					<div class='mws-form-item small'>
					<label>In / Out :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					
						<input type='text' id='in_out' class='mws-textinput'/>
				</div>
                </div>
				<div class='mws-form-row'>
					<div class='mws-form-item small'>
					<label>Asset Heading :</label>
					
						<input type='text' id='asset_heading' class='mws-textinput'/>
					</div>
                </div>
				<div class='mws-form-row'>
					<div class='mws-form-item small'>
					<label>SCHD (Y / N) :</label>&nbsp;&nbsp;&nbsp;
					
						<input type='text' id='schd' class='mws-textinput'/>
					</div>
                </div>
				<div class='mws-form-row'>
					<div class='mws-form-item small'>				
					<label>Select Group :</label>&nbsp;&nbsp;&nbsp;

						<select id='grp_type'>"; ?>
					
						<option <?php if($grp=='asset_grp'){echo "selected=selected";} ?>>Asset Group</option>
						<option <?php if($grp=='liability'){echo "selected=selected";} ?>>Liability Group</option>
						<option <?php if($grp=='pl_debit'){echo "selected=selected";} ?>>P & L Debit Group</option>
						<option <?php if($grp=='pl_credit'){echo "selected=selected";} ?>>P & L Credit Group</option>
					
				<?php	echo "</select>
					</div>
                </div>
			</div>
			<div class='mws-button-row'>
				<input class='mws-button red' type='button' id='add_grp' value='Add'/>
				<button type='reset' id='reset' class='mws-button gray'>Reset</button>
				<button type='button' id='cancel' class='mws-button gray'>Cancel</button>
			<div id='main2' style='visibility:hidden'></div>";
		?>
