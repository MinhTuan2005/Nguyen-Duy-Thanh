<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Đăng Ký Nhân Viên</title>
<!--<link rel="stylesheet" type="text/css" href="trangchung.css">-->
<link rel="stylesheet" type="text/css" href="dangnhap.css">
<link rel="stylesheet" href="icon/fontawesome-free-5.13.1-web/fontawesome-free-5.13.1-web/css/all.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="dungchung.js"></script>

<script language="javascript">
	
	$(document).ready(function(){
		
		function kiemtra(obj)
		{
			if($(obj).val() == "")
				{
					return false;
				}
			return true;
		}
		$("#dk").click(function(){
			if(kiemtra($("#ht")) == false)
				{
					alert("Bạn không được để trống họ tên");
					return false;
				}
			else if(kiemtra($("#tk")) == false)
				{
					alert("Bạn không được để trống tài khoản");
					return false;
				}
			else if(kiemtra($("#pass")) == false)
				{
					alert("Bạn không được để trống mật khẩu");
					return false;
				}
			else if(kiemtra($("#sdt")) == false)
				{
					alert("Bạn không được để trống số điện thoại");
					return false;
				}
			else if(tkoan == false)
				{
					alert("Kiểm tra tài khoản hoặc số điện thoại");
					return false;
				}
			return true;
		});
	});
	
</script>
<script type="text/javascript" src="kiemtra.js"></script>
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
					<div class="dn" style="left: 70px; text-align: center; width: 550px; height: 630px;top:10px;">
						<p>ĐĂNG KÝ NHÂN VIÊN</p>
						<form name="myForm" method="post" action="xulydk.php" enctype="multipart/form-data">
							<p>Họ tên: &emsp;&emsp;&ensp;<input type="text" name="ht" id="ht" value="" size="35"></p>
							<p>Tài khoản:&emsp;&ensp;<input type="text" name="tk" id="tk" value="" size="35"></p>
							<p>Mật khẩu: &emsp;&ensp;<input type="password" name="pass" id="pass" value="" size="35"></p>
							<p>Email:&emsp;&ensp;&ensp;&ensp;&ensp;&ensp;<input type="text" name="email" id="email" value="" size="35"></p>
							<p>Địa chỉ:&emsp;&ensp;&ensp;&ensp;&ensp;<input type="text" name="dc" id="dc" value="" size="35"></p>
							<p>Ngày Sinh: &emsp;&ensp;<input type="date" name="ns" id="ns" value="" style="width: 275px; text-align: center"></p>
							
							<p>Số điện thoại:&ensp;<input type="text" name="sdt" id="sdt" value="" size="35"></p>
							<p>Chức vụ: 
								<select name="cv" id="cv">
									<option value=""></option>
									<option value="nb_ad">Admin</option>
									<option value="nb_ql_hlv">Quản lý huấn luyện viên</option>
									<option value="nb_hlv">Huấn luyện viên</option>
									<option value="nb_nv">Nhân viên</option>
								</select>
								&emsp;Giới tính:<input type="radio" name="gt" id="gt" value="0">Nam
								<input type="radio" name="gt" id="gt" value="1">Nữ
							</p>
							
							<p>Ảnh<input type="file" name="img" id="img"></p>
							<p>Ghi chú: &emsp;<textarea name="gc" id="gc" style="width: 280px;"></textarea></p>
<!--							<input type="tel">-->
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
			echo "Đây là trang của admin  <a href='dangnhap.php'>Đăng nhập</a>";
		}
	?>
</body>
</html>
