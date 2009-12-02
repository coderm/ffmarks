<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<title><?=$title.' | '.$this->config->item('title')?></title>
<meta content="text/html; charset=utf-8" />
<base href="<?=base_url()?>" />
<link rel="stylesheet" href="<?=base_url()?>public/style/screen-top.css" type="text/css" media="screen" />
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript">
	google.load("jquery", "1.3.2");
</script>
<script type="text/javascript" src="public/js/jquery.jformtip-0.1.min.js"></script>
<script type="text/javascript">
	$(function() {
		$('input').jFormtip();
	});
</script>
</head>
<body>
	
	<div id="content">
		<div id="logo"><a href="<?=base_url()?>" target="_parent" title="Return to ffmarks"><img src="public/img/logo-new.png" alt="Return to ffmarks" /></a></div>
		
		<div id="entry">
			<div style="float: right;">
				<a href="#" target="_parent">Remove frame</a>
			</div>
			<h1><a href="#" title="Go to FriendFeed entry this post">Google Translate Bookmarklet</a></h1>
			<span id="like"><a href="#" title="Like">Like</a></span> - <a href="#" title="Read offline">Read offline</a> - <a href="#" title="Translate">Translate</a> - <a href="#" target="_parent" title="Permalink">Permalink</a>
			<div id="comment">
				<form action="?" method="post">
					<input type="text" name="frmComment" title="Type your comment here..." value="" />
					<button type="submit">Post</button>
				</form>
			</div>
		</div>
	</div>

</body>
</html>