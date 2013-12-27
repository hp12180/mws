<?php 
    include("conectivity/cone.php");
	
	$sql="select * from acc_det_information";
	$result=mysql_query($sql);
	$count=mysql_num_rows($result);
	if($count<0 || $count=='')
	{
		echo "No Records";
		
	}
	else 
	{
	
		$str.='<table id="view_account_all" class="mws-datatable mws-table">
			<thead>
				<tr>
					<th>Account Code</th>
					<th>Account Name</th>
					<th>Type(Code)</th>
					<th>Debit</th>
					<th>Credit</th>
				</tr>
			</thead>
			<tbody>';
		while($row = mysql_fetch_assoc($result))
		{
			$query="select `ASSET_HEADING` from group_master where `BSNO`='".$row['acc_code']."'";
			//echo $query;
			$as_name=mysql_query($query);
			$as_name_row=mysql_fetch_array($as_name);
			$str.='<tr>
					<td>'.$row['gr_type'].'</td>
					<td>'.$row['acc_name'].'</td>
					<td>'.$as_name_row[0].'('.$row['acc_code'].')</td>
					<td>'.$row['acc_code'].'</td>
					<td>'.$row['acc_code'].'</td>
				</tr>';
		}
	}
	$str.='</tbody></table>';
	echo "$str";
?> 