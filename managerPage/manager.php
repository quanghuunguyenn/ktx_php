
<?php require 'manatop.php'; ?>
	<?php
		$query = "SELECT * FROM Regis WHERE Result = 0";
		$content = mysql_query($query);
		$i = 0;
		if (mysql_num_rows($content) > 0) {
			while ($row = mysql_fetch_array($content)) {
				$i = $i + 1;
			}
		}
	?>
	<div class="w3-container w3-panel">
		<h3 class="w3-center">CÁC BÁO CÁO CÓ THỂ KIỂM DUYỆT</h3>
		<div class="report-List w3-container w3-panel">
			<div class="w3-third w3-center list-report">
				<h4>Đăng ký mới - chưa duyệt phòng: <a href="../managerPage/dangkyNew.php"><?php echo $i; ?></a></h4>
			</div>
			<div class="w3-third w3-center list-report 1">
				<h4>Comming soon! <a href="">Link</a></h4>
			</div>
			<div class="w3-third w3-center list-report 2">
				<h4>Comming soon! <a href="">Link</a></h4>
			</div>

			<div class="w3-third w3-center list-report 3">
				<h4>Comming soon! <a href="">Link</a></h4>
			</div>
			<div class="w3-third w3-center list-report 4">
				<h4>Comming soon! <a href="">Link</a></h4>
			</div>
			
			<div class="w3-third w3-center list-report 4">
				<h4>Comming soon! <a href="">Link</a></h4>
			</div>
		</div>
		
	</div>

<?php require 'manabot.php'; ?>