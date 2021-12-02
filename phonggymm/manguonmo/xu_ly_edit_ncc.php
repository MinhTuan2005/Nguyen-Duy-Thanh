<?php
	if(isset($_REQUEST['gui']))
	{
		require("database.php");

	$dl = new database1();
	$dl->connect("localhost","phonggym","root","");
	$dl->updateNCC("phonggym","ncc",$_REQUEST['name'],$_REQUEST['dc'],$_REQUEST['sdt'],$_REQUEST['email'],$_REQUEST['id']);
	}
//	$dtb,$table,$name,$sl,$dg,$img,$ma_nhom,$tt
//echo $_REQUEST["cv"];
?>