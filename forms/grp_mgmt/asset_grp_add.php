<?php require_once '../conectivity/cone.php';
//con1;
$bsno=$_POST['bsno'];
$in_out=$_POST['in_out'];
$asset_heading=$_POST['asset_heading'];
$schd=$_POST['schd'];
$grp_type=$_POST['grp_type'];

$select="select * from group_master where BSNO='$bsno'";
$result=mysql_query($select);
$count=mysql_num_rows($result);
if($count>0)
{
	$sql="update group_master set IN_OUT='$in_out',ASSET_HEADING='$asset_heading',SCHD='$schd',GROUP_NAME='$grp_type' where BSNO='$bsno'";
	//$str="Update";
	$str="Entry is Successfully Updated in Group Master";
}else
{
	$sql="insert into group_master(BSNO,IN_OUT,ASSET_HEADING,SCHD,GROUP_NAME) values ('$bsno','$in_out','$asset_heading','$schd','$grp_type')";
	$str="Entry is Successfully Added in Group Master";
	//$str="Insert";
}
$result=mysql_query($sql) or die('Error : '.mysql_error());

if($result)
{
	echo "$str";
	//echo "Entry is Successfully Added in Group Master";
}
else
{
	echo "$sql";
}
?>