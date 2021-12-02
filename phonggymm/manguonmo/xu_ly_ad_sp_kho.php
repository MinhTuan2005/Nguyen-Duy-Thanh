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
	$dl->addSPK("sp_kho","phonggym",$_REQUEST['name'],$_REQUEST['num'],$_REQUEST['gm'],$_REQUEST['gb'],$hinhanh,$_REQUEST['nhom'],$_REQUEST['ncc'],$_REQUEST['tt']);
?>
<!--$table,$dtb,$name,$sl,$gm,$gb,$img,$id_nhom,$id_ncc,$tt-->
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