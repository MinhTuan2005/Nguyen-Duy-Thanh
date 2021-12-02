<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="don.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script language="javascript">
	
	function kiemtra2(obj)
	{
		var a = document.getElementById("sl");
		if(obj.value == "")
			{
//				alert("Bạn không được phép để trống");
				return false;
			}
		else if(a.value <= 0)
			{
				return false;
			}
		
	}
	function kiemtra1()
	{
		var a = document.getElementById("sp");
		var b = document.getElementById("ncc");
		var c = document.getElementById("gia");
		var d = document.getElementById("tt");
		var e = document.getElementById("sl");
		if(kiemtra2(a) == false || kiemtra2(b) == false || kiemtra2(c) == false || kiemtra2(d) == false || kiemtra2(e) == false)
		{
			alert("Kiem tra lại");
			return false;
		}
//		alert("aaaa");
	}
//	$(document).ready(function(){
//		$("#them").click(function(){
//			if(kiemtra("#sp") == false)
//				{
//					$(this).prop("disabled",false);
//				}
//		});
//	});
	
</script>
</head>

<body>
	<?php
	session_start();
//	error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
		if(isset($_SESSION['taikhoan']) && isset($_SESSION['admin']) && ($_SESSION['time'] + 1000) > time())
		{
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	?>
			<?php
			require("database.php");
			$dl = new database1();
			$query = $dl->truyvan("ncc","phonggym");
			$conn = $dl->connect("localhost","phonggym","root","");

				if(!isset($_SESSION["donnhap"]))
				{
					$_SESSION["donnhap"] = [];
					
				}
				if(!isset($_SESSION["tao"]))
				{
					$_SESSION["tao"] = [];
					
				}
				if(isset($_REQUEST['action']))
				{
				if(isset($_SESSION["donnhap"]))
				{
					switch($_REQUEST['action'])
					{
						case "submit":
							if(isset($_REQUEST['them']))
							{
								$_REQUEST['thanhtien'] = $_REQUEST['gia'] * $_REQUEST['sl'];
								if(!in_array($_REQUEST['ncc'],$_SESSION['tao']))
								{
									$_SESSION['tao'] = array("nn" => $_REQUEST['nn'],"ncc" => $_REQUEST['ncc'],"id" => $_SESSION['id']); 
								}
//								$a1++;
								$_SESSION["donnhap"][] = $_REQUEST;
								
								$ncc1 = $_REQUEST['ncc'];
				
								header("location: add_don_nhap.php");
//								unset($_SESSION['donnhap']);
//								unset($_SESSION['tao']);
//								
							}
							if(isset($_REQUEST['tao']))
							{

//								print_r($_SESSION['tao']);
								$tong = 0;
								foreach($_SESSION["donnhap"] as $value)
								{
									$tong += $value['thanhtien'];
								}
								
									$phieunhap_id = $dl->addPN("phieunhap","phonggym",$tong,strtotime($_SESSION['tao']['nn']),$_SESSION['tao']['ncc'],$_SESSION['tao']['id']);
//									$phieunhap_id = ->lastInsertId();
//								echo $phieunhap_id;
								foreach($_SESSION["donnhap"] as $value)
								{
									$dl->addCTPN("chitietphieunhap","phonggym",$phieunhap_id,$value['sp'],$value['gia'],$value['sl'],$value['thanhtien'],$value['tt']);
//									$table,$dtb,$id_pn,$name,$gn,$sl,$tt,$t_t
								}
//								$table,$dtb,$tt,$time,$id_ncc,$id_nb
								unset($_SESSION['donnhap']);
								unset($_SESSION['tao']);
//								header("location: add_don_nhap.php");
								die("Bạn đã thêm thành công <br> <a href='trangchuadmin.php'>Quay lại trang admin</a>");

							}
							break;
						case "delete":
							if(isset($_REQUEST['id']))
							{
								unset($_SESSION['donnhap'][$_REQUEST['id']]);
							}
							header("location: add_don_nhap.php");
							break;
					}
				}
				}
			


			
			
			
			?>
	<br>
	<br>
	<br>
		<div class="container">
		<form method="post" action="add_don_nhap.php?action=submit">
<!--			//Đơn hàng-->
			<div id="khung" style="height: 250px;">
				
				<h2 style="font-weight: 100">&ensp;Đơn Hàng</h2>
				<div class="a">
					<h4>Nhà cung cấp</h4>
					
					<select class="b" onBlur="kiemtra(this)" style="width: 850px" name="ncc" id="ncc">
						<option value=""></option>
						<?php
							while($row = $query->fetch())
							{
						?>
								<option value="<?=$row['id']?>"><?=$row['name']?></option>
						<?php
							}
						?>
					</select>
						
					
					<div class="c">
						<br>
						<div class="c1">
							<h3>Ngày nhập</h3>
							<input class="b" style="width: 200px;" readonly type="text" name="nn" id="nn" 
								   value="<?=date('Y-m-d',time())?>">
						</div>
						
						<div class="c1">
							<h3 style="margin-left: 50px;">Trạng thái</h3>
							<select class="b" onBlur="kiemtra2(this)" style="width: 300px; margin-left: 50px;" name="tt" id="tt">
								<option value=""></option>
								<option value="0">Đã thanh toán</option>
								<option value="1">Chưa thanh toán</option>
							</select>
						</div>
						
						<div class="c1">
							<h3 style="margin-left: 50px;">Nhân viên</h3>
							<input class="b" style="width: 240px; margin-left: 50px;" readonly type="text" name="nv" id="nv" value="<?=$_SESSION['name']?>">
						</div>
					</div>
					<div class="clear"></div>
				</div>

			</div>
			
		<!--			//Chi tiết đơn hàng-->
			<br>
			<br>
			<div id="khung">
				<h2 style="font-weight: 100">&ensp;Chi tiết đơn hàng</h2>
				<div class="a">
					<div class="c">
						<div class="c1">
								<h3>Sản phẩm</h3>
								<input class="b" onBlur="kiemtra2(this)" style="width: 200px;" type="text" name="sp" id="sp" value="">
						</div>

						<div class="c1">
								<h3 style="margin-left: 50px;">Giá</h3>
								<input class="b" onBlur="kiemtra2(this)" style="width: 300px; margin-left: 50px;" type="text" name="gia" id="gia" value="">
						</div>

						<div class="c1">
								<h3 style="margin-left: 50px;">Số lượng</h3>
								<input class="b" onBlur="kiemtra2(this)" style="width: 240px; margin-left: 50px;" type="number" name="sl" id="sl" value="">
						</div>
					</div>
					<div class="clear"></div>
					<br>
					
					<input class="button" type="submit" onClick="return kiemtra1()" value="Thêm" name="them" id="them">
					<br>
					<table id="tb" class="table-hover table-bordered" style="text-align: center;margin-left: -20px; margin-top: 20px; margin-bottom: 20px;">
						<thead>
							<th style="width: 200px">Sản phẩm</th>
							<th style="width: 150px">Nhà cung cấp</th>
							<th style="width: 150px">Giá</th>
							<th style="width: 50px">Số lượng</th>
							<th style="width: 150px">Thành tiền</th>
							<th style="width: 135px">Thao tác</th>
						</thead>
						<?php
							if(!empty($_SESSION['donnhap']))
							{
								foreach($_SESSION["donnhap"] as $key => $value)
								{
//									$_SESSION['tt'] = $value['gia'] * $value['sl'];
//								 $
//									echo $key;
//									echo $_SESSION['donnhap'][$key]['ncc'];
						?>
									<tbody>
										<td><?=$value["sp"]?></td>
										<?php
											$query_ncc = $dl->truyvanTCN("ncc","phonggym",$value["ncc"]);
											$row_ncc = $query_ncc->fetch();
										?>
										<td><?=$row_ncc['name']?></td>
										<td><?=number_format($value['gia'])?></td>
										<td><?=$value["sl"]?></td>
										<td><?=number_format($value['thanhtien'])?></td>
										<td><button style="width: 50px;" onClick="return confirm('Bạn có chắc xóa không?')"><a href="add_don_nhap.php?action=delete&id=<?=$key?>">Xóa</a></button></td>
									
									</tbody>
						<?php
								}
								
							}
							
						?>
						
					</table>
					
					<input <?php
						   	if(empty($_SESSION['donnhap']))
							{
								echo("disabled");
							}
							else if(!empty($_SESSION['donnhap']))
								{
									
									for($i=0; $i< count($_SESSION['donnhap']); $i++)
									{
										for($j=0; $j< count($_SESSION['donnhap']); $j++)
										{
											if($_SESSION['donnhap'][$i]['ncc'] != $_SESSION['donnhap'][$j]['ncc'])
											{

												echo("disabled");
												break;
											}

										}
										break;
									}
								}
						   ?> type="submit" class="button"style="margin-bottom: 20px;" value="Tạo đơn" name="tao" id="tao">
					<br>
					
					
				</div>
				
				
			</div>
			
		</form>
		</div>
	<?php
		}
	?>
</body>
</html>