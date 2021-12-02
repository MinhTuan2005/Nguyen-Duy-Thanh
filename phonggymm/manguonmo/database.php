<?php
	class database1
	{
		private $conn;
		public function connect($host, $dbname, $username, $password)
		{
			try{
				$this->conn = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
				$this->conn->query("SET NAMES 'utf8'");
				return $this->conn;
			}catch(PDOException $pe)
			{
				die("kết nối thất bại ".$pe->getMessage());
			}
		}
		
		public function truyvan($table,$dtb)
		{
			$this->connect("localhost",$dtb,"root","");
			$sql = "SELECT * FROM $table";
			$query = $this->conn->query($sql);
			return $query;
			
		}
		
		public function truyvanTCN($table,$dtb,$id)
		{
			$this->connect("localhost",$dtb,"root","");
			$sql = "SELECT * FROM $table WHERE id = $id";
			$query = $this->conn->query($sql);
			return $query;
		}
		public function truyvanTCN1($table,$dtb,$id)
		{
			$this->connect("localhost",$dtb,"root","");
			$sql = "SELECT * FROM $table WHERE id_sp_kho = $id";
			$query = $this->conn->query($sql);
			return $query;
		}
		public function truyvan1($table1,$table2,$dtb)
		{
			$this->connect("localhost",$dtb,"root","");
			$sql = "SELECT * FROM $table1,$table2 WHERE $table1.ma_nhom = $table2.ma_nhom";
			$query = $this->conn->query($sql);
			return $query;
		}
		public function truyvan2($table1,$table2,$dtb,$id)
		{
			$this->connect("localhost",$dtb,"root","");
			$sql = "SELECT * FROM $table1,$table2 WHERE $table1.id = $id AND $table1.ma_nhom = $table2.ma_nhom";
			$query = $this->conn->query($sql);
			return $query;
		}
		public function addNV($table,$dtb,$hoten,$taikhoan,$password,$sdt,$ns,$dc,$img,$gioitinh,$cv,$email,$gc)
		{
			$this->connect("localhost",$dtb,"root","");
			$sql = "INSERT INTO $table (name,sdt,email,ngaysinh,gioitinh,img,diachi,taikhoan,password,ma_nhom,thongtin) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
			$pr = $this->conn->prepare($sql);
			$pr->bindParam(1,$hoten);
			$pr->bindParam(2,$sdt);
			$pr->bindParam(3,$email);
			$pr->bindParam(4,$ns);
			$pr->bindParam(5,$gioitinh);
			$pr->bindParam(6,$img);
			$pr->bindParam(7,$dc);
			$pr->bindParam(8,$taikhoan);
			$pr->bindParam(9,md5($password));
			$pr->bindParam(10,$cv);
			$pr->bindParam(11,$gc);
			$pr->execute();
		}
		public function addSP($table,$dtb,$name,$sl,$dg,$img,$id_sp_kho,$tt)
		{
			$this->connect("localhost",$dtb,"root","");
			$sql = "INSERT INTO $table (name,tien,thongtin,soluong,img,id_sp_kho) VALUES (?,?,?,?,?,?)";
			$pr = $this->conn->prepare($sql);
			$pr->bindParam(1,$name);
			$pr->bindParam(2,$dg);
			$pr->bindParam(3,$tt);
			$pr->bindParam(4,$sl);
			$pr->bindParam(5,$img);
			$pr->bindParam(6,$id_sp_kho);
			$pr->execute();
		}
		public function addSPK($table,$dtb,$name,$sl,$gm,$gb,$img,$id_nhom,$id_ncc,$tt)
		{
			$this->connect("localhost",$dtb,"root","");
			$sql = "INSERT INTO $table (ten_sp,id_ncc,gia_mua,gia_ban,soluong,img,id_msp,thongtin) VALUES (?,?,?,?,?,?,?,?)";
			$pr = $this->conn->prepare($sql);
			$pr->bindParam(1,$name);
			$pr->bindParam(2,$id_ncc);
			$pr->bindParam(3,$gm);
			$pr->bindParam(4,$gb);
			$pr->bindParam(5,$sl);
			$pr->bindParam(6,$img);
			$pr->bindParam(7,$id_nhom);
			$pr->bindParam(8,$tt);
			$ketqua = $pr->execute();
			
		}
		public function addKH($table,$dtb,$hoten,$taikhoan,$password,$sdt,$ns,$dc,$img,$gioitinh,$tt,$start,$term,$end)
		{
			$this->connect("localhost",$dtb,"root","");
			$sql = "INSERT INTO $table (name,sdt,ngaysinh,gioitinh,Img,diachi,taikhoan,password,trang_thai,date_start,term,date_end) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
			$pr = $this->conn->prepare($sql);
			$pr->bindParam(1,$hoten);
			$pr->bindParam(2,$sdt);
			$pr->bindParam(3,$ns);
			$pr->bindParam(4,$gioitinh);
			$pr->bindParam(5,$img);
			$pr->bindParam(6,$dc);
			$pr->bindParam(7,$taikhoan);
			$pr->bindParam(8,md5($password));
			$pr->bindParam(9,$tt);
			$pr->bindParam(10,$start);
			$pr->bindParam(11,$term);
			$pr->bindParam(12,$end);
			$pr->execute();
		}
		public function addBT($dtb,$table,$ma_bt,$name,$ma_nhom,$video)
		{
			$this->connect("localhost",$dtb,"root","");
			$sql = "INSERT INTO $table (ma_bt,name,ma_nhom,video) VALUES (?,?,?,?);";
			$pr = $this->conn->prepare($sql);
			$pr->bindParam(1,$ma_bt);
			$pr->bindParam(2,$name);
			$pr->bindParam(3,$ma_nhom);
			$pr->bindParam(4,$video);
			$pr->execute();
		}
		public function addNCC($table,$dtb,$name,$diachi,$sdt,$email)
		{
			$this->connect("localhost",$dtb,"root","");
			$sql = "INSERT INTO $table (name,diachi,sdt,email) VALUES (?,?,?,?)";
			$pr = $this->conn->prepare($sql);
			$pr->bindParam(1,$name);
			$pr->bindParam(2,$diachi);
			$pr->bindParam(3,$sdt);
			$pr->bindParam(4,$email);
			$pr->execute();
		}
		public function addPN($table,$dtb,$tt,$time,$id_ncc,$id_nb)
		{
			$this->connect("localhost",$dtb,"root","");
			$sql = "INSERT INTO $table (thanhtien,time,id_ncc,id_user_noibo) VALUES (?,?,?,?)";
			$pr = $this->conn->prepare($sql);
			$pr->bindParam(1,$tt);
			$pr->bindParam(2,$time);
			$pr->bindParam(3,$id_ncc);
			$pr->bindParam(4,$id_nb);
			$pr->execute();
			$id_pn = $this->conn->lastInsertId();
			return $id_pn;
		}
		public function addCTPN($table,$dtb,$id_pn,$name,$gn,$sl,$tt,$t_t)
		{
			$this->connect("localhost",$dtb,"root","");
			$sql = "INSERT INTO $table (id_phieunhap,tensp,gianhap,soluong,thanhtien,trangthai) VALUES (?,?,?,?,?,?)";
			$pr = $this->conn->prepare($sql);
			$pr->bindParam(1,$id_pn);
			$pr->bindParam(2,$name);
			$pr->bindParam(3,$gn);
			$pr->bindParam(4,$sl);
			$pr->bindParam(5,$tt);
			$pr->bindParam(6,$t_t);
			$pr->execute();
			
		}
		public function addPX($table,$dtb,$time,$id_nb)
		{
			$this->connect("localhost",$dtb,"root","");
			$sql = "INSERT INTO $table (time,id_user_noibo) VALUES (?,?)";
			$pr = $this->conn->prepare($sql);
			$pr->bindParam(1,$time);
			$pr->bindParam(2,$id_nb);
			$pr->execute();
			$id_pn = $this->conn->lastInsertId();
			return $id_pn;
		}
		public function addCTPX($table,$dtb,$id_px,$id_spk,$sl)
		{
			$this->connect("localhost",$dtb,"root","");
			$sql = "INSERT INTO $table (id_phieuxuat,id_sp_kho,soluong) VALUES (?,?,?)";
			$pr = $this->conn->prepare($sql);
			$pr->bindParam(1,$id_px);
			$pr->bindParam(2,$id_spk);
			$pr->bindParam(3,$sl);
			
			$pr->execute();
			
		}
		public function update($table,$password,$taikhoan)
		{
			$this->connect("localhost","phonggym","root","");
			$sql = "UPDATE $table SET password = ? WHERE taikhoan = ?";
			$pr = $this->conn->prepare($sql);
			$pr->bindParam(1,md5($password));
			$pr->bindParam(2,$taikhoan);
			
			$pr->execute();
		}
		public function updateNV($dtb,$table,$name,$sdt,$email,$ngaysinh,$gioitinh,$img,$diachi,$ma_nhom,$id)
		{
			$this->connect("localhost","phonggym","root","");
			$sql = "UPDATE $table SET name=?, sdt=?, email=?, ngaysinh=?, gioitinh=?, Img=?, diachi=?, ma_nhom=? WHERE id=?";
			$pr = $this->conn->prepare($sql);
			$pr->bindParam(1,$name);
			$pr->bindParam(2,$sdt);
			$pr->bindParam(3,$email);
			$pr->bindParam(4,$ngaysinh);
			$pr->bindParam(5,$gioitinh);
			$pr->bindParam(6,$img);
			$pr->bindParam(7,$diachi);
			$pr->bindParam(8,$ma_nhom);
			$pr->bindParam(9,$id);
			$ketqua = $pr->execute();
			if($ketqua==TRUE)
			echo "<p>Quay về trang <a href='trangchuadmin.php'>admin</a></p>";
		 else
			echo "<p>Lỗi</p>";
		}
		public function updateSP($dtb,$table,$name,$sl,$dg,$img,$ma_nhom,$tt,$id)
		{
			$this->connect("localhost","phonggym","root","");
			$sql = "UPDATE $table SET name=?, tien=?, thongtin=?, soluong=?, ma_nhomsp=?, Img=? WHERE id=?";
			$pr = $this->conn->prepare($sql);
			$pr->bindParam(1,$name);
			$pr->bindParam(2,$dg);
			$pr->bindParam(3,$tt);
			$pr->bindParam(4,$sl);
			$pr->bindParam(5,$ma_nhom);
			$pr->bindParam(6,$img);
			$pr->bindParam(7,$id);
			$ketqua = $pr->execute();
			if($ketqua==TRUE)
			echo "<p>Quay về trang <a href='trangchuadmin.php'>admin</a></p>";
		 else
			echo "<p>Lỗi</p>";
		}
		public function updateSPK($dtb,$table,$name,$sl,$gm,$gb,$img,$ma_nhom,$id_ncc,$tt,$id)
		{
			$this->connect("localhost",$dtb,"root","");
			$sql = "UPDATE $table SET ten_sp=?, id_ncc=?, gia_mua=?, gia_ban=?, soluong=?, img=?, id_msp=?, thongtin=? WHERE id=?";
			$pr = $this->conn->prepare($sql);
			$pr->bindParam(1,$name);
			$pr->bindParam(2,$id_ncc);
			$pr->bindParam(3,$gm);
			$pr->bindParam(4,$gb);
			$pr->bindParam(5,$sl);
			$pr->bindParam(6,$img);
			$pr->bindParam(7,$ma_nhom);
			$pr->bindParam(8,$tt);
			$pr->bindParam(9,$id);
			$ketqua = $pr->execute();
			if($ketqua==TRUE)
			echo "<p>Quay về trang <a href='trangchuadmin.php'>admin</a></p>";
		 else
			echo "<p>Lỗi</p>";
		}
		public function updateKH($dtb,$table,$name,$sdt,$ngaysinh,$gioitinh,$img,$diachi,$tt,$id)
		{
			$this->connect("localhost","phonggym","root","");
			$sql = "UPDATE $table SET name=?, sdt=?, ngaysinh=?, gioitinh=?, Img=?, diachi=?,trang_thai=? WHERE id=?";
			$pr = $this->conn->prepare($sql);
			$pr->bindParam(1,$name);
			$pr->bindParam(2,$sdt);
			$pr->bindParam(3,$ngaysinh);
			$pr->bindParam(4,$gioitinh);
			$pr->bindParam(5,$img);
			$pr->bindParam(6,$diachi);
			$pr->bindParam(7,$tt);
			$pr->bindParam(8,$id);
			$ketqua = $pr->execute();
			if($ketqua==TRUE)
			echo "<p>Quay về trang <a href='trangchuadmin.php'>admin</a></p>";
		 else
			echo "<p>Lỗi</p>";
		}
		
		public function updateBT($dtb,$table,$name,$video,$ma_nhom,$ma_bt)
		{
			$this->connect("localhost","phonggym","root","");
			$sql = "UPDATE $table SET name=?, video=?, ma_nhom=? WHERE ma_bt=?";
			$pr = $this->conn->prepare($sql);
			$pr->bindParam(1,$name);
			$pr->bindParam(2,$video);
			$pr->bindParam(3,$ma_nhom);
			$pr->bindParam(4,$ma_bt);
			$ketqua = $pr->execute();
			if($ketqua==TRUE)
			echo "<p>Quay về trang <a href='trangchuadmin.php'>admin</a></p>";
		 else
			echo "<p>Lỗi</p>";
		}
		public function updateNCC($dtb,$table,$name,$diachi,$sdt,$email,$id)
		{
			$this->connect("localhost",$dtb,"root","");
			$sql = "UPDATE $table SET name=?, diachi=?, sdt=?, email=? WHERE id=?";
			$pr = $this->conn->prepare($sql);
			$pr->bindParam(1,$name);
			$pr->bindParam(2,$diachi);
			$pr->bindParam(3,$sdt);
			$pr->bindParam(4,$email);
			$pr->bindParam(5,$id);
			$ketqua = $pr->execute();
			if($ketqua==TRUE)
			echo "<p>Quay về trang <a href='trangchuadmin.php'>admin</a></p>";
		 else
			echo "<p>Lỗi</p>";
		}
		public function delete($table, $id)
		{
			$this->connect("localhost","phonggym","root","");
			$sql = "DELETE FROM $table WHERE id = ?";
			$pr = $this->conn->prepare($sql);
			$pr->bindParam(1,$id);
			$pr->execute();
		}
	}
	
?>