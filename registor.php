<?php require 'top.php' ?>
	<div class="main">
		<h4 class="w3-center">Bạn là sinh viên trường Cao đẳng Hải Dương, có nhu cầu đăng ký vào ở tại ký túc xá!</h4>
		
		<div class="regiser-form" >
			<h4 class="w3-center">FORM THÔNG TIN</h4>
			<form action="" method="POST">
				Họ tên: <input type="text" name="hoten" placeholder="Có dấu">
				Mã sinh viên: <input type="text" name="masv"><br><br>
				Khoa: 	<select name="Khoa" id="Khoa">
							<option value="0">--Khoa--</option>
							<?php
								$k = "SELECT * FROM Khoa";
								$query = mysql_query($k);
								$num = mysql_num_rows($query);	
								if ($num > 0) {
									while ($row = mysql_fetch_array($query)) {
							?>
							<option value="<?php echo $row['Khoa']; ?>"><?php echo $row['Khoa']; ?></option>
							<?php
									}
								}
							?>
						</select>
				Lớp: <input type="text" name="lop" placeholder="VD: CNTTK13A"><br><br>
				Ngày sinh: <input type="date" name="ngaysinh">
				Giới tính: <select name="sex" id="sex">
								<option value="NULL">-chọn-</option>
								<option value="0">Nam</option>
								<option value="1">Nữ</option>
							</select>
				Số CMT: <input type="text" name="cmt"><br><br>
				Địa chỉ: <input type="text" name="address" style="width: 300px;"><br><br>
				Số điện thoại: <input type="text" name="sdt">
				Email: <input type="text" name="email"><br><br>
				Đăng ký phòng: 	<select name="HouseList" id="HouseList" class="selectHL">
									<option value="0">--Dãy--</option>
									<?php
										$k = "SELECT HLC FROM HouseList";
										$query = mysql_query($k);
										$num = mysql_num_rows($query);	
										if ($num > 0) {
											while ($row = mysql_fetch_array($query)) {
									?>
									<option value="<?php echo $row['HLC']; ?>"><?php echo $row['HLC']; ?></option>
									<?php
											}
										}
									?>
								</select>
								<select name="" id="" class="selectRoom">
									<option>-chọn-</option>
								</select>
								<input type="text" name="roomName" placeholder="Xác nhận lại phòng"><br><br>
								Đăng ký ở:	<select name="monthNum" id="monthNum">
												<option value="6">6 tháng x80.000 VNĐ</option>
												<option value="11">12 tháng x80.000 VNĐ</option>
											</select>
								<input type="submit" name="reg-btn" value="Đăng ký">		
			</form>
			<?php require 'registor/reProcess.php' ?>
		</div>
		<p class="w3-center">Chú ý: Khi đăng ký thành công, tài khoản của bạn sẽ được tạo với Username là Mã sinh viên, Password là email.</p>
	</div>
<?php require 'bottom.php' ?>