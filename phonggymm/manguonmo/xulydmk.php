<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Đăng nhập</title>
<?php
	
	if(isset($_REQUEST["dmk"]))
	{
		session_start();
		require("database.php");
		$dl = new database1();
		$tv = $dl->truyvan($_SESSION['table'],"phonggym");
		while($row = $tv->fetch())
		{
			
			if(md5($_REQUEST['mkc']) == $row['password'] && $_SESSION['taikhoan'] == $row['taikhoan'])
			{
				$dl->update($_SESSION['table'],$_REQUEST['mkm'],$_SESSION['taikhoan']);
				echo "Bạn đã đổi thành công quay về trang <a href = 'dangnhap.php'>Đăng nhập</a>";
			}
//			print_r($_SESSION);
		}
		
		
	}
?>
</body>
</html>