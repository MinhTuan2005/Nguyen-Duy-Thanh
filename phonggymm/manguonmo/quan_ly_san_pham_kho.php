<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="icon/fontawesome-free-5.13.1-web/fontawesome-free-5.13.1-web/css/all.css">
<link rel="stylesheet" type="text/css" href="thongtinnhanvien.css">
<script language="javascript">

	
	$(document).ready(function(){
		$("#timkiem").click(function(){
			var ma = $("#ht").val();
				if(ma == "")
					{
						alert("yêu nhập id");
					}
				else
					{
						$.get("tim_kiem_sp_kho.php",{id:ma},function(data){
							$("#tb").html(data);
						});
					}
			});
			
		});
</script>
</head>

<body>
	<?php
		session_start();
		if(isset($_SESSION['taikhoan']) && isset($_SESSION['admin']) && ($_SESSION['time'] + 1000) > time())
		{
			
		
	?>
	<?php
		$list = [];
			require("database.php");
			$dl = new database1();
			$conn = $dl->connect("localhost","phonggym","root","");
			$colum_item = 5;
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
			$sql = "SELECT sp_kho.*,nhom_sp_kho.*,ncc.name FROM sp_kho,nhom_sp_kho,ncc WHERE sp_kho.id_msp = nhom_sp_kho.id_nhom AND sp_kho.id_ncc = ncc.id LIMIT $colum_item OFFSET $offset";
			$sql1 = "SELECT * FROM sp_kho,nhom_sp_kho,ncc WHERE sp_kho.id_msp = nhom_sp_kho.id_nhom AND sp_kho.id_ncc = ncc.id";
			$query = $conn->query($sql);
			$query1 = $conn->query($sql1);
//			print_r($query1->fetchAll());
			$count = $query1->rowCount();
			$sum_page = ceil($count/ $colum_item);
			
			while($row = $query->fetch())
			{
				$list[] = $row;
			}
			$query1 = $dl->truyvan("nhom_sp_kho","phonggym");
		$list1 = [];
		while($row1 = $query1->fetch())
		{
			$list1[] = $row1;
		}
	?>
	<h1 align="center">Thông tin sản phẩm Kho</h1>
	<br>
<!--	Tìm kiếm-->
	<div class="thanhngang">
		<div class="ngang1"><a href="add_sp_kho.php"><button>Thêm sản phẩm</button></a></div>
		<div class="ngang2">
			<div style="margin-left: 25px; margin-bottom: 10px;">
				<input type="text" id="ht" size="50" placeholder="Mã sản phẩm">
				<i id="timkiem" class="fas fa-search" style="font-size: 22px;"></i>
			</div>
			</div>
	</div>
	
	
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
	<br>
	<!--	Thanh phân trang-->
	<div class="thanhngang">
		<div class="pagination" style="justify-content: center">
			<ul class="pagination">
			<?php
				if($page > 3)
					{
			?>	
						<a class="page-item page-link" href="#" onClick='ajShow_qlspk(1);'>First</a>
			<?php
				}
			?>
				<?php
					for($i = 1; $i <= $sum_page; $i++)
					{
				?>
				<?php
						
						if($page != $i)
						{
							if($i > $page-3 && $i < $page+3)
							{
				?>
							 <a class="page-item page-link" href="#" onClick='ajShow_qlspk(<?=$i?>);'><?=$i?></a>
				<?php
							}
						}
						else
						{
				?>
							<strong class="page-item page-link" style="background: blue; color: #FFF;"><?=$i?></strong>
				<?php
						}
					}
				?>
				<?php
					if($page <= $sum_page-3)
					{
				?>
					
						<a class="page-item page-link" href="#" onClick='ajShow_qlspk(<?=$sum_page?>);'>Last</a>
					<?php
				}
					?>
		</div>
	</div>
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