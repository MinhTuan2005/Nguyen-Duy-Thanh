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
	if(!empty($_REQUEST['hoten']) && empty($_REQUEST['tt']))
	{
		$sql = "SELECT * FROM giohang WHERE (name like '%".$_REQUEST["hoten"]."%')";
	}
	else if(empty($_REQUEST['hoten']) && !empty($_REQUEST['tt']))
	{
		$sql = "SELECT * FROM giohang WHERE id = '".$_REQUEST["tt"]."'";
	}
	else if(!empty($_REQUEST['hoten']) && !empty($_REQUEST['tt']))
	{
		$sql = "SELECT * FROM giohang WHERE (name like '%".$_REQUEST["hoten"]."%') AND id = '".$_REQUEST["tt"]."'";
	}
	$query = $conn->query($sql);
	$count = $query->rowCount();
	$list = [];
	while($row = $query->fetch())
	{
		$list[] = $row;
	}
	if($count >0)
	{
?>
	<div class="table_wrapper">
	<table class="table-hover table-bordered">
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
		<tbody align="center">
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
				<td><?=$value['sdt']?></td>
				<td><?=date('Y-m-d H:i:s',$value['created_time'])?></td>
				<td><?=$value['diachi']?></td>
				<td><?=number_format($value['total'])?></td>
				<td><?=$value['thongtin']?></td>
				<td align="center">
					<a href="inhoadon.php?id=<?=$value['id']?>" name="in"><button style="width: 50px;">In</button></a>
					<a href="Xoa.php?id=<?=$value["id"]?>"><button style="width: 50px;" onClick="return confirm('Bạn có chắc xóa không?')">Xóa</button></a>
				</td>
			</tr>
			<?php
				}
			?>
		</tbody>
	</table>
		
	</div>
	<?php
	}
	else
	{
		echo "<h5 align = 'center'>Không có trong bảng</h5>";
	}
		?>
</body>
</html>