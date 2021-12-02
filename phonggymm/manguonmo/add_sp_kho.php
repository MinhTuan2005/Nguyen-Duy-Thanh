<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Thêm sản phẩm</title>
<link rel="stylesheet" type="text/css" href="dangnhap.css">
<link rel="stylesheet" href="icon/fontawesome-free-5.13.1-web/fontawesome-free-5.13.1-web/css/all.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="dungchung.js"></script>
</head>

<body>
	<?php 
		session_start();
		if(isset($_SESSION['taikhoan']) && isset($_SESSION['admin']) && ($_SESSION['time'] + 1000) > time())
		{
			require("database.php");
			$dl = new database1();
			$query = $dl->truyvan("nhom_sp_kho","phonggym");
			$query1 = $dl->truyvan("ncc","phonggym");
			
	?>
	<div id="Tong">
			<div id="themmenu"></div>
				<div id="Maicontent">
					<img src="../img/img-dangnhap/banner222-1024x525.png" width="1296px" height="650px">
					<div class="dn" style="left: 70px; text-align: center; width: 550px; height: 550px;top:50px;">
						<p>THÊM SẢN PHẨM</p>
						<form name="myForm" method="post" enctype="multipart/form-data" action="xu_ly_ad_sp_kho.php">
							<p>Tên sản phẩm: <input type="text" name="name" id="name" value="" size="35"></p>
							<p>Số lượng:&emsp;&ensp;&ensp;<input type="number" name="num" id="num" value="" style="width: 275px;"></p>
							<p>Giá Mua: &emsp;&ensp;&ensp;<input type="text" name="gm" id="gm" value="" size="35"></p>
							<p>Giá Bán: &emsp;&ensp;&ensp;<input type="text" name="gb" id="gb" value="" size="35"></p>
							<p>Ảnh<input type="file" name="img" id="img"></p>
							<p>Nhóm:
								<select name="nhom" id="nhom">
									<option value=""></option>
								<?php
									while($row = $query->fetch())
									{
								?>
									<option value="<?=$row['id_nhom']?>"><?=$row['ten_nhom']?></option>		
								<?php
									}
								?>
								</select>
								
								NCC:
								<select name="ncc" id="ncc">
									<option value=""></option>
									<?php
										while($row1 = $query1->fetch())
										{
									?>
										<option value="<?=$row1['id']?>"><?=$row1['name']?></option>
									<?php
										}
									?>
								</select>
							</p>
							<p>Thông tin: <textarea name="tt" id="tt" style="width: 275px; height: 100px;"></textarea></p>
							<p><input type="submit" value="Lưu Sản Phẩm" name="dk" id="dk" style="width: 300px"></p>
						</form>
					</div>
			</div>
	
	<div id="themfooter"></div>
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