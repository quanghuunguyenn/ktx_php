<?php require '../managerPage/manatop.php'; ?>
	<h3 class="w3-center">DANH SÁCH YÊU CẦU HỖ TRỢ CHƯA ĐƯỢC DUYỆT</h3>
	<table class="w3-table">
		<tr>
			<th width="3%">STT</th>
			<th width="15%">SV</th>
			<th width="5%">SĐT</th>
			<th>Phòng</th>
			<th>Dãy</th>
			<th>Vấn đề</th>
			<th>Yêu cầu</th>
			<th>Thực hiện</th>
		</tr>
	<?php
		$sl = "SELECT * FROM Support WHERE Status = 0";
		$content = mysql_query($sl);
		$i = 0;
		if (mysql_num_rows($content) >= 0 ) {
			while ($row = mysql_fetch_assoc($content)) {
				$i = $i + 1;
				if ($row["Status"] == 0) {
					$status = 'Chưa xử lý';
				}
	?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $row["StudentName"]; ?></td>
			<td><?php echo $row["PhoneNumber"]; ?></td>
			<td><?php echo $row["RoomC"]; ?></td>
			<td><?php echo $row["HLC"]; ?></td>
			<td><?php echo $row["Problem"]; ?></td>
			<td><?php echo $row["Content"]; ?></td>
			<td><?php echo $status; ?></td>
		</tr>
	<?php
			}
		}
	?>
	</table>
<?php require '../managerPage/manabot.php'; ?>