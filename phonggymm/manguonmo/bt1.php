<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" href="icon/fontawesome-free-5.13.1-web/fontawesome-free-5.13.1-web/css/all.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script>
	function ajShow_bt1(p)
	{
//		$("#right").html("đang tải...");
		page=p;
		$.get("bt_nguc.php",{page:page},
				//responseData: là nôi dung echo về từ PHP
				function (responseData, status){
					if(status=="success")
						$("#b").html(responseData);
					}
			);
	}
</script>
</head>

<body>
	<p id="aaa"  onClick="ajShow_bt1(1)">
		Ngực
	</p>
	<p id="ccc">aaaa</p>
	<p id="b"></p>
</body>
</html>