<?php
	require("database.php");
	$dl = new database1();
	$query = $dl->truyvan("user_noibo","phonggym");
$query1 = $dl->truyvan("user","phonggym");
	$sdt = $_POST['sdt'];
	while($row = $query->fetch())
	{
		if($sdt == $row["sdt"])
		{
			echo 1;
		}
	}
while($row1 = $query1->fetch())
	{
		if($sdt == $row1['sdt'])
		{
			echo 1;
		}
	}
?>