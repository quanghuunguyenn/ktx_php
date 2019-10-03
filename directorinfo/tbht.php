<?php
	$query = " SELECT * FROM Employees WHERE Position = 3 ";
	$result = mysql_query($query);
	$i = 1;
	if (mysql_num_rows($result) == 1) {
		while ($row = mysql_fetch_assoc($result)) {
			$i = $i + 1;
			echo '<img src="'.$row["LinkAv"].'">';
			echo '<p>'.$row["Name"].'</p>';
			echo '<p>SĐT: '.$row["PhoneNumber"].'</p>';
			echo '<p>Phòng: '.$row["Room"].' - Số nhân viên: '.$i.'</p>';
	}
}
?>