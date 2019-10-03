<?php require 'manatop.php'; ?>
	<div class="w3-container">
		<h2 class="w3-center">THỐNG KÊ SỬ DỤNG ĐIỆN NƯỚC</h2>
		<form action="" method="POST">
			<label>Phòng: </label>
			<select name="RoomList" id="RoomList" name="RoomList">
				<option value="">--chọn--</option>
				<?php
					$hl = "SELECT * FROM RoomList";
					$query = mysql_query($hl);
					$num = mysql_num_rows($query);
					if ($num > 0) {
						while ($row = mysql_fetch_array($query)) {
				?>
							<option value="<?php echo $row['RoomC']; ?>"><?php echo $row['RoomName']; ?></option>
				<?php
						}
					}
				?>
			</select>
			<input type="submit" name="subRL" value="Xem danh sách">
		</form>
		<?php require 'processEWRL.php'; ?>
	</div>
<?php require 'addEW.php'; ?>
<?php require 'manabot.php'; ?>
