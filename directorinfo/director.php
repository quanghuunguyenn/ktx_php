<?php
	$query = " SELECT * FROM Employees WHERE Position = 1 ";
	$result = mysql_query($query);
	if (mysql_num_rows($result) == 1) {
		while ($row = mysql_fetch_assoc($result)) {
			echo '<img src="'.$row["LinkAv"].'">';
			echo '<p>'.$row["Name"].'</p>';
			echo '<p>SĐT: '.$row["PhoneNumber"].'</p>';
			echo '<p>Phòng: '.$row["Room"].'</p>';
	}
}
?>