<option value="">--Dãy--</option>
<?php
	require 'dbconn.php';
	$type = $_POST['id'];
	$hl = "SELECT * FROM HouseList WHERE Type = '$type'";
	$query = mysql_query($hl);
	$num = mysql_num_rows($query);	
	if ($num > 0) {
		while ($row = mysql_fetch_array($query)) {
?>
<option value="<?php echo $row['HLC']; ?>"><?php echo $row['HLName']; ?></option>
<?php
		}
	}
?>