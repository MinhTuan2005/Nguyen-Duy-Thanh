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
	$sql = "SELECT * FROM ncc WHERE (name like '%".$_REQUEST["name"]."%')";
	$query = $conn->query($sql);
	$list = [];
	while($row = $query->fetch())
	{
		$list[] = $row;
	}
?>
	<div class="table_wrapper">
	<table id="tb" class="table-hover table-bordered">
		<thead align="center">
			<tr>
				<th>Stt</th>
				<th>Id</th>
				<th>Họ tên</th>
				<th>Địa chỉ</th>
				<th>Số điện thoại</th>
				<th>Email</th>
				<th>Thao tác</th>
			</tr>
		</thead>
		<tbody align="center">
			<?php
				$id = 0;
				foreach($list as $value)
				{
					$id++;
				
			?>
			<tr>
				<td><?=$id?></td>
				<td><?=$value['id']?></td>
				<td><?=$value['name']?></td>
				<td><?=$value['diachi']?></td>
				<td><?=$value['sdt']?></td>
				<td><?=$value['email']?></td>
				<td><a href="edit_bt.php?id=<?=$value['id']?>"><button style="width: 50px;">Sửa</button></a>
					<a href="Xoa.php?id=<?=$value['id']?>&dc=ncc"><button style="width: 50px;" onClick="return confirm('Bạn có chắc xóa không?')">Xóa</button></a>
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