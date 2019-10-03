<?php
	$id = $_SESSION["Identifier"];

	if ( !isset($_SESSION["Username"]) ) {
		echo "Có thể tài khoản của bạn chưa được cấp quyền truy cập thông tin cá nhân hoặc lỗi hệ thống, vui lòng liên hệ ban quản lý để được hỗ trợ !";
	}
	elseif ( $_SESSION["UserGr"] == 1 ) {
		echo '<h3 class="w3-center">Truy cập thành công quyền giám đốc !</h3>';
		
?>
		<div class="w3-container w3-panel">
		<form action="" method="POST">
<?php
		echo '<h4>Cập nhật thông tin cá nhân !</h4>';
		$st = "SELECT * FROM Employees WHERE Identifier = '$id'";
		$content = mysql_query($st);
		if (mysql_num_rows($content) == 1 ) {
			while ($row = mysql_fetch_assoc($content)) {
?>
			<div><p>Số điện thoại: <?php echo $row["PhoneNumber"] ?></p><input type="text" name="sdtfix" placeholder="SĐT mới"></div>
			<div><p>Ảnh: <?php echo '<img style="width:30px; height:30px;" src="'.$row["LinkAv"].'">'; ?></p><input type="text" name="linkfix" placeholder="Link ảnh FB"></div>
			<input type="submit" name="btnFix" value="Cập nhật"></div>
<?php
				if (isset($_POST["btnFix"])) {
					if ($_POST["sdtfix"] == '') {
						$sdtfix = $row["PhoneNumber"];
					}else{
						$sdtfix = $_POST["namefix"];
					}

					if ($_POST["linkfix"] == '') {
						$linkfix = $row["LinkAv"];
					}else{
						$linkfix = $_POST["linkfix"];
					}
					$upQr = "UPDATE Employees SET PhoneNumber = '$sdtfix', LinkAv = '$linkfix' WHERE Identifier = '$id'";
					mysql_query($upQr);
					echo '<p>Cập nhật thông tin thành công!</p>';
					sleep(5);
					header('Location:http://ktx.edu.vn/personal.php');
				}
			}
		}
?>
		</form>
			<h4>(1)Thực hiện: <a href="managerPage/account.php">Phân quyền nhân viên</a></h4>
			<h4>(2)Phản hồi từ sinh viên: <a href="">Chọn</a></h4>
		</div>


<?php
		
	}


	// Phòng thủ quỹ ----------------------------------------------------------------------------
	elseif ( $_SESSION["UserGr"] == 2 ) {
		echo "Thông tin quản lý phòng thủ quỹ !";
?>
		<div class="w3-container w3-panel">
		<form action="" method="POST">
<?php
		echo '<h4>Cập nhật thông tin cá nhân !</h4>';
		$st = "SELECT * FROM Employees WHERE Identifier = '$id'";
		$content = mysql_query($st);
		if (mysql_num_rows($content) == 1 ) {
			while ($row = mysql_fetch_assoc($content)) {
?>
			<div><p>Số điện thoại: <?php echo $row["PhoneNumber"] ?></p><input type="text" name="sdtfix" placeholder="SĐT mới"></div>
			<div><p>Ảnh: <?php echo '<img style="width:30px; height:30px;" src="'.$row["LinkAv"].'">'; ?></p><input type="text" name="linkfix" placeholder="Link ảnh FB"></div>
			<input type="submit" name="btnFix" value="Cập nhật"></div>
<?php
				if (isset($_POST["btnFix"])) {
					if ($_POST["sdtfix"] == '') {
						$sdtfix = $row["PhoneNumber"];
					}else{
						$sdtfix = $_POST["namefix"];
					}

					if ($_POST["linkfix"] == '') {
						$linkfix = $row["LinkAv"];
					}else{
						$linkfix = $_POST["linkfix"];
					}
					$upQr = "UPDATE Employees SET PhoneNumber = '$sdtfix', LinkAv = '$linkfix' WHERE Identifier = '$id'";
					mysql_query($upQr);
					echo '<p>Cập nhật thông tin thành công!</p>';
					sleep(5);
					header('Location:http://ktx.edu.vn/personal.php');
				}
			}
		}
?>
		</form>
		</div>


<?php
	}

	// Thiết bị hỗ trợ ----------------------------------------------------------------------------
	elseif ( $_SESSION["UserGr"] == 3 || $_SESSION["UserGr"] == 4) {
		echo '<h4 class="w3-center">Thông tin quản lý, hỗ trợ sinh viên !</h4>';
?>
		<div class="w3-container w3-panel">
			<form action="" method="POST">
	<?php
			echo '<h4>Cập nhật thông tin cá nhân !</h4>';
			$st = "SELECT * FROM Employees WHERE Identifier = '$id'";
			$content = mysql_query($st);
			if (mysql_num_rows($content) == 1 ) {
				while ($row = mysql_fetch_assoc($content)) {
	?>
				<div><p>Số điện thoại: <?php echo $row["PhoneNumber"] ?></p><input type="text" name="sdtfix" placeholder="Tên chỉnh sửa"></div>
				<div><p>Ảnh: <?php echo '<img style="width:30px; height:30px;" src="'.$row["LinkAv"].'">'; ?></p><input type="text" name="linkfix" placeholder="Link ảnh FB"></div>
				<input type="submit" name="btnFix" value="Cập nhật">
		</div>
<?php
					if (isset($_POST["btnFix"])) {
						if ($_POST["sdtfix"] == '') {
							$sdtfix = $row["PhoneNumber"];
						}else{
							$sdtfix = $_POST["namefix"];
						}

						if ($_POST["linkfix"] == '') {
							$linkfix = $row["LinkAv"];
						}else{
							$linkfix = $_POST["linkfix"];
						}
						$upQr = "UPDATE Employees SET PhoneNumber = '$sdtfix', LinkAv = '$linkfix' WHERE Identifier = '$id'";
						mysql_query($upQr);
						echo '<p>Cập nhật thông tin thành công!</p>';
						sleep(5);
						header('Location:http://ktx.edu.vn/personal.php');
					}
				}
			}
?>
			</form>

<?php
			$checkRP = "SELECT * FROM Support WHERE Status = 0";
			$content2 = mysql_query($checkRP);
			$dem = 0;
			if (mysql_num_rows($content2) >= 0 ) {
				while ($row = mysql_fetch_assoc($content2)) {
					$dem = $dem + 1;
				}

?>
		<div class="w3-container w3-panel">
			<h4>Yêu cầu hỗ trợ chưa duyệt: <a href="../tbht/support.php"><?php echo $dem; ?></a></h4>
			<h4>Danh sách yêu cầu hỗ trợ: <a href="">Xem</a></h4>
		</div>
		</div>
		
<?php
			}
	}

	//Sinh viên ----------------------------------------------------------------------------

	elseif ( $_SESSION["UserGr"] == 5 ) {
?>
		<div class="w3-container w3-panel">
		<form action="" method="POST">
<?php
		echo '<h4>Cập nhật thông tin cá nhân sinh viên !</h4>';
		$st = "SELECT * FROM Student WHERE Identifier = '$id'";
		$content = mysql_query($st);
		if (mysql_num_rows($content) == 1 ) {
			while ($row = mysql_fetch_assoc($content)) {
?>
			<div class="w3-half"><p>Họ tên: <?php echo $row["StudentName"] ?></p><input type="text" name="namefix" placeholder="Tên chỉnh sửa"></div>
			<div class="w3-half"><p>Ngày sinh: <?php echo $row["Birthday"] ?></p><input type="date" name="datefix"></div>
			<div class="w3-half"><p>Địa chỉ: <?php echo $row["Address"] ?></p><input type="text" name="adfix" placeholder="Địa chỉ"></div>
			<div class="w3-half"><p>Số điện thoại: <?php echo $row["PhoneNumber"] ?></p><input type="text" name="sdtfix" placeholder="Số ĐT khác"></div>
			<div class="w3-half"><p>Email: <?php echo $row["Mail"] ?></p><input type="text" name="mailfix" placeholder="Email mới">
			<input type="submit" name="btnFix" value="Cập nhật"></div>
<?php
				if (isset($_POST["btnFix"])) {
					if ($_POST["namefix"] == '') {
						$namefix = $row["StudentName"];
					}else{
						$namefix = $_POST["namefix"];
					}

					if ($_POST["datefix"] == '') {
						$datefix = $row["Birthday"];
					}else{
						$datefix = $_POST["datefix"];
					}

					if ($_POST["adfix"] == '') {
						$adfix = $row["Address"];
					}else{
						$adfix = $_POST["adfix"];
					}
					if ($_POST["sdtfix"] == '') {
						$sdtfix = $row["PhoneNumber"];
					}else{
						$sdtfix = $_POST["sdtfix"];
					}

					if ($_POST["mailfix"] == '') {
						$mailfix = $row["Mail"];
					}else{
						$mailfix = $_POST["mailfix"];
					}
					$upQr = "UPDATE Student SET StudentName = '$namefix', Birthday = '$datefix', Address = '$adfix', PhoneNumber = '$sdtfix', Mail = '$mailfix' WHERE Identifier = '$id'";
					mysql_query($upQr);
					echo '<p>Cập nhật thông tin thành công!</p>';
					sleep(5);
					header('Location:http://ktx.edu.vn/personal.php');
				}
			}
		}
?>
		</form>
		</div>
		<div class="w3-container w3-panel">
		<h4>Thông báo sửa - đổi thiết bị phòng</h4>
		<form action="" method="POST">
			Thiết bị hỏng: 	<select name="tbSL" id="tbSL">
								<option value="">--chọn--</option>
								<option value="Bóng đèn">Bóng đèn</option>
								<option value="Quạt trần">Quạt trần</option>
								<option value="Cửa sổ">Cửa sổ</option>
								<option value="Cửa ra vào">Cửa ra vào</option>
								<option value="Hệ thống điện">Hệ thống điện</option>
								<option value="Vấn đề khác">Vấn đề khác</option>
							</select><br>
			Yêu cầu hỗ trợ:<br>
			<textarea rows="3" cols="100" name="txtRP" required="required" placeholder="Nhập thông tin cần hỗ trợ!"></textarea>
			<input type="submit" name="btnRP" value="Gửi yêu cầu hỗ trợ">
		</form>
		</div>
<?php
		$slST = "SELECT * FROM Student WHERE Identifier = '$id'";
		$content = mysql_query($slST);
		if (mysql_num_rows($content) == 1 ) {
			while ($row = mysql_fetch_assoc($content)) {
				$phone = $row["PhoneNumber"];
				$name = $row["StudentName"];
				$room = $row["RoomC"];
				$hlc = $row["HLC"];
				if (isset($_POST["btnRP"])) {
					if ($_POST["tbSL"] == '') {
						echo 'Chọn mục thiết bị cần hỗ trợ trước!';
					}else {
						$problem = $_POST["tbSL"];
						$contentRP = $_POST["txtRP"];
						$addRP = "INSERT INTO Support VALUES ('','$id','$name','$phone','$room','$hlc',now(),'$problem','$contentRP','','','')";
						mysql_query($addRP);
						header('Location:http://ktx.edu.vn/personal.php');
					}
				}
			}
		}
?>
		<!-- Xem thong tin dien nuoc theo thang -->
		<div class="w3-container w3-panel w3-third">
			<h4 class="">Tra thông tin điện nước: </h4>
			<form action="" method="POST">
			Tháng : <select class="slcR">
									<option value="">--chọn--</option>
<?php
	$room = $_SESSION["roomC"];
	echo $room;
	$qr = "SELECT * FROM BillEW WHERE RoomC = '$room'";
	$content = mysql_query($qr);
	if (mysql_num_rows($content) > 0 ) {
		while ($row = mysql_fetch_assoc($content)) {
?>
	<option value="<?php echo $row["Month"]; ?>">Tháng <?php echo $row["Month"]; ?></option>
<?php
		}
	}
?>
	</select>
	</form>
	</div>
	<div class="w3-container w3-panel w3-twothird">
		<div class="contentEW">
			
		</div>
	</div>
<?php
	}
?>
