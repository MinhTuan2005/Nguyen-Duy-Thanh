<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sửa thông tin nhân viên</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="edit_kh.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="dungchung.js"></script>
</head>

<body>
	<?php 
	session_start();
		if((isset($_SESSION['taikhoan']) && isset($_SESSION['admin']) && ($_SESSION['time'] + 1000) > time()) || (isset($_SESSION['taikhoan']) && $_SESSION['id'] == $_REQUEST["id"] && ($_SESSION['time'] + 1000) > time() && isset($_SESSION['cv'])))
		{
	?>
	<div id="Tong">
	<div id="themmenu"></div>
	<?php
		require("database.php");
		$dl = new database1();
		$conn = $dl->connect("localhost","phonggym","root","");
		$id = $_REQUEST["id"];
		$sql = "SELECT * FROM user_noibo, nhom WHERE id = $id AND user_noibo.ma_nhom = nhom.ma_nhom";
		$query = $conn->query($sql);
		$row = $query->fetch();
		
		$query1 = $dl->truyvan("nhom","phonggym");
		$list = [];
		while($row1 = $query1->fetch())
		{
			$list[] = $row1;
		}

	$check_nam = $row['gioitinh'] == 0?"checked":"";
	$check_nu = $row['gioitinh'] == 1?"checked":"";
	?>
	<h1 align="center">CẬP NHẬT NHÂN VIÊN</h1>
	<hr align="center" width="350px" style="height: 3px; background: yellow; border: none;">
	<div class="form">
	<form method="post" enctype="multipart/form-data" action="xuly_edit.php">
		<p>Mã nhân viên: <input readonly type="text" value="<?=$row['id']?>" name="id" id="id" ></p>
		<p>Tên nhân viên: <input type="text" value="<?=$row['name']?>" name="name" id="name"></p>
		<p>Ảnh hiện tại: <img  class="anh" name="ha" id="ha" src="<?=$row["Img"]?>">
			<input name="anhht" value="<?=$row["Img"]?>" readonly>
		</p>
		<p>Ảnh mới <input type="file" name="ham" id="ham"></p>
		<p>Giới tính:<br><span>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input style="width: 100px" type="radio" value="0>" <?=$check_nam?> name="gt" id="gt">Nam
							<input style="width: 100px" type="radio" value="1" <?=$check_nu?> name="gt" id="gt">Nữ</span>
		<p>Số điện thoại: <input type="text" value="<?=$row['sdt']?>" name="sdt" id="sdt"></p>
		<p>Email: <input type="text" value="<?=$row['email']?>" name="email" id="email"></p>
		<p>Năm sinh: <input type="date" value="<?=$row['ngaysinh']?>" name="ns" id="ns"></p>
		<p>Địa chỉ: <input type="text" value="<?=$row['diachi']?>" name="dc" id="sc"></p>
		<p>Chức vụ: 
			
			<select id="cv" name="cv">
				<?php
				foreach($list as $value)
				{
				?>
				<option  value="<?php echo $value['ma_nhom'] ?>" <?php if($value["ma_nhom"] == $row["ma_nhom"]){echo "selected";} ?>>
					<?php
						echo $value['ten_nhom'];
				  	?>
				</option>
			   <?php
				}
				?>
			</select></p>
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
		</div>
</body>
</html>