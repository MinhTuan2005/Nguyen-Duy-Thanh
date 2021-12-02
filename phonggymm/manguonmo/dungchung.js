//$(document).ready(function(){
//			$("#themmenu").load("menu.php");
//			$("#themfooter").load("footer.php");
//});
$.get("menu.php",function(data){
	$("#themmenu").html(data);
});
$.get("footer.php",function(data){
	$("#themfooter").html(data);
});
$.get("icon_cart.php",function(data){
	$("#icon_cart").html(data);
});