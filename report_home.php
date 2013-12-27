<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
			.notselect {
				background-color: ;
				padding-left: 5px;
				padding-right: 5px display :inline;
			}
			.select {
				width: 25px;
				color: #000000;
				text-align: center;
				display: inline;
				background-color: #C9DEEF;
				padding-left: 5px;
				padding-right: 5px;
			}
			.unhide {
				visibility: visible;
				display: inline;
				padding-left: 5px;
				padding-right: 5px;
			}
			.hide {
				visibility: hidden;
				display: inline;
				padding-left: 5px;
				padding-right: 5px;
			}
		</style>
	<style type="text/css">
			.notapplyyet {
				cursor: pointer;
			}
			.apply {
				border-style: solid;
				border-color: #D3E6F8;
				cursor: pointer;
			}
			.cls_data {
				position: absolute;
				top: 150px;
				width: 96%;
				height: 80%;
			}
			.shw2 {
				-webkit-box-shadow: 0 8px 6px -6px black;
				-moz-box-shadow: 0 8px 6px -6px black;
				box-shadow: 0 8px 6px -6px black;
			}
			.shw1 {
				position: relative;
				background-color: #DCE6ED;
				top: 10px;
				width: 265px;
				height: 400px;
				overflow-y: scroll;
				left: 1px;
				-moz-box-shadow: 5px 5px 5px rgba(68,68,68,0.6);
				-webkit-box-shadow: 5px 5px 5px rgba(68,68,68,0.6);
				box-shadow: 5px 5px 5px rgba(68,68,68,0.6);
				filter: progid :DXImageTransform.Microsoft.Blur(PixelRadius=3,MakeShadow=true,ShadowOpacity=0.30);
				-ms-filter: "progid:DXImageTransform.Microsoft.Blur(PixelRadius=3,MakeShadow=true,ShadowOpacity=0.30)";
				zoom: 1;
			}
			.shw1.content {
				position: relative; /* This protects the inner element from being blurred */
				padding: 100px;
				background-color: #DDD;
			}
			.shw3 {
				position: relative;
				background-color: #DCE6ED;
				top: 1%;
				width: 265px;
				filter: progid :DXImageTransform.Microsoft.Blur(PixelRadius=3,MakeShadow=true,ShadowOpacity=0.30);
				-ms-filter: "progid:DXImageTransform.Microsoft.Blur(PixelRadius=3,MakeShadow=true,ShadowOpacity=0.30)";
				zoom: 1;
			}
			.shw3.content1 {
				position: relative; /* This protects the inner element from being blurred */
				background-color: #DDD;
			}

		</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- Apple iOS and Android stuff (do not remove) -->
<meta name="apple-mobile-web-app-capable" content="no" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />

<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no,maximum-scale=1" />

<!-- Required Stylesheets -->
 <link rel="stylesheet" type="text/css" href="css/smoothness-1.8.13/jquery-ui-1.8.13.custom.css">
 <link rel="stylesheet" type="text/css" href="css/ui.dropdownchecklist.themeroller.css">
<link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/fonts/ptsans/stylesheet.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/fluid.css" media="screen" />

<link rel="stylesheet" type="text/css" href="css/mws.style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/icons/16x16.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/icons/24x24.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/icons/32x32.css" media="screen" />

<!-- Demo and Plugin Stylesheets -->
<link rel="stylesheet" type="text/css" href="css/demo.css" media="screen" />

<link rel="stylesheet" type="text/css" href="plugins/colorpicker/colorpicker.css" media="screen" />
<link rel="stylesheet" type="text/css" href="plugins/imgareaselect/css/imgareaselect-default.css" media="screen" />
<link rel="stylesheet" type="text/css" href="plugins/fullcalendar/fullcalendar.css" media="screen" />
<link rel="stylesheet" type="text/css" href="plugins/fullcalendar/fullcalendar.print.css" media="print" />
<link rel="stylesheet" type="text/css" href="plugins/chosen/chosen.css" media="screen" />
<link rel="stylesheet" type="text/css" href="plugins/prettyphoto/css/prettyPhoto.css" media="screen" />
<link rel="stylesheet" type="text/css" href="plugins/tipsy/tipsy.css" media="screen" />
<link rel="stylesheet" type="text/css" href="plugins/sourcerer/Sourcerer-1.2.css" media="screen" />
<link rel="stylesheet" type="text/css" href="plugins/jgrowl/jquery.jgrowl.css" media="screen" />
<link rel="stylesheet" type="text/css" href="plugins/fileinput/css/fileinput.css" media="screen" />
<link rel="stylesheet" type="text/css" href="plugins/spinner/ui.spinner.css" media="screen" />
<link rel="stylesheet" type="text/css" href="plugins/timepicker/timepicker.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/jui/jquery.ui.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/tablecloth.css" media="screen" />

