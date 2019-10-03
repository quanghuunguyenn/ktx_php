<?php require 'manatop.php'; ?>
	<div class="w3-container w3-panel">
		<h2 class="w3-center">DANH SÁCH TÀI KHOẢN TRÊN HỆ THỐNG !</h2>
		<table class="w3-table w3-bordered">
			<tr>
				<th style="width: 5%;">STT</th>
				<th style="width: 25%;">Định danh</th>
				<th>Mật khẩu</th>
				<th style="width: 5%;">Cập nhật</th>
				<th style="width: 5%;">Xóa</th>
			</tr>
			<?php
				$qr = "SELECT * FROM USER";
				$result = mysql_query($qr);
				$i = 0;
				if (mysql_num_rows($result) > 0) {
					while ($row = mysql_fetch_array($result)) {
						$i = $i + 1;
						$pa = md5($row["Password"]);
			?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $row["Username"]; ?></td>
				<td><?php echo $pa; ?></td>
				<td><input onclick="myFunction()"  type="button" name="" value="Chọn"></td>
				<td><input onclick="myFunction()" type="button" name="" value="Chọn"></td>
			</tr>
			<?php
					}
				}
			?>
		</table>
	</div>
<script>
	function myFunction() {
	  alert("Code lâu quá bỏ luôn rồi hiuhiu :((");
	}
</script>
<?php require 'manabot.php'; ?>