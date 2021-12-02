<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Thêm bài tập</title>
<!--<link rel="stylesheet" type="text/css" href="trangchung.css">-->
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
					<div class="dn" style="left: 70px; text-align: center; width: 550px; height: 350px;">
						<p>THÊM BÀI TẬP</p>
						<br>
						<form name="myForm" method="post" action="xu_ly_ad_bt.php">
							<p>Mã bài tập: &emsp;<input type="text" name="ma_bt" id="ma_bt" value="" size="35"></p>
							<p>Tên bài tập:&emsp;<input type="text" name="name" id="name" value="" size="35"></p>
							<p>Video:&emsp;&emsp;&emsp;<input type="text" name="video" id="video" value="" size="35"></p>
							<p>Nhóm: <select name="ma_nhom" id="ma_nhom">
								<option value=""></option>
								<option value="bt_01">Tập bụng</option>
								<option value="bt_02">Tập chân</option>
								<option value="bt_03">Tập vai</option>
								<option value="bt_04">Tập ngực</option>
								<option value="bt_05">Tập mông</option>
								<option value="bt_06">Tập tay</option>
							</select></p>
<!--							<br>-->
							<p><input type="submit" value="Thêm Bài Tập" name="tbt" id="tbt" style="width: 300px"></p>
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
