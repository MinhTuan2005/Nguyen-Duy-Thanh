<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Xử lý đăng ký</title>
</head>

<body>
	<?php
	
	require("update_img.php");
	$hinhanh = upload_img("img");
//	echo $hinhanh;
if(isset($_REQUEST['dk']))
{
	require("database.php");
	$dl = new database1();
	$dl->connect("localhost","phonggym","root","");
	$dl->addSP("sanpham","phonggym",$_REQUEST['name'],$_REQUEST['num'],$_REQUEST['dg'],$hinhanh,$_REQUEST['nhom'],$_REQUEST['tt']);
?>

<script language="javascript">
	alert("Bạn đã thêm thành công");
</script>
	<p>Mời bạn <a href="trangchuadmin.php">Quay về trang admin</a></p>
<?php
}
	else{
		header("location: dangky.php");
	}
?>
</body>
</html>