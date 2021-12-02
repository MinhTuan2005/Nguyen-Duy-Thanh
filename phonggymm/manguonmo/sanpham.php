<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sản Phẩm</title>
<link rel="stylesheet" href="icon/fontawesome-free-5.13.1-web/fontawesome-free-5.13.1-web/css/all.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript" src="dungchung.js"></script>
<link rel="stylesheet" href="sanpham.css" type="text/css">
<style>
	
</style>
<script language="javascript">
	$(document).ready(function(){
		$("a#giohang").click(function(event){
			event.preventDefault();
			var href = $(this).attr("href");
			$.get(href,function(data){

				//thành công
			});
		});
		
		$("#timkiem").click(function(){
			var ma_nhom= $("#ma_nhom").val();
			var tsp = $("#tsp").val();
//			alert("Thanh");
				if(ma_nhom == "" && tsp == "")
					{
						alert("yêu cầu chọn");
					}
				else
					{
						$.get("tim_kiem_sp.php",{ma_nhom:ma_nhom,tsp:tsp},function(data){
							$(".sanpham").html(data);
						});
					}
			});
			
		});
	
</script>
</head>

<body>
	<div id="Tong">
		<div id="themmenu"></div>
		<img src="../img/img-trangchinh/whey1.jpg" style="width: 1296px">
		<br>
		<?php
			require("database.php");
			$dl = new database1();
			$conn = $dl->connect("localhost","phonggym","root","");
			$colum_item = 8;
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
			$sql = "SELECT sanpham.* FROM sanpham LIMIT $colum_item OFFSET $offset";
			$sql1 = "SELECT * FROM sanpham";
			$query = $conn->query($sql);
			$query1 = $conn->query($sql1);
			$count = $query1->rowCount();
			$sum_page = ceil($count/ $colum_item);
//			$row5 = $query->fetchAll();
//			print_r($row5);

		
			
		?>
		<br>
<!--		<h1>aaaaaaaaaaaa</h1>-->
		<br>
		
		<div class="tcsp">
			<h1 align="left">TẤT CẢ SẢN PHẨM</h1>
		<br>
			<div class="ngang2">
				<div style="margin-left: 25px; margin-bottom: 10px;">
				<input type="text" id="tsp" name="tsp" size="25" placeholder="Tên sản phẩm">
				<select style="width: 200px; height: 30px;" name="ma_nhom" id="ma_nhom">
					<option value=""></option>
					<?php
						$query2 = $dl->truyvan("nhom_sp_kho","phonggym");
						while($row2 = $query2->fetch())
						{
							?>
							<option value="<?=$row2["id_nhom"]?>"><?=$row2["ten_nhom"]?></option>
						<?php
						}
					?>
				</select>
				
				<i id="timkiem" class="fas fa-search" style="font-size: 22px;"></i>
			</div>
			</div>
			
			
		</div>
		<br>
		<br>
		<hr width="500px" style="height: 5px; background: red; border: none;">
		
		<br>
		
		<div id="a">
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
		</div>
		<!-- Button to Open the Modal -->

<!--  Open modal-->


<!-- The Modal -->
<div class="modal fade" id="myModal" style="margin-top: 150px;">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title" style="color: black"> Thông báo</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
		  <h5 class="modal-title" style="color: rgba(69,208,81,1.00)"><i class="far fa-check-square"></i> Đã thêm vào giỏ</h5>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
		   <button type="button" class="btn btn-danger"><a href="giohang.php" style="text-decoration: none; color: #FFF">Xem giỏ hàng</a></button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tiếp tục mua</button>
      </div>

    </div>
  </div>
</div>
	
		<div class="clear"></div>
		
		<div class="thanhngang">
		<div class="pagination" style="justify-content: center">
			<ul class="pagination">
			<?php
				if($page > 3)
					{
			?>	
						<a class="page-item page-link" href="?page=1">First</a>
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
							 <a class="page-item page-link" href="?page=<?=$i?>"><?=$i?></a>
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
					
						<a class="page-item page-link" href="?page=<?=$sum_page?>">Last</a>
					<?php
				}
					?>
		</div>
	</div>
			<div id="icon_cart"></div>
		<div id="themfooter"></div>
	
	</div>
		
</body>
</html>