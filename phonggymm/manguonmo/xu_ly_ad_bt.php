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
		$dl->addBT("phonggym","baitap",$_REQUEST["ma_bt"],$_REQUEST["name"],$_REQUEST["ma_nhom"],$_REQUEST["video"]);
		echo "Thêm thành công <a href='trangchuadmin.php'>Quay lại trang admin</a>"
	?>
</body>
</html>