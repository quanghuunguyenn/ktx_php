<div class="w3-conainer w3-panel">
	<form action="" method="POST">
		<label>Nhập tháng tiếp theo phòng: </label>
		<select name="roomSelect" id="roomSelect" name="roomSelect">
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
		<select name="monthSelect" id="monthSelect" name="monthSelect">
			<option value="0">-Tháng-</option>
			<option value="1">Tháng 1</option>
			<option value="2">Tháng 2</option>
			<option value="3">Tháng 3</option>
			<option value="4">Tháng 4</option>
			<option value="5">Tháng 5</option>
			<option value="6">Tháng 6</option>
			<option value="7">Tháng 7</option>
			<option value="8">Tháng 8</option>
			<option value="9">Tháng 9</option>
			<option value="10">Tháng 10</option>
			<option value="11">Tháng 11</option>
			<option value="11">Tháng 12</option>
		</select>
		<input type="text" name="Enum" placeholder="Số điện">
		<input type="text" name="Wnum" placeholder="Số nước">
		<input type="submit" name="btnAddEW" value="Nhập mới">
	</form>
	<?php
		$rc = $_POST["roomSelect"];
		$mon = $_POST["monthSelect"];
		$soDien = $_POST["Enum"];
		$soNuoc = $_POST["Wnum"];
		$manhap = $_SESSION["Identifier"];
		$sum = $soDien*3000 + $soNuoc*8000;
		if (isset($_POST["btnAddEW"])) {
			$rs = "SELECT RoomName FROM RoomList WHERE RoomC = '$rc'";
			$result = mysql_query($rs);
			if (mysql_num_rows($result) == 1) {
				while ($row = mysql_fetch_array($result)) {
					$tp = $row["RoomName"];
				}
			}

			$checkMon = "SELECT * FROM EW WHERE Month = (SELECT MAX(Month) FROM EW) AND RoomC = '$rc'";
			$resultMon = mysql_query($checkMon);
			if (mysql_num_rows($resultMon) == 1) {
				while ($row = mysql_fetch_array($resultMon)) {
					$monMax = $row["Month"];
				}
			}

			if ($rc == "" || $mon == "0" || $soDien == "" || $soNuoc == "") {
				echo "Không được để trống trường thông tin nào!";
			}elseif($mon > $monMax){
				$query = "INSERT INTO EW VALUES('','$rc','$tp','$soDien','$soNuoc',now(),'$manhap','$mon')";
				mysql_query($query);
				
				$query2 = " INSERT INTO BillEW VALUES('','$rc','$tp','$soDien','3000','$soNuoc','8000','$mon','$manhap','','','$sum','','') ";
				mysql_query($query2);
				echo $rc.$tp.$soDien.$soNuoc.$manhap.$mon;
				echo '<p style="color:green;">Nhập thành công!</p>';
			}else {
				echo '<p style="color:red;">Nhập thất bại,phòng '.$tp.' tháng '.$mon.' đã có hóa đơn!</p>';
			}
		}
	?>
</div>


