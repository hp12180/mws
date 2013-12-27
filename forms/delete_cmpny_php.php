<?php

$con = mysql_pconnect("localhost","root","");
$branch_name=$_POST['branch_name'];
$sql1="drop database $branch_name";
mysql_select_db("my_vattrad", $con);


$sql="delete from db_list where db_name='$branch_name'";



if(mysql_query($sql1,$con))
{
    if(mysql_query($sql,$con))
      {
        echo"deleted succssesfully.....";

      }
	  else
	  {
	  
	       echo"Error...";
	  }
}
else
{

  echo"Not deleted";

}

?>