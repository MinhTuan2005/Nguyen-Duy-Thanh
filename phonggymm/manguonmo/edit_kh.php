<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="edit_kh.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="dungchung.js"></script>
</head>

<body>
	<?php 
	session_start();
		if(((isset($_SESSION['taikhoan']) && isset($_SESSION['admin']) && ($_SESSION['time'] + 1000) > time())) || (isset($_SESSION['taikhoan']) && $_SESSION['id'] == $_REQUEST["id"] && ($_SESSION['time'] + 1000) > time() && isset($_SESSION['kh'])))
		{
	?>
	<div id="themmenu"></div>
	<?php
	require("database.php");
		$dl = new database1();
		$conn = $dl->connect("localhost","phonggym","root","");
		$id = $_REQUEST["id"];
		$sql = "SELECT * FROM user WHERE id = $id";
		$query = $conn->query($sql);
		$row = $query->fetch();
		$check_nam = $row['gioitinh'] == 0?"checked":"";
		$check_nu = $row['gioitinh'] == 1?"checked":"";
	?>
	<br>
	<h1 align="center">CẬP NHẬT THÔNG TIN</h1>
	<hr align="center" width="350px" style="height: 3px; background: red; border: none;">
	<div class="form">
		
		<form method="post" enctype="multipart/form-data" action="xuly_edit_kh.php">
			<p>Mã nhân viên:<br><input readonly type="text" value="<?=$row['id']?>" name="id" id="id" ></p>
			<p>Tên nhân viên:<br><input type="text" value="<?=$row['name']?>" name="name" id="name"></p>
			<p>Ảnh hiện tại:<br><img class="anh" src="<?=$row["Img"]?>">
				<input name="anhht" value="<?=$row["Img"]?>" readonly>
			</p>
				
			<p>Ảnh mới: <br><input type="file" name="ham" id="ham"></p>
			<p>Giới tính:<br><span>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input style="width: 100px" type="radio" value="0>" <?=$check_nam?> name="gt" id="gt">Nam
							<input style="width: 100px" type="radio" value="1" <?=$check_nu?> name="gt" id="gt">Nữ</span>
		
			<p>Số điện thoại:<br> <input type="text" value="<?=$row['sdt']?>" name="sdt" id="sdt"></p>
			<p>Năm sinh:<br> <input type="date" value="<?=$row['ngaysinh']?>" name="ns" id="ns"></p>
			<p>Địa chỉ:<br> <input type="text" value="<?=$row['diachi']?>" name="dc" id="sc"></p>
			<p>Trạng thái:<br><input readonly type="text" value="<?=$row['trang_thai']?>" name="tt" id="tt"></p>
			
			<p><input class="click" type="submit" name="sua" value="Sửa"></p>
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