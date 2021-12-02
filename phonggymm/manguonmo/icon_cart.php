<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" href="icon/fontawesome-free-5.13.1-web/fontawesome-free-5.13.1-web/css/all.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="icon_cart.css">
<style>

</style>
</head>

<body>
	<a style="text-decoration: none; color: #FFF" href="giohang.php">
	<div class="icon1 position-fixed">
		<i class="fas fa-shopping-cart">
			<p class="number"><?php
					session_start();
				$count_number = 0;
					if(!isset($_SESSION['gio_hang']))
					{
						echo 0;
					}
					else
					{
//						print_r($_SESSION['gio_hang']);
						foreach($_SESSION['gio_hang'] as $value)
						{
							$count_number += $value;
						}
						echo $count_number;
					}
				?></p>
		</i>
		
	</div>
</a>
</body>
</html>