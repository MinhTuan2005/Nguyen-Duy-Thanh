<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Bài tập</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="thongtinnhanvien.css">
<link rel="stylesheet" href="icon/fontawesome-free-5.13.1-web/fontawesome-free-5.13.1-web/css/all.css">
<script language="javascript">

	
	$(document).ready(function(){
		$("#timkiem").click(function(){
			var ma_nhom = $("#ma_nhom").val();
				if(ma_nhom == "")
					{
						alert("yêu cầu chọn");
					}
				else
					{
						$.get("tim_kiem_bt.php",{ma_nhom:ma_nhom},function(data){
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
		require("database.php");
		$list = [];
		$dl = new database1();
			$conn = $dl->connect("localhost","phonggym","root","");
			$colum_item = 3;
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
			$sql = "SELECT * FROM baitap, nhom_bt WHERE baitap.ma_nhom = nhom_bt.ma_nhom LIMIT $colum_item OFFSET $offset";
			$sql1 = "SELECT * FROM baitap";
			$query = $conn->query($sql);
			$query1 = $conn->query($sql1);
			$count = $query1->rowCount();
			$sum_page = ceil($count/ $colum_item);
		while($row = $query->fetch())
		{
			$list[] = $row;	
		}
	
//	Truy vấn nhóm
	$query1 = $dl->truyvan("nhom_bt","phonggym");
		$list1 = [];
		while($row1 = $query1->fetch())
		{
			$list1[] = $row1;
		}
	?>
	<h1 align="center">Thông tin bài tập</h1>
	<br>
<!--	Tìm kiếm-->
	<div class="thanhngang">
		<div class="ngang1"><a href="add_bt.php"><button>Thêm bài tập</button></a></div>
		<div class="ngang2">
			<div style="margin-left: 25px; margin-bottom: 10px;">

				<select style="width: 500px;" name="ma_nhom" id="ma_nhom">
					<option value=""></option>
					<?php
						foreach($list1 as $value)
						{
					?>

							<option value="<?=$value["ma_nhom"]?>">
								<?=$value["ten_nhom"]?>
							</option>
					<?php
						}
					?>
				</select>
				<i id="timkiem" class="fas fa-search" style="font-size: 22px;"></i>
			</div>
		</div>
	</div>
	
	
	
	
	<table class="table-hover table-bordered" id="tb">
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
				<td><a href="edit_bt.php?id=<?=$value['id']?>"><button style="width: 50px;">Sửa</button></a>
					<a href="Xoa.php?id=<?=$value['id']?>&dc=baitap"><button style="width: 50px;" onClick="return confirm('Bạn có chắc xóa không?')">Xóa</button></a>
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
						<a class="page-item page-link" href="#" onClick='ajShow_baitap(1);'>First</a>
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
							 <a class="page-item page-link" href="#" onClick='ajShow_baitap(<?=$i?>);'><?=$i?></a>
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
					
						<a class="page-item page-link" href="#" onClick='ajShow_baitap(<?=$sum_page?>);'>Last</a>
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