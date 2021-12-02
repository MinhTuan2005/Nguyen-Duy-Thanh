<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="menu.css">
<!--	<link rel="stylesheet" href="icon/fontawesome-free-5.13.1-web/fontawesome-free-5.13.1-web/css/all.css">-->
</head>

<body>
	<div id="header">
				<div class="anhmenu">
					<img  src="../img/img-index/Logo.png">
				</div>
				<div class="menu1">
					<ul class="menu">
						<li><a href="trangchinh.php">TRANG CHỦ</a></li>
						<li><a href="dangnhap.php">ĐĂNG NHẬP</a></li>
						<li><a href="sanpham.php">SẢN PHẨM</a></li>
<!--						<li>ĐĂNG KÝ</li>-->
					
						<li>PHÒNG TẬP</li>
						<li><a href="coach.php">COACH</a></li>
						<li>ƯU ĐÃI</li>
						<li>
							KIẾN THỨC
							<ul>
								<li><a href="bt.php" style="color: black">Thư viện bài tập</a></li>
								<li>Blog</li>
								<li>Vlog</li>
							</ul>
						</li>
						<li><a href="lienhe.php">LIÊN HỆ</a></li>
						<li><a href="trang_ca_nhan.php">
							
							<?php
								session_start();
								if(isset($_SESSION['taikhoan']) && ($_SESSION['time'] + 1000) > time())
								{
									echo $_SESSION['name'];
									
							?>
							
							<i class="fas fa-sort-down"></i>
							
							</a>
							<ul class="dangxuat">
								<li><a href="dangxuat.php" style="color: black;">Đăng xuất</a></li>
							</ul>
							<?php
								}
							?>
						</li>
					</ul>
				</div>	 
				<div class="clear"></div>
		<div class="hethan">
		<?php
			if(isset($_SESSION['hethan']) && isset($_SESSION['taikhoan']) && ($_SESSION['time'] + 1000) > time())
			{
				date_default_timezone_set('Asia/Ho_Chi_Minh');
				echo "<h4 align='center' style='color: red;'>Tài khoản Bạn còn ".ceil($_SESSION['hethan'] / 86400)." ngày</h4>";
			}
		?>
	</div>
		</div>
	
</body>
</html>