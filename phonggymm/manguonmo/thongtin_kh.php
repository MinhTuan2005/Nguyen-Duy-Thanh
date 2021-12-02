<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="icon/fontawesome-free-5.13.1-web/fontawesome-free-5.13.1-web/css/all.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="thongtinnhanvien.css">
	<script language="javascript">
		$(document).ready(function(){
		$("#timkiem").click(function(){
//			var id = $("#mnv").val();
			var name = $("#ht").val();
			var tt = $("#han").val();
			if( name == "" && tt == "")
				{
					alert("Yêu cầu nhập ");
				}
			else{
				$.get("tim_kiem_kh.php",{hoten:name,tt:tt},function(data){
				$("#tb").html(data);
			});
			}
		});
			
		$('#my_modal').on('show.bs.modal', function(e) {
		  var id1 = $(e.relatedTarget).data('id1');
		  var id2 = $(e.relatedTarget).data('id2');
		  $(e.currentTarget).find('input[name="ma_id"]').val(id1);
		  $(e.currentTarget).find('input[name="start"]').val(id2);
//			alert("Thanh");
		});
			
			
		$("#giahan").click(function(event){
			event.preventDefault();
//			alert("Thanh");
			var id = $("#ma_id").val();
			var start = $("#start").val();
			var term = $("#term").val();
			$.get("giahan.php",{start:start,term:term,id:id},function(data){
//				alert(id+"-"+start+"-"+term);
				alert("Thành công");
//				$("#my_modal").close();
				$("#abc").click();
			});
		});
	});
	</script>
</head>

<body>
	<?php
		session_start();
		if(isset($_SESSION['taikhoan']) && isset($_SESSION['admin']) && ($_SESSION['time'] + 1000) > time())
		{
			date_default_timezone_set('Asia/Ho_Chi_Minh');
		
	?>
	<?php
		require_once("database.php");
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
			$sql = "SELECT * FROM user LIMIT $colum_item OFFSET $offset";
			$sql1 = "SELECT * FROM user";
			$query = $conn->query($sql);
			$query1 = $conn->query($sql1);
			$count = $query1->rowCount();
			$sum_page = ceil($count/ $colum_item);
		while($row = $query->fetch())
		{
			$list[] = $row;
		}
		
	?>
	<h1 align="center">Thông khách hàng</h1>
	<br>
<!--	Tìm kiếm-->
	<div class="thanhngang">
		
		<div class="ngang1"><a href="dangky_kh.php"><button>Thêm khách hàng</button></a></div>
		<div class="ngang2">
			<div style="margin-left: 25px; margin-bottom: 10px;">
				<input type="text" id="han" name="han" size="25" placeholder="trạng thái">
				<input type="text" id="ht" size="25" placeholder="Họ tên">
				<i id="timkiem" class="fas fa-search" style="font-size: 22px;"></i>
			</div>

		</div>
		
		<table id="tb" class="table-hover table-bordered">
	</div>
	
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
		<tbody>
			<?php
				$id = 0;
				foreach($list as $value)
				{
					$id++;
						if($value['date_end'] < time())
						{
							$sql2 = "UPDATE user SET trang_thai=N'Hết hạn' WHERE id=".$value['id'];
						}
						else if($value['date_end'] > time() && $value['date_end'] <= time()+4*24*60*60)
						{
							$sql2 = "UPDATE user SET trang_thai=N'Sắp hết hạn' WHERE id=".$value['id'];
						}
						else if($value['date_end'] > time()+4*24*60*60)
						{
							$sql2 = "UPDATE user SET trang_thai=N'Còn hạn' WHERE id=".$value['id'];
						}
						$query2 = $conn->query($sql2);
//						echo $value['trang_thai'];
					$sql3 = "SELECT trang_thai FROM user WHERE id=".$value['id'];
					$query3 = $conn->query($sql3);
					$row3 = $query3->fetch();
			?>
		
			<tr align="center">
				<td><?=$id?></td>
				<td><img class="anh" src="<?=$value['Img']?>"></td>
				<td><?=$value['name']?></td>
				<td><?php if($value['gioitinh'] == 0)
						{
							echo "nam";
						}
					else if($value['gioitinh'] == 1)
					{
						echo "nữ";
					}
					?></td>
				<td align="left">
					<ul>
						<li>Mã khách hàng: <?=$value['id']?></li>
						<li>Số điện thoại: <?=$value['sdt']?></li>
						<li>Năm Sinh: <?=$value['ngaysinh']?></li>
						<li>Địa chỉ: <?=$value['diachi']?></li>
						<li>Ngày bắt đầu: <?=date('Y-m-d',$value['date_start'])?></li>
						<li>Thời hạn: <?=$value['term']?> ngày</li>
						<li>Ngày kết thúc: <?=date('Y-m-d',$value['date_end'])?></li>
					</ul>
				</td>
				<td><?=$row3['trang_thai']?></td>
				<td>
					<button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="background: rgb(56,158,208); border: none; width: 80px; margin-top: -5px">
					<a style="text-decoration: none; color: #FFF" href="#my_modal" data-toggle="modal" data-id1="<?=$value['id']?>" data-id2="<?php
						if($value['date_end'] <= time())
						{
							echo date('Y-m-d H:i:s',time());
						}
					else{
						echo date('Y-m-d H:i:s',$value['date_end']);
					}
						
																								   ?>">Gia hạn</a>
					</button>
					<a href="edit_kh.php?id=<?=$value["id"]?>"><button style="width: 50px;">Sửa</button></a>
					<a href="Xoa.php?id=<?=$value["id"]?>&dc=user"><button style="width: 50px;" onClick="return confirm('Bạn có chắc xóa không?')">Xóa</button></a>

					
				</td>
			</tr>
			<?php
				}
			?>
		</tbody>
	</table>
	<br>
	<div class="thanhngang">
		<div class="pagination" style="justify-content: center">
			<ul class="pagination">
			<?php
				if($page > 3)
					{
			?>	
						<a class="page-item page-link" href="#" onClick='ajShow_khachhang(1);'>First</a>
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
							 <a class="page-item page-link" href="#" onClick='ajShow_khachhang(<?=$i?>);'><?=$i?></a>
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
					
						<a class="page-item page-link" href="#" onClick='ajShow_khachhang(<?=$sum_page?>);'>Last</a>
					<?php
				}
					?>
		</div>
	</div>
		
			
		
		<div class="modal fade" id="my_modal" style="margin-top: 150px;">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title" style="color: black"> Gia hạn </h5>
        <button type="button" class="close" id="abc" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
		  
		<form method="get" action="giahan.php">
			<p style="margin-left: 120px;">Id: <input readonly  type="text" name="ma_id" size="20" id="ma_id" value=""></p>	
			<p style="margin-left: 120px;">Bắt đầu: <input readonly  type="text" name="start" size="20" id="start" value=""></p>	
			<p style="margin-left: 130px;">Kỳ hạn: 
				<select name="term" id="term">
					<option></option>
					<option value="3">3 ngày</option>
					<option value="30">1 tháng</option>
					<option value="90">3 tháng</option>
					<option value="180">6 tháng</option>
					<option value="240">8 tháng</option>
					<option value="365">1 năm</option>
				</select>
			</p>
<!--			<input type="submit" name="sb" value="Gửi">-->
		</form>
		  
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
		   <button type="button"><a href="#" id="giahan" style="text-decoration: none; color: #FFF">Cập nhật</a></button>
<!--        <button type="button" class="btn btn-danger" data-dismiss="modal">Tiếp tục mua</button>-->
      </div>

    </div>
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