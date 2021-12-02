	$(document).ready(function(){
		 $("#tk").blur(function(){
			var taikhoan = $("#tk").val();
			$.post("kiemtradk.php", {tkp:taikhoan}, function(data){
				if(data == 1)
					{
						alert("Tài khoản đã có người sử dụng");
						$("#dk").prop("disabled",true);
						$("#dk").css("background",'rgba(159,156,157,1.00)');
					}
				else{
					$("#dk").prop("disabled",false);
					$("#dk").css("background",'red');
				}
			});
			
		});
		
		
		 $("#sdt").blur(function(){
			var sodienthoai = $("#sdt").val();
		 $.post("kiemtradk2.php", {sdt:sodienthoai}, function(data){
				if(data == 1)
					{
						alert("số điện thoại đã có người sử dụng");
						$("#dk").prop("disabled",true);
						$("#dk").css("background",'rgba(159,156,157,1.00)');
					}
				else{
					$("#dk").prop("disabled",false);
					$("#dk").css("background",'red');
				}
			});
			
		});
	});// JavaScript Document