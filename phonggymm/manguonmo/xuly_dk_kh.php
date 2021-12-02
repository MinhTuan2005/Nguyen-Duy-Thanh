<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>

<body>
<?php
if(isset($_REQUEST['dk']))
{
	require("database.php");
	require("update_img.php");
	$hinhanh = upload_img("img");
	if($hinhanh == null)
	{
		$hinhanh = "uploads/anh_null.jpeg";
	}
//	echo $hinhanh;
	$dl = new database1();
	$dl->addKH("user","phonggym",$_REQUEST['ht'],$_REQUEST['tk'],$_REQUEST['pass'],$_REQUEST['sdt'],$_REQUEST['ns'],$_REQUEST["dc"],$hinhanh,$_REQUEST['gt'],$_REQUEST['tt'],strtotime($_REQUEST['start1']),$_REQUEST['term1'],strtotime($_REQUEST['end1']));
	
?>

<script language="javascript">
	alert("Bạn đã đăng ký thành công");
</script>
	<p>Mời bạn <a href="dangnhap.php">Đăng nhập</a></p>
<?php
}
	else{
		header("location: dangky_kh.php");
	}
?>
</body>
</html>