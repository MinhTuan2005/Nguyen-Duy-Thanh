<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Trang Chủ admin</title>
<link rel="stylesheet" href="icon/fontawesome-free-5.13.1-web/fontawesome-free-5.13.1-web/css/all.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="trangchuadmin.css">
<!--	<script type="text/javascript" src="dungchung.js"></script>-->

<script language="javascript">
	//ajax phân trang nhân viên
	function ajShow_nhanvien(p)
	{
//		$("#right").html("đang tải...");
		page=p;
		$.get("thongtinnhanvien.php",{page:page},
				//responseData: là nôi dung echo về từ PHP
				function (responseData, status){
					if(status=="success")
						$(".right").html(responseData);
					}
			);
	}
	//ajax phân trang Khách hàng
	function ajShow_khachhang(p)
	{
//		$("#right").html("đang tải...");
		page=p;
		$.get("thongtin_kh.php",{page:page},
				//responseData: là nôi dung echo về từ PHP
				function (responseData, status){
					if(status=="success")
						$(".right").html(responseData);
					}
			);
	}
	//ajax phân trang bài tập
	function ajShow_baitap(p)
	{
//		$("#right").html("đang tải...");
		page=p;
		$.get("thong_tinbai_tap.php",{page:page},
				//responseData: là nôi dung echo về từ PHP
				function (responseData, status){
					if(status=="success")
						$(".right").html(responseData);
					}
			);
	}
//ajax phân trang sản phẩm
	function ajShow_sanpham(p)
	{
//		$("#right").html("đang tải...");
		page=p;
		$.get("quan_ly_san_pham.php",{page:page},
				//responseData: là nôi dung echo về từ PHP
				function (responseData, status){
					if(status=="success")
						$(".right").html(responseData);
					}
			);
	}
	//ajax phân trang đơn hàng
	function ajShow_donhang(p)
	{
//		$("#right").html("đang tải...");
		page=p;
		$.get("donhang.php",{page:page},
				//responseData: là nôi dung echo về từ PHP
				function (responseData, status){
					if(status=="success")
						$(".right").html(responseData);
					}
			);
	}
	//ajax phân trang ncc
	function ajShow_ncc(p)
	{
//		$("#right").html("đang tải...");
		page=p;
		$.get("nhacungcap.php",{page:page},
				//responseData: là nôi dung echo về từ PHP
				function (responseData, status){
					if(status=="success")
						$(".right").html(responseData);
					}
			);
	}
	//ajax phân trang sp_kho
	function ajShow_qlspk(p)
	{
//		$("#right").html("đang tải...");
		page=p;
		$.get("quan_ly_san_pham_kho.php",{page:page},
				//responseData: là nôi dung echo về từ PHP
				function (responseData, status){
					if(status=="success")
						$(".right").html(responseData);
					}
			);
	}
	//ajax phân trang đơn nhập
	function ajShow_qlnk(p)
	{
//		$("#right").html("đang tải...");
		page=p;
		$.get("quan_ly_nhap_kho.php",{page:page},
				//responseData: là nôi dung echo về từ PHP
				function (responseData, status){
					if(status=="success")
						$(".right").html(responseData);
					}
			);
	}
	//ajax phân trang đơn xuất
	function ajShow_qlxk(p)
	{
//		$("#right").html("đang tải...");
		page=p;
		$.get("quan_ly_xuat_kho.php",{page:page},
				//responseData: là nôi dung echo về từ PHP
				function (responseData, status){
					if(status=="success")
						$(".right").html(responseData);
					}
			);
	}
</script>
</head>

<body>
	<?php
		session_start();
		if(isset($_SESSION['taikhoan']) && isset($_SESSION['admin']) && ($_SESSION['time'] + 1000) > time())
		{
	?>
	
	<div id="Tong">
		<div id="themmenu"></div>
		<div id="ngang">
			<img  src="../img/img-index/Logo.png">
		</div>
		<div id="giua">
			<div class="left">
				<ul class="menudoc">
					<li>&ensp;<a href="trang_ca_nhan.php" id="">Xin chào <?=$_SESSION['name']?>!!! &ensp;<i style="font-size: 16px;" class="fas fa-caret-right"></i></a>
						<ul>
							<li>&ensp;<a href="dangxuat.php" id="">Đăng xuất</a></li>
						</ul>	
						
					</li>
					
					<li>&ensp;<a href="trangchinh.php" id="">Trang chủ</a></li>
					<li>&ensp;<a href="#" id="nv" onClick="ajShow_nhanvien(1);">Quản lý nhân viên</a></li>
					<li>&ensp;<a href="#" id="kh" onClick="ajShow_khachhang(1)">Quản lý khách hàng</a></li>
					<li>&ensp;<a href="#" id="sp" onClick="ajShow_sanpham(1)">Quản lý sản phẩm</a></li>
					<li>&ensp;<a href="#" id="bt" onClick="ajShow_baitap(1)">Quản lý bài tập</a></li>
					<li>&ensp;<a href="#" id="bt" onClick="ajShow_donhang(1)">Quản lý đơn hàng</a></li>
					<li class="kh">&ensp;Kho hàng</li>
<!--
						<ul>
							
							
						</ul>
-->
					<div class="tt">
						<li>&ensp;<a href="#" id="bt" onClick="ajShow_ncc(1)">Thông tin nhà cung cấp</a></li>
						<li>&ensp;<a href="#" id="bt" onClick="ajShow_qlspk(1)">Sản phẩm trong kho</a></li>
						<li>&ensp;<a href="#" id="bt" onClick="ajShow_qlnk(1)">Phiếu nhập</a></li>
						<li>&ensp;<a href="#" id="bt" onClick="ajShow_qlxk(1)">Phiếu xuất</a></li>
					
					</div>
<!--
					<li class="tt">&ensp;Thông tin nhà cung cấp</li>
					<li class="tt">&ensp;Sản phẩm trong kho</li>
					<li class="tt">&ensp;Phiếu xuất</li>
					<li class="tt">&ensp;Phiếu nhập</li>
-->
				</ul>
				<script language="javascript">

	
});
	
</script>
			</div>
			<div class="right">
			
			</div>
		</div>
		
		<div class="clear"></div>
		<div id="footer"></div>
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