var jm = jm || {};
jm.open = jm.open || function(url, target) {
	if(target == undefined) {
		target = '_self';
	} else {
		target = (typeof target == 'string' ? target : "_blank");
	}
	//if (document.all) {
		// IsIE, avoid Referer lose, use <a> instand
		var linka = document.createElement('a');
		linka.href = url;
		linka.target = target;
		document.body.appendChild(linka);
		linka.click();
	//} else {
	//	window.open(url, target);
	//}
};
var show = false;
var showTimerId = setTimeout($('#qdcode').show(),5000);
window.onload=function(){
	clearTimeout(showTimerId);
	if(!show){
		$('#qdcode').show();
	}
};
$("#qd").toggle(function(){
	$("#captcha").animate({left:75},300);
	$("#code").animate({left:175},400);
	$("#submit").animate({left:225},500);
},function(){
	$("#captcha").animate({left:0},500);
	$("#code").animate({left:0},400);
	$("#submit").animate({left:0},300);
});
$("#captcha").click(function(){
	$("#captcha").find("img").attr("src","/captcha.php");
});
$("#code").find("input").keydown(function(e){
	if(e.keyCode==13){
		$("#submit").find("input").click();
	}
});  
$("#submit").find("input").click(function(){
	var params = {};
	params.code = $("#code").find("input").val();
	$.ajax({
		url : "/captcha_check.php",
		dataType : "json",
		timeout : 1000,
		data:params,
		success : function(result) {
			if(result.r=="error"){
				$("#captcha").click();
				console.log(result.c);
				console.log(result.cc);
			}else{
				window.location = result.r;
			}
		},
		error : function(xhr, ts, et) {
			xhr = null;
		}
	});
});
function getCookie(name){
   var arrStr = document.cookie.split("; ");
   for(var i = 0;i < arrStr.length;i ++){
    var temp = arrStr[i]['split']("=");
    if(temp[0] == name) return unescape(temp[1]);
   } 
}