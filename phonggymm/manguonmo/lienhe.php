<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Liên Hệ</title>

<link rel="stylesheet" type="text/css" href="lienhe.css">
<link rel="stylesheet" href="icon/fontawesome-free-5.13.1-web/fontawesome-free-5.13.1-web/css/all.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="dungchung.js"></script>
	<script language="javascript">
		function kiemtraname()
		{
			var ten = document.myForm.hoten;
			if(ten.value == "")
				{
					document.getElementById('erroname').innerHTML = "! Bạn không được bỏ trống tên";
					document.getElementById('erroname').style.color = 'red';
					ten.style.background = 'red';
					return false;
				}
			else if(isNaN(ten.value) == false)
				{
					document.getElementById('erroname').innerHTML = "! Bạn nhập sai tên";
					document.getElementById('erroname').style.color = 'red';
					ten.style.background = 'red';
					return false;
				}
			else
				{
					document.getElementById('erroname').innerHTML = "";
					return true;
				}
			
		}
		function kiemtrasdt()
		{
			var dd = document.myForm.sdt;
			var dd1 = /^0\d{9}$/;
			if(dd.value == "")
				{
					document.getElementById('errodt').innerHTML = "! Bạn không được bỏ trống số điện thoại";
					document.getElementById('errodt').style.color = 'red';
					dd.style.background = 'red';
					return false;
				}
			else if(dd1.test(dd.value) == false)
				{
					document.getElementById('errodt').innerHTML = "! Bạn nhập sai số điện thoại";
					document.getElementById('errodt').style.color = 'red';
					dd.style.background = 'red';
					return false;
				}
			else{
				document.getElementById('errodt').innerHTML = "";
				return true;
			}
		}
		function kiemtraemail()
		{
			var A = document.myForm.email;
			var er1 = /^\w+@\w+(\.\w+){1,2}$/;
			if(A.value == "")
				{
					document.getElementById('erroemail').innerHTML = "! Bạn không được để trống email";
					document.getElementById('erroemail').style.color = 'red';
					A.style.background = "red";
					return false;
					
				}
			else if(er1.test(A.value) == false)
				{
					document.getElementById('erroemail').innerHTML = "Bạn nhập email sai";
					document.getElementById('erroemail').style.color = 'red';
					A.style.background = "red";
					return false;
				}
			else{
				document.getElementById('erroemail').innerHTML = "";
				return true;
			}
		}
		function mau(obj)
		{
			obj.style.background = "#FFF";
		}
		function kiemtraSelect()
		{
			if(document.myForm.sl.selectedIndex == 0)
				{
					document.getElementById('erros').innerHTML = "! Bạn phải chọn cơ sở";
					document.getElementById('erros').style.color = "red";
					document.myForm.sl.style.background = 'red';
					return false;
				}
			else{
				document.getElementById('erros').innerHTML = "";
			}
		}
		function kiemtranc()
		{
			if(document.getElementById('nc').value == "")
				{
					document.getElementById('erronc').innerHTML = "! Bạn hãy viết như cầu";
					document.getElementById('erronc').style.color = 'red';
					document.getElementById('nc').style.border = '2px solid red';
					return false;
				}
			else
				{
					document.getElementById('erronc').innerHTML = "";
					document.getElementById('nc').style.border = '2px solid black';
					return true;
				}
		}
		function gui()
		{
			if(kiemtraname() == false || kiemtraemail() == false || kiemtranc() == false || kiemtrasdt() == false)
				{
					alert("Bạn phải nhập đủ");
				}
			else{
				alert("Bạn đã gửi thành công!!!");
			}
		}
	</script>
</head>

<body>
	<div id="Tong">
		<div id="themmenu"></div>
		<div id="banner" style="position: relative;">
			<img src="https://reviewphongtap.com/wp-content/uploads/2019/10/phong-tap-rambo-gym-fitness-9.jpg" width="1296px" height="500px">
			<div class="anhde">
					<br>
					<h1 align="center" style="color: yellow; font-size: 60px; font-weight: 700;">LIÊN HỆ</h1>
					<hr width="100px" style="height: 5px; background: yellow; border: none;">
					<br>
					<p align="center" style="font-size: 22px; color: #FFF;">Để được tư vấn và tham quan phòng tập miễn phí, hãy để lại số điện thoại hoặc<br>liên hệ với chúng tôi qua hotline 1900.2208<br>
					Swequity – Nơi bắt đầu hành trình biến đổi của bạn</p>
			</div>
			<div class="anhde1">
			</div>
		</div>
			
		<div id="Maincontent">
			<div class="trai">
				<div class="nd">
