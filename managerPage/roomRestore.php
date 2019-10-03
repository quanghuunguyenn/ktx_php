<?php
	require '../dbconn.php';
	$RC = $_GET["id"];
	$qr = "UPDATE RoomList set TypeRoom = 0, Amount = 0 WHERE RoomC = '$RC'";
	mysql_query($qr);
	header("Location:../managerPage/room.php");
?>