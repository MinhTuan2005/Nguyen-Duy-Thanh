<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Thông tin sản phẩm</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" href="icon/fontawesome-free-5.13.1-web/fontawesome-free-5.13.1-web/css/all.css">
<link rel="stylesheet" type="text/css" href="thong_tin_san_pham.css">
<script type="text/javascript" src="dungchung.js"></script>
<script>
	$(document).ready(function(){
		$("#soluong").blur(function(){
			if($(this).val() < 1)
			{
				$("#mua").prop("disabled",true);
				$("#mua").css("background","black");

			}
			else
				{
					$("#mua").prop("disabled",false);
					$("#mua").css("background","red");
				}
		});
//		
	});
</script>
</head>

<body>
	<div id="Tong">
		
		<div id="themmenu"></div>
	<?php
		require("database.php");
		$dl = new database1();
		$query = $dl->truyvanTCN("sanpham","phonggym",$_REQUEST['id']);
	
		while($row = $query->fetch())
		{
//			print_r($row);
		
	?>
	
		<br>
		<br>
		<div class="giua">
		
		<div class="left ">
			<img class="img-fluid" src="<?=$row['Img']?>" >
			
		</div>
		<div class="right">
			<h1 style="width: 458px;"><?=$row['name']?></h1>
			<div style="color: yellow"><i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
			<i class="fas fa-star"></i>
			<i class="fas fa-star"></i> </div>
			<p>Mã sản phẩm: <?=$row['id']?></p>
			<div class="check">
				<span><i class="fas fa-check"></i>&emsp; Chuẩn hàng chính hãng</span>
				<br>
				<span><i class="fas fa-check"></i>&emsp; Hương vị thơm ngon, dễ dàng sử dụng</span>
				<br>
				<span><i class="fas fa-check"></i>&emsp; 69 Serving</span>
				<br>
				<span><i class="fas fa-check"></i>&emsp; 130 Calories</span>
				
			</div>
			<h3><?=number_format($row['tien'],0,',','.')?> vnđ</h3>
			
			<form method="post" action="giohang.php?action=add">
				<h5>Số lượng: <br><input class="soluong" type="number" value="1" id="soluong" name="quatity[<?=$row['id']?>]"></h5>
				
				<div class="thongtin text-justify">
				<p><?=$row['thongtin']?></p>
				</div>
				
				<p><input class="mua" type="submit" id="mua" value="Mua" name="mua"></p>
			</form>
			
		</div>
		
		<?php
		}
	?>
		</div>
		
		
		<div id="themfooter"></div>
	</div>
</body>
	
</html>