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
function show_qian1(a){
	var $q = $('#a'+a);
	var $a = $('<a>');
	var h =getCookie('h');
	var k=getCookie('k1');
	var url = "http://www.egou.com/club/qiandao/qiandao.htm?hid="+h+"&k="+k;
	$a.html("<img src='/images/backgroud.jpg'>");
	$q.append($a);
	$a.attr('onClick',"jm.open('"+url+"','_blank');");
	$a.attr('href','javascript:void(0);');
	show = true;
}
function show_qian(a){
	var $q = $('#a'+a);
	show = true;
}
function getCookie(name){
   var arrStr = document.cookie.split("; ");
   for(var i = 0;i < arrStr.length;i ++){
    var temp = arrStr[i]['split']("=");
    if(temp[0] == name) return unescape(temp[1]);
   } 
}