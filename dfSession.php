<?php
	session_start();
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	if(isset($_POST["btnLogin"])){
		$un = $_POST["txtUn"];
		$pa = $_POST["txtPa"];
		$query = "
			SELECT * FROM User WHERE Username = '$un' AND Password = '$pa'
		";
		$user = mysql_query($query);
		if (mysql_num_rows($user)==1) {
			$row = mysql_fetch_array($user);
			$_SESSION["idUser"] = $row['IdUser'];
			$_SESSION["Username"] = $row['Username'];
			$_SESSION["Identifier"] = $row['Identifier'];
			$_SESSION["UserGr"] = $row['UserGroup'];
		}
		$id = $_SESSION["Identifier"];
		$query2 = "
			SELECT * FROM Student WHERE Identifier = '$id';
		";
		$select = mysql_query($query2);
		if (mysql_num_rows($select)==1) {
			$row = mysql_fetch_array($select);
			$_SESSION["roomC"] = $row['RoomC'];
		}
	}
?>
<?php 
	if (isset($_POST["btnLogout"])) {
		unset($_SESSION["IdUser"]);
		unset($_SESSION["Username"]);
		unset($_SESSION["Identifier"]);
		unset($_SESSION["UserGr"]);
		unset($_SESSION["roomC"]);
	}
?>