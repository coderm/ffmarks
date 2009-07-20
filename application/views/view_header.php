<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<title><?=(!empty($title) ? $title.' | ' : '').$this->config->item('title')?></title>
<meta content="text/html; charset=utf-8" />
<base href="<?=base_url()?>" />
<?php if(isset($feed)): ?>
<link rel="alternate" type="application/rss+xml" title="<?=$feed_title?>" href="<?=$feed_url?>" />
<?php endif; ?>
<link rel="stylesheet" href="<?=base_url()?>public/style/screen.css" type="text/css" media="screen" />
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript">
	google.load("jquery", "1.3.2");
	google.load("language", "1");
</script>
<script type="text/javascript" src="public/js/core.js"></script>
</head>
<body>
	<div id="ust" class="clear">
		<div class="sinirlayici">
			<?php
				if($this->session->userdata('id')):
			?>
			<div class="clear" id="kullanici">
				<div style="float: left; padding-right: 8px;">
					<a href="http://friendfeed.com/<?=$this->session->userdata('nickname')?>" title="<?=$this->session->userdata('nickname')?>'s FriendFeed"><img alt="<?=$this->session->userdata('nickname')?>" src="<?='http://i.friendfeed.com/p-'.str_replace('-', '', $this->session->userdata('id')).'-small-1'?>" style="border: 1px solid #c4c4c4;" /></a>
				</div>
				<div style="line-height: 27px;">
					<a href="http://friendfeed.com/<?=$this->session->userdata('nickname')?>" title="<?=$this->session->userdata('nickname')?>'s FriendFeed" class="kullanici"><?=$this->session->userdata('nickname')?></a>
					(<a href="login/out" title="Logout">Logout</a>)
				</div>
			</div>
			<?php
				endif;
			?>
			<div id="logo"><a href="<?=base_url()?>" title="ffmarks"><img src="public/img/logo-new.png" alt="ffmarks" /></a></div>
			<ul id="nav">
				<?php
					if($this->session->userdata('id')):
				?>
				<li><?=anchor('bookmarks/'.$this->session->userdata('nickname'), 'Bookmarks');?></li>
				<li><a href="settings" title="Settings">Settings</a></li>
				<?php
					endif;
				?>
				<li><a class="silik" href="help" title="Help">Help</a></li>
				<li><a class="silik" href="about" title="About">About</a></li>
				<li><a class="silik" href="blog" title="Blog">Blog</a></li>
			</ul>
		</div>
	</div>
	
	<div id="orta">
		<div style="border-top: 3px solid #EFF7FF;  padding: 20px 0;">
			<div class="clear sinirlayici">
				<p class="uyari">ffmarks is currently beta.</p>
				<?php
					if(!$this->session->userdata('id')):
				?>
				<div id="sag" class="yuvarlak">
					<h2>Login</h2>
					<form action="<?=base_url()?>login" method="post">
						<fieldset>
							<label>
								<span>Username</span>
								<input type="text" name="nickname" style="width: 190px; w\idth: 182px;" value="" />
							</label>
							<label>
								<span>Remote key <span style="font-size: 11px;">(<a href="http://friendfeed.com/remotekey" rel="external">Find your key</a>)</span></span>
								<input type="text" name="remotekey" style="width: 190px; w\idth: 182px;" value="" />
							</label>			
							<input class="submit" name="login_check" title="Login" type="submit" value="Authorize" />
						</fieldset>
					</form>
				</div>
				<?php
					endif;
				?>
				
				<div style="margin-right: 275px;">
