<?php
echo"<br><br><br><div style='padding-right:14%;padding-left:30%'>
<div style='box-shadow: 1px 1px 5px #888888;margin : 15px 15px 15px 15px;width:55%;padding-left:2%;padding-top:2%;padding-bottom:2%;padding-right:2%'><table>
 <tr><select name='branch' id='branch' width:15px >";
   
	        $con = mysql_pconnect("localhost","root","");
			mysql_select_db("my_vattrad", $con);
			$query="select * from db_list";
			$result=mysql_query($query,$con);
			while($row=mysql_fetch_assoc($result))
			{
			  echo "<option>".$row['db_name']."</option>";
			}
	
	                   
	   echo"</select></tr><tr>   
            <input type='button' name='b2' value='delete' onClick='delete_cmpny_php();'/>
			<a href='login.php'><input type='button' name='b3' value='Login'></a></tr></table></div></div>";
                        




?>
