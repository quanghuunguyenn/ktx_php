	
	<option value="">Phòng</option>
<?php
	require 'dbconn.php';
	$idHL = $_POST['id'];
	$sql = "SELECT * FROM RoomList WHERE HLC = '$idHL' AND Full = 0 AND TypeRoom = 0";
	$query = mysql_query($sql);
	$num = mysql_num_rows($query);
	$i = 0;
	if($num > 0){
		while ($row = mysql_fetch_array($query)) {
			$i = $i + 1;
?>
			<option value="<?php echo $row["HLC"]; ?>"><?php echo $row["RoomName"]; ?></option>
<?php
		}
	}elseif ($idHL == "") {
		echo '<h3>'."Vui lòng chọn dãy nhà !".'</h3>';	
	}else{
		echo '<h3>'."Dãy nhà này đã đủ sinh viên !".'</h3>';
	}
?>
