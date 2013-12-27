<?php
 $con = mysql_pconnect("localhost","root","");
	if (!$con)
	  {
	  die('Could not connect: ' . mysql_error());
	  }
 @session_start();
$branch=$_SESSION['branch_name'];
//echo "Branch :$branch";
mysql_select_db("$branch", $con);

	
?>