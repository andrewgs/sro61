/*  Author: Grapheme Group
 *  http://grapheme.ru/
 */
 
function isValidEmailAddress(emailAddress){
	var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
	return pattern.test(emailAddress);
};

function isValidPhone(phoneNumber){
	var pattern = new RegExp(/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/i);
	return pattern.test(phoneNumber);
};

function isValidDomen(domen){
	var pattern = new RegExp(/^([\da-z\.-]+)\.([a-z\.]{2,6})$/);
	return pattern.test(domen);
};

function isFindDomenToURL(platform,url){
	var pos = url.indexOf(platform);
	if(pos>0){return true;}else{return false;}
};

(function($){
	$("#msgeclose").click(function(){$("#msgdealert").fadeOut(1000,function(){$(this).remove();});});
	$("#msgsclose").click(function(){$("#msgdsalert").fadeOut(1000,function(){$(this).remove();});});
	$(".digital").keypress(function(e){if(e.which!=8 && e.which!=46 && e.which!=0 && (e.which<48 || e.which>57)){return false;}});
	$(".negative").keypress(function(e){if(e.which!=8 && e.which!=46 && e.which!=0 && e.which!=45 && (e.which<48 || e.which>57)){return false;}});
	$(".none").click(function(event){event.preventDefault();});
	
	$("a.articles").click(function(events){events.preventDefault();$("div.articles-wrapper").toggle();$(this).hide();});
})(window.jQuery);