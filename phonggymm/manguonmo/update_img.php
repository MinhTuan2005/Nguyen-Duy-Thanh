<?php
	function upload_img($file1)
	{
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			
//			echo "<pre>";
//				print_r($_FILES[$file1]);
//				
//			echo "</pre>";
				
				
			//tạo folder update file
			$target_dir = "uploads/";
			$target_file = $target_dir.basename($_FILES[$file1]['name']);
			$erro = array();
//			echo $target_file;
			//Kiểm tra kích thước của file
			if($_FILES[$file1]['size'] >= 10485760)
			{
				$erro[$file1] = "Lỗi không được uploads img quá 10MB";
				
			}
			//kiểm tra định dạng
			$file_type = pathinfo($_FILES[$file1]['name'], PATHINFO_EXTENSION);
			$file_type_arr = ["jpg","png","gif","jpeg","mp3","mp4"];
			if(!in_array(strtolower($file_type),$file_type_arr))
			{
				$erro[$file1] = "Lỗi định dạng";
			}
			//kiểm tra file đã tồn tại trên hệ thống chưa
//			if(file_exists($target_file))
//			{
//				$erro[$file1] = "file đã tồn tại trên hệ thống";
//				return $target_file;
//			}
			//kiểm tra $erro
			if(empty($erro))
			{
				if(move_uploaded_file($_FILES[$file1]["tmp_name"],$target_file))
				{
//					echo "Thành công";
					return $target_file;
				}
				else{
					echo "Không thành công";
				}
			}
//			else if()
		}
	}

	
?>