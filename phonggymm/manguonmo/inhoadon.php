<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="inhoadon.css">
</head>

<body>
	 <body>
        <?php
        session_start();
        if (isset($_REQUEST['id'])) {
			require("database.php");
			$dl = new database1();
           $conn = $dl->connect("localhost","phonggym","root","");
			$sql = "SELECT giohang.name,giohang.sdt,giohang.diachi,giohang.thongtin, sanpham.name as sanpham_name,sp_giohang.soluong,sp_giohang.gia 
FROM giohang 
INNER JOIN sp_giohang ON sp_giohang.giohang_id = giohang.id 
INNER JOIN sanpham ON sanpham.id = sp_giohang.sanpham_id 
WHERE giohang.id = ".$_REQUEST['id'];
			

			$query = $conn->query($sql);
			$row = $query->fetchAll();
//			echo "<pre>";
//			print_r($row);
//			echo "</pre>";
        }
//		 foreach($row as $row1)
//		 {
//			echo "<pre>";
//			print_r($row1);
//			echo "</pre>";
//		 }
        ?>
		
        <div id="order-detail-wrapper">
            <div id="order-detail">
				
				 <h1>Chi tiết đơn hàng</h1>
                <label>Người nhận:  </label><span><?=$row[0]['name']?></span><br/>
                <label>Điện thoại: </label><span><?=$row[0]['sdt']?></span><br/>
                <label>Địa chỉ: </label><span><?=$row[0]['diachi']?></span><br/>
                <hr/>
                <h3>Danh sách sản phẩm</h3>
                <ul>
                    <?php
                    $totalQuantity = 0;
                    $totalMoney = 0;
					foreach($row as $row1)
					 {
//						echo "<pre>";
//						print_r($row1);
//						echo "</pre>";
					 
                        ?>
                        <li>
                            <span class="item-name"><strong>__Tên sản phẩm:</strong> <?=$row1['sanpham_name']?></span>
							<br>
                            <span class="item-quantity"> <strong> SL:</strong> <?= $row1['soluong'] ?> sản phẩm</span>
                        </li>
                        <?php
                        $totalMoney += ($row1['gia'] * $row1['soluong']);
                        $totalQuantity += $row1['soluong'];
					}
                    ?>
                </ul>
                <hr/>
                <label>Tổng SL: <?=$totalQuantity?></label> - <label>Tổng tiền:<?=number_format($totalMoney,0,',','.') ?> VNĐ</label> 
                <p><label>Ghi chú: <?=$row[0]['thongtin']?></label></p>
				
            </div>
			
        </div>
		 
    </body>
</body>
</html>