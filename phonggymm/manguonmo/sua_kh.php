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
	<div id="themmenu"></div>
<!--
	<?php
	require("database.php");
		$dl = new database1();
		$conn = $dl->connect("localhost","phonggym","root","");
		$id = $_REQUEST["id"];
		$sql = "SELECT * FROM user WHERE id = $id";
		$query = $conn->query($sql);
		$row = $query->fetch();
		$check_nam = $row['gioi_tinh'] == 0?"checked":"";
		$check_nu = $row['gioi_tinh'] == 1?"checked":"";
	?>
	<form method="post" action="xuly_edit.php">
		<p>Mã nhân viên: <input readonly type="text" value="<?=$row['id']?>" name="id" id="id" ></p>
		<p>Tên nhân viên: <input type="text" value="<?=$row['ho_ten']?>" name="name" id="name"></p>
		<p>Ảnh hiện tại:<input readonly type="text" name="ha" id="ha" value="<?=$row["Img"]?>"></p>
		<p>Ảnh mới: <input type="file" name="ham" id="ham"></p>
		<p>Giới tính: <input type="radio" value="<?=$row['gioi_tinh']?> <?=$check_nam?>" name="gt" id="gt">Nam
						<input type="radio" value="<?=$row['gioi_tinh']?> <?=$check_nu?>" name="gt" id="gt">Nữ
		</p>
		<p>Số điện thoại: <input type="text" value="<?=$row['So_dien_thoai']?>" name="sdt" id="sdt"></p>
		<p>Năm sinh: <input type="date" value="<?=$row['ngay_sinh']?>" name="ns" id="ns"></p>
		<p>Địa chỉ: <input type="text" value="<?=$row['dia_chi']?>" name="dc" id="sc"></p>
		<p><input type="submit" value="Sửa"></p>
	</form>
-->
	<div id="themfooter"></div>
</body>
</html>