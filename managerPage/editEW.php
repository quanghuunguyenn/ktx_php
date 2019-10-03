<?php
	require '../dfSession.php';
	require 'manatop.php';
	$R = $_GET["R"];
	$M = $_GET["M"];
	$P = $_SESSION["Identifier"];
?>
	<div class="w3-container w3-panel w3-center">
		<h3>TRANG SỬA THÔNG TIN ĐIỆN NƯỚC</h3>
		<h4>Mã phòng <?php echo $R; ?></h4>
		<form action="" method="POST">
			<input type="text" name="Enew" placeholder="Số điện mới">
			<input type="text" name="Wnew" placeholder="Số nước mới">
			<input type="submit" name="btnUpdate" value="Sửa">
		</form>
		<?php 
			if(isset($_POST["btnUpdate"])){
				$E = $_POST["Enew"];
				$W = $_POST["Wnew"];
				if($E > 0 || $W > 0){
					$query = "UPDATE EW SET Enum = '$E', Wnum = '$W', Identifier = '$P', DateIn = now() WHERE RoomC = '$R' AND Month = '$M'";
					mysql_query($query);
					echo "Sửa thành công!";
				}else {
					echo "Sửa thất bại!";
				}
			}
			
		?>
		<a href="../managerPage/elecwater.php">Trở về</a>
	</div>


<?php 
	require 'manabot.php';
?>