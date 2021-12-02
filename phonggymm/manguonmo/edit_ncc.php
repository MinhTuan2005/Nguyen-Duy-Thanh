<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sửa thông tin Nhà cung cấp</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="edit_kh.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="dungchung.js"></script>
</head>

<body>
	<?php 
	session_start();
		if(isset($_SESSION['taikhoan']) && isset($_SESSION['admin']) && ($_SESSION['time'] + 1000) > time())
		{
	?>
	<div id="themmenu"></div>
	<?php
		require("database.php");
		$dl = new database1();
		$id = $_REQUEST['id'];
		$conn = $dl->connect("localhost","phonggym","root","");
		$sql = "SELECT * FROM ncc WHERE id = $id";
		$query = $conn->query($sql);
		$row = $query->fetch();
		
		
	?>
	<br>
	<h1 align="center">SỬA BÀI TẬP</h1>
	<hr align="center" width="350px" style="height: 3px; background: yellow; border: none;">
	<div class="form" style="height: 500px; ">
	<form name="myForm" method="post" action="xu_ly_edit_ncc.php">
		<p>Mã NCC: <input readonly type="text" value="<?=$row['id']?>" id="id" name="id"></p>
		<p>Nhà cung cấp:<input type="text" value="<?=$row['name']?>" id="name" name="name"></p>
		<p>Địa chỉ: <input type="text" value="<?=$row['diachi']?>" id="dc" name="dc"></p>
		<p>Số điện thoại: <input type="text" value="<?=$row['sdt']?>" id="sdt" name="sdt"></p>
		<p>Email: <input type="text" value="<?=$row['email']?>" id="email" name="email"></p>
		<p><input class="click" type="submit" name="gui" id="gui" value="Gửi"></p>
	</form>
	</div>
	<div id="themfooter"></div>
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