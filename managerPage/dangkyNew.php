<!-- Tạo dialog xác nhận duyệt-->
<script type="text/javascript">
	$(document).ready(function(){
		$(".duyet").click(function(){
			if(confirm("Bạn muốn duyệt sinh viên này ?")){

			}else {
				return false;
			}
		})
	})
</script>
<?php require 'manatop.php'; ?>
	<div class="w3-container w3-panel">
		ĐĂNG KÝ MỚI
		<table class="w3-table w3-bordered w3-panel">
			<tr>
				<th style="width: 2%;">STT</th>
				<th style="width: 4%;">Họ tên</th>
				<th style="width: 3%;">Mã định danh</th>
				<th style="width: 5%;">Số CMTND</th>
				<th style="width: 5%;">Ngày sinh</th>
				<th style="width: 5%;">Lớp</th>
				<th style="width: 5%;">Số ĐT</th>
				<th style="width: 2%;">Dãy</th>
				<th style="width: 5%;">Phòng ĐK</th>
				<th style="width: 5%;">Thời gian</th>
				<th style="width: 5%;">Duyệt</th>
			</tr>

		<?php
			$regis = "SELECT * FROM Regis WHERE Result = 0";
			$query = mysql_query($regis);
			$num = mysql_num_rows($query);
			$i = 0;
			if ($num > 0) {
				while ($row = mysql_fetch_array($query)) {
					$i = $i + 1;
		?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><input style="width: 140px;" type="" name="" value="<?php echo $row["StudentName"]; ?>"></td>
				<td><input type="" name="" value="<?php echo $row["Identifier"]; ?>"></td>
				<td><input style="width: 100px;" type="" name="" value="<?php echo $row["Cmt"]; ?>"></td>
				<td><input style="width: 75px;" type="" name="" value="<?php echo $row["Birthday"]; ?>"></td>
				<td><input style="width: 90px;" type="" name="" value="<?php echo $row["ClassC"]; ?>"></td>
				<td><input style="width: 90px;" type="" name="" value="<?php echo $row["PhoneNumber"]; ?>"></td>
				<td><input style="width: 50px;" type="" name="" value="<?php echo $row["HLC"]; ?>"></td>
				<td><input style="width: 50px;" type="" name="" value="<?php echo $row["RoomC"]; ?>"></td>
				<td><input style="width: 90px;" type="text" name="" value="<?php echo $row["MonthNum"]; ?>"></td>
				<td>
					<?php
						if ($row["Result"] != 0) {
							echo "Đã";
						}else {
							echo "Chưa";
						}
					?>
					<a class="duyet" href="duyet.php?id=<?php echo $row["Identifier"]; ?>&m=<?php echo $row["MonthNum"]; ?>"> Duyệt </a>
				</td>
			</tr>
		<?php
				}
			}else {
		?>
			<tr>
				<td>NULL</td>
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
		</table>
	</div>
<?php require 'manabot.php'; ?>