<!--					======================================Địa chỉ===========================-->
					<h1>ĐỊA CHỈ</h1>
					<hr width="80px" style="margin-left: 0px; height: 3px; background: yellow; border: none;">
					<div>
						<p><b>SUF 1 LƯƠNG YÊN:</b>
						<br>Tầng 10 Hanoi Creative City, 01 Lương Yên, Hai Bà Trưng, Hà Nội
						</p>
						<br>
						
						<p><b>SUF 2 KIM MÃ:</b>
						<br>Tầng 3, 523 Kim Mã, Ba Đình, Hà Nội
						</p>
						
						<br>
						<p><b>SUF 3 LÊ VĂN THIÊM:</b>
						<br>Tầng 6 tòa D, 15 Lê Văn Thiêm, Thanh Xuân, Hà Nội
						</p>
					</div>
					<br>
<!--					======================================Thông tin===========================-->
					<h1>THÔNG TIN LIÊN LẠC</h1>
					<hr width="350px" style="margin-left: 0px; height: 3px; background: yellow; border: none;">
					<br>
					<p><b>HOTLINE:</b> 1900.2208<br>
						<b>EMAIL:</b> info@swequity.vn</p>
					<br>
<!--					======================================follow===========================-->
					<h1>FOLLOW US</h1>
					<hr width="350px" style="margin-left: 0px; height: 3px; background: yellow; border: none;">
					<br>
					<img src="../img/img-lienhe/fb.png">
					<img src="../img/img-lienhe/yt.png">
					<img src="../img/img-lienhe/489396-70x70.png">
				</div>
	
			</div>
			
			<div class="phai">
<!--					======================================tư vấn miễn phí==========================-->
				<h1>TƯ VẤN MIỄN PHÍ</h1>
				<hr width="350px" style="margin-left: 0px; height: 3px; background: yellow; border: none;">
				<p  style="color: #5E5B5B;">Liên hệ với chúng tôi để nhận thông tin về các gói tập và dịch vụ</p>
				<br>
				<br>
				<form name="myForm" id="myForm">
					<p style="color: #5E5B5B; font-size: 22px;">Tên của bạn*<br><input type="text" name="hoten" onFocus="mau(this)" onBlur="kiemtraname()" style="height: 25px; width: 600px;"></p>
					<p id="erroname"></p>
					<p style="color: #5E5B5B; font-size: 22px;">Số điện thoại*<br><input type="text" onFocus="mau(this)" onBlur="kiemtrasdt()" value="" name="sdt" style="height: 25px; width: 600px;"></p>
					<p id="errodt"></p>
					<p style="color: #5E5B5B; font-size: 22px;">Email*<br><input type="text" name="email" onFocus="mau(this)" onBlur="kiemtraemail()" style="height: 25px; width: 600px;"></p>
					<p id="erroemail"></p>
					<p style="color: #5E5B5B; font-size: 22px;">Cở sở bạn quan tâm *<br>
						<select style="height: 30px; width: 610px;" name="sl" onBlur="kiemtraSelect()" onFocus="mau(this)">
							<option></option>
							<option>SUF1-Số 2 Lương Yên, Hai Bà Trưng</option>
							<option>SUF2-Số 523 Kim Mã, Ba Đình</option>
							<option>SUF3-Số 15 Lê Văn Thiêm, Thanh Xuân</option>
						</select>
					</p>
					<p id="erros"></p>
					<p style="color: #5E5B5B; font-size: 22px;">Hãy cho chúng tôi biết về nhu cầu của bạn*<br>
						<textarea rows="9" cols="83" id="nc" onBlur="kiemtranc()"></textarea>
					</p>
					<p id="erronc"></p>
					<input type="button" value="GỬI LIÊN HỆ" onClick="gui()" style="height: 50px; width: 300px; background: red; border:none; border-radius: 5px;">
				</form>
			</div>
			<div class="clear"></div>
		<br>
		
		</div>

		<div id="themfooter"></div>
	</div>
</body>
</html>
