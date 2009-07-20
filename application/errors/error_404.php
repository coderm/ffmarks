<?php header("HTTP/1.1 404 Not Found"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<title>404 Page Not Found</title>
<style type="text/css">
	.clear:after {
		content: ""; display: block; height: 0; clear: both; visibility: hidden;
	}
	body {
		background-color: #fff; color: #434343; font: normal 14px arial, sans-serif; margin: 40px;
	}
	a {
		color: #666;
	}
	#content  {
	
	}
	#message  {
		background-color: #EFF7FF; border: 1px solid #DFEEFF; margin-top: 15px; padding: 15px;
	}
	h1 {
		font: bold 20px arial, sans-serif; margin: 0 0 15px 0;
	}
</style>
</head>
<body>
	<div id="content">
		<div class="clear">
			<img alt="ffmarks" src="public/img/logo-new.png" style="float: left; margin-right: 25px;" />
			<div style="line-height: 41px;">
				<a href="javascript:history.back(-1)">&laquo; Return back</a>
			</div>
		</div>
		<div id="message">
			<h1><?php echo $heading; ?></h1>
			<?php echo $message; ?>			
		</div>
	</div>
</body>
</html>