<?php
	require 'dbconn.php';
	$svMaSV = $_POST['inpMaSV'];
	$query = "SELECT * FROM Student WHERE Identifier = '$svMaSV'";
	$content = mysql_query($query);
	$i = 0;
?>
	<h3>Kết quả tìm kiếm cho sinh viên: "<?php echo $svMaSV; ?>"</h3>
<?php
	
	if ($svMaSV == "") {
		echo '<h3>'."Hãy nhập vào tên sinh viên !".'</h3>';
	}elseif (mysql_num_rows($content)>0) {

		while ($row = mysql_fetch_array($content)) {
				$i = $i + 1;
?>
<div style="width: 24%; float: left;">
	<p><?php echo $i.'. Họ tên: '.$row['StudentName']; ?></p>
	<p>Lớp: <?php echo $row['ClassC']; ?></p>
	<p>Khoa: <?php echo $row['Khoa']; ?></p>
	<p>SĐT: <?php echo $row['PhoneNumber']; ?></p>
	<p>Phòng: <?php echo $row['RoomName']; ?></p>
</div>
<?php
		}
	}
	
?>