<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="icon/fontawesome-free-5.13.1-web/fontawesome-free-5.13.1-web/css/all.css">
<link rel="stylesheet" type="text/css" href="thongtinnhanvien.css">
<script language="javascript">

	
	$(document).ready(function(){
		$("#timkiem").click(function(){
			var id = $("#mnv").val();
			var name = $("#ht").val();
			if( name == "")
				{
					alert("Yêu cầu nhập ");
				}
			else{
				$.post("tim_kiem.php",{hoten:name},function(data){
				$("#tb").html(data);
			});
			}
		});
	});
</script>
</head>

<body>
	<?php
		session_start();
		if(isset($_SESSION['taikhoan']) && isset($_SESSION['admin']) && ($_SESSION['time'] + 1000) > time())
		{
			
		
	?>
	<?php
//		require("database.php");
//		
//		$dl = new database1();
		$list = [];
//		$query = $dl->truyvan1("user_noibo","nhom","phonggym");
//		while($row = $query->fetch())
//		{
//			$list[] = $row;
//		}
			require("database.php");
			$dl = new database1();
			$conn = $dl->connect("localhost","phonggym","root","");
			$colum_item = 4;
			if(isset($_GET['page']))
			{
				$page = $_GET['page'];
			}
			else
			{
				$page = 1;
			}
//			$page = $_GET['page'];
			$offset = ($page-1)*$colum_item;
			$sql = "SELECT * FROM user_noibo,nhom WHERE nhom.ma_nhom = user_noibo.ma_nhom LIMIT $colum_item OFFSET $offset";
			$sql1 = "SELECT * FROM user_noibo";
			$query = $conn->query($sql);
			$query1 = $conn->query($sql1);
			$count = $query1->rowCount();
			$sum_page = ceil($count/ $colum_item);
			
			while($row = $query->fetch())
			{
				$list[] = $row;
			}
	?>
	<h1 align="center">Thông tin nhân viên</h1>
	<br>
<!--	Tìm kiếm-->
	<div class="thanhngang">
		<div class="ngang1"><a href="dangky.php"><button>Thêm nhân viên</button></a></div>
		<div class="ngang2">
			<div style="margin-left: 25px; margin-bottom: 10px;">

				<input type="text" id="ht" size="50" placeholder="Họ tên">
				<i id="timkiem" class="fas fa-search" style="font-size: 22px;"></i>
			</div>
		</div>	
	</div>
	
	
	<table id="tb" class="table-hover table-bordered">
		<thead>
			<tr align="center">
				<th>ID</th>
				<th>Img</th>
				<th>Tên nhân viên</th>
				<th>Giới tính</th>
				<th>Thông tin</th>
				<th>Chức vụ</th>
				<th>Lương</th>
				<th>Thao tác</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$id = 0;
				foreach($list as $value)
				{
					$id++;
			?>
			<tr align="center">
				<td><?=$id?></td>
				<td><img class="anh" src="<?=$value['Img']?>"></td>
				<td><?=$value['name']?></td>
				<td><?php if($value['gioitinh'] == 0)
						{
							echo "nam";
						}
					else if($value['gioitinh'] == 1)
					{
						echo "nữ";
					}
					?></td>
				<td align="left">
					<ul>
						<li>Mã nhân viên: <?=$value['id']?></li>
						<li>Số điện thoại: <?=$value['sdt']?></li>
						<li>Email: <?=$value['email']?></li>
						<li>Năm Sinh: <?=$value['ngaysinh']?></li>
						<li>Địa chỉ: <?=$value['diachi']?></li>
					</ul>
				</td>
				<td><?=$value['ten_nhom']?></td>
				<td><?=$value['luong']?></td>
				<td align="center">
					<a href="edit.php?id=<?=$value["id"]?>"><button style="width: 50px;">Sửa</button></a>
					<a href="Xoa.php?id=<?=$value["id"]?>&dc=user_noibo"><button style="width: 50px;" onClick="return confirm('Bạn có chắc xóa không?')">Xóa</button></a>
				</td>
			</tr>
			<?php
				}
				
			?>
		</tbody>
	</table>
	<br>
<!--	Thanh phân trang-->
	<div class="thanhngang">
		<div class="pagination" style="justify-content: center">
<!--			<ul class="pagination">-->
			<?php
				if($page > 3)
					{
			?>	
						<a class="page-item page-link" href="#" onClick='ajShow_nhanvien(1);'>First</a>
			<?php
				}
			?>
				<?php
					for($i = 1; $i <= $sum_page; $i++)
					{
				?>
				<?php
						
						if($page != $i)
						{
							if($i > $page-3 && $i < $page+3)
							{
				?>
							 <a class="page-item page-link" href="#" onClick='ajShow_nhanvien(<?=$i?>);'><?=$i?></a>
				<?php
							}
						}
						else
						{
				?>
							<strong class="page-item page-link" style="background: blue; color: #FFF;"><?=$i?></strong>
				<?php
						}
					}
				?>
				<?php
					if($page <= $sum_page-3)
					{
				?>
					
						<a class="page-item page-link" href="#" onClick='ajShow_nhanvien(<?=$sum_page?>);'>Last</a>
					<?php
				}
					?>
		</div>
	</div>
	<?php
		}
	else if(($_SESSION['time'] + 1000) < time())
		{
			header("location: dangxuat.php");
		}
		else{
			echo "Đây là trang của admin  <a href='dangnhap.php'>Đăng nhập</a>";
		}
	?>
</body>
</html>