<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="bt_nguc.css">
<link rel="stylesheet" type="text/css" href="thongtinnhanvien.css">
</head>

<body>
	<?php
	
		require("database.php");
		$dl = new database1;
		$conn = $dl->connect("localhost","phonggym","root","");
	
		$colum_item = 6;
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
			$sql = "SELECT * FROM baitap,nhom_bt WHERE baitap.ma_nhom = nhom_bt.ma_nhom AND baitap.ma_nhom = 'bt_04' LIMIT $colum_item OFFSET $offset";
			$sql1 = "SELECT * FROM baitap WHERE baitap.ma_nhom = 'bt_04'";
			$query = $conn->query($sql);
			$query1 = $conn->query($sql1);
			$count = $query1->rowCount();
			$sum_page = ceil($count/ $colum_item);
			$list = [];
			while($row = $query->fetch())
			{
				$list[] = $row;
				
			}
	?>

	<br>
	<div class="bt">
		
			<h1 align="center">Tập Ngực</h1>
					<hr width="50px" style="height: 5px; background: yellow; border: none;">
		<?php
			foreach($list as $value)
			{
			
		?>
		<div class="bt1">
			
				<p><?=$value['video']?></p>
			
		
			<p><?=$value['name']?></p>
		</div>
		<?php
			}
		?>
		
		<div class="clear"></div>
		
	</div>
	<!--	Thanh phân trang-->
	<br>
	<div class="thanhngang">
		<div class="pagination" style="justify-content: center">
			<ul class="pagination">
			<?php
				if($page > 3)
					{
			?>	
						<a class="page-item page-link" href="#" onClick='ajShow_bt1(1);'>First</a>
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
							 <a class="page-item page-link" href="#" onClick='ajShow_bt1(<?=$i?>);'><?=$i?></a>
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
					
						<a class="page-item page-link" href="#" onClick='ajShow_bt1(<?=$sum_page?>);'>Last</a>
					<?php
				}
					?>
		</div>
	</div>
</body>
</html>