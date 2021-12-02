<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Đăng nhập</title>

<link rel="stylesheet" type="text/css" href="dangnhap.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="dungchung.js"></script>
<script language="javascript">
		function kiemtra()
		{
			var A = document.Myform.tk.value;
			var er = document.getElementById('erro');
//			var er1 = /^\w+@\w+(\.\w+){1,2}$/;
			if(A == "")
				{
					er.innerHTML = "Bạn không được để trống tk";
					document.Myform.tk.style.background = "red";
					return false;
					
				}
//			else if(er1.test(A) == false)
//				{
//					er.innerHTML = "Bạn nhập tk sai";
//					document.Myform.tk.style.background = "red";
//					return false;
//				}
			else{
				er.innerHTML = "";
				return true;
			}
			
		}
		function kiemtra1()
		{
			var B = document.Myform.pass.value;
			var er = document.getElementById('erro');
			if(B == "")
				{
					er.innerHTML = "Bạn không được để trống mật khẩu";
					document.Myform.pass.style.background = 'red';
					return false;
				}
			else{
				er.innerHTML = "";
				return true;
			}
		}
		function mau(obj)
		{
			
				obj.style.background = "#FFF";
		}
		function dn()
		{
			if(kiemtra() == false || kiemtra1() == false)
				{
					alert("Kiểm tra lại tk hoặc mật khẩu");
					return false;
				}
			else{
				return true;
			}
		}
</script>

</head>

<body>
	<?php
	session_start();
		if(isset($_SESSION['taikhoan']) && ($_SESSION['time'] + 1000) > time() && isset($_SESSION['admin']))
		{
			header("location: trangchuadmin.php");	
		}
	else if(isset($_SESSION['taikhoan']) && ($_SESSION['time'] + 1000) > time())
	{
		header("location: trangchinh.php");
	}
	else{
	?>
	<div id="Tong">
			<div id="themmenu"></div>
			<div id="Maicontent">
					<img src="../img/img-dangnhap/banner333-1024x525.png" width="1296px" height="550px">
					<div class="dn">
						<p>MỜI BẠN ĐĂNG NHẬP</p>
						<form name="Myform" id="Myform" method="post" action="xulydangnhap.php" style="text-align: center; margin-top: 50px;">
							<p>Tài khoản: <input type="text" value="" name="tk" id="tk" size="40px" onBlur="kiemtra()" onFocus="mau(this)"></p>
							<p>Mật Khẩu: <input type="password" value="" onBlur="kiemtra1()" name="pass" size="40px" onFocus="mau(this)"></p>
							<p id="erro" style="color: #FFF; font-size: 14px;"></p>
							
							<div class="thea">
							<a href="#"></a>
							<a href="doimatkhau.php">Quên mật khẩu?</a>
							</div>
							<p><input type="submit" name="dn" onClick="return dn()" value="Đăng Nhập"></p>
						</form>
					</div>
			</div>
		
	</div>
	<div id="themfooter"></div>
		
	<?php
	}
	?>
</body>
</html>
