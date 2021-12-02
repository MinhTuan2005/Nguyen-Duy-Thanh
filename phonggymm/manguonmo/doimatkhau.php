<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Quên mật khẩu</title>
<!--<link rel="stylesheet" type="text/css" href="trangchung.css">-->
<link rel="stylesheet" type="text/css" href="dangnhap.css">
<link rel="stylesheet" href="icon/fontawesome-free-5.13.1-web/fontawesome-free-5.13.1-web/css/all.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="dungchung.js"></script>
<script language="javascript">
	function kiemtra(obj)
	{
		var a = document.getElementById(obj);
		var er = document.getElementById('erro');
		if(a.value == "")
			{
				er.innerHTML = "Bạn không được để trống " + a.id;
				a.style.background = "red";
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
	function kiemtra1()
	{
		var a = document.getElementById("tk");
		var c = document.getElementById("mk1");
		var d = document.getElementById("mk2");
		var b = document.getElementById("sdt");
		if(kiemtra(a.id) == false || kiemtra(b.id) == false || kiemtra(c.id) == false || kiemtra(d.id) == false)
			{
				alert("Xem lại tài khoản, mật khẩu, số điện thoại");
				return false;
			}
		else if(c.value != d.value)
			{
				alert("Nhập lại mật khẩu sai");
				return false;
			}
		else{
			return true;
		}
	}
	
	
</script>
</head>

<body>
	<div id="Tong">
		<div id="themmenu"></div>

			<div id="Maicontent">
					<img src="../img/img-dangnhap/banner333-1024x525.png" width="1296px" height="550px">
					<div class="dn" style="height: 400px; width: 550px">
						<p>ĐỔI MẬT KHẨU</p>
						<form name="Myform" id="Myform" method="post" action="xulydmk.php" style="text-align: center; margin-top: 50px;">
							<p>Tài khoản: <input type="text" value="" name="tk" id="tk" size="40px" onBlur="kiemtra(this.id)" onFocus="mau(this)"></p>
							<p style="margin-left: -25px;">Số điện thoại: <input type="text" value="" name="sdt" id="sdt" size="40" onBlur="kiemtra(this.id)" onFocus="mau(this)"></p>
							<p>Mật Khẩu: <input type="password" value="" id="mk1" name="pass" size="40" onBlur="kiemtra(this.id)" onFocus="mau(this)"></p>
							<p style="margin-left: -65px;">Nhập lại mật khẩu: <input type="password" value="" id="mk2" name="pass1" size="40" onBlur="kiemtra(this.id)" onFocus="mau(this)"></p>
							<p id="erro" style="color: #FFF; font-size: 14px;"></p>
							
				
							<p><input type="submit" onClick="return kiemtra1()" name="dmk" value="Đổi mật khẩu"></p>
						</form>
					</div>
			</div>

		<div id="themfooter"></div>
	</div>
	
	
	
</body>
</html>