<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
		session_start();
		if(isset($_SESSION['taikhoan']) && isset($_SESSION['admin']) && ($_SESSION['time'] + 1000) > time())
		{
			
		
	?>
	<?php
		require_once("database.php");
		$list = [];
	$dl = new database1();
			$conn = $dl->connect("localhost","phonggym","root","");
			$colum_item = 1;
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
			$sql = "SELECT * FROM user LIMIT $colum_item OFFSET $offset";
			$sql1 = "SELECT * FROM user";
			$query = $conn->query($sql);
			$query1 = $conn->query($sql1);
			$count = $query1->rowCount();
			$sum_page = ceil($count/ $colum_item);
		while($row = $query->fetch())
		{
			$list[] = $row;
		}
		
	?>
	<h1 align="center">Thông khách hàng</h1>
	<br>
<!--	Tìm kiếm-->
	<div class="thanhngang">
		
		<div class="ngang1"><a href="dangky_kh.php"><button>Thêm khách hàng</button></a></div>
		<div class="ngang2">
			<div style="margin-left: 25px; margin-bottom: 10px;">

				<input type="text" id="ht" size="50" placeholder="Họ tên">
				<i id="timkiem" class="fas fa-search" style="font-size: 22px;"></i>
			</div>

		</div>
		
		<table id="tb" class="table-hover table-bordered">
	</div>
	
		<thead align="center">
			<tr>
				<th>ID</th>
				<th>Img</th>
				<th>Tên khách hàng</th>
				<th>Giới tính</th>
				<th>Thông tin</th>
				<th>Trạng thái</th>
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
						<li>Mã khách hàng: <?=$value['id']?></li>
						<li>Số điện thoại: <?=$value['sdt']?></li>
						<li>Năm Sinh: <?=$value['ngaysinh']?></li>
						<li>Địa chỉ: <?=$value['diachi']?></li>
					</ul>
				</td>
				<td><?=$value['trang_thai']?></td>
				<td>
					<a href="edit_kh.php?id=<?=$value["id"]?>"><button style="width: 50px;">Sửa</button></a>
					<a href="Xoa.php?id=<?=$value["id"]?>"><button style="width: 50px;" onClick="return confirm('Bạn có chắc xóa không?')">Xóa</button></a>

					
				</td>
			</tr>
			<?php
				}
			?>
		</tbody>
	</table>
	
		<?php
		require("page.php");
	?>
	
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