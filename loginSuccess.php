<?php
	$gr = $_SESSION["UserGr"];
	$id = $_SESSION["Identifier"];
	if ( !isset($_SESSION["UserGr"]) ) {
		echo "Lỗi hệ thống! Không tìm ra thông tin của bạn!";
	}
	elseif ( $_SESSION["UserGr"] == 1 || $_SESSION["UserGr"] == 2 || $_SESSION["UserGr"] == 3 || $_SESSION["UserGr"] == 4) {
		
		$query = "SELECT Employees.PhoneNumber, Employees.LinkAv, Employees.Name, Employees.RoomName, Employees.Identifier FROM Employees,User WHERE Employees.Identifier = User.Identifier AND Employees.Identifier = '$id'";
		$content = mysql_query($query);
		if (mysql_num_rows($content) == 1 ) {
			while ($row = mysql_fetch_assoc($content)) {
				echo '<img src="'.$row["LinkAv"].'">';
				echo '<p>'.$row["Name"].'</p>';
				echo '<p>Phòng: '.$row["RoomName"].'</p>';
			}

		}
	}
	elseif ( $_SESSION["UserGr"] == 5 ) {
		$id = $_SESSION["Identifier"];
		$query = "SELECT * FROM Student,User WHERE Student.Identifier = User.Identifier AND Student.Identifier = '$id'";
		$content = mysql_query($query);
		if (mysql_num_rows($content) == 1 ) {
			while ($row = mysql_fetch_assoc($content)) {
				echo '<img src="'.$row["LinkAv"].'">';
				echo '<p>SV :'.$row["StudentName"].'</p>';
				echo '<p>Điểm RL :'.$row["Point"].'</p>';
				echo '<p>Phòng ở: '.$row["RoomC"].'</p>';
			}

		}
	}


?>
<button id="btn_change" onclick="change_func()">Tài khoản</button>
<form action="" method="POST" id="form_change" style="display: none;">
	
	<input type="password" size="14" name="passOLD" placeholder="Nhập mật khẩu cũ"><br>
	<input type="password" size="14" name="passNEW1" placeholder="Nhập mật khẩu mới"><br>
	<input type="password" size="14" name="passNEW2" placeholder="Xác nhận lại"><br>
	<input type="submit" name="upPASS" value="Đổi">
	<input class="txtinput" type="submit" id="btn_huy" value="Hủy">
	<input class="txtinput" type="submit" name="btnLogout" value="Đăng xuất">
</form>

<?php
	if (isset($_POST["upPASS"])) {
		if($_POST["passOLD"] != '' && $_POST["passNEW1"] != '' && $_POST["passNEW2"] != '' ){
			$pO = $_POST["passOLD"];
			if ($_POST["passNEW1"] === $_POST["passNEW2"]) {
				$p2 = $_POST["passNEW2"];
				$check = "SELECT * FROM User WHERE Identifier = '$id' AND Password = '$pO'";
				$content = mysql_query($check);
				if (mysql_num_rows($content) == 1 ){
					$upPASS = "UPDATE User SET Password = '$p2' WHERE Identifier = '$id'";
					mysql_query($upPASS);
					echo "Cập nhật mật khẩu thành công!";
				}else {
					echo "Mật khẩu bạn cung cấp không chính xác! Nếu đã quên, liên hệ BPHT lấy lại mật khẩu!";
				}
			}else{
				echo "Xác nhận không trùng khớp mật khẩu mới!";
			}
		}else {
			echo "Vui lòng nhập đầy đủ và chính xác!";
		}
	}
?>

<script type="text/javascript">
	function change_func(){
		document.getElementById('btn_change').style.display = 'none';
		document.getElementById('form_change').style.display = 'block';
	}
</script>