<?php
	function kiemtradb($u, $p)
	{
		require_once("database.php");
		$db = new database1();
		$db->connect("localhost","phonggym","root","");
		$query = $db->truyvan("user_noibo","phonggym");
		

		
		while($qr_stm = $query->fetch())
		{
			if( $qr_stm['taikhoan'] == $u && $qr_stm['password'] == md5($p))
			{
				session_start();
				$_SESSION['taikhoan'] = $u;
				$_SESSION['name'] = $qr_stm['name'];
				$_SESSION['id'] = $qr_stm['id'];
				$_SESSION['time'] = time();
				$_SESSION['table'] = "user_noibo";
				if($qr_stm['ma_nhom'] == "nb_ad")
				{
					$_SESSION['admin'] = $qr_stm['ma_nhom'];
				}
				else{
					$_SESSION['cv'] = $qr_stm['ma_nhom'];
				}
				
				return true;
			}
		}
		
	}
	function kiemtradb1($u, $p)
	{
		
		$db1 = new database1();
		$query1 = $db1->truyvan("user","phonggym");
		while($qr_stm1 = $query1->fetch())
		{
			if( $qr_stm1['taikhoan'] == $u && $qr_stm1['password'] == md5($p))
			{
				if($qr_stm1['date_end'] > time())
				{
					session_start();
					$_SESSION['taikhoan'] = $u;
					$_SESSION['time'] = time();
					$_SESSION['name'] = $qr_stm1["name"];
					$_SESSION['id'] = $qr_stm1['id'];
					$_SESSION['table'] = "user";
					$_SESSION['date_end'] = $qr_stm1['date_end'];
					$_SESSION['kh'] = "khachhang";
					if((($qr_stm1['date_end']-(4*24*60*60)) <= time()))
					{
						date_default_timezone_set('Asia/Ho_Chi_Minh');
						$_SESSION['hethan'] = $qr_stm1['date_end'] - time();
					}
					return true;	
				}
				
				else{
				$_SESSION['erro'] = true;
				}	
			}
			
		}
		
	}

?>