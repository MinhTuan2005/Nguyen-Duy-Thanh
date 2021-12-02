<?php
	if(isset($_REQUEST['gui']))
	{
		require("database.php");
	require("update_img.php");
	$hinhanh = upload_img('ham');
	if($hinhanh == null)
	{
		$hinhanh = $_REQUEST['anhht'];
	}
	$dl = new database1();
	$dl->connect("localhost","phonggym","root","");
	$dl->updateNV("phonggym","user_noibo",$_REQUEST['name'],$_REQUEST['sdt'],$_REQUEST['email'],$_REQUEST['ns'],$_REQUEST['gt'],$hinhanh,$_REQUEST['dc'],$_REQUEST['cv'],$_REQUEST['id']);
	}
	
//echo $_REQUEST["cv"];
?>