<?php
	if ($_POST["hoten"] == "" || $_POST["masv"] == "" || $_POST["sdt"] == "" || $_POST["email"] == "" || $_POST["HouseList"] == "" || $_POST["roomName"] == "" || $_POST["khoa"] == "0" || $_POST["lop"] == "" || $_POST["sex"] == "" || $_POST["cmt"] == "" || $_POST["roomName"] == "" || $_POST["address"] == "") {
		echo '<p style="color:red;">Bạn không được để trống trường thông tin nào!</p>';
	}else {
		$ht = $_POST["hoten"];
		$masv = $_POST["masv"];
		$khoa = $_POST["Khoa"];
		$lop = $_POST["lop"];
		$ngaysinh = $_POST["ngaysinh"];
		$sex = $_POST["sex"];
		$cmt = $_POST["cmt"];
		$address = $_POST["address"];
		$sdt = $_POST["sdt"];
		$email = $_POST["email"];
		$HouseList = $_POST["HouseList"];
		$roomName = $_POST["roomName"];
		$MonthNum = $_POST["monthNum"];
		$query = "INSERT INTO Regis VALUES ('', '$masv', '$ht', '$ngaysinh','$address','$cmt','$lop','$khoa','$sex','$sdt','$email','$roomName','','$HouseList','$MonthNum')";
		$check = "SELECT * FROM Regis WHERE Identifier = '$masv'";
		$result = mysql_query($check);
		$num = mysql_num_rows($result);
		if ($num > 0) {
			echo "Sai thông tin mã sinh viên hoặc mã này đã tồn tại!";
		}else {
			mysql_query($query);
			$qr = "INSERT INTO User VALUES ('','$masv','$email','$masv','5')";
			mysql_query($qr);
			echo '<p style="color:green;">Đăng ký thành công!<a href="http://localhost/ktx.cdhd.edu.vn/personal.php">Chuyển tới trang đăng nhập!</a></p>';
		}
	}
?>
