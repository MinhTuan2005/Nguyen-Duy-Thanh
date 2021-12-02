<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Coach</title>
<link rel="stylesheet" type="text/css" href="coach.css">
<link rel="stylesheet" href="icon/fontawesome-free-5.13.1-web/fontawesome-free-5.13.1-web/css/all.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script type="text/javascript" src="dungchung.js"></script>
</head>

<body>
	<?php
		require("database.php");
		$dl = new database1();
		$conn = $dl->connect("localhost","phonggym","root","");
		$sql1 = "SELECT * FROM user_noibo WHERE ma_nhom='nb_ql_hlv'";
		$sql2 = "SELECT * FROM user_noibo WHERE ma_nhom='nb_hlv'";
		$query1 = $conn->query($sql1);
		$query2 = $conn->query($sql2);
		
	?>
	<div id="Tong">
		<div id="themmenu"></div>
		<div id="banner">
			<div class="giua1">
				<img src="../img/img-coach/sss3.jpg" width="1296px" height="500px">
				<div class="anhde">
					<br>
					<h1 align="center" style="color: yellow; font-size: 60px; font-weight: 700;">ĐỘI NGŨ COACH</h1>
					<hr width="100px" style="height: 5px; background: yellow; border: none;">
					<br>
					<p align="center" style="font-size: 22px; color: #FFF;">Đội ngũ coach của Swequity được sàng lọc kĩ càng, phải trải qua giai đoạn trainning<br> ít nhất 3 tháng để có đủ kĩ năng giao tiếp và kiến thức chuyên môn<br> hướng dẫn cho khách hàng</p>
				</div>
				<div class="tieude">
					<ul class="tieude1">
						<li><a href="">KINH NGHIỆM</a></li>
						<li><a href="">PHƯƠNG PHÁP ĐÀO TẠO</a></li>
						<li><a href="">SENIOR COACH</a></li>
						<li><a href="">JUNIOR COACH</a></li>
					</ul>
				</div>
			</div>
		</div>
		<br>
			<br>
		<div id="Maincontent">
			
			<div>
				<h1 align="center">Đội ngũ giàu kinh nghiệm với nền tảng kiến thức vững chãi</h1>
				<hr width="300px" style="height: 5px; background: yellow; border: none;">
				<br>
				<div class="ndkn">
					<center><img src="../img/img-coach/083358.jpg"></center>
					<p class="text-justify">
						<br>
						Đội ngũ Coach của Swequity không chỉ là người làm dịch vụ, họ còn là người anh em, người đồng đội, người thầy, người huấn luyện của riêng bạn. Họ vừa thúc đẩy bạn vượt qua mọi ranh giới, giới hạn của bản thân, vừa là chỗ dựa tinh thần khi bạn cảm thấy mỏi mệt, muốn từ bỏ.
						<br>
						<br>
						Chúng tôi kinh doanh dựa trên nền tảng tri thức, nên mỗi người coach đều có bề dày kiến thức và kinh nghiệm. Không chỉ hiểu biết sâu rộng về lĩnh vực sức khỏe, dinh dưỡng và giải phẫu học về cơ và chuyển động của cơ thể người; họ còn là những người đồng hành đầy trách nhiệm và năng lượng để thúc đẩy hội viên vươn tới những giới hạn mới.
						<br>
						<br>
						Hiểu được nhu cầu và thể trạng mỗi người một khác, không có chương trình tập luyện nào phù hợp cho tất cả. Vì thế với từng khách hàng, các coach đều có quá trình tìm hiểu, nghiên cứu, phân tích tình trạng cơ thể một cách kỹ lưỡng, và thiết kế ra chương trình tập luyện phù hợp dành riêng cho họ.
					</p>
				</div>
				
			</div>
			<br>
			<br>
			<div class="ppdt">
				<h1 align="center">Phương pháp đào tạo Coach tại SUF</h1>
				<hr width="150px" style="height: 5px; background: yellow; border: none;">
				<br>
				<div class="ndkn">
					<center><img src="../img/img-coach/083357_unnamed.jpg"></center>
					<p class="text-justify">
						<br>
						Đội ngũ coach ở Swequity phải trải qua một chương trình đào tạo 3 tháng bài bản và thực hiện những bài kiểm tra kiến thức ngặt nghèo. Chỉ những người xuất sắc nhất mới được giữ lại và trở thành coach chính thức ở Swequity.
					<br>
					<br>
					Phương pháp đào tạo của chúng tôi chú trọng vào kiến thức chuyên môn, kĩ năng sư phạm và kĩ năng tìm hiểu, phân tích, chẩn đoán vấn đề cơ thể, để mỗi người coach đều đủ năng lực thiết kế ra chương trình luyện tập mang lại hiệu quả cho khách hàng.
					</p>
				</div>
			</div>
			<br>
			<br>
			<div class="scoach">
				<h1 align="center">SENIOR COACH</h1>
				<hr width="100px" style="height: 5px; background: yellow; border: none;">
				<img src="https://channel.mediacdn.vn/2019/5/18/photo-1-1558151023188418318075.jpg" width="100%">
				<div class="mau"></div>
				<ul class="anhcoach">
				<?php
					while($row1 = $query1->fetch())
					{
				?>
					<li class="anhcoach1">

						<img src="<?=$row1['Img']?>">
						<center><span style="color: yellow; font-size: 22px; font-weight: 700;"><?=$row1['name']?></span></center>
						<center><span style="color: #FFF;">Quản lý HLV / Coach Manager</span></center>
					
					</li>
					<?php
					}
				?>
				</ul>

			</div>
				
				
		
<!--			======================================jcoach======================================-->
			<br>
			<br>
			<br>
			<div class="jcoach">
				<h1 align="center">JUNIOR COACH</h1>
				<hr width="100px" style="height: 5px; background: red; border: none;">

<!--				=================jcoach 1===================-->
				<ul>
				<?php
					while($row2 = $query2->fetch())
					{
				?>
				<li class="anhjcoach" style="margin-left: 135px;">
					<img src="<?=$row2['Img']?>">
					<center><span style="font-size: 22px; font-weight: 700"><?=$row2['name']?></span></center>
					<center><span>HLV/ Junior Coach</span></center>
				
				</li>	
					<?php
					}
				?>
				</ul>

				<div class="clear"></div>
			</div>
			
	</div>
		<!--	============================================Cuối=========================-->
	<div id="themfooter"></div>
	</div>
<div id="icon_cart">
		
		</div>
</body>
</html>
