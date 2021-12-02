<?php
session_start();
if(isset($_SESSION['taikhoan']) && isset($_SESSION['admin']) && ($_SESSION['time'] + 1000) > time())
	{
		if(isset($_REQUEST['id']))
		{
			
		
		function xoa($id)
		{
		//	session_start();
			require_once("database.php");
			$dl = new database1();
			$query = $dl->truyvan($_REQUEST['dc'],"phonggym");
			while($row = $query->fetch())
			{
				if($row['id'] == $id)
				{
					$dl->delete($_REQUEST['dc'],$row["id"]);
					echo("xóa thành công <a href='trangchuadmin.php'>Quay lại trang admin</a>");
				}
			}
		}
		
			switch($_REQUEST['dc'])
			{
				case "user_noibo":
					xoa($_REQUEST['id']); 
					break;
				case "user":
					xoa($_REQUEST['id']); 
					break;
				case "sanpham":
					xoa($_REQUEST['id']); 
					break;
				case "baitap":
					xoa($_REQUEST['id']); 
					break;
				case "giohang":
					xoa($_REQUEST['id']); 
					break;
				case "ncc":
					xoa($_REQUEST['id']); 
					break;
				case "sp_kho":
					xoa($_REQUEST['id']); 
					break;
				case "phieunhap":
					xoa($_REQUEST['id']); 
					break;
				case "phieuxuat":
					xoa($_REQUEST['id']); 
					break;
			}
		
		}
}
else{
	die("Đây là trang của admin <a href='dangnhap.php'>Đăng nhập</a>");
}
?>