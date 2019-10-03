<!-- Tạo dialog xác nhận thu hồi phòng -->
<script type="text/javascript">
	$(document).ready(function(){
		$(".roomRes").click(function(){
			if(confirm("Bạn muốn thu hồi phòng này ?")){

			}else {
				return false;
			}
		})
	})
</script>

<table class="w3-table w3-bordered">
	<tr>
		<th style="width: 5%;">STT</th>
		<th style="width: 5%;">Phòng</th>
		<th style="width: 5%;">Số SV</th>
		<th style="width: 5%;">Phân loại</th>
		<th style="width: 5%;">Thu hồi</th>
		<th style="width: 10%;">Thông tin thêm</th>
	</tr>
	<?php
		if(isset($_POST["HouseList"])){
			$HLC = $_POST["HouseList"];
		}else{
			echo '<p style="color:red;">Vui lòng chọn dãy nhà !</p>';
		}
		$qr = "SELECT * FROM RoomList, HouseList WHERE RoomList.HLC = '$HLC' AND RoomList.HLC = HouseList.HLC";
		$result = mysql_query($qr);
		$i = 0;
		if (mysql_num_rows($result) > 0) {
			while ($row = mysql_fetch_array($result)) {
				$i = $i + 1;
				$HLC = $row["HLC"];
	?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $row["RoomName"]; ?></td>
					<td><?php echo $row["Amount"]; ?></td>
					<td><?php if ($row["TypeRoom"] == 0) {
						echo "Thường";
					}else{
						echo "Đặc biệt";
					} ?><a href="changeTypeRoom.php?id=<?php echo $row["RoomC"]; ?>&type=<?php echo $row["TypeRoom"] ?>"> <Đổi> </a></td>
					<td><div class="roomRes"><a href="roomRestore.php?id=<?php echo $row["RoomC"];?>"> Chọn </a></div></td>
					<td>
						<input type="button" name="" value="DSSV">
					</td>
				</tr>
	<?php
			}
		}
		else {
	?>
			<tr>
				<td>NULL</td>
				<td>NULL</td>
				<td>NULL</td>
				<td>NULL</td>
				<td>NULL</td>
				<td>NULL</td>
			</tr>
	<?php
		}

	?>
	<td>Thêm phòng vào dãy: <?php echo $_POST["HouseList"]; ?></td>
	<td><a href="addRoom.php?h=<?php echo $HLC; ?>">Thêm phòng</a></td>
</table>
