	<?php echo $this->load->view('view_header'); ?>
	<?php
		if(!$username):
	?>
	<h1>No exist user!</h1>
	
	<p class="error">Sorry, this user isn't here.</p>
	<?php
		else:
	?>
	<h1>My recent bookmarks <a href="feed/<?php echo $username; ?>/" title="RSS Feed"><img alt="RSS Feed" src="public/img/feed-icon-14x14.png" /></a></h1>
	
	<?php
            if($bookmarks):
	?>
	<ul class="list">
	<?php
			foreach($bookmarks as $str):
				echo '<li id="entry-'.$str->fldID.'">'.
					 '<div class="service"><a href="'.htmlspecialchars($str->fldServiceUrl).'" rel="external nofollow" title="'.$str->fldServiceName.'"><img alt="'.$str->fldServiceName.'" src="'.$str->fldServiceIconUrl.'" /></a></div>'.
					 '<div class="body">'.
					 '<p>'.
					 (
						$str->fldEntryType == 'message' || $str->fldServiceName == 'Twitter'
						?
					 	'&quot;<span id="eid-'.$str->fldEntryID.'">'.auto_link($str->fldTitle).'</span>&quot;'
						:
						'<a href="go/'.$str->fldEntryID.'" rel="external nofollow" title="'.$str->fldTitle.'">'.$str->fldTitle.'</a>'
					 ).
					 ' <a class="entry-permalink-me" href="http://friendfeed.com/e/'.$str->fldEntryID.'" rel="external nofollow" title="Permalik for this bookmark">Bookmarked <span style="text-transform: lowercase;">'.timespan(mysql_to_unix($str->fldDate), date('Y-m-d')).'</span> ago</a>'.
					 '</p>'.
					 '</div>'.
					 '</li>';
			endforeach;
	?>
	</ul>
	<?php		
		else:
	?>
	<p>Not found bookmark(s).</p>
	<?php
			endif;
		
		endif;
	?>
	
	<?php echo $this->load->view('view_footer'); ?>