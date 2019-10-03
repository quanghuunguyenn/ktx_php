<table class="w3-table w3-bordered">
	<tr>
		<th style="width: 5%;">STT</th>
		<th style="width: 15%;">Họ tên</th>
		<th style="width: 15%;">Lớp</th>
		<th style="width: 15%;">Số ĐT</th>
	</tr>
<?php
	require 'dbconn.php';
	$roomName = $_POST['inpRoom'];
	$query = "SELECT * FROM RoomList,Student WHERE RoomList.RoomC = Student.RoomC";
	$content = mysql_query($query);
	$i = 0;
	if ($roomName == "") {
		echo '<h3>'."Hãy nhập vào tên phòng !".'</h3>';
	}elseif (mysql_num_rows($content)>0) {
?>
<h3><?php echo $roomName; ?> gồm các sinh viên:</h3>
<?php
		while ($row = mysql_fetch_array($content)) {
			if ($row['RoomName'] == $roomName) {
				$i = $i + 1;
?>
	<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $row["StudentName"]; ?></td>
		<td><?php echo $row["ClassC"]; ?></td>
		<td><?php echo $row["PhoneNumber"]; ?>
	</tr>
	<?php
			}
		}
	}
	?>
</table>
