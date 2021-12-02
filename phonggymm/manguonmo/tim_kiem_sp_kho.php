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
	$sql = "SELECT sp_kho.*,ncc.name,nhom_sp_kho.* FROM sp_kho, nhom_sp_kho, ncc WHERE sp_kho.id = '".$_REQUEST['id']."' AND sp_kho.id_ncc = ncc.id AND sp_kho.id_msp = nhom_sp_kho.id_nhom";
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
			<tr align="center">
				<th>STT</th>
				<th>ID</th>
				<th>Id_ncc</th>
				<th>Img</th>
				<th>Tên sản phẩm</th>
				<th>số lượng</th>
				<th>Giá mua</th>
				<th>Giá bán</th>
				<th>Nhóm sản phẩm</th>
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
				<td><?=$value['id']?></td>
				<td><?=$value['name']?></td>
				<td><img class="anh" src="<?=$value['img']?>"></td>
				<td><?=$value['ten_sp']?></td>
				<td><?=$value['soluong']?></td>
				<td><?=number_format($value['gia_mua'])?></td>
				<td><?=number_format($value['gia_ban'])?></td>
				<td><?=$value['ten_nhom']?></td>
				<td align="center">
					<a href="edit_sp_kho.php?id=<?=$value["id"]?>"><button style="width: 50px;">Sửa</button></a>
					<a href="Xoa.php?id=<?=$value["id"]?>&dc=sp_kho"><button style="width: 50px;" onClick="return confirm('Bạn có chắc xóa không?')">Xóa</button></a>
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