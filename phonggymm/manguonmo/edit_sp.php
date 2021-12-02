<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sửa thông tin sản phẩm</title>
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
		$conn = $dl->connect("localhost","phonggym","root","");
		$id = $_REQUEST["id"];
		$sql = "SELECT * FROM sanpham, nhom_sp WHERE id = $id AND sanpham.ma_nhomsp = nhom_sp.ma_nhomsp";
		$query = $conn->query($sql);
		$row = $query->fetch();
		
		$query1 = $dl->truyvan("nhom_sp","phonggym");
		$list = [];
		while($row1 = $query1->fetch())
		{
			$list[] = $row1;
		}

	?>
	<h1 align="center">CẬP NHẬT SẢN PHẨM</h1>
	<hr align="center" width="350px" style="height: 3px; background: yellow; border: none;">
	<div class="form">
	<form method="post" enctype="multipart/form-data" action="xu_ly_edit_sp.php">
		<p>Mã sản phẩm: <input readonly type="text" value="<?=$row['id']?>" name="id" id="id" ></p>
		<p>Tên sản phẩm: <input type="text" value="<?=$row['name']?>" name="name" id="name"></p>
		<p>Ảnh hiện tại: <img  class="anh" name="ha" id="ha" src="<?=$row["Img"]?>"></p>
		<p>Ảnh mới <input type="file" name="ham" id="ham"></p>
		<p>Đơn giá: <input type="text" value="<?=$row['tien']?>" name="dg" id="dg"></p>
		<p>Số lượng: <input type="number" value="<?=$row['soluong']?>" name="sl" id="sl"></p>
		<p>Thông tin: <textarea name="tt" id="tt"><?=$row['thongtin']?></textarea></p>
		<p>Nhóm: 
			
			<select id="nhom" name="nhom">
				<?php
				foreach($list as $value)
				{
				?>
				<option  value="<?php echo $value['ma_nhomsp'] ?>" <?php if($value["ma_nhomsp"] == $row["ma_nhomsp"]){echo "selected";} ?>>
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
</body>
</html>