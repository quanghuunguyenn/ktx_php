$(document).ready(function(){
	// Xu ly day nha theo gioi tinh
	$("#sex").change(function(){
		var id = $("#sex").val();
		$.post("selectHL.php", {id:id}, function(data){
			$(".selectHL").html(data);
		})
	})

	// Xu ly du lieu tra cuu thong tin phong theo day nha
	$("#HouseList").change(function(){
		var id = $("#HouseList").val();
		$.post("dataprocess.php", {id:id}, function(data){
			$(".hlresult").html(data);
		})
	})

	// Xu ly du lieu tra cuu thong tin dien nuoc theo phong
	$(".slcR").change(function(){
		var id = $(".slcR").val();
		$.post("roomEW.php", {id:id}, function(data){
			$(".contentEW").html(data);
		})
	})


	// Xu ly du lieu tra cuu thong tin phong theo day nha
	$("#HouseList").change(function(){
		var id = $("#HouseList").val();
		$.post("selectRoom.php", {id:id}, function(data){
			$(".selectRoom").html(data);
		})
	})

	// Xu ly du lieu tra cuu thong tin sinh vien qua phong
	$(".btnRoom").click(function(){
		var inpRoom = $(".inpRoom").val();
		$.post("roomInfo.php",{inpRoom:inpRoom}, function(data){
			$(".hlresult").html(data);
		})
	})

	// Xu ly du lieu tra cuu thong tin nhân viên qua dãy nhà
	$(".emHL").change(function(){
		var id = $(".emHL").val();
		$.post("employeesInfo.php", {id:id}, function(data){
			$(".result-info").html(data);
		})
	})

	// Xu ly thong tin nhan vien qua ho ten
	$(".btnNameNV").click(function(){
		var inpNameNV = $(".inpNameNV").val();
		$.post("emInfo.php",{inpNameNV:inpNameNV}, function(data){
			$(".emResult").html(data);
		})
	})

	// Xu ly thong tin sinh vien qua ho ten
	$(".btnNameSV").click(function(){
		var inpNameSV = $(".inpNameSV").val();
		$.post("studentNameInfo.php",{inpNameSV:inpNameSV}, function(data){
			$(".studentResult").html(data);
		})
	})

	// Xu ly thong tin sinh vien qua ma sinh vien
	$(".btnMaSV").click(function(){
		var inpMaSV = $(".inpMaSV").val();
		$.post("studentMaSVInfo.php",{inpMaSV:inpMaSV}, function(data){
			$(".studentResult").html(data);
		})
	})

	//Xu ly mau menu

})