<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sửa thông tin bài tập</title>
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
		$sql = "SELECT * FROM baitap, nhom_bt WHERE id = $id AND baitap.ma_nhom = nhom_bt.ma_nhom";
		$query = $conn->query($sql);
		$row = $query->fetch();
		
		$query1 = $dl->truyvan("nhom_bt","phonggym");
		$list = [];
		while($row1 = $query1->fetch())
		{
			$list[] = $row1;
		}
	?>
	<br>
	<h1 align="center">SỬA BÀI TẬP</h1>
	<hr align="center" width="350px" style="height: 3px; background: yellow; border: none;">
	<div class="form" style="height: 500px; ">
	<form name="myForm" method="post" action="xuly_edit_bt.php">
		<p>Mã bài tập: <input readonly type="text" value="<?=$row['ma_bt']?>" id="ma_bt" name="ma_bt"></p>
		<p>Tên bài tập:<input type="text" value="<?=$row['name']?>" id="name" name="name"></p>
		<p>Video:<br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<?=$row['video']?></p>
		<p>Video mới:<br><input type="text" value="" name="new_video" id="new_video"></p>
		<select name="nhom" id="nhom">
			<?php
				foreach($list as $value)
				{
			?>
					<option value="<?=$value["ma_nhom"]?>" <?php if($value['ma_nhom'] == $row['ma_nhom']) {echo "selected";} ?>>
						<?=$value["ten_nhom"]?>
					</option>
			<?php
				}
			?>
		</select>
		
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