<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="icon/fontawesome-free-5.13.1-web/fontawesome-free-5.13.1-web/css/all.css">
<link rel="stylesheet" type="text/css" href="chitietnhaphang.css">
</head>

<body>
	<?php
		session_start();
		if(isset($_SESSION['taikhoan']) && isset($_SESSION['admin']) && ($_SESSION['time'] + 1000) > time())
		{
		require("database.php");		
		$dl = new database1();
		$conn = $dl->connect("localhost","phonggym","root","");
		$sql = "SELECT phieuxuat.*,user_noibo.id AS usid,user_noibo.name AS usname, sp_kho.ten_sp,sp_kho.gia_ban,chitietphieuxuat.soluong FROM chitietphieuxuat, phieuxuat,user_noibo,sp_kho WHERE sp_kho.id = chitietphieuxuat.id_sp_kho AND phieuxuat.id_user_noibo = user_noibo.id AND phieuxuat.id = chitietphieuxuat.id_phieuxuat AND phieuxuat.id = ".$_REQUEST['id'];
		$query = $conn->query($sql);
		$query1 = $conn->query($sql);
		$row = $query->fetch();
		$list = [];
		while($row1 = $query1->fetch())
		{
			$list[] = $row1;
		}
		
	?>
	
	<div class="container">
			<h3 align="center">CHI TIẾT PHIẾU NHẬP HÀNG</h3>
	<?php
		$stt = 0;
	
	?>
	<p>Mã đơn hàng: <?=$_REQUEST['id']?> </p>
	<p>Người xuat: <?=$row['usname']?></p>
	<p>Ghi chú: </p>
	<p>Ngày tạo: <?=$row['time']?></p>
		<?php
			
		?>
	<table class="table-hover table-bordered" align="center">
		<thead align="center">
			<th>STT</th>
			<th style="width: 200px;">Tên sản phẩm</th>
			<th style="width: 100px;">Số lượng</th>
			<th  style="width: 100px;">Đơn giá</th>
			<th  style="width: 100px;">Thành tiền</th>
		</thead>
		
		<tbody align="center">
				<?php
			$stt = 0;
			foreach($list as $value)
			{
				$stt++;
				$tt = $value['gia_ban'] * $value['soluong'];
			?>
			<tr>
				<td><?=$stt?></td>
				<td><?=$value['ten_sp']?></td>
				<td><?=$value['soluong']?></td>
				<td><?=number_format($value['gia_ban']) ?> VNĐ</td>
				<td><?=number_format($tt) ?> VNĐ</td>
			</tr>
			<?php
			}
			?>
			
		</tbody>
			
	</table>
	
		<br><br>
	<div class="kyten">
	<p align="center"><b>Người xuất hóa đơn</b><br>(Ký tên)</p>
	
	</div>
	
	</div>
	<?php
		}
	?>
</body>
</html>