<?php
	require("database.php");
	
	$dl = new database1();
	$query = $dl->truyvan("user_noibo","phonggym");
	$query1 = $dl->truyvan("user","phonggym");
	$tk = $_POST["tkp"];
	while($row = $query->fetch())
	{
		if($tk == $row['taikhoan'])
		{
			echo 1;
		}
	}
	while($row1 = $query1->fetch())
	{
		if($tk == $row1['taikhoan'])
		{
			echo 1;
		}
	}

?>