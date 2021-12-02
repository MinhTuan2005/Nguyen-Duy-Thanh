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
		$sql = "SELECT phieunhap.*, user_noibo.name AS namenb, ncc.name AS namencc, chitietphieunhap.tensp,chitietphieunhap.gianhap, chitietphieunhap.thanhtien AS ctpn, chitietphieunhap.soluong FROM phieunhap,chitietphieunhap, user_noibo, ncc WHERE phieunhap.id = chitietphieunhap.id_phieunhap 
		AND phieunhap.id_ncc = ncc.id AND phieunhap.id_user_noibo = user_noibo.id AND phieunhap.id = ".$_REQUEST['id'];
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
	<p>Người nhập: <?=$row['namenb']?></p>
	<p>Nhà cung cấp: <?=$row['namencc']?></p>
	<p>Ghi chú: </p>
	<p>Ngày tạo: <?=date('d-m-Y',$row['time'])?></p>
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
			?>
			<tr>
				<td><?=$stt?></td>
				<td><?=$value['tensp']?></td>
				<td><?=$value['soluong']?></td>
				<td><?=number_format($value['gianhap']) ?> VNĐ</td>
				<td><?=number_format($value['ctpn']) ?> VNĐ</td>
			</tr>
			<?php
			}
			?>
			<tr>
				<td></td>
				<td><b>Tổng tiền: </b></td>
				
				<td colspan = "3"><?=number_format($row['thanhtien'])?> VNĐ</td>
				
			</tr>
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