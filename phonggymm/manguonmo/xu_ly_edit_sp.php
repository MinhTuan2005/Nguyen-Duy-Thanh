<?php
	if(isset($_REQUEST['gui']))
	{
		require("database.php");
	require("update_img.php");
		
	$hinhanh = upload_img('ham');
	$dl = new database1();
	$dl->connect("localhost","phonggym","root","");
	$dl->updateSP("phonggym","sanpham",$_REQUEST['name'],$_REQUEST['sl'],$_REQUEST['dg'],$hinhanh,$_REQUEST['nhom'],$_REQUEST['tt'],$_REQUEST['id']);
	}
//	$dtb,$table,$name,$sl,$dg,$img,$ma_nhom,$tt
//echo $_REQUEST["cv"];
?>