<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style>
.table_wrapper{
    display: block;
    overflow-x: hidden;
/*    white-space: nowrap;*/
/*	 background: red;*/
	 height: 500px;
}	
</style>
</head>

<body>
	<?php
		require("database.php");
		$dl = new database1();
		$conn = $dl->connect("localhost","phonggym","root","");
		
		$ma = $_REQUEST['ma_nhom'];
		$sql = "SELECT * FROM baitap, nhom_bt WHERE (baitap.ma_nhom like '%".$_REQUEST["ma_nhom"]."%') AND baitap.ma_nhom = nhom_bt.ma_nhom";
		$query = $conn->query($sql);
		$list = [];
		while($row = $query->fetch())
		{
			$list[] = $row;
		}
	?>
	<div class="table_wrapper">
	<table class="table-hover table-bordered">
		<thead align="center">
			<tr>
				<th>Id</th>
				<th>Mã bài tập</th>
				<th>Tên</th>
				<th>Video</th>
				<th>Nhóm</th>
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
				<td><?=$value['ma_bt']?></td>
				<td><?=$value['name']?></td>
				<td><?=$value['video']?></td>
				<td><?=$value['ten_nhom']?></td>
				<td><a href="edit_bt.php?id=<?=$value['id']?>"><button>Sửa</button></a>
					<a href="Xoa.php?id=<?=$value['id']?>"><button onClick="return confirm('Bạn có chắc xóa không?')">Xóa</button></a>
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