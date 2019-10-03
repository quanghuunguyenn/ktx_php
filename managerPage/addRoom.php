<?php
	require 'manatop.php';
	$HLC = $_GET["h"];
?>
	<div class="w3-container w3-center w3-panel">
		<h3>Thêm phòng vào dãy nhà: <?php echo $HLC; ?></h3>
		<form action="" method="POST">
			<input type="text" name="ten" placeholder="Tên phòng">
			<input type="submit" name="btnAddR" value="Thêm">
		</form>
	</div>
	<?php
		if ($HLC == "") {
			header("Location:managerPage/room.php");
		}
		if (isset($_POST["btnAddR"])) {
			$tenR = $_POST["ten"];
			$checkR = "SELECT * FROM RoomList WHERE HLC = '$HLC' AND RoomName = '$tenR ' ";
			$qr = mysql_query($checkR);
			$num = mysql_num_rows($qr);
			if ($num == 0) {
				if ($_POST["ten"] != "") {
					$addR = "INSERT INTO RoomList VALUES ('','$tenR','$tenR','$HLC','','','','80000')";
					mysql_query($addR);
					header("Location:managerPage/room.php");
				}else {
					echo "<center>Nhập vào tên phòng!</center>";
				}
			}else {
				echo "<center>Dãy ".$HLC." đã có thông tin phòng".$tenR." </center>";
			}
			
		}
	?>
<?php require 'manabot.php'; ?>