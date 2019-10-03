<?php require "../dbconn.php"; ?>
<?php require "../dfSession.php" ?>
<!DOCTYPE html>
<html>
<head>
	<title>Manager Page</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/w3css.css">
	<style>
		html, body, h1, h2, h3, h4, h5, h6 {
	  	font-family: "sans-serif";
	}
    </style>
    <link rel="stylesheet" href="../css/fix.css">
    <script type="text/javascript" src="../jquery/jquery.js" ></script>
    <script type="text/javascript" src="../jquery/process.js"></script>
</head>

<body>
	<div class="manaHead w3-center">
		<h1>TRANG QUẢN TRỊ</h1>
	</div>
	<div class="navigator">
		<ul>
			<li><a href="../managerPage/manager.php">Báo cáo</a></li>
			<li><a href="../managerPage/account.php">Tài khoản</a></li>
			<li><a href="../managerPage/student.php">Sinh Viên</a></li>
			<li><a href="../managerPage/room.php">Dãy/Phòng</a></li>
			<li><a href="../managerPage/elecwater.php">Điện/Nước</a></li>
			<li><a href="../personal.php"><<</a></li>
		</ul>
	</div>