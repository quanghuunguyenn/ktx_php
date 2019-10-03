<?php
	if (isset($_POST["addHL"])) {
		if($_POST["addNHL"] != ""){
			$ten = $_POST["addNHL"];
			echo $ten;
			$chekc = "SELECT * FROM HouseList WHERE HLName = '$ten'";
			$query = mysql_query($chekc);
			$num = mysql_num_rows($query);
			if ($num == 0) {
				$addH = "INSERT INTO `HouseList`(`IdHL`, `HLC`, `HLName`, `Type`) VALUES ('','$ten','$ten','')";
				mysql_query($addH);
				echo " - Thành công!";
			}else {
				echo " - Thất bại!";
			}
		}else {
			echo "Điền đầy đủ tên dãy nhà!";
		}
	}
?>