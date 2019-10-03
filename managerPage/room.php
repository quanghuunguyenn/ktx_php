<?php require 'manatop.php'; ?>
	<div class="w3-container w3-panel">
		<form action="" method="POST">
			<input type="text" name="addNHL" placeholder="Tên nhà">
			<input type="submit" name="addHL" value="Thêm dãy">
		</form>
		<?php require 'addHL.php'; ?>		
		<form action="" method="POST">
			<label>Dãy nhà: </label>
			<select name="HouseList" id="HouseList" name="HouseList">
				<option  value="">--chọn--</option>
				<?php
					$hl = "SELECT * FROM HouseList";
					$query = mysql_query($hl);
					$num = mysql_num_rows($query);
					if ($num > 0) {
						while ($row = mysql_fetch_array($query)) {
				?>
				<option value="<?php echo $row['HLC']; ?>"><?php echo $row['HLName']; ?></option>
				<?php
						}
					}
				?>
			</select>
			<input type="submit" name="subHL" value="Chọn">
		</form>
		<h2 class="w3-center">DANH SÁCH PHÒNG</h2>

		<?php require 'processHL.php'; ?>
	</div>

<?php require 'manabot.php'; ?>