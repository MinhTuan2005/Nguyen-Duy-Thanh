<?php
	if(isset($_REQUEST['sua']))
	{
		require("database.php");
		require("update_img.php");
		
		$hinhanh = upload_img('ham');
		if($hinhanh == null)
		{
			$hinhanh = $_REQUEST['anhht'];
		}
		$dl = new database1();
		$dl->updateKH("phonggym","user",$_REQUEST['name'],$_REQUEST['sdt'],$_REQUEST['ns'],$_REQUEST['gt'],$hinhanh,$_REQUEST['dc'],$_REQUEST['tt'],$_REQUEST['id']);
	}

?>