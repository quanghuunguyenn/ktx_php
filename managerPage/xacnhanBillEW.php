<?php
	require 'manatop.php';
	$RC = $_GET["RC"];
	$M = $_GET["M"];
	$id = $_GET["id"];
?>
	<div class="w3-container w3-center w3-panel">
		<h3>Xác nhận thanh toán điện nước tháng </h3>
		<form action="" method="POST">
			<input type="text" name="MaSV" placeholder="Nhập mã sinh viên">
			<input type="text" name="TenSV" placeholder="Tên sinh viên">
			<input type="submit" name="btnXacNhan" value="Xác nhận">
		</form>
		<?php
			if (isset($_POST["btnXacNhan"])) {
				$maSV = $_POST["MaSV"];
				$tenSV = $_POST["TenSV"];
				if ($maSV != "" && $tenSV != "") {
					$upXacNhan = "UPDATE BillEW SET Identifier2 = '$maSV', SVpay = '$tenSV', Status = 1, DatePay = now() WHERE RoomC = '$RC' AND Month = '$M'";
					mysql_query($upXacNhan);
					echo '<p>Xác nhận thành công!</p>';

				}else{
					echo '<p>Lỗi!</p>';
				}
				
			}
			echo '<a style="margin: 100px 45%;" href="../managerPage/elecwater.php">Trở về</a>';
		?>
	</div>
<?php require 'manabot.php'; ?>