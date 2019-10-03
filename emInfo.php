<?php
	require 'dbconn.php';
	require 'dfSession.php';
	$nvName = $_POST['inpNameNV'];
?>
<table class="w3-table w3-bordered">
	<h4>Kết quả tra cứu nhân viên: <?php echo $nvName; ?></h4>
	<tr>
		<th style="width: 5%;">STT</th>
		<th style="width: 15%;">Họ tên</th>
		<th style="width: 15%;">Số phòng</th>
		<th style="width: 15%;">Chức vụ</th>
		<th style="width: 15%;">Tên phòng</th>
		<th style="width: 15%;">Quản lý dãy</th>
		<th style="width: 15%;">Số điện thoại</th>
		
	</tr>
	<?php
		$qr = "SELECT * FROM Employees WHERE Name LIKE '%$nvName%'";
		$query = mysql_query($qr);
		$num = mysql_num_rows($query);
		$i = 0;
		if($num > 0){
			while ($row = mysql_fetch_array($query)) {
				$i = $i + 1;
				if ($row["Position"] ==1) {
					$a = 'Giám đốc';
				}else if ($row["Position"]== 2 || ($row["Position"]) == 3){
					$a = 'Trưởng phòng';
				}else{
					$a = 'Nhân viên';
				}
	?>
	<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $row["Name"]; ?></td>
		<td><?php echo $row["Room"]; ?></td>
		<td><?php echo $a; ?></td>
		<td><?php echo $row["RoomName"]; ?></td>
		<td><?php echo $row["HLC"]; ?></td>
		<td><?php echo $row["PhoneNumber"]; ?></td>
		
	</tr>
	<?php
			}
		}
	?>
</table>