<link id="ll" rel="stylesheet" type="text/css" href="css/core/form.css" media="screen" />

<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="css/mws.theme.css" media="screen" />


<!-- JavaScript Plugins -->
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/jquery.mousewheel-min.js"></script>

<!-- jQuery-UI Dependent Scripts -->
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="plugins/spinner/ui.spinner.min.js"></script>
<script type="text/javascript" src="plugins/timepicker/timepicker-min.js"></script>
<script type="text/javascript" src="js/jquery.ui.touch-punch.min.js"></script>


<link type='text/css' href='css/demo.css' rel='stylesheet' media='screen' />

<!-- Contact Form CSS files -->
<link type='text/css' href='css/basic.css' rel='stylesheet' media='screen' />
<script type='text/javascript' src='js/jquery.simplemodal.js'></script>

<!-- Plugin Scripts -->
<script type="text/javascript" src="plugins/imgareaselect/jquery.imgareaselect.min.js"></script>
<script type="text/javascript" src="plugins/duallistbox/jquery.dualListBox-1.3.min.js"></script>
<script type="text/javascript" src="plugins/jgrowl/jquery.jgrowl-min.js"></script>
<script type="text/javascript" src="plugins/fileinput/js/jQuery.fileinput.js"></script>
<script type="text/javascript" src="plugins/fullcalendar/fullcalendar.min.js"></script>
<script type="text/javascript" src="plugins/datas/jquery.dataTables-min.js"></script>
<script type="text/javascript" src="plugins/chosen/chosen.jquery.min.js"></script>
<script type="text/javascript" src="plugins/prettyphoto/js/jquery.prettyPhoto-min.js"></script>
<!--[if lt IE 9]>
<script type="text/javascript" src="plugins/flot/excanvas.min.js"></script>
<![endif]-->

<script type="text/javascript" src="plugins/colorpicker/colorpicker-min.js"></script>
<script type="text/javascript" src="plugins/tipsy/jquery.tipsy-min.js"></script>
<script type="text/javascript" src="plugins/sourcerer/Sourcerer-1.2-min.js"></script>
<script type="text/javascript" src="plugins/placeholder/jquery.placeholder-min.js"></script>
<script type="text/javascript" src="plugins/validate/jquery.validate-min.js"></script>



 <script type="text/javascript" src="plugins/src/jquery-ui-1.8.13.custom.min.js"></script>
 <script type="text/javascript" src="plugins/src/ui.dropdownchecklist.js"></script>


<link rel="stylesheet" href="panel/style.css" type="text/css" media="screen" />    


<style type="text/css">
.my_table{
	tr.odd td{
	background: none;
	}

	tr.even td{
	background: none;
	}
}

