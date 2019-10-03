<?php
	require '../dbconn.php';
	$Id = $_GET["id"];
	$MonthNum = $_GET["m"];
	$data = "SELECT * FROM Regis WHERE Identifier = '$Id'";
	$query = mysql_query($data);
	$num = mysql_num_rows($query);
	if ($num = 1) {
		while ($row = mysql_fetch_array($query)) {
			$msv = $row["Identifier"];
			$ten = $row["StudentName"];
			$ngaysinh = $row["Birthday"];
			$diachi = $row["Address"];
			$soCmt = $row["Cmt"];
			$maLop = $row["ClassC"];
			$Khoa = $row["KhoaC"];
			$hlc = $row["HLC"];
			$phong = $row["RoomC"];
			$gioitinh = $row["Sex"];
			$sdt = $row["PhoneNumber"];
			$mail = $row["Mail"];
			$add = "INSERT INTO Student VALUES ('','$msv','$ten','$ngaysinh','$diachi','$soCmt','$maLop','$Khoa','$phong','$gioitinh','$hlc','$sdt','$mail','100')";
			mysql_query($add);

			$update = "UPDATE Regis SET Result = 1 WHERE Identifier = '$msv'";
			mysql_query($update);

			$checkLop = "SELECT * FROM Class WHERE ClassC = '$maLop'";
			$querry = mysql_query($checkLop);
			$num = mysql_num_rows($querry);
			if ($num > 0) {
				# code...
			}else{
				$add2 = "INSERT INTO Class VALUES ('','$maLop','$maLop')";
				mysql_query($add2);
			}
			
			$checkPhong = "SELECT * FROM RoomList WHERE RoomC = '$phong'";
			$querryy = mysql_query($checkPhong);
			$num = mysql_num_rows($querryy);
			if ($num = 1) {
				while ($row = mysql_fetch_array($querryy)) {
					if($row["Amount"] < 8 && $row["TypeRoom"] == 0){
						$up = $row["Amount"] + 1;
						$upAmount = "UPDATE RoomList SET Amount = '$up' WHERE RoomC = '$phong'";
						mysql_query($upAmount);

						$today = date('Y-m-d');
						if ($MonthNum == 6) {
							$dateEnd = strtotime(date("Y-m-d", strtotime($today)) . " +6 month");
							$money = $MonthNum*80000;
						}else {
							$dateEnd = strtotime(date("Y-m-d", strtotime($today)) . " +12 month");
							$money = $MonthNum*80000;
						}
						
    					$dateEnd = strftime("%Y-%m-%d",$dateEnd);
						$insertBill = "INSERT INTO Bill VALUES ('','$msv','$ten','$ngaysinh','$diachi','$soCmt','$maLop','$Khoa','$hlc','$phong','$phong','$MonthNum',now(),'$dateEnd','1','80000','$money')";
						mysql_query($insertBill);
					}
				}
			}

			
			header("location:../managerPage/dangkyNew.php");

		}
	}
?>