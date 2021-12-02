<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
		require("database.php");
		$dl = new database1();
		$dl->updateBT("phonggym","baitap",$_REQUEST["name"],$_REQUEST["new_video"],$_REQUEST["nhom"],$_REQUEST["ma_bt"]);
//	($dtb,$table,$name,$video,$ma_nhom,$id)
	?>
</body>
</html>