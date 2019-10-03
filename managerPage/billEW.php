<?php
	require 'manatop.php';
	$RC = $_GET["R"];
	$M = $_GET["M"];
	$P = $_SESSION["Identifier"];
?>	
	<div class="w3-container w3-panel">
	<h3 class="w3-center">Hóa đơn điện nước tháng <?php echo $M; ?> phòng <?php echo $RC; ?></h3>
	<form action="" method="POST">
		<?php
			$qr = "SELECT * FROM BillEW WHERE RoomC = '$RC' AND Month = '$M'";
			$result = mysql_query($qr);
			if (mysql_num_rows($result) == 1) {
				while ($row = mysql_fetch_array($result)) {
		?>
			<h4>Mã hóa đơn: <?php echo $row["IdBillEW"]; ?></h4>
			<h4 class="w3-half">Mã phòng: <?php echo $row["RoomC"]; ?></h4>
			<h4 class="w3-half">Tên phòng: <?php echo $row["RoomName"]; ?></h4>
			<h4 class="w3-quarter">Số điện: <?php echo $row["Enum"]; ?></h4>
			<h4 class="w3-quarter">Đơn giá (Điện): <?php echo $row["DonGiaE"]; ?></h4>
			<h4 class="w3-quarter">Số nước: <?php echo $row["Wnum"]; ?></h4>
			<h4 class="w3-quarter">Đơn giá (nước): <?php echo $row["DonGiaW"]; ?></h4>
			<h4>Sử dụng trong tháng: <?php echo $row["Month"]; ?></h4>
			<h4>Thành tiền: <?php echo $row["SumMoney"]; ?> VND</h4>
			<h4>Tình trạng: 
				<?php
					if ($row["Status"] == 0) {
						echo "Chưa thanh toán.";
					}else {
						echo "Đã thanh toán.";
					}
				?>
			</h4>
			<h4 class="w3-third">Ngày : <?php echo $row["DatePay"]; ?></h4>
			<h4 class="w3-third">Mã SV:<?php echo $row["Identifier2"] ?></h4>
			<h4 class="w3-third">Họ tên SV:<?php echo $row["SVpay"] ?></h4>
		<?php
				}
			}
			$nv = "SELECT * FROM Employees WHERE Identifier = '$P'";
			$checked = mysql_query($nv);
			if(mysql_num_rows($checked) == 1){
				while ($row = mysql_fetch_array($checked)) {
		?>
			<h4>Nhân viên : <?php echo $row["Name"]; ?></h4><br><br>
		<?php	
				}
			}
			$qr = "SELECT * FROM BillEW WHERE RoomC = '$RC' AND Month = '$M'";
			$result = mysql_query($qr);
			if (mysql_num_rows($result) == 1) {
				while ($row = mysql_fetch_array($result)) {
					if ($row["Status"] == 1) {
						echo '<a style="margin: 100px 45%;" href="../managerPage/elecwater.php">Trở về</a>';
					}
		?>
			<a style="margin: 100px 45%;" href="../managerPage/xacnhanBillEW.php?id=<?php echo $row["IdBillEW"]; ?>&RC=<?php echo $RC; ?>&M=<?php echo $M; ?>">Cập nhật hóa đơn</a>
		<?php
				}
			}
		?>
	</form>
	</div>
<?php require 'manabot.php'; ?>