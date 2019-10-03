<?php
	require 'dbconn.php';
	require 'dfSession.php';
	$idHL = $_POST["id"];
?>
<table class="w3-table w3-bordered">
	<h4>Kết quả tra cứu nhân viên quản lý dãy: <?php echo $idHL; ?></h4>
	<tr>
		<th style="width: 5%;">STT</th>
		<th style="width: 15%;">Họ tên</th>
		<th style="width: 15%;">Số điện thoại</th>
		<th style="width: 15%;">Số phòng</th>
	</tr>
	<?php
		$qr = "SELECT * FROM Employees WHERE HLC = '$idHL'";
		$query = mysql_query($qr);
		$num = mysql_num_rows($query);
		$i = 0;
		if($num > 0){
			while ($row = mysql_fetch_array($query)) {
				$i = $i + 1;
	?>
	<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $row["Name"]; ?></td>
		<td><?php echo $row["PhoneNumber"]; ?></td>
		<td><?php echo $row["Room"]; ?></td>
	</tr>
	<?php
			}
		}
	?>
</table>
