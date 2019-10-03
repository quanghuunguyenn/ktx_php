<?php
	require '../dbconn.php';
	$RC = $_GET["id"];
	$Type = $_GET["type"];
	echo $Type;

	$qr = "UPDATE RoomList set TypeRoom = 0 WHERE RoomC = '$RC'";
	$qr2 = "UPDATE RoomList set TypeRoom = 1 WHERE RoomC = '$RC'";
	if ($Type == 0) {
		mysql_query($qr2);
		header("location:../managerPage/room.php");
	}else {
		mysql_query($qr);
		header("location:../managerPage/room.php");
	}
?>