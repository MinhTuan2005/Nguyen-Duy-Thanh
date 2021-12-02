<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="don.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
	<?php
		session_start();
		require("database.php");
		$dl = new database1();
		$conn = $dl->connect("localhost","phonggym","root","");
		$query = $dl->truyvan("sp_kho","phonggym");
	
		
		if(!isset($_SESSION["donxuat"]))
				{
					$_SESSION["donxuat"] = [];
					
				}
		if(!isset($_SESSION["xuat"]))
				{
					$_SESSION["xuat"] = [];
					
				}
		if(isset($_REQUEST['action']))
		{
			if(isset($_SESSION['donxuat']))
			{
				
				switch($_REQUEST['action'])
				{
					case "submit":
						if(isset($_REQUEST['them1']))
						{
							$_SESSION['donxuat'][] = $_REQUEST;
							if(!in_array($_REQUEST['nv'],$_SESSION['xuat']))
								{
									$_SESSION['xuat'] = array("id" => $_SESSION['id'],"nx" => $_REQUEST['nx']); 
								}
							
							header("location: add_phieu_xuat.php");
							break;
						}
						else if(isset($_SESSION['xuat']))
						{
							foreach($_SESSION['donxuat'] as $value)
							{
//								update số lượng sp kho
								$new_sl = 0;
								$query2 = $dl->truyvanTCN("sp_kho","phonggym",$value['sp']);
								$row2 = $query2->fetch();
								$new_sl = $row2['soluong'] - $value['sl'];
								$sql2 = "UPDATE sp_kho SET soluong=? WHERE id=?";
								$pr2 = $conn->prepare($sql2);
								$pr2->bindParam(1,$new_sl);
								$pr2->bindParam(2,$value['sp']);
								$pr2->execute();
								
//								add sản phẩm tiệm
								$new_sl1 = 0;
								$query3 =$dl->truyvanTCN1("sanpham","phonggym",$value['sp']);
								if($query3->fetchColumn() > 0)
								{
									$query4 =$dl->truyvanTCN1("sanpham","phonggym",$value['sp']);
									$row3 =$query4->fetch();
//									print_r($row3);
									$new_sl1 = $row3['soluong'] + $value['sl'];
									$sql3 = "UPDATE sanpham SET soluong=? WHERE id_sp_kho=?";
									$pr3 = $conn->prepare($sql3);
									$pr3->bindParam(1,$new_sl1);
									$pr3->bindParam(2,$value['sp']);
									$pr3->execute();
								}
								else{
									
									$dl->addSP("sanpham","phonggym",$row2['ten_sp'],$value['sl'],$row2['gia_ban'],$row2['img'],$row2['id'],$row2['thongtin']);
//									$table,$dtb,$name,$sl,$dg,$img,$id_sp_kho,$tt
								}
								
							}
							
								$id_px = $dl->addPX("phieuxuat","phonggym",$_SESSION['xuat']['nx'],$_SESSION['xuat']['id']);
							
							foreach($_SESSION['donxuat'] as $value)
							{
								$dl->addCTPX("chitietphieuxuat","phonggym",$id_px,$value['sp'],$value['sl']);
							}
							unset($_SESSION['donxuat']);
								unset($_SESSION['xuat']);
//							header("location: add_phieu_xuat.php");
								die("Bạn đã thêm thành công <br> <a href='trangchuadmin.php'>Quay lại trang admin</a>");
						}
					case "delete":
						if(isset($_REQUEST['id']))
						{
							unset($_SESSION['donxuat'][$_REQUEST['id']]);
							header("location: add_phieu_xuat.php");
						}
						break;
						
				}
			}
		}
//				print_r($_SESSION['donxuat']);
	?>
		<div class="container">
			<form action="add_phieu_xuat.php?action=submit" name="myform" method="post"> 
				<div id="khung" style="height: 150px">
					<h2 style="font-weight: 100">&ensp;Phiếu Xuất</h2>
					<div class="a">
						<div class="c1">
							<h4>Người xuất</h4>
							<input type="text" style="width: 300px;" readonly name="nv" id="nv" value="<?=$_SESSION['name']?>">
						</div>
						<div class="c1">
							<h4 style="margin-left: 50px;">Ngày xuất</h4>
							<input type="text" readonly style="width: 300px; margin-left: 50px;" name="nx" id="nx" value="<?=date('d-m-Y',time())?>">
						</div>
						<br>
					</div>
					
				</div>
				<br><br>
				<div id="khung">
					<h2 style="font-weight: 100">&ensp;Chi tiết phiết xuất</h2>
					<div>
						<div class="a">
							<div class="c">
								<div class="c1">
									<h4 style="">Sản phẩm</h4>
								<select class="b" style="width: 300px;" name="sp" id="sp">
									<option value=""></option>
									<?php
										while($row = $query->fetch())
										{
										
									?>
											
											<option value="<?=$row['id']?>"><?=$row['ten_sp']?></option>
									<?php
										}
									?>
								</select>
								
								</div>
								
								<div class="c1">
									<h4 style="margin-left: 50px;">Số lượng</h4>
									<input type="number" style="width: 300px; margin-left: 50px;" name="sl" id="sl" value="">
								</div>
								<div class="clear"></div>
							</div>
							<br>
<!--							sumbit-->
							<input class="button" style="margin-left: 0px;" type="submit" onClick="" value="Thêm" name="them1" id="them1">
							<br>
							<table id="tb" class="table-hover table-bordered" style="text-align: center;margin-left: 0px; margin-top: 20px; margin-bottom: 20px;">
								<thead>
									<th style="width: 50px">STT</th>
									<th style="width: 50px">Id</th>
									<th style="width: 200px">Sản phẩm</th>
									<th style="width: 100px">Số lượng</th>
									<th style="width: 200px">Nhân viên</th>
									<th style="width: 200px">Ngày xuất</th>
									<th style="width: 50px">Thao tác</th>
								</thead>
								<tbody>
									<?php
									$id = 0;
										foreach($_SESSION['donxuat'] as $key => $value)
										{
											$id++;
									?>
									<tr>
										<td><?=$id?></td>
										<td><?=$value['sp']?></td>
										<?php
											$query1 = $dl->truyvanTCN("sp_kho","phonggym",$value['sp']);
											$row1 = $query1->fetch();
										?>
										<td><?=$row1['ten_sp']?></td>
										<td><?=$value['sl']?></td>
										<td><?=$value['nv']?></td>
										<td><?=$value['nx']?></td>
										<td><button style="width: 50px;" onClick="return confirm('Bạn có chắc xóa không?')"><a style="text-decoration: none;" href="add_phieu_xuat.php?action=delete&id=<?=$key?>">Xóa</a></button></td>
									</tr>
									<?php
										}
									?>
								</tbody>
							</table>
						<input type="submit" class="button" style="margin-bottom: 20px; margin-left: 0px;" name="xuat" id="xuat" value="Xuat">	
						</div>
						
						<br>
					</div>
				</div>
			</form>
		</div>
	<?php
	
	?>
</body>
</html>