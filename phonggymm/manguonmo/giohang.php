<?php
	session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Giỏ Hàng</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="giohang.css">
<script type="text/javascript" src="dungchung.js"></script>
<script language="javascript">
	$(document).ready(function(){
		$("#dat_hang").click(function(){
			if($("#name").val() == "")
					{
						alert("Bạn phải nhập tên");
						return false;
					}
			else if($("#phone").val() == "")
					{
						alert("Bạn phải nhập số điện thoại");
						return false;
					}
			else if($("#dc").val() == "")
					{
						alert("Bạn phải nhập địa chỉ");
						return false;
					}
		});
		
		$("#soluong").blur(function(){
			if($(this).val() < 1)
			{
				$("#dat_hang").prop("disabled",true);
				$("#dat_hang").css("background","black");

			}
			else
				{
					$("#dat_hang").prop("disabled",false);
					$("#dat_hang").css("background","red");
				}
		});
	
});
</script>
</head>

<body>
	<?php
	require("database.php");
	
//	kiemtra giohang
	if(!isset($_SESSION["gio_hang"]))
			{
				$_SESSION['gio_hang'] = array();
			}
	
//	kiemtra action
		if(isset($_REQUEST['action']))
		{
			//update số lượng
			function update_soluong($add = false)
			{
				foreach($_POST['quatity'] as $id => $soluong)
				{
					if($soluong < 1)
					{
						unset($_SESSION['gio_hang'][$id]);
					}
					else
					{
						if($add == true)
						{
								$_SESSION['gio_hang'][$id] += $soluong;
						}
						else
						{
								$_SESSION['gio_hang'][$id] = $soluong;
						}
					}
					
				}
			}
						
			
			//update số lượng1
				function update_soluong1($add = false)
				{
				
					if($add == true)
						{
								$_SESSION['gio_hang'][$_REQUEST['id']] += $_REQUEST['so_luong'];
						}
			}
			if(isset($_SESSION['gio_hang']))
			{
				switch($_REQUEST['action'])
				{
					case "add":
						update_soluong(true);
						header("location: giohang.php");
						break;
					case "add1":
						update_soluong1(true);
						header("location: giohang.php");
						break;
					case "delete":
						if(isset($_REQUEST['id']))
						{
							unset($_SESSION["gio_hang"][$_REQUEST['id']]);
						}
						header("location: giohang.php");
						break;
					case "submit":
						if(isset($_REQUEST['cap_nhat']))
						{
							update_soluong();
							header("location: giohang.php");
						}
						
						if(isset($_REQUEST['dat_hang']))
						{
							
							$dl1 = new database1();
							$conn1 = $dl1->connect("localhost","phonggym","root","");
							$sql1 = "SELECT * FROM sanpham WHERE id IN(".implode(",",array_keys($_SESSION['gio_hang'])).")";
							$query1 = $conn1->query($sql1);
							$total1 = 0;
							$succrent = false;
							$list = [];
							$slnew = 0;
							while($row = $query1->fetch())
							{
								$list[] = $row;
								$total1 += $row['tien'] * $_REQUEST['quatity'][$row['id']];
//								$slnew = 0;
								for($i = 0 ; $i < count(array_keys($_REQUEST['quatity'])); $i++)
								{
									if($row['id'] == array_keys($_REQUEST['quatity'])[$i])
									{
										$slnew = $row['soluong'] - $_REQUEST['quatity'][$row['id']];
								
										//cập nhật số lượng trong cửa hàng
								$sql4 = "UPDATE sanpham SET soluong = ? WHERE id = ?";

									$pr4 = $conn1->prepare($sql4);

									$pr4->bindParam(1,$slnew);
									$pr4->bindParam(2,array_keys($_REQUEST['quatity'])[$i]);
									$pr4->execute();
									}
									
								}
								
//								print_r(array_keys($_REQUEST['quatity']));
//								echo $row['id']." ";
//								echo $row['soluong']." ";
//								print_r(array_keys($_REQUEST['quatity']));
//								echo(" ");
//								echo $_REQUEST['quatity'][$row['id']];
//								echo $slnew;
							}
//							echo $slnew;
//							echo "<pre>";
//								print_r($_REQUEST);
//								echo "</pre>";
							$sql2 = "INSERT INTO giohang (name,sdt,diachi,total,thongtin,created_time,last_updated) VALUES (?,?,?,?,?,?,?)";
							$pr = $conn1->prepare($sql2);
							$pr->bindParam(1,$_REQUEST['name']);
							$pr->bindParam(2,$_REQUEST['phone']);
							$pr->bindParam(3,$_REQUEST['dc']);
							$pr->bindParam(4,$total1);
							$pr->bindParam(5,$_REQUEST['note']);
							$pr->bindParam(6,time());
							$pr->bindParam(7,time());
							$kq = $pr->execute();

							//Lay id cua thang vua insert
							$giohang_id = $conn1->lastInsertId();
//							var_dump($oder_id);
							$inset_string = "";
							foreach($list as $value)
							{
								$inset_string .= "('".$giohang_id."', '".$value['id']."', '".$_REQUEST['quatity'][$value['id']]."', '".$value['tien']."', '".time()."', '".time()."'), ";
								
							}
//							var_dump($inset_string);
							$sql3 = "INSERT INTO sp_giohang (giohang_id,sanpham_id,soluong,gia,created_time,last_updated) VALUES ".trim($inset_string,", ");
//							var_dump($sql3);
							$query3 = $conn1->query($sql3);
							if($query3 == true)
							{
								session_unset();
								$succrent = "Đặt hàng thành công <br> Nhân viên chúng tôi sẽ liên hệ cho bạn trong ít phút nữa.";
							}
							
							//cập nhật số lượng trong cửa hàng
								$sql4 = "UPDATE sanpham SET soluong = ? WHERE id = ?";
//										UPDATE $table SET name=?, video=?, ma_nhom=? WHERE ma_bt=?
									$pr4 = $conn1->prepare($sql4);

									$pr4->bindParam(1,$slnew);
									$pr4->bindParam(2,array_keys($_REQUEST['quatity']));
									$pr4->execute();
//								
							
							
							
						}
						break;
				}
			}
			
		}
	
	
	
		if(!empty($_SESSION['gio_hang']))
			{
				$dl = new database1();
				$conn = $dl->connect("localhost","phonggym","root","");
				$sql = "SELECT * FROM sanpham WHERE id IN(".implode(",",array_keys($_SESSION['gio_hang'])).")";
				$query = $conn->query($sql);
			}
		if(!empty($succrent))
		{
			echo $succrent."<a href='sanpham.php'><br>Tiếp tục mua hàng</a>";
			die();
		}
	?>
	<div id="themmenu"></div>
	<br>
	<br>
	<div class="container">
		
		<h1 align="center">Giỏ hàng</h1>
		<br>
		