</style>
<script type="text/javascript">
 var p=0; 
        $(document).ready(function() {
        	
        	$returnS6 = $('#returnS6');
			$("#s6").dropdownchecklist({
				onItemClick: function(checkbox, selector){
					var thisIndex = checkbox.attr("id").split('-')[2].replace('i', '');
					selector.options[thisIndex].selected = checkbox.attr("checked");

					var values = "";
					var newText = 'Checkbox ID = '+checkbox.attr('id')+'<br/><br/>';
					for( i=0; i < selector.options.length; i++ ){
						newText += 'Option i = ' +i+ ' || value = ' +selector.options[i].value+ ' || checked = ' +selector.options[i].selected+ '<br/><br/>';
						if (selector.options[i].selected && (selector.options[i].value != "")){
							if ( values != "" )
								values += ";";
							values += selector.options[i].value;
						}
					}
					newText += 'Selector Value = '+values;
					$returnS6.html( newText );
				}
			});

			$('select option').removeProp('selected');
			document.getElementById("hidden_span").style.width="150px";
			//document.getElementById("hidden_span").style.width="200px";
			document.getElementById("ddcl-s6-ddw").style.width="205px";
			document.getElementById("hidden_1").style.height="auto";
			//for jquery < 1.6
			//$('select option').removeAttr('selected');
			
			$("label[for='ddcl-s6-i0']").attr({onclick:"my_toggle();"});
			//$("label[for='ddcl-s6-i0']").toggle(function(){check_all()},function(){un_check_all()})
	
       });
	   
	 
	 function my_toggle()
	 {
	 	//alert(1);
		if(p==0)
		{
			check_all();
		}
		else
		{
			un_check_all();
		}
	 	//$.toggle(function(){check_all()},function(){un_check_all()})
	 }  
	
	
	function check_all()
	{
		//alert(1);
		var i=1;
		var count=document.getElementById("item_count").value;
		//alert(count);
		while(i<=count)
		{
			document.getElementById("ddcl-s6-i"+i).checked=true;
			//alert(document.getElementById("ddcl-s6-i"+i).checked)
			i++;
		}
		p++;
	}
	
	function un_check_all()
	{
		//alert(1);
		p=0;
		var i=1;
		var count=document.getElementById("item_count").value;
		while(i<=count)
		{
			document.getElementById("ddcl-s6-i"+i).checked=false;
			i++;
		}
	}
	
    </script>
