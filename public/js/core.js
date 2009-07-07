/*(function(A) {
	A.fn.ilkTest = function(B) {
		alert(B);
	}
	
	ui = {
		init: function(C) {
			//C.fn.ilkTest('berker');
		}
	};
	
	ui.init(A);
})(jQuery);*/

function translate(eid, lang) {
	var o = document.getElementById(eid);
	var text = o.innerHTML;
	//alert(text);
	google.language.detect(text, function(result) {
    	if (!result.error) {
      		var langCode = result.language;
			//alert(langCode);
  			google.language.translate(text, langCode, lang, function(result) {
    			if (result.translation) {
					//alert(result.translation);
					o.setAttribute('style', 'background-color: #feffbf;');
      				o.innerHTML = '<strong>Translated: </strong>' + result.translation;
    			}
  			});
		}
	});		
}

$(function() {
	$(".yuvarlak").each(function() {
		$(this).css({ "border-radius": "7px", "-moz-border-radius": "7px", "-webkit-border-radius": "7px", "-khtml-border-radius": "7px" });
	});
	
	$(".yuvarlak5").each(function() {
		$(this).css({ "border-radius": "4px", "-moz-border-radius": "4px", "-webkit-border-radius": "4px", "-khtml-border-radius": "4px" });
	});
	
	$("a[rel*='external']").each(function(){
		$(this).click(function() {
			window.open(this.href); return false;
		});
	});
});