<!--		form-->
		<form action="giohang.php?action=submit" method="post">
		<table align="center" id="tb" class="table-hover">
			<thead style="border-bottom: 1px solid rgba(179,179,179,1.00)">
				<tr align="center">
					<th width="27">STT</th>
					<th width="106">Tên sản phẩm</th>
					<th width="109">Ảnh sản phẩm</th>
					<th width="67" style="color: red;">Đơn giá</th>
					<th width="71">Số lượng</th>
					<th width="71" style="color: red;">Thành tiền</th>
					<th width="77">Thao tác</th>
				</tr>
			</thead>
			<tbody >
				
					<?php
						if(!empty($query))
						{
						$stt = 0;
						$total = 0;
						while($row = $query->fetch())
						{
							$stt++;
							$total += ($row['tien'] * $_SESSION['gio_hang'][$row['id']]);
					?>
					<tr align="center" style="border-bottom: 1px solid rgba(179,179,179,1.00)">
					<td><?=$stt?></td>
					<td><?=$row['name']?></td>
					<td><img class="anh" src="<?=$row['Img']?>"></td>
					<td style="color: red; font-weight: 700;"><?=number_format($row['tien'],0,',','.')?></td>
					<td><input name="quatity[<?=$row['id']?>]" type="number" id="soluong" style="width: 50px; text-align: center" autocomplete="on" value="<?=$_SESSION['gio_hang'][$row['id']]?>"></td>
					<td style="color: red; font-weight: 700;"><?=number_format($row['tien'] * $_SESSION['gio_hang'][$row['id']],0,',','.')?></td>
					<td><button class="xoa"><a href="giohang.php?action=delete&id=<?=$row['id']?>">Xóa</a></button></td>
					</tr>
					<?php
						}
						}
			
					?>
					<tr style="border-bottom: 1px solid rgba(179,179,179,1.00)">
						<td>&emsp;</td>
						<td style="font-weight: 700;">Tổng tiền: </td>
						<td>&emsp;</td>
						<td>&emsp;</td>
						<td>&emsp;</td>
						<td style="color: red; font-weight: 700;" align="center">
							<?php
								if(!empty($query))
								{echo number_format($total,0,',','.');}
								else{echo 0;}
							?>
							</td>
						<td></td>
						
					</tr>
					<tr>
				
				</tr>
			</tbody>	
			
		</table>
			<?php
				if(empty($query))
				{
			?>
<!--			<div class="nut2">-->
				<div class="ttmh"><a style="text-decoration: none; color: #FFF" href="sanpham.php">Tiếp tục mua hàng</a></div>
<!--			<input type="submit" class="nut_cn" value="Cập nhật" name="cap_nhat">-->
<!--		</div>-->
			<?php
				}
				if(!empty($query))
				{
			?>
			<br>
			<div class="nut2">
				
<!--				tiep tuc mua hang-->
				<div class="ttmh"><a style="text-decoration: none; color: #FFF" href="sanpham.php">Tiếp tục mua hàng</a></div>
				
<!--				cap nhat-->
			<input type="submit" class="nut_cn" value="Cập nhật" name="cap_nhat">
			</div>
			
			<div class="clear"></div>
			 <hr>
			<h1 align="center">Điền thông tin đặt hàng</h1>
			<br>
			<div class="dh">
                <div><label>Người nhận:</label>&ensp;<input type="text" value="" id="name" name="name" /></div>
                <div><label> Điện thoại :  </label>&emsp;<input type="text" value="" id="phone" name="phone" /></div>
                <div><label>Địa chỉ : </label>&emsp;&emsp;&ensp;<input type="text" value="" id="dc" name="dc" /></div>
                <div><label>Ghi chú : </label>&emsp;&emsp;<textarea name="note" cols="50" rows="7" ></textarea></div>
			<input type="submit" class="nut_dh" value="Đặt hàng" id="dat_hang" name="dat_hang">
			</div>
			<br>
			<?php
				}
			?>
		</form>
		
	</div>
<div id="themfooter"></div>

</body>
</html>