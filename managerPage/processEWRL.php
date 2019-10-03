<form action="editEW.php" method="POST">
	<table class="w3-table w3-bordered">
		<?php echo '<h3>Thống kê điện nước phòng: '.$_POST["RoomList"].' </h3>'; ?>
		<tr>
			<th style="width: 2%;">STT</th>
			<th style="width: 5%;">Số điện</th>
			<th style="width: 5%;">Số nước</th>
			<th style="width: 5%;">Trong tháng</th>
			<th style="width: 5%;">Ngày nhập</th>
			<th style="width: 5%;">Người nhập</th>
		</tr>
		<?php
			if(!isset($_POST["RoomList"])){
				echo '<p style="color:red;">Vui lòng chọn phòng trước !</p>';
			}else{
				$RC = $_POST["RoomList"];
			}
			$qr = "SELECT * FROM EW, Employees WHERE EW.RoomC = '$RC' AND EW.Identifier = Employees.Identifier";
			$result = mysql_query($qr);
			$i = 0;
			if (mysql_num_rows($result) > 0) {
				while ($row = mysql_fetch_array($result)) {
					$i = $i + 1;
		?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><input style="width: 50px;" type="" name="Enumber" value="<?php echo $row["Enum"]; ?>"></td>
			<td><input style="width: 50px;" type="" name="Wnumber" value="<?php echo $row["Wnum"]; ?>"></td>
			<td><input style="width: 50px;" type="text" name="Mnumber" value="<?php echo $row["Month"]; ?>"></td>
			<td><input type="date" name="DateIn" value="<?php echo $row["DateIn"]; ?>"></td>
			<td><input type="" name="" value="<?php echo $row["Name"]; ?>"></td>
			<td><a href="editEW.php?R=<?php echo $row["RoomC"]; ?>&M=<?php echo $row["Month"]; ?>"  >Sửa</a></td>
			<td><a href="billEW.php?R=<?php echo $row["RoomC"]; ?>&M=<?php echo $row["Month"]; ?>">Xem CT Hóa đơn</a></td>
		</tr>
		<?php
				}
			}else{
		?>
		<tr>
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
</form>

