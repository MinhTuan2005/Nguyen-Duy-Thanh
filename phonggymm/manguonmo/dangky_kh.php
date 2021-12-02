<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Đăng Ký Khách Hàng</title>
<link rel="stylesheet" type="text/css" href="dangnhap.css">
<link rel="stylesheet" href="icon/fontawesome-free-5.13.1-web/fontawesome-free-5.13.1-web/css/all.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="dungchung.js"></script>
<script language="javascript">
	
	$(document).ready(function(){
		
		function kiemtra(obj)
		{
			if($(obj).val() == "")
				{
					return false;
				}
			return true;
		}
		$("#cn").click(function(){
			if(kiemtra($("#term")) == false)
				{
					alert("Bạn không được để trống kỳ han");
					return false;
				}
		});
		$("#dk").click(function(){
			
			if(kiemtra($("#ht")) == false)
				{
					alert("Bạn không được để trống họ tên");
					return false;
				}
			else if(kiemtra($("#tk")) == false)
				{
					alert("Bạn không được để trống tài khoản");
					return false;
				}
			else if(kiemtra($("#pass")) == false)
				{
					alert("Bạn không được để trống mật khẩu");
					return false;
				}
			else if(kiemtra($("#dc")) == false)
				{
					alert("Bạn không được để trống địa chỉ");
					return false;
				}
			else if(kiemtra($("#ns")) == false)
				{
					alert("Bạn không được để trống năm sinh");
					return false;
				}
			else if(kiemtra($("#sdt")) == false)
				{
					alert("Bạn không được để trống số điện thoại");
					return false;
				}
			else if(tkoan == false)
				{
					alert("Kiểm tra tài khoản hoặc số điện thoại");
					return false;
				}
			return true;
		});
	});
	
</script>
<script type="text/javascript" src="kiemtra.js"></script>
<!--
<script>
	$(document)
</script>
-->
</head>

<body>
	<?php 
		session_start();
		if(isset($_SESSION['taikhoan']) && isset($_SESSION['admin']) && ($_SESSION['time'] + 1000) > time())
		{
			date_default_timezone_set('Asia/Ho_Chi_Minh');
		
	?>
	<div id="Tong">
			<div id="themmenu"></div>
				<div id="Maicontent">
					<img src="../img/img-dangnhap/banner222-1024x525.png" width="1296px" height="650px">
					<div class="dn" style="left: 70px; text-align: center; width: 550px; height: 180px; display: flex; align-content: center">
						<form action="dangky_kh.php" method="post">
							<p style="margin-left: 130px;">Kỳ hạn: <select name="term" id="term">
										<option></option>
										<option value="3">3 ngày</option>
										<option value="30">1 tháng</option>
										<option value="90">3 tháng</option>
										<option value="180">6 tháng</option>
										<option value="240">8 tháng</option>
										<option value="365">1 năm</option>
								</select>
							</p>
							<p><input readonly style="margin-left: 120px;" type="text" name="start" size="15" id="start" value="<?=date('Y-m-d H:i:s',time());?>"> đến
									<input readonly type="text" name="end" size="15" id="end" value="">
									
								</p>
							<p><input type="submit" class="dk" value="Cập nhật" name="cn" id="cn" style="width: 150px; margin-left: 200px;"></p>
						</form>
					</div>
					<?php
							if(isset($_REQUEST['cn']))
							{
								date_default_timezone_set('Asia/Ho_Chi_Minh');
//								$list = [];
//								foreach(getdate(strtotime($_REQUEST['start'])) as $key=> $value)
//								{
//									$list[$key] = $value;
//								}
//								echo "<pre>";
//								print_r($list);
//								echo "</pre>";
//								echo $_REQUEST['start']."<br>";
								$time_stamp = strtotime($_REQUEST['start']);
//								echo $time_stamp;
								$new = $time_stamp + $_REQUEST['term']*24*60*60;
						?>
					<div class="dn" style="left: 70px; text-align: center; width: 550px; height: 630px;top:0px;">
						<p>ĐĂNG KÝ KHÁCH HÀNG</p>
						
						<form name="myForm" method="post" enctype="multipart/form-data" action="xuly_dk_kh.php">
							<p>Họ tên: &emsp;&emsp;&ensp;<input type="text" name="ht" id="ht" value="" size="35"></p>
							<p>Tài khoản:&emsp;&ensp;<input type="text" name="tk" id="tk" value="" size="35"></p>
							<p>Mật khẩu: &emsp;&ensp;<input type="password" name="pass" id="pass" value="" size="35"></p>
							<p>Địa chỉ:&emsp;&ensp;&ensp;&ensp;&ensp;<input type="text" name="dc" id="dc" value="" size="35"></p>
							<p>Ngày Sinh: &emsp;&ensp;<input type="date" name="ns" id="ns" value="" style="width: 275px; text-align: center"></p>
							
							<p>Số điện thoại:&ensp;<input type="text" name="sdt" id="sdt" value="" size="35"></p>
							<p>Trạng thái:&emsp;&ensp;<input readonly type="text" name="tt" id="tt" value="<?php
									if((time() + 3*24*60*60) < $new)
									   {
										   echo "Còn hạn";
									   }
									else if((time() + 4*24*60*60) >= $new && $new > time())
									   {
										   echo "Sắp hết hạn";
									   }
								
								?>" size="35"></p>
<!--
							<p>Kỳ hạn: <select>
									<option></option>
									<option>3 ngày</option>
									<option>1 tháng</option>
									<option>3 tháng</option>
									<option>6 tháng</option>
									<option>1 năm</option>
							</select></p>
-->
							<p>Kỳ hạn: <select name="term1" id="term1">
								
									<option value="<?=$_REQUEST['term']?>">
										<?php
											switch($_REQUEST['term'])
											{
												case "3":
													echo "3 ngày";
													break;
												case "30":
													echo "1 tháng";
													break;
												case "90":
													echo "3 tháng";
													break;
												case "180":
													echo "6 tháng";
													break;
												case "240":
													echo "8 tháng";
													break;
												case "365":
													echo "1 năm";
													break;
											}
										?>
									</option>
							</select>
								<input type="text" readonly name="start1" size="15" id="star1" value="<?=$_REQUEST['start']?>"> đến
								<input type="text" readonly name="end1" size="15" id="end1" value="<?=date('Y-m-d H:i:s',$new)?>">
							</p>
							<p>
								&emsp;Giới tính:<input type="radio" name="gt" id="gt" value="0">Nam
								<input type="radio" name="gt" id="gt" value="1">Nữ
							</p>
							
							<p>Ảnh<input type="file" name="img" id="img"></p>
							
							<div>
								
								
								<p><input type="submit" class="dk" value="Đăng Ký" name="dk" id="dk" style=" margin-left: 210px;"></p>
							</div>
						</form>
					</div>
					<?php
							}
					?>
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