<script type="text/javascript">
	$(document).ready(function()
	{
		$("#from").datepicker();
		$("#to").datepicker();	
		
		document.getElementById("hidden_span").style.color="black";
		//$.jGrowl("Message with Header", {header: "Important!", position: "bottom-right"});
		
		document.getElementById("upper_menu").style.padding="15px";
		var load="<img src='images/ajax-loader.gif' alt='loading...' />";
		
//		$("#container").html(load).load("forms/stock_all.php",{}, function (responseText){})	
		$("#my_sub_div").html(load).load("forms/stock_all.php",{}, function (responseText){
						//alert(responseText);
						//var data=responseText.split(",");
						//alert(data)
						//document.getElementById("my_sub_div").innerHTML="";
						var count=document.getElementById("count").value;
						//alert(count)
						var i=0;
						var brand_name=new Array();
						var opening_upper=new Array();
						var opening_lower=new Array();
						var closing_upper=new Array();
						var closing_lower=new Array();
						while(i<count)
						{
							brand_name[i]=document.getElementById(i+"_brand_name").innerHTML;
							opening_upper[i]=parseInt(document.getElementById(i+"_opening_upper").innerHTML);
							opening_lower[i]=parseInt(document.getElementById(i+"_opening_lower").innerHTML);
							closing_upper[i]=parseInt(document.getElementById(i+"_closing_upper").innerHTML);
							closing_lower[i]=parseInt(document.getElementById(i+"_closing_lower").innerHTML);
							i++;
						}
						//alert(brand_name)
			chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                type: 'column'
            },
            title: {
                text: 'Stock Availability'
            },
            xAxis: {
                //
					categories: brand_name
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Stock in nnumbers'
                },
                stackLabels: {
                    enabled: true,
                    style: {
                        fontWeight: 'bold',
                        color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                    }
                }
            },
            legend: {
                align: 'right',
                x: -100,
                verticalAlign: 'top',
                y: 20,
                floating: true,
                backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColorSolid) || 'white',
                borderColor: '#CCC',
                borderWidth: 1,
                shadow: false
            },
            tooltip: {
                formatter: function() {
                    return '<b>'+ this.x +'</b><br/>'+
                        this.series.name +': '+ this.y +'<br/>'+
                        'Total: '+ this.point.stackTotal;
                }
            },
            plotOptions: {
                column: {
                    stacking: 'normal',
                    dataLabels: {
                        enabled: true,
                        color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
                    }
                }
            },
            series: [{
                name: 'Opening Upper',
                //data: [10, 5]
				data: opening_upper
            }, {
                name: 'Opening Lower',
                data: opening_lower
            }, {
                name: 'Closing Upper',
                data: closing_upper
            }, {
                name: 'Closing Lower',
                data: closing_lower
            }]
        });
	
	
	});	
						
		
		var s1=new Array();
		var a=new Array();
			
		$("#filtered_query").click(function()
		{
			var from=document.getElementById("from").value;
			var to=document.getElementById("to").value;
			
			str=document.getElementById('returnS6').innerHTML;
			
			a=str.split("Selector Value = ");
			//alert(a[1]);
			s1=a[1].split(";");
			//alert(s1);
			
			//alert(from+"---"+to+"---"+s1+"----"+csv);
			$("#my_sub_div").html(load).load("forms/filtered_query.php",{from:from,to:to,s1:s1}, function (responseText){
					//alert(responseText)
					var count=document.getElementById("count").value;
					//alert(count);
					var brand_name=new Array();
					var sale_upper=new Array();
					var sale_lower=new Array();
					var pur_upper=new Array();
					var pur_lower=new Array();
					
					var i=0;
					while(i<count)
					{
						brand_name[i]=document.getElementById(i+"_brand_name").innerHTML;
						sale_upper[i]=parseInt(document.getElementById(i+"_sale_upper").innerHTML);
						sale_lower[i]=parseInt(document.getElementById(i+"_sale_lower").innerHTML);
						pur_upper[i]=parseInt(document.getElementById(i+"_pur_upper").innerHTML);
						pur_lower[i]=parseInt(document.getElementById(i+"_pur_lower").innerHTML);
						i++;
					}
					
										//alert(brand_name);
					chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                type: 'column'
            },
            title: {
                text: 'Stock Availability'
            },
            xAxis: {
                //
					categories: brand_name
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Stock in nnumbers'
                },
                stackLabels: {
                    enabled: true,
                    style: {
                        fontWeight: 'bold',
                        color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                    }
                }
            },
            legend: {
                align: 'right',
                x: -100,
                verticalAlign: 'top',
                y: 20,
                floating: true,
                backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColorSolid) || 'white',
                borderColor: '#CCC',
                borderWidth: 1,
                shadow: false
            },
            tooltip: {
                formatter: function() {
                    return '<b>'+ this.x +'</b><br/>'+
                        this.series.name +': '+ this.y +'<br/>'+
                        'Total: '+ this.point.stackTotal;
                }
            },
            plotOptions: {
                column: {
                    stacking: 'normal',
                    dataLabels: {
                        enabled: true,
                        color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
                    }
                }
            },
            series: [{
                name: 'Sales Upper',
                //data: [10, 5]
				data: sale_upper
            }, {
                name: 'Sales Lower',
                data: sale_lower
            }, {
                name: 'Purchase Upper',
                data: pur_upper
            }, {
                name: 'Purchase Lower',
                data: pur_lower
            }]
        });					
			});
		});
		
		$("#stock").click(function(){
			document.getElementById("my_div").style.width="800px";
			document.getElementById("my_sub_div").style.padding="0px";
			document.getElementById("ques_header").innerHTML="City Details";
			/*document.getElementById("upper_menu").innerHTML="<ul><li><a href='#' class='mws-ic-16 ic-accept' id='salesman'>Add Salesman</a></li><li><a href='#' class='mws-ic-16 ic-cross' id='delete_salesman'>Delete Salesman</a></li><li><a href='#' class='mws-ic-16 ic-printer' id='update_salesman'>Update Salesman</a></li><li><a href='#' class='mws-ic-16 ic-arrow-refresh' id='view_salesman'>View Salesman</a></li></ul>";*/
			var load="<img src='images/ajax-loader.gif' alt='loading...' />";
			//$("#my_sub_div").html(load).load("forms/city_details.php");	
			
			//alert("1")
			$('#filter-modal').modal();
			
			
			
			
			$("#cls-modal").click(function (){
				var from=document.getElementById("from").value;
				var to=document.getElementById("to").value;
				if(document.getElementById("selection1").value=="on")
				{
					selection="all";
				}
				else
				{
					selection="selected";
				}
				
				
				//alert("From :"+from+"------To :"+to+"-------Selection"+selection+"------CSV :"+csv);
				
				/*$("#my_sub_div").html(load).load("forms/stock_all.php",{from:from,to:to,selection:selection,csv:csv}, function (responseText){
						//alert(responseText);
						//var data=responseText.split(",");
						//alert(data)
						//document.getElementById("my_sub_div").innerHTML="";
						var count=document.getElementById("count").value;
						alert(count)
						var i=0;
						var brand_name=new Array();
						var opening_upper=new Array();
						var opening_lower=new Array();
						var closing_upper=new Array();
						var closing_lower=new Array();
						while(i<count)
						{
							brand_name[i]=document.getElementById(i+"_brand_name").innerHTML;
							opening_upper[i]=parseInt(document.getElementById(i+"_opening_upper").innerHTML);
							opening_lower[i]=parseInt(document.getElementById(i+"_opening_lower").innerHTML);
							closing_upper[i]=parseInt(document.getElementById(i+"_closing_upper").innerHTML);
							closing_lower[i]=parseInt(document.getElementById(i+"_closing_lower").innerHTML);
							i++;
						}
						//alert(brand_name)
			chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                type: 'column'
            },
            title: {
                text: 'Stock Availability'
            },
            xAxis: {
                //
					categories: brand_name
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Stock in nnumbers'
                },
                stackLabels: {
                    enabled: true,
                    style: {
                        fontWeight: 'bold',
                        color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                    }
                }
            },
            legend: {
                align: 'right',
                x: -100,
                verticalAlign: 'top',
                y: 20,
                floating: true,
                backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColorSolid) || 'white',
                borderColor: '#CCC',
                borderWidth: 1,
                shadow: false
            },
            tooltip: {
                formatter: function() {
                    return '<b>'+ this.x +'</b><br/>'+
                        this.series.name +': '+ this.y +'<br/>'+
                        'Total: '+ this.point.stackTotal;
                }
            },
            plotOptions: {
                column: {
                    stacking: 'normal',
                    dataLabels: {
                        enabled: true,
                        color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
                    }
                }
            },
            series: [{
                name: 'Opening Upper',
                //data: [10, 5]
				data: opening_upper
            }, {
                name: 'Opening Lower',
                data: opening_lower
            }, {
                name: 'Closing Upper',
                data: closing_upper
            }, {
                name: 'Closing Lower',
                data: closing_lower
            }]
        });
				});	
				
				$.modal.close();
			});
					
		})*/
		})
		})
		//all_stock();
		
		
		
			$(".trigger").click(function(){
				$(".panel").toggle("fast");
				$(this).toggleClass("active");
				return false;
			});
	});
	
	
	function get_brand_details(brand_id)
	{
		//alert(brand_id)
		var b_name=document.getElementById(brand_id).innerHTML;
		//alert(b_name)
		//$("#my_sub_div").html(load).load("forms/city_details.php");
		window.open("forms/get_selected_stock.php?b_name="+b_name);	
	}
	
	
	
