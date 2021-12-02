<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" href="icon/fontawesome-free-5.13.1-web/fontawesome-free-5.13.1-web/css/all.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
	<?php
		if(!empty($_REQUEST['name1']))
		{
//			echo $_REQUEST['name1'];
			echo "name";
		}
	?>
	<form method="get">
		<select name="name1">
			<option value=""></option>
			<option value="1">1</option>
			<input type="submit" name="sb" value="Gui">
		</select>
	</form>
</body>
</html>