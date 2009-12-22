<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<title><?php echo (!empty($title) ? $title.' | ' : '').$this->config->item('title'); ?></title>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
<base href="<?php echo base_url(); ?>" />
<?php if(isset($feed)): ?>
<link rel="alternate" type="application/rss+xml" title="<?php echo $feed_title; ?>" href="<?php echo $feed_url;?>" />
<?php endif; ?>
<link rel="stylesheet" href="<?php echo base_url();?>public/style/screen.css?v=20090811" type="text/css" media="screen" />
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript">
	google.load("jquery", "1.3.2");
	google.load("language", "1");
</script>
<script type="text/javascript" src="public/js/core.js?v=20090811"></script>
</head>
<body>
	<div id="ust" class="clear">
		<div class="sinirlayici">
			<?php
				if($this->session->userdata('id')):
			?>
			<div class="clear" id="kullanici">
				<div style="float: left; padding-right: 8px;">
					<a href="http://friendfeed.com/<?php echo $this->session->userdata('nickname'); ?>" title="<?php echo $this->session->userdata('nickname'); ?>'s FriendFeed"><img alt="<?php echo $this->session->userdata('nickname'); ?>" src="<?php echo 'http://i.friendfeed.com/p-'.str_replace('-', '', $this->session->userdata('id')).'-small-1'?>" style="border: 1px solid #c4c4c4;" /></a>
				</div>
				<div style="line-height: 27px;">
					<a href="http://friendfeed.com/<?php echo $this->session->userdata('nickname'); ?>" title="<?php echo $this->session->userdata('nickname'); ?>'s FriendFeed" class="kullanici"><?php echo $this->session->userdata('nickname'); ?></a>
					(<a href="login/out" title="Logout">Logout</a>)
				</div>
			</div>
			<?php
				endif;
			?>
			<div id="logo"><a href="<?php echo base_url(); ?>" title="ffmarks"><img src="public/img/logo-new.png" alt="ffmarks" /></a></div>
			<ul id="nav">
				<?php
					if($this->session->userdata('id')):
				?>
				<li><?php echo anchor('bookmarks/'.$this->session->userdata('nickname'), 'Bookmarks'); ?></li>
				<li><a href="offline" title="Offline">Offline</a></li>
				<li><a href="settings" title="Settings">Settings</a></li>
				<?php
					endif;
				?>
				<li><a class="silik" href="tools" title="Tools">Tools</a></li>
				<li><a class="silik" href="help" title="Help">Help</a></li>
				<li><a class="silik" href="about" title="About">About</a></li>
				<li><a class="silik" href="blog" title="Blog">Blog</a></li>
			</ul>
		</div>
	</div>
	
	<div id="orta">
		<div style="padding: 20px 0;">
			<div class="clear sinirlayici yuvarlak10" style="background-color: #fff; padding: 20px;">
				<div id="sag">
				<?php
					if(!$this->session->userdata('id')):
				?>
				<div class="sag-kutu yuvarlak">
					<h2>Login</h2>
					<form action="<?php echo base_url(); ?>login" method="post">
						<fieldset>
							<label>
								<span>Username</span>
								<input type="text" name="nickname" style="width: 190px; w\idth: 182px;" value="" />
							</label>
							<label>
								<span>Remote key <span style="font-size: 11px;">(<a href="http://friendfeed.com/remotekey" rel="external">Find your key</a>)</span></span>
								<input type="password" name="remotekey" style="width: 190px; w\idth: 182px;" value="" />
							</label>			
							<input class="submit" name="login_check" title="Login" type="submit" value="Authorize" />
						</fieldset>
					</form>
				</div>
				<?php
					else:
						
						$bookmarks = $this->Main_model->get_last_bookmarks();
						
						$users = $this->Bookmarks_model->get_new_users();
				?>
				<div class="sag-kutu yuvarlak">
					<h2>Recent bookmarks</h2>
					<ul>
					<?php
						foreach($bookmarks as $str):
							echo '<li><a href="go/'.$str->fldEntryID.'" title="'.$str->fldTitle.'">'.$str->fldTitle.'</a></li>';
						endforeach;
					?>
					</ul>
				</div>
				
				<div class="sag-kutu yuvarlak">
					<h2>Recent users</h2>
					<?php
						foreach($users as $str):
							echo '<a href="bookmarks/'.$str->fldUsername.'" title="Bookmarks of '.$str->fldUsername.'"><img alt="Bookmarks of '.$str->fldUsername.'" src="http://friendfeed-api.com/v2/picture/'.$str->fldUsername.'?size=small" style="border: 1px solid #c4c4c4;" /></a> ';
						endforeach;
					?>
				</div>
				
				<?php		
						if(!isset($is_blog)):
							
							$blogs = $this->Main_model->get_last_blogs();
				?>
				<div class="sag-kutu yuvarlak">
					<h2>Blog <a href="blog/feed/" title="RSS Feed"><img alt="RSS Feed" src="public/img/feed-icon-14x14.png" /></a></h2>
					<ul>
					<?php
						foreach($blogs as $str):
							echo '<li><a href="blog#entry-'.$str->fldID.'" title="'.$str->fldTitle.'">'.$str->fldTitle.'</a></li>';
						endforeach;
					?>
					</ul>
				</div>
				<?php
						endif;
				?>
				
				<?php
					endif;
				?>
				</div>
				
				<div style="margin-right: 275px;">
