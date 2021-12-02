<?php
	require("kiemtra.php");
	session_start();
	if(isset($_REQUEST['dn']))
	{
		if(kiemtradb($_REQUEST['tk'],$_REQUEST['pass']) == true && ($_SESSION['time'] + 1000) > time() && isset($_SESSION['cv']))
		{
			header("location: trangchinh.php");
		}
//		else if(kiemtradb($_REQUEST['tk'],$_REQUEST['pass']) == true && ($_SESSION['time'] + 1000) > time() && $_SESSION['cv'] == "nb_ql_hlv")
//		{
//			header("location: trangchinh.php");
//		}
		else if(kiemtradb($_REQUEST['tk'],$_REQUEST['pass']) == true && ($_SESSION['time'] + 1000) > time() && $_SESSION['admin'] == "nb_ad")
		{
			header("location: trangchuadmin.php");
		}
		else if(kiemtradb1($_REQUEST['tk'],$_REQUEST['pass']) == true && ($_SESSION['time'] + 1000) > time())
		{
			header("location: trangchinh.php");
		}
		else if(isset($_SESSION['erro']))
		{
			echo "Tài khoản của bạn đã hết hạn <a href = 'javascript:history.back()'>Quay lại</a>";
//			session_start();
			session_unset();
		}
    	else{
			echo "Bạn nhập sai tài khoản hoặc mật khẩu quay về trang <a href = 'javascript:history.back()'>Quay lại</a>";
		}
	}
	
?>