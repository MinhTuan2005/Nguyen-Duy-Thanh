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
		
		
		$sql = "SELECT * FROM sanpham WHERE sanpham.id = '".$_REQUEST['ma_sp']."'";
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
			<tr align="center">
				<th>STT</th>
				<th>ID</th>
				<th>Img</th>
				<th>Tên sản phẩm</th>
				<th>số lượng</th>
				<th>Đơn giá</th>
			
				
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
				<td><img class="anh" src="<?=$value['Img']?>"></td>
				<td><?=$value['name']?></td>
				<td><?=$value['soluong']?></td>
				<td><?=number_format($value['tien'])?></td>
				
			
				<td align="center">
					<a href="edit_sp.php?id=<?=$value["id"]?>"><button style="width: 50px;">Sửa</button></a>
					<a href="Xoa.php?id=<?=$value["id"]?>"><button style="width: 50px;" onClick="return confirm('Bạn có chắc xóa không?')">Xóa</button></a>
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