<?php require "dbconn.php"; ?>
<?php require "dfSession.php" ?>
<!DOCTYPE html>
<html lang="vi">

	<head>
		<meta charset="utf-8" />
		<title>KTX CD HAI DUONG</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/w3css.css">
		<style>
			html, body, h1, h2, h3, h4, h5, h6 {
		  	font-family: "sans-serif";
		}
	    </style>
	    <link rel="stylesheet" href="css/fix.css">
	    <script type="text/javascript" src="jquery/jquery.js" ></script>
		<script type="text/javascript" src="jquery/slideshow.js"></script>
		<script type="text/javascript" src="jquery/process.js"></script>
	</head>

	<body>

		<div class="container">
			<div class="header">
				<div class="w3-quarter">
					<img class="logo" src="images/logo.jpg">
				</div>
				<div class="w3-threequarter">
					<div class="w3-hide-small w3-center">
						<b><h1>KÝ TÚC XÁ</h1></b>
						<b><h2>TRƯỜNG CAO ĐẲNG HẢI DƯƠNG</h2></b>
					</div>
				</div>
			</div>

			<div class="navigator">
				<ul>
					<li><a href="index.php">TRANG CHỦ</a></li>
					<li><a href="infomation.php">GIỚI THIỆU</a></li>
					<li><a href="search.php">TRA CỨU</a></li>
					<li><a href="personal.php">CÁ NHÂN</a></li>
					<?php
						if (!isset($_SESSION["Username"])) {
							echo '<li><a href="registor.php">ĐĂNG KÝ</a></li>';
						}
					?>
					
					<?php 
						if ($_SESSION["UserGr"] == 1 || $_SESSION["UserGr"] ==2) {
							echo '<li><a href="managerPage/manager.php">QUẢN TRỊ</a></li>';
						}
					?>
				</ul>
			</div>