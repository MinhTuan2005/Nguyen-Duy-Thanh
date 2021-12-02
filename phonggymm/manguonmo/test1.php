<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
		session_start();
		echo "<pre>";
		print_r($_SESSION);
		echo "</pre>";
	
		echo $a = ceil($_SESSION['hethan'] / 86400);
	?>
</body>
</html>