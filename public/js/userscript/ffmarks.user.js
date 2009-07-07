// ==UserScript==
// @name           ffmarks
// @namespace      http://www.ffmarks.com/
// @author         Berker Peksag
// @description    a bookmark script for ffmarks
// @include        http://friendfeed.com/*
// @include        https://friendfeed.com/*
// ==/UserScript==

$ = unsafeWindow.jQuery;

$_uid = $("div.name a.l_profile").attr("sid");

$_comments = $("div.info .l_comment");

if($_comments.length) {
	$_comments.each(function(){
		$(this).after(' - <a href="#" class="l_bookmark">Bookmark</a>');
	});
	
	$("a.l_bookmark").each(function(){
		var $t = $(this);
		$t.click(function(){
			$_eid = $t.parent(".info").parent(".body").parent(".l_entry").attr("eid");
			$.ajax({
				dataType: 'jsonp',
				data: 'eid=' + $_eid + '&uid=' + $_uid,
				jsonp: 'jsonp_callback',
				url: 'http://ffmarks.com/add',
				success: function(strResponse){
					$t.after("<em>" + strResponse.message + "</em>");
					$t.remove();
				}
			});
			return false;
		});
	});
}