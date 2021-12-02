<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Trang cá nhân</title>
<link rel="stylesheet" href="icon/fontawesome-free-5.13.1-web/fontawesome-free-5.13.1-web/css/all.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="trang_ca_nhan.css">
</head>

<body>
	<?php 
		session_start();
		if(isset($_SESSION['taikhoan']) && ($_SESSION['time'] + 1000) > time())
		{
			require("database.php");
			$dl = new database1();
			$query = $dl->truyvanTCN($_SESSION['table'],"phonggym",$_SESSION['id']);
			$row = $query->fetch();
	?>
		<div id="tong">

			<div id="left1">
				<div id="left" class="position-fixed">
<!--					<div class="anh">-->
						<img class="anh" style="" src="<?=$row['Img']?>">
<!--					</div>-->
						<div class="name">
							<p align="center" style="color: #FFF"><?=$_SESSION['name']?></p>
						</div>
						<div class="click">
							<?php
								if(isset($_SESSION['admin']))
								{
									echo "<a href='trangchuadmin.php'><button>Trang chủ</button></a>";
								}
								else
								{
									echo "<a href='trangchinh.php'><button>Trang chủ</button></a>";
								}
							?>
<!--							<a href="trangchinh.php"><button>Trang chủ</button></a>-->
							<a href="dangxuat.php"><button style="margin-left: 30px;">Đăng xuất</button></a>
						</div>
					<br>
					<br>
					<div class="menu">
						<ul>
							<li style="border-top: 1px solid #FFF;">
								<a href="doi_mat_khau.php"><i class="fas fa-key"></i> Đổi mật khẩu</a>
							</li>

							<li>
								<a href="bt.php"><i class="fas fa-dumbbell"></i> Bài tập</a>
							</li>
							<li>
								<?php
									if($_SESSION['table'] == "user")
									{
								?>	
										<a href="edit_kh.php?id=<?=$row["id"]?>"><i class="fas fa-user-edit"></i> Cập nhật thông tin</a>
								<?php
									}
									else if($_SESSION['table'] == "user_noibo"){
								?>
										<a href="edit.php?id=<?=$row["id"]?>"><i class="fas fa-user-edit"></i> Cập nhật thông tin</a>
								<?php
									}
								?>
							</li>

						</ul>
					</div>
					<br>

					<div class="menu2">
						<ul>
							<li><a href=""><i class="fab fa-facebook-f"></i></a></li>
							<li><a href=""><i class="fab fa-twitter"></i></a></li>
							<li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
							<li><a href=""><i class="fab fa-linkedin-in"></i></a></li>
						</ul>
					</div>
					<hr width="100px" style="height: 1px; background: hsl(148, 89%, 52%); border: none;">
					<p style="text-align: center; color: #FFF; font-size: 11px">© 2020.By.<strong>Nguyễn Duy Thanh</strong></p>
				</div>
			</div>
			
			
			
			<div id="right">
<!--				<div id="right1">-->
					<div class="right1 position-fixed">
						<img src="<?=$row['Img']?>" class="img-fluid">
<!--					</div>-->
				</div>
				<div class="right2">
					<?php
						if($_SESSION['table'] == "user_noibo")
						{
					?>		
							<div class="right2-1">
								<br>
								<h1 align="center">CHỨNG NHẬN</h1>
								<hr width="100px" style="height: 5px; background: hsl(148, 89%, 52%); border: none;">
								<br>
								<p style="margin-left: 40px;" class="text-justify"><?=$row['thongtin']?></p>
								<br>
								<br>
								<p style="margin-left: 300px; font-weight: 700;">Chủ phòng xác nhận</p>
								<img src="../img/img-trangchinh/chu-ky-ten-thanh2-removebg-preview.png" style="max-width: 400px; max-height: 400px; margin-left: 180px; margin-top: -120px">
								<p style="margin-left: 310px; font-weight: 700; margin-top: -110px"><?=$_SESSION['name']?></p>
							</div>
					<?php
						}
					?>
					<div class="right2-2">
						
						<br>
							<h1 align="center" style="color: aqua">THÔNG TIN</h1>
							<hr width="100px" style="height: 5px; background: #FFF; border: none;">
						<br>
						<br>
						<div class="right2-2-1">
							<p><i class="fas fa-user"></i> Họ tên </p>
							<p><i class="fas fa-genderless"></i> Giới tính: 
								</p>
							<p><i class="fas fa-phone-volume"></i> Số điện thoại</p>
							
							<p><i class="fas fa-birthday-cake"></i> Ngày Sinh </p>
							<p><i class="fas fa-map-marker-alt"></i> Quê quán </p>
							<?php
								if($_SESSION['table'] == "user_noibo")
								{
									$dl1 = new database1();
									$query1 = $dl1->truyvan2("user_noibo","nhom","phonggym",$_SESSION['id']);
									
									 $row1 = $query1->fetch();
							?>
									<p><i class="fas fa-envelope"></i> Email</p>
									<p><i class="fas fa-briefcase"></i> Chức vụ </p>
									<p><i class="fas fa-money-bill-wave"></i> Lương </p>
							<?php
									
								}
								if($_SESSION['table'] == "user")
								{
	
							?>
								<p><i class="far fa-clock"></i> Thời gian bắt đầu</p>
								<p><i class="far fa-clock"></i> tổng ngày tập</p>
								<p><i class="far fa-clock"></i> Thời gian kết thúc</p>
							<?php
								}
							?>
						</div>
						
						<div class="right2-2-2">
								<p>: <?=$_SESSION['name']?></p>
								<p>: <?php
									if($row['gioitinh'] == 0)
									{
										echo 'nam';
									}
									else if($row['gioitinh'] == 1)
									{
										echo "nữ";
									}
								?></p>
								<p>: <?=$row['sdt']?></p>
								
								<p>: <?=$row['ngaysinh']?></p>
								<p>: <?=$row['diachi']?></p>
							<?php
								if($_SESSION['table'] == "user_noibo")
								{
							?>
								<p>: <?=$row['email']?></p>
								<p>: <?=$row1['ten_nhom']?></p>
								<p>: <?=$row1['luong']?></p>
								
							<?php
								}
								if($_SESSION['table'] == "user")
								{
							?>
								<p>: <?=date('Y-m-d H:i:s',$row['date_start'])?></p>
							<p>: <?=$row['term']?> ngày</p>
							<p>: <?=date('Y-m-d H:i:s',$row['date_end'])?></p>
							<?php
								}
							?>
						</div>
						<div class="clear"></div>
						<hr width="300px" style="height: 1px; background: hsl(148, 89%, 52%); border: none;">
						
						<p><strong>&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&ensp;Lưu ý: </strong>Bạn có thể cập nhập thông tin nếu thiếu</p>
						
						
					</div>
					<div class="right2-3">
							<div class="menu3">
								<ul>
									<li><a href=""><i class="fab fa-facebook-f"></i></a></li>
									<li><a href=""><i class="fab fa-twitter"></i></a></li>
									<li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
									<li><a href=""><i class="fab fa-linkedin-in"></i></a></li>
								</ul>
							</div>
					</div>
					
					
				</div>
			
			</div>
		</div>
	
	<?php
		}
	else if(($_SESSION['time'] + 1000) < time())
		{
			header("location: dangxuat.php");
		}
	?>
</body>
</html>