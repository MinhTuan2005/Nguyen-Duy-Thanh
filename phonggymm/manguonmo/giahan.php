<?php

	require("database.php");
	$dl = new database1();
	$conn = $dl->connect("localhost","phonggym","root","");
	$sql = "UPDATE user SET date_start=?, term=?, date_end=?, trang_thai=? WHERE id=?";
	$query = $dl->truyvanTCN("user","phonggym",$_REQUEST['id']);
	while($row = $query->fetch())
	{
		if($row['date_end'] >= time())
		{
			$_REQUEST['end'] = $row['date_end'] + $_REQUEST['term']*24*60*60;
			$tiep = $row['date_start'];
			$thoigian = $row['term'] + $_REQUEST['term'];
			
		}
		else
		{
			$_REQUEST['end'] = strtotime($_REQUEST['start']) + $_REQUEST['term']*24*60*60;
			$tiep = strtotime($_REQUEST['start']);
			$thoigian = $_REQUEST['term'];
		}
		
	}
	
	if($_REQUEST['end'] <= time()+4*24*60*60 && $_REQUEST['end'] > time())
	{
		$_REQUEST['tt'] = "Sắp hết hạn";
	}
	else if($_REQUEST['end'] > time()+4*24*60*60)
	{
		$_REQUEST['tt'] = "Còn hạn";
	}
	$pr = $conn->prepare($sql);
	$pr->bindParam(1,$tiep);
	$pr->bindParam(2,$thoigian);
	$pr->bindParam(3,$_REQUEST['end']);
	$pr->bindParam(4,$_REQUEST['tt']);
	$pr->bindParam(5,$_REQUEST['id']);
	$pr->execute();
//	echo $_REQUEST['end'];
?>