</script>

<title>MWS Admin - Dashboard</title>

</head>

<body>

		<!-- Header -->
	<div id="mws-header" class="clearfix">
    
    	<!-- Logo Container -->
    	<div id="mws-logo-container">
        
        	<!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
        	<div id="mws-logo-wrap">
            	
			</div>
        </div>
        
        <!-- User Tools (notifications, logout, profile, change password) -->
        <div id="mws-user-tools" class="clearfix">
        
        	<!-- Notifications -->
        	
            <!-- Messages -->
            
            
            <!-- User Information and functions section -->
            <div id="mws-user-info" class="mws-inset">
            
            	<!-- User Photo -->
            	<div id="mws-user-photo">
                	<img src="example/profile.jpg" alt="User Photo" />
                </div>
                
                <!-- Username and Functions -->
                <div id="mws-user-functions">
                    <div id="mws-username">
                        Hello, Adminstrator
                    </div>
                    <ul>
                    	<li><a href="#">Profile</a></li>
                        <li><a href="#">Change Password</a></li>
                        <li><a href="index-2.html">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">
    
    	<!-- Necessary markup, do not remove -->
		<div id="mws-sidebar-stitch"></div>
		<div id="mws-sidebar-bg"></div>
        
        <!-- Sidebar Wrapper -->
        <div id="mws-sidebar">
        
        	<!-- Searchbox -->
        	<div id="mws-searchbox" class="mws-inset">
            	<form action="http://www.malijuthemeshop.com/themes/mws-admin/1.3/typography.html">
                	<input type="text" class="mws-search-input" />
                    <input type="submit" class="mws-search-submit" />
                </form>
            </div>
            
            <!-- Main Navigation -->
            <div id="mws-navigation">
            	<ul>
					<li>
						<a href="dashboard.php" class="mws-i-24 i-home">Back to Dashboard</a>						
					</li>
					<li>
						<a href="#" class="mws-i-24 i-price-tag">Reports</a>
						<ul>
							<li><a href="#" class="mws-i-24 i-arrow-down" id="stock">Stock Statements</a></li>
							<li><a href="#" class="mws-i-24 i-arrow-down" id="sales_analysis">Sales Analysis</a></li>
							<li><a href="#" class="mws-i-24 i-arrow-down" id="purchase_analysis">Purchase Analysis</a></li>
							<li><a href="#" class="mws-i-24 i-arrow-down" id="cust_resport">Customerwise Report</a></li>							
						</ul>
					</li>
                </ul>
            </div>            
        </div>
        
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
        
        	<!-- Inner Container Start -->
            <div class="container" >
            <div class='mws-panel grid_8' id="my_div" style="width:970px;padding-right:40px">
                	<div class='mws-panel-header'>
                    	<span class='mws-i-24 i-list' id="ques_header">All Reports</span>
                    </div>
                    <div class='mws-panel-body'>
                		<form class='mws-form'>
                			<div class='mws-panel-toolbar top clearfix' id="upper_menu">
								
							</div>
							<div class='mws-form-inline' id='my_sub_div'>
								
							</div>
						</form>
					</div>
			</div>
			
            <!-- Inner Container End -->
                       
			<!-- Filter Modal -->		   
			
			
			<!-- Filter Modal End-->		   
					   
            <!-- Footer -->
            <div id="mws-footer">
            	Copyright © 2012 Science and Technology Park,University of Pune
            </div>
            
        </div>
        <div id="msg" style='visibility: hidden'></div>
        <!-- Main Container End -->
        <script src="js/highcharts.js"></script>
		<script src="js/modules/exporting.js"></script>
    </div>

	<div class="panel" style="position:absolute;color:#CCCCCC;">
				<table style="padding:30px;" class="my_table2">
					<tbody>
						<tr style="background:none">
							<td style="background:none;padding-left:20px"><br /></td>
						</tr>
						<tr style="background:none">
							<td style="background:none;padding-left:20px"><strong>Select Date :</strong></td>
						</tr>
						<tr style="background:none">
							<td style="background:none"></td><td style="background:none">From</td><td style="background:none"><input type="text" id="from"/></td>
						</tr>
						<tr style="background:none">
							<td style="background:none"></td><td style="background:none">To</td><td style="background:none"><input type="text" id="to"/></td>
						</tr>
						<tr style="background:none">
							<td style="background:none"><br /></td>
						</tr>
						<tr style="background:none">
							<td colspan="2" style="padding-left:20px"><strong>Select Items : </strong></td><td colspan="2">
							<select id="s6" multiple="multiple">
								<option onclick="check_all()">All Items</option>
								<?php 
								$con = mysql_pconnect("localhost","root","root");
								if (!$con)
								  {
								  die('Could not connect: ' . mysql_error());
								  }
								  else
								  {
									//echo "Successful";
								  }	
								mysql_select_db("vattrad");
							 ?>
							<?php
								$query="select * from item_master";
								$result=mysql_query($query,$con) OR die('<option>Query Failed</option>');
								$count=mysql_num_rows($result);
								$i=1;
								while($row=mysql_fetch_assoc($result))
								{
									echo "<option>".$row['group_name']."</option>";
									$i++;
								}
								echo "<input type='hidden' id='item_count' value='$count'/>";
							?>

								
							</select>
					</td>
						</tr>
						<tr style="background:none">
							<td style="background:none"><br /></td>
						</tr>						
						<tr>
							<td align="center" colspan="2"><input type="button" class="mws-button gray" value=" Ok " id="filtered_query"/></td>
						</tr>
						<tr style="background:none">
							<td style="background:none;padding-left:20px"><br /></td>
						</tr>
					</tbody>
				</table>
				 <table>
				  <tr>					
					
					
				  </tr>
				 
				</table>
				<div id="returnS6" style="visibility:hidden; width:10px;height:10px; overflow:scroll;"></div>
								</div>
				<input type="button" id="cls-modal" class="mws-button gray large" value=" Ok "/>
			</div>	
	<a class="trigger" href="#QueryBuilder">Add Filter</a>
	

</body>
</html>