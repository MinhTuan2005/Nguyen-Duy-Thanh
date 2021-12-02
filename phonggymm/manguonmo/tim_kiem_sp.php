<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style>	
</style>
<link rel="stylesheet" href="sanpham.css" type="text/css">
</head>

<body>
	<?php
		require("database.php");
		$dl = new database1();
		$conn = $dl->connect("localhost","phonggym","root","");
		if(!empty($_REQUEST['tsp']) && !empty($_REQUEST['ma_nhom']))
		{
			$sql = "Select * from sanpham, sp_kho where sanpham.id_sp_kho = sp_kho.id AND (sanpham.name like '%".$_REQUEST["tsp"]."%') AND  sp_kho.id_msp = '".$_REQUEST["ma_nhom"]."'";
		}
		else if(!empty($_REQUEST['tsp']) && empty($_REQUEST['ma_nhom']))
		{
			$sql = "Select * from sanpham where (name like '%".$_REQUEST["tsp"]."%')";
		}
		else if(empty($_REQUEST['tsp']) && !empty($_REQUEST['ma_nhom']))
		{
			$sql = "Select * from sanpham, sp_kho where sanpham.id_sp_kho = sp_kho.id AND sp_kho.id_msp = '".$_REQUEST["ma_nhom"]."'";
		}
		
		
		

		$query = $conn->query($sql);
		$list = [];
		
			
		
	?>
	<div class="table_wrapper">
		<div class="sanpham">
			<?php
				while($row = $query->fetch())
			{
			?>
			<div class="sanpham1">
				<a href="thong_tin_san_pham.php?id=<?=$row['id']?>">
				<div><img src="<?=$row['Img']?>" style="max-width: 207px; max-height: 207px"></div>
				<div class="chu">
						<p><?=$row['name']?></p>
					
				</div>
				<p style="font-weight: 700; color: red;"><?=number_format($row['tien'],0,',','.')?> VNĐ</p>
				</a>
				<div class="tong_vongtron">
					<a href="thong_tin_san_pham.php?id=<?=$row['id']?>">
						<div class="vongtron">
							<i class="far fa-eye" style="position: absolute; color: #FFF; left: 6px; top: 7px;"></i>
						</div>
					</a>
					<div class="vongtron" style="top: 5px">
						<button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="background: rgba(0,0,0,0); border: none">
							<a id="giohang" href="giohang.php?action=add1&id=<?=$row['id']?>&so_luong=1">
						<i class="fas fa-cart-plus" style="position: absolute; color: #FFF; left: 6px; top: 7px;" ></i>
							</a>
							</button>
					</div>
				</div>
			</div>
			
			
			
			<?php
				}
			?>
		</div>
	</div>
</body>
</html>