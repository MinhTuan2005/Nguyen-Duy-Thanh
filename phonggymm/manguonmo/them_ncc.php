<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Thêm sản phẩm</title>
<link rel="stylesheet" type="text/css" href="dangnhap.css">
<link rel="stylesheet" href="icon/fontawesome-free-5.13.1-web/fontawesome-free-5.13.1-web/css/all.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="dungchung.js"></script>
</head>

<body>
	<?php 
		session_start();
		if(isset($_SESSION['taikhoan']) && isset($_SESSION['admin']) && ($_SESSION['time'] + 1000) > time())
		{
	?>
	<div id="Tong">
			<div id="themmenu"></div>
				<div id="Maicontent">
					<img src="../img/img-dangnhap/banner222-1024x525.png" width="1296px" height="650px">
					<div class="dn" style="left: 70px; text-align: center; width: 550px; height: 350px;top:50px;">
						<p>THÊM NHÀ CUNG CẤP</p>
						<form name="myForm" method="post" enctype="multipart/form-data" action="xu_ly_ad_ncc.php">
							<p>Nhà cung cấp: <input type="text" name="name" id="name" value="" size="35"></p>
							<p>Địa chỉ:&emsp;&ensp;&ensp;&ensp;&ensp;<input type="text" name="dc" id="dc" value="" size="35"></p>
							<p>Số điện thoại: &ensp;<input type="text" name="sdt" id="sdt" value="" size="35"></p>

							<p>Email: &emsp;&ensp;&ensp;&ensp;&ensp;&ensp;<input type="text" name="email" id="email" size="35"></p>
							
							
							<p><input type="submit" value="Đăng Ký" name="dk" id="dk" style="width: 300px"></p>
						</form>
					</div>
			</div>
	
	<div id="themfooter"></div>
	</div>
	<?php
		}
	else if(($_SESSION['time'] + 1000) < time())
		{
			header("location: dangxuat.php");
		}
		else{
			die("Đây là trang của admin <a href='dangnhap.php'>Đăng nhập</a>");
		}
	?>
</body>
</html>