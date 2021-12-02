<?php
	if(isset($_REQUEST['gui']))
	{
		require("database.php");
	require("update_img.php");
	$hinhanh = upload_img('ham');
	
	$dl = new database1();

	if($hinhanh == NULL)
	{
		$hinhanh = $_REQUEST["anhht"];
	}	
	$dl->updateSPK("phonggym","sp_kho",$_REQUEST['name'],$_REQUEST['sl'],$_REQUEST['gm'],$_REQUEST['gb'],$hinhanh,$_REQUEST['nhom'],$_REQUEST['ncc'],$_REQUEST['tt'],$_REQUEST['id']);
	}
//$dtb,$table,$name,$sl,$gm,$gb,$img,$ma_nhom,$id_ncc,$tt,$id

?>