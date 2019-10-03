$(document).ready(function(){
var stt = 0;
startIm = $("img.slide:first").attr("stt");
endIm = $("img.slide:last").attr("stt");
$("img.slide").each(function(){
	if($(this).is(':visible'))
		stt = $(this).attr("stt");
});

$("#next").click(function(){
	if(stt == endIm){
		stt = -1;
	}
	next = ++stt;
	$("img.slide").hide();
	$("img.slide").eq(next).show();
});

$("#prev").click(function(){
	if(stt == 0){
		stt = endIm;
		prev = stt++;
	}
	prev = --stt;
	$("img.slide").hide();
	$("img.slide").eq(prev).show();
});

$("#next2").click(function(){
	if(stt == endIm){
		stt = -1;
	}
	next2 = ++stt;
	$("img.slide").hide();
	$("img.slide").eq(next2).show();
});

$("#prev2").click(function(){
	if(stt == 0){
			stt = endIm;
			prev2 = stt++;
		}
		prev2 = --stt;
		$("img.slide").hide();
		$("img.slide").eq(prev2).show();
	});
});

setInterval(function(){
	$("#next").click();
},2500);