<?php
	require 'dbconn.php';
	require 'dfSession.php';
	$idR = $_POST["id"];
	$room = $_SESSION["roomC"];
?>
<table class="w3-table w3-bordered">
	<h4 class="w3-center">Thông tin sử dụng điện nước phòng <?php echo $room; ?> tháng <?php echo $idR; ?></h4>
	<tr>
		<th style="width: 5%;">Tháng</th>
		<th style="width: 15%;">Số điện</th>
		<th style="width: 15%;">Số nước</th>
		<th style="width: 15%;">Thành tiền</th>
		<th style="width: 15%;">Tình trạng</th>
	</tr>
	<?php
		$qr = "SELECT * FROM BillEW WHERE RoomC ='$room' AND Month = '$idR'";
		$query = mysql_query($qr);
		$num = mysql_num_rows($query);
		if($num > 0){
			while ($row = mysql_fetch_array($query)) {
				if ($row["Status"] == 1) {
					$pay = 'Đã thanh toán';
				}else{
					$pay = 'Chưa thanh toán';
				}
	?>
	<tr>
		<td><?php echo $row["Month"]; ?></td>
		<td><?php echo $row["Enum"]; ?></td>
		<td><?php echo $row["Wnum"]; ?></td>
		<td><?php echo $row["SumMoney"]; ?></td>
		<td><?php echo $pay; ?></td>
	</tr>
	<?php
			}
		}
	?>
</table>
