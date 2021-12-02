<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>

<body>
<?php
	
	require("update_img.php");
	$hinhanh = upload_img("img");
	if($hinhanh == null)
	{
		$hinhanh = "uploads/anh_null.jpeg";
	}
//	echo $hinhanh;
if(isset($_REQUEST['dk']))
{
	require("database.php");
	$dl = new database1();
	$dl->connect("localhost","phonggym","root","");
	$dl->addNV("user_noibo","phonggym",$_REQUEST['ht'],$_REQUEST['tk'],$_REQUEST['pass'],$_REQUEST['sdt'],$_REQUEST['ns'],$_REQUEST["dc"],$hinhanh,$_REQUEST['gt'],$_REQUEST['cv'],$_REQUEST['email'],$_REQUEST['gc']);
?>
<!--	($table,$dtb,$hoten,$taikhoan,$password,$sdt,$ns,$dc,$img,$gioitinh,$cv,$email)-->
<script language="javascript">
	alert("Bạn đã đăng ký thành công");
</script>
	<p>Mời bạn <a href="dangnhap.php">Đăng nhập</a></p>
<?php
}
	else{
		header("location: dangky.php");
	}
?>
</body>
</html>