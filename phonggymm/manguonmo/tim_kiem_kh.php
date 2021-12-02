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
			});
		});
	});
</script>
</head>

<body>
	
	<?php
	require("database.php");
	$dl = new database1();
//	$id = $_REQUEST["id"];

	$conn = $dl->connect("localhost","phonggym","root","");
	if(!empty($_REQUEST['hoten']) && empty($_REQUEST['tt']))
	{
		$sql = "SELECT * FROM user WHERE (name like '%".$_REQUEST["hoten"]."%')";
	}
	else if(empty($_REQUEST['hoten']) && !empty($_REQUEST['tt']))
	{
		$sql = "SELECT * FROM user WHERE trang_thai = '".$_REQUEST["tt"]."'";
	}
	else if(!empty($_REQUEST['hoten']) && !empty($_REQUEST['tt']))
	{
		$sql = "SELECT * FROM user WHERE (name like '%".$_REQUEST["hoten"]."%') AND trang_thai = '".$_REQUEST["tt"]."'";
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
			<tr>
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
						<li>Ngày bắt đầu: <?=date('Y-m-d H:i:s',$value['date_start'])?></li>
						<li>Thời hạn: <?=$value['term']?> ngày</li>
						<li>Ngày kết thúc: <?=date('Y-m-d H:i:s',$value['date_end'])?></li>
					</ul>
				</td>
				<td><?=$value['trang_thai']?></td>
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
					<a href="edit_kh.php?id=<?=$value["id"]?>"><button>Sửa</button></a>
					<a href="Xoa.php?id=<?=$value["id"]?>"><button onClick="return confirm('Bạn có chắc xóa không?')">Xóa</button></a>

					
				</td>
			</tr>
			<?php
				}
			?>
		</tbody>
	</table>
		
	<div class="modal fade" id="my_modal" style="margin-top: 150px;">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title" style="color: black"> Gia hạn </h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
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