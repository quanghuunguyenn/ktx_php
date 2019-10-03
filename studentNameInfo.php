<?php
	require 'dbconn.php';
	$svName = $_POST['inpNameSV'];
	$query = "SELECT * FROM Student WHERE StudentName LIKE '%$svName%'";
	$content = mysql_query($query);
	$i = 0;
	if ($svName == "") {
		echo '<h3>'."Hãy nhập vào tên sinh viên !".'</h3>';
	}elseif (mysql_num_rows($content)>0) {
?>
<h3>Kết quả tìm kiếm cho sinh viên: "<?php echo $svName; ?>"</h3>
<?php
		while ($row = mysql_fetch_array($content)) {
				$i = $i + 1;
?>
<div style="width: 24%; float: left;" class="w3-center">
	<p><?php echo $i.'. Họ tên: '.$row['StudentName']; ?></p>
	<p>Lớp: <?php echo $row['ClassC']; ?></p>
	<p>Khoa: <?php echo $row['KhoaC']; ?></p>
	<p>SĐT: <?php echo $row['PhoneNumber']; ?></p>
	<p>Phòng: <?php echo $row['RoomC']; ?></p>
</div>
<?php
		}
	}
	
?>