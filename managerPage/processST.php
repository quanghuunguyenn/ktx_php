<table class="w3-table w3-bordered w3-panel">
	<?php echo '<h3>Danh sách sinh viên lớp: '.$_POST["ClassList"].' </h3>'; ?>
	<tr>
		<th style="width: 2%;">STT</th>
		<th style="width: 10%;">Họ tên</th>
		<th style="width: 10%;">Mã định danh</th>
		<th style="width: 10%;">Số CMTND</th>
		<th style="width: 5%;">Ngày sinh</th>
		<th style="width: 5%;">Số ĐT</th>
		<th style="width: 2%;">Dãy</th>
		<th style="width: 5%;">Phòng</th>
		<th style="width: 5%;">Rèn luyện</th>
	</tr>
	<?php
		if(!isset($_POST["ClassList"])){
			echo '<p style="color:red;">Vui lòng chọn lớp trước !</p>';
		}else{
			$CLC = $_POST["ClassList"];
		}
		$qr = "SELECT * FROM Student WHERE ClassC = '$CLC'";
		$result = mysql_query($qr);
		$i = 0;
		if (mysql_num_rows($result) > 0) {
			while ($row = mysql_fetch_array($result)) {
				$i = $i + 1;
				if ($row["Point"] <= 100 && $row["Point"] >= 90) {
					$rl = 'Tốt';
				}elseif ($row["Point"] <= 89 && $row["Point"] >= 75) {
					$rl = 'Khá';
				}elseif ($row["Point"] <= 74 && $row["Point"] >= 65) {
					$rl = 'Trung bình';
				}else {
					$rl = 'Yếu';
				}
	?>
	<tr>
		<td><?php echo $i; ?></td>
		<td><input type="text" name="txtName" value="<?php echo $row["StudentName"]; ?>" style="width: 130px;"></td>
		<td><input type="text" name="txtMa" placeholder="<?php echo $row["Identifier"]; ?>" style="width: 110px;"></td>
		<td><input type="text" name="txtCmt" value="<?php echo $row["Cmt"]; ?>" style="width: 80px;"></td>
		<td><input type="date" name="txtNS" value="<?php echo $row["Birthday"]; ?>" style="width: 110px;" ></td>
		<td><input type="text" name="txtSDT" value="<?php echo $row["PhoneNumber"]; ?>" style="width: 80px;"></td>
		<td><input type="text" name="txtHL" value="<?php echo $row["HLC"]; ?>" style="width: 30px;" ></td>
		<td><input type="text" name="txtRName" value="<?php echo $row["RoomC"]; ?>" style="width: 30px;" ></td>
		<td><input type="text" name="txtRName" value="<?php echo $rl; ?>" style="width: 80px;" ></td>
		<td>
			<input type="button" name="btnUpdate" value="C.Nhật">
		</td>
	</tr>
	<?php
			}
		}else {
	?>
	<tr>
		<td>NULL</td>
		<td>NULL</td>
		<td>NULL</td>
		<td>NULL</td>
		<td>NULL</td>
		<td>NULL</td>
		<td>NULL</td>
		<td>NULL</td>
	</tr>
	<?php
		}
	?>
</table>