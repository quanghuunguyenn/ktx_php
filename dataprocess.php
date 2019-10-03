

<table class="w3-table w3-bordered">
	
	<tr>
		<th style="width: 5%;">STT</th>
		<th style="width: 15%;">Phòng</th>
		<th style="width: 15%;">Số sinh viên</th>
		<th style="width: 15%;">Còn trống</th>
		<th style="width: 15%;">Đơn giá/tháng</th>
	</tr>
<?php
	require 'dbconn.php';
	$idHL = $_POST['id'];
	echo '<h2 class="w3-center">DANH SÁCH PHÒNG CÒN GIƯỜNG DÃY '.$idHL.'</h2>';
	$sql = "SELECT * FROM RoomList WHERE HLC = '$idHL' AND Full = 0 AND TypeRoom = 0";
	$query = mysql_query($sql);
	$num = mysql_num_rows($query);
	$i = 0;
	if($num > 0){
		while ($row = mysql_fetch_array($query)) {
			$i = $i + 1;
			$j = 8 - $row["Amount"];
?>

	<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $row["RoomName"]; ?></td>
		<td><?php echo $row["Amount"]; ?></td>
		<td><?php echo $j.' giường'; ?></td>
		<td><?php echo $row["PriceMonth"].' VNĐ'; ?></td>
	</tr>

<?php
		}
	}elseif ($idHL == "") {
?>
		<tr>
			<td>NULL</td>
			<td>NULL</td>
			<td>NULL</td>
			<td>NULL</td>
			<td>NULL</td>
		</tr>
<?php
		echo '<h3>'."Vui lòng chọn dãy nhà !".'</h3>';	
	}else{
?>
		<tr>
			<td>NULL</td>
			<td>NULL</td>
			<td>NULL</td>
			<td>NULL</td>
			<td>NULL</td>
		</tr>
<?php
		echo '<h3>'."Dãy nhà này đã đủ sinh viên !".'</h3>';
	}
?>
</table>
