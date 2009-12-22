	
	<?php echo $this->load->view('view_header'); ?>

	<h1>Welcome to ffmarks!</h1>
	
	<p style="margin-bottom: 10px;"><img alt="Bookmark button" class="image" src="public/img/help/bookmark.png?v=20090811" /></p>
	
	<p class="text">
		<a href="about" title="About ffmarks">ffmarks</a> is a <a href="about" rel="external nofollow" title="FriendFeed">FriendFeed</a> tool that bookmarks your loved posts.
	</p>
	
	<h2 class="margin">How can I use?</h2>
	
	<ul class="list-normal left-margin">
		<li>Install the <a href="https://addons.mozilla.org/en-US/firefox/addon/748" rel="external nofollow" title="Greasemonkey">Greasemonkey</a> plugin.</li>
		<li>Install the <a href="public/js/userscript/ffmarks.user.js" title="ffmarks greasemonkey script">ffmarks</a> script.</li>
		
	</ul>
	
	<h2 class="margin">Recent users</h2>
	
	<ul class="list-normal left-margin">
		<li>
		<?php
			foreach($users as $str):
				echo '<a href="bookmarks/'.$str->fldUsername.'" title="Bookmarks of '.$str->fldUsername.'"><img alt="Bookmarks of '.$str->fldUsername.'" src="http://friendfeed-api.com/v2/picture/'.$str->fldUsername.'?size=medium" style="border: 1px solid #c4c4c4;" /></a> ';
			endforeach;
		?>
		</li>
	</ul>
	
	<?php echo $this->load->view('view_footer'); ?>