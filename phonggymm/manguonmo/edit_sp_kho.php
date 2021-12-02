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
		$sql = "SELECT sp_kho.*,nhom_sp_kho.*,ncc.name FROM sp_kho, nhom_sp_kho, ncc WHERE sp_kho.id = $id AND sp_kho.id_msp = nhom_sp_kho.id_nhom AND sp_kho.id_ncc = ncc.id";
		$query = $conn->query($sql);
		$row = $query->fetch();
		
		$query1 = $dl->truyvan("nhom_sp_kho","phonggym");
		$query2 = $dl->truyvan("ncc","phonggym");
		$list1 = [];
		while($row1 = $query1->fetch())
		{
			$list1[] = $row1;
		}
			$list2 = [];
		while($row2 = $query2->fetch())
		{
			$list2[] = $row2;
		}

	?>
	<h1 align="center">CẬP NHẬT SẢN PHẨM</h1>
	<hr align="center" width="350px" style="height: 3px; background: yellow; border: none;">
	<div class="form">
	<form method="post" enctype="multipart/form-data" action="xu_ly_edit_sp_kho.php">
		<p>Mã sản phẩm: <input readonly type="text" value="<?=$row['id']?>" name="id" id="id" ></p>
		<p>Tên sản phẩm: <input type="text" value="<?=$row['ten_sp']?>" name="name" id="name"></p>
		<p>Ảnh hiện tại: <img  class="anh" name="ha" id="ha" src="<?=$row["img"]?>">
			<input name="anhht" value="<?=$row["img"]?>" readonly>
		</p>
		<p>Ảnh mới <input type="file" name="ham" value="<?=$row["img"]?>" id="ham"></p>
		<p>Giá mua: <input type="text" value="<?=$row['gia_mua']?>" name="gm" id="gm"></p>
		<p>Giá bán: <input type="text" value="<?=$row['gia_ban']?>" name="gb" id="gb"></p>
		<p>Số lượng: <input type="number" value="<?=$row['soluong']?>" name="sl" id="sl"></p>
		<p>Thông tin: <textarea name="tt" id="tt"><?=$row['thongtin']?></textarea></p>
		<p>Nhóm: 
			
			<select id="nhom" name="nhom">
				<?php
				foreach($list1 as $value1)
				{
				?>
				<option  value="<?php echo $value1['id_nhom'] ?>" <?php if($value1["id_nhom"] == $row["id_msp"]){echo "selected";} ?>>
					<?php
						echo $value1['ten_nhom'];
				  	?>
				</option>
			   <?php
				}
				?>
			</select>
		NCC
		<select id="ncc" name="ncc">
				<?php
				foreach($list2 as $value2)
				{
				?>
				<option  value="<?php echo $value2['id'] ?>" <?php if($value2["id"] == $row["id_ncc"]){echo "selected";} ?>>
					<?php
						echo $value2['name'];
				  	?>
				</option>
			   <?php
				}
				?>
			</select
		</p>
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