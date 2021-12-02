<?php
			
//			require("database.php");
//			$dl = new database1();
//			$conn = $dl->connect("localhost","phonggym","root","");
//			$colum_item = 1;
//			if(isset($_GET['page']))
//			{
//				$page = $_GET['page'];
//			}
//			else
//			{
//				$page = 1;
//			}
////			$page = $_GET['page'];
//			$offset = ($page-1)*$colum_item;
//			$sql = "SELECT * FROM user_noibo,nhom WHERE nhom.ma_nhom = user_noibo.ma_nhom LIMIT $colum_item OFFSET $offset";
//			$sql1 = "SELECT * FROM user_noibo";
//			$query = $conn->query($sql);
//			$query1 = $conn->query($sql1);
//			$count = $query1->rowCount();
//			$sum_page = ceil($count/ $colum_item);
////			echo $query1;

	require("database.php");
	$dl = new database1();
	$conn = $dl->connect("localhost","phonggym","root","");
	$item_1page = 1;
	$page = $_GET['page'];
	$form = ($page-1)*$item_1page;
	settype($page,"int");
	$sql = "SELECT * FROM user_noibo,nhom WHERE nhom.ma_nhom = user_noibo.ma_nhom LIMIT $form,$item_1page";
	$query = $conn->query($sql);
	while($row = $query->fetch())
	{
		echo "<pre>";
		print_r($row);
		echo "</pre>";
	}
	$sql1 = "SELECT * FROM user_noibo,nhom WHERE nhom.ma_nhom = user_noibo.ma_nhom";
	$query1 = $conn->query($sql1);
	$count = $query1->rowCount();
	$sum_page = ceil($count / $item_1page);
//	echo $sum_page;
?>