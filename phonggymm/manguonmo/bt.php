<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title> 
<!--<link rel="stylesheet" type="text/css" href="trangchung.css">-->
<link rel="stylesheet" type="text/css" href="bt.css">
<link rel="stylesheet" href="icon/fontawesome-free-5.13.1-web/fontawesome-free-5.13.1-web/css/all.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script type="text/javascript" src="dungchung.js"></script>
<script>
	function ajShow_bt1(p)
	{
//		$("#right").html("đang tải...");
		page=p;
		$.get("bt_nguc.php",{page:page},
				//responseData: là nôi dung echo về từ PHP
				function (responseData, status){
					if(status=="success")
						$("#b").html(responseData);
					}
			);
	}
	
	function ajShow_bt_tay(p)
	{
//		$("#right").html("đang tải...");
		page=p;
		$.get("bt_tay.php",{page:page},
				//responseData: là nôi dung echo về từ PHP
				function (responseData, status){
					if(status=="success")
						$("#b").html(responseData);
					}
			);
	}
	
	function ajShow_bt_mong(p)
	{
//		$("#right").html("đang tải...");
		page=p;
		$.get("bt_mong.php",{page:page},
				//responseData: là nôi dung echo về từ PHP
				function (responseData, status){
					if(status=="success")
						$("#b").html(responseData);
					}
			);
	}
	
	function ajShow_bt_chan(p)
	{
//		$("#right").html("đang tải...");
		page=p;
		$.get("bt_chan.php",{page:page},
				//responseData: là nôi dung echo về từ PHP
				function (responseData, status){
					if(status=="success")
						$("#b").html(responseData);
					}
			);
	}
	
	function ajShow_bt_vai(p)
	{
//		$("#right").html("đang tải...");
		page=p;
		$.get("bt_vai.php",{page:page},
				//responseData: là nôi dung echo về từ PHP
				function (responseData, status){
					if(status=="success")
						$("#b").html(responseData);
					}
			);
	}
	
	function ajShow_bt_bung(p)
	{
//		$("#right").html("đang tải...");
		page=p;
		$.get("bt_bung.php",{page:page},
				//responseData: là nôi dung echo về từ PHP
				function (responseData, status){
					if(status=="success")
						$("#b").html(responseData);
					}
			);
	}
	
	$(document).ready(function(){
		$("#icon_cart").load("icon_cart.php");
	});
</script>
</head>

<body>
	<?php
		session_start();
		if(isset($_SESSION['taikhoan']) && ($_SESSION['time'] + 1000) > time())
		{
			
		
	?>
	<div id="Tong">
			<div id="themmenu"></div>
			<div id="banner" style="position: relative;">
				<img src="https://yt3.ggpht.com/MYvE3k-Hluw7dkUe2Ms7VtZeUuCMvdtS3SbW8mZJ5HbuMJemOWx9WLNk6zsHEgUlNMmjZquc=w1060-fcrop64=1,00005a57ffffa5a8-k-c0xffffffff-no-nd-rj" width="1296px">
				<div class="mau">
					<br>

					<center><p style="">Tập luyện giống như bạn đang kinh doanh</p></center>
					<center><p>Chúng ta đầu tư tiền bạc, thời gian và công sức bằng mồ hôi để có một sức khỏe, vóc dáng, và vẻ ngoài tốt hơn</p></center>
				</div>
			</div>
			<div id="Maincontent">
				<div class="menubt1">
					<ul class="menubt">
						<li><a href="#" onClick="ajShow_bt_vai(1)">Tập Vai</a></li>
						<li><a href="#" onClick="ajShow_bt_bung(1)">Tập Bụng</a></li>
						<li><a href="#" onClick="ajShow_bt1(1)">Tập Ngực</a></li>
						<li><a href="#" onClick="ajShow_bt_mong(1)">Tập Mông</a></li>
						<li><a href="#" onClick="ajShow_bt_tay(1)">Tập Tay</a></li>
						<li><a href="#" onClick="ajShow_bt_chan(1)">Tập Chân</a></li>
					</ul>
				</div>
				
<!--				============================Tập vai============================-->
						<br>
				<h4 align="center">Swequity Cho Bạn Những Bài Tập Chất Lượng Nhất</h4>
				<br>
				
				<br>
				
		<div id="b">
				
		</div>
		</div>
	</div>
	<div id="icon_cart"></div>
	<div id="themfooter"></div>
	<?php
		}
	else{
		echo "Mời bạn <a href='dangnhap.php'>Đăng nhập";
	}
	?>
	
</body>
</html>
