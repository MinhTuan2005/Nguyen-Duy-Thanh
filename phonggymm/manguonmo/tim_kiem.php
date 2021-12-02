<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="icon/fontawesome-free-5.13.1-web/fontawesome-free-5.13.1-web/css/all.css">
<link rel="stylesheet" type="text/css" href="thongtinnhanvien.css">
</head>
<body>
<?php
	require("database.php");
	$dl = new database1();
//	$id = $_REQUEST["id"];

	$conn = $dl->connect("localhost","phonggym","root","");
	$sql = "SELECT * FROM user_noibo, nhom WHERE (name like '%".$_REQUEST["hoten"]."%') AND nhom.ma_nhom = user_noibo.ma_nhom";
	$query = $conn->query($sql);
	$list = [];
	while($row = $query->fetch())
	{
		$list[] = $row;
	}
?>
	<div class="table_wrapper">
	<table id="tb" class="table-hover table-bordered">
		<thead>
			<tr>
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
			<tr>
				<td><?=$id?></td>
				<td><img class="anh" src="<?=$value['Img']?>"></td>
				<td><?=$value['name']?></td>
				<td><?=$value['gioitinh']?></td>
				<td>
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
				<td>
					<a href="edit.php?id=<?=$value["id"]?>"><button>Sửa</button></a>
					<a href="Xoa.php?id=<?=$value["id"]?>"><button onClick="return confirm('Bạn có chắc xóa không?')">Xóa</button></a>
				</td>
			</tr>
			<?php
				}
			?>
		</tbody>
	</table>
	</div>
</body>
</html>