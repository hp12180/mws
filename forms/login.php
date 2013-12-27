<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- Apple iOS and Android stuff (do not remove) -->
<meta name="apple-mobile-web-app-capable" content="no" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />

<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no,maximum-scale=1" />


<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="../css/reset.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../css/text.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../css/fonts/ptsans/stylesheet.css" media="screen" />

<link rel="stylesheet" type="text/css" href="../css/core/form.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../css/core/login.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../css/core/button.css" media="screen" />

<link rel="stylesheet" type="text/css" href="../css/mws.theme.css" media="screen" />

<!-- JavaScript Plugins -->
<script type="text/javascript" src="../js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="../js/jquery.placeholder.js"></script>

<!-- jQuery-UI Dependent Scripts -->
<script type="text/javascript" src="../jui/js/jquery-ui-effects.min.js"></script>

<!-- Plugin Scripts -->
<script type="text/javascript" src="../plugins/validate/jquery.validate-min.js"></script>

<!-- Login Script -->
<script type="text/javascript" src="../js/core/login.js"></script>

<title>MWS Admin - Login Page</title>

   <script type="text/javascript">
         
/////////////////////// AJAX Function Begin///////////////////////////////

	var READY_STATE_UNINITIALIZED   = 0;
        var READY_STATE_LOADING         = 1;
        var READY_STATE_LOADED          = 2;
        var READY_STATE_INTERACTIVE     = 3;
        var READY_STATE_COMPLETE        = 4;
		
function getXMLObject()  //XML OBJECT
{
   var xmlHttp = false;
   try {
     xmlHttp = new ActiveXObject("Msxml2.XMLHTTP")  // For Old Microsoft Browsers
   }
   catch (e) {
     try {
       xmlHttp = new ActiveXObject("Microsoft.XMLHTTP")  // For Microsoft IE 6.0+
     }
     catch (e2) {
       xmlHttp = false   // No Browser accepts the XMLHTTP Object then false
     }
   }
   if (!xmlHttp && typeof XMLHttpRequest != 'undefined') {
     xmlHttp = new XMLHttpRequest();        //For Mozilla, Opera Browsers
   }
   return xmlHttp;  // Mandatory Statement returning the ajax object created
}
 
var xmlhttp = new getXMLObject();	//xmlhttp holds the ajax object
////////////////////////////////////////////////////////////////////////////////		



function mylogin() {
  //alert("pankaj");
  var name=document.getElementById("t1").value;
  var pas=document.getElementById("t2").value;
  var branch_name=document.getElementById("branch_name").value;
 // alert(pas);
  var getdate = new Date(); 
  if(xmlhttp) {
    xmlhttp.open("POST","mylogin.php",true); 
    xmlhttp.onreadystatechange  = mylogin_Response;
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.send("nam="+name+"&pass="+pas+"&branch_name="+branch_name); 
    //xmlhttp.send(); 
	
  }
}

function mylogin_Response() {
  // alert("asd");
   if (xmlhttp.readyState == 4) {
     if(xmlhttp.status == 200) {
	 //alert(xmlhttp.responseText);
			//document.getElementById("t1").value=xmlhttp.responseText;
			var str=xmlhttp.responseText;
			if(str=="error")
			{
			 alert("wrong username or password....login again");
			 window.location="login.php";
			}
			else{
			
			window.location="../dashboard.php";
			 }
			 
		}
     else {
        alert("Error during AJAX call. Please try again");
     }
   }
   
}

   
function cmpny_delete()
{
  var getdate = new Date(); 
  if(xmlhttp) {
    xmlhttp.open("POST","delete_company.php",true); 
    xmlhttp.onreadystatechange  = cmpny_delete_Response;
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.send(); 
	
  }
}

function cmpny_delete_Response() {
   if (xmlhttp.readyState == 4) {
     if(xmlhttp.status == 200) {
        	
	  	document.getElementById("bigbox").innerHTML=xmlhttp.responseText;
		//alert(xmlhttp.responseText);
			
			}
     else {
        alert("Error during AJAX call. Please try again");
     }
   }
   
}

function delete_cmpny_php(){
var branch_name=document.getElementById("branch").value;
var del=confirm("do u really want to delete this record"); 
if(del==false)
{
  
xmlhttp.open("delete_company.php"); 
}
else{
var getdate = new Date(); 
  if(xmlhttp) {
    xmlhttp.open("POST","delete_cmpny_php.php",true); 
    xmlhttp.onreadystatechange  =delete_cmpny_php_Response;
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.send("branch_name="+branch_name); 
 }

}
}

function delete_cmpny_php_Response() {
    if (xmlhttp.readyState == 4) {
     if(xmlhttp.status == 200) {

             alert(xmlhttp.responseText);	
			 window.location="login.php";
 
              }

    else {
     
        alert("Error during AJAX call. Please try again");
     }
   }
   
   }

   
   </script>
   </head>
    <body>
<div id="bigbox">
<div id="mws-login-wrapper">

        <div id="mws-login">
		
            <h1>Login</h1>
            <div class="mws-login-lock"><img src="css/icons/24/locked-2.png" alt="" /></div>
            <div id="mws-login-form">
                <form class="mws-form">
				
	                    <div class="mws-form-row">
                        <div class="mws-form-item large">
                        <input type="text" name="t1" id="t1" class="mws-login-username mws-textinput required" placeholder="username" />
                        </div>
                        </div>
                        <div class="mws-form-row">
                        <div class="mws-form-item large">
                        <input type="password" name="t2" id="t2" class="mws-login-password
mws-textinput required" placeholder="password" />
                        </div>
                        </div>
						<div class="mws-form-row">
                        <div class="mws-form-item large">
                        <select name="branch_name" id="branch_name" class="mws-textinput" placeholder="Select_Company">
   <?php
	        $con = mysql_pconnect("localhost","root","");
			mysql_select_db("my_vattrad", $con);
			$query="select * from db_list";
			$result=mysql_query($query,$con);
			while($row=mysql_fetch_assoc($result))
			{
			  echo "<option>".$row['db_name']."</option>";
			}
	?>
	</select>
                        </div>
                        </div>
						<div class="mws-form-row">
                        <div class="mws-form-item large">
						<a href="../login/install_html.php" class="mws-textinput">Create New Company</a>
                        
                        </div>
                        </div>
						
                        <div class="mws-form-row">
                        <div class="mws-form-item large">
						
						<label onClick="cmpny_delete();" style="cursor:pointer" class="mws-textinput">Delete Company</label>
                        
                        </div>
                        </div>
						<div class="mws-form-row">
                        <div class="mws-form-item large">
                        <input type="button" name="b1" value="login" onClick="mylogin();" class=" mws-textinput" />
                        </div>
                        </div>
</div>
						

	
	</body>
</html>