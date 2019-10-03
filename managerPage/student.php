<?php require 'manatop.php'; ?>

	<div class="w3-container w3-panel">
		<h2 class="w3-center">THÔNG TIN SINH VIÊN</h2>
		<form action="" method="POST">
			<label>Lớp: </label>
			<select name="ClassList" id="ClassList" name="ClassList">
				<option disabled="disabled" value="">--chọn--</option>
				<?php
					$hl = "SELECT * FROM Class";
					$query = mysql_query($hl);
					$num = mysql_num_rows($query);
					if ($num > 0) {
						while ($row = mysql_fetch_array($query)) {
				?>
				<option value="<?php echo $row['ClassC']; ?>"><?php echo $row['ClassC']; ?></option>
				<?php
						}
					}
				?>
			</select>
			<input type="submit" name="subCL" value="Chọn">
		</form>
		<?php require 'processST.php'; ?>
	</div>

<?php require 'manabot.php'; ?>