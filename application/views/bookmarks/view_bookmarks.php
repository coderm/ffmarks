	<?php echo $this->load->view('view_header'); ?>
	<?php
		if(!$user):
	?>
	<h1>No exist user!</h1>
	
	<p class="error">Sorry, this user isn't here.</p>
	<?php
		else:
	?>
	<h1>Bookmarks of <?php echo $nickname; ?> <a href="feed/<?php echo $nickname; ?>/" title="RSS Feed"><img alt="RSS Feed" src="public/img/feed-icon-14x14.png" /></a></h1>
	
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
					 '</p>'.
					 '<div class="info yuvarlak5">'.
					 '<a class="entry-permalink" href="http://friendfeed.com/e/'.$str->fldEntryID.'" rel="external nofollow" title="Permalik for this bookmark">Bookmarked <span style="text-transform: lowercase;">'.timespan(mysql_to_unix($str->fldDate), date('Y-m-d')).'</span> ago</a> - '.
					 '<a href="'.$str->fldUserProfileUrl.'" rel="external nofollow" title="'.$str->fldUserProfileName.'\'s FriendFeed profile">'.$str->fldUserProfileName.'</a> - '.
					 (
					 	$this->session->userdata('id') && ($str->fldServiceName == 'delicious' || $str->fldServiceName == 'Google Reader') ?
					 		'<a href="offline/'.$str->fldEntryID.'/">Read offline</a> - ' : ''
					 ).
					 (
						$str->fldEntryType == 'message' || $str->fldServiceName == 'Twitter'
						?
						'<a href="javascript:void(0)" onclick="translate(\'eid-'.$str->fldEntryID.'\', \'tr\')" title="Translate this entry">Translate</a>'
					 	:
					 	'<a href="http://translate.google.com/translate?js=n&amp;prev=_t&amp;hl=en&amp;ie=UTF-8&amp;u='.$str->fldLink.'" rel="external nofollow" title="Translate this entry">Translate</a>'
					 ).
					 (
					 	$str->fldServiceName == 'Twitter'
						?
						' - <a href="'.$str->fldLink.'" rel="external nofollow" title="View in twitter">View in twitter</a>'
						:
						''				 
					 ).
					 //' - <a href="http://friendfeed.com/e/'.$str->fldEntryID.'" rel="external nofollow" title="Permalik for this bookmark">Permalink</a>'.
					 (
					 	$sid == $str->fldUserID ? ' - <a class="btn_delete" href="bookmarks/delete/'.$str->fldID.'" title="Delete">Delete</a>' : ''
					 ).
					 '</div>'.
					 '</div>'.
					 '</li>';
			endforeach;
	?>
	</ul>
	<?php
			echo '<div style="text-align: center;">'.
				 $this->pagination->create_links().
				 '</div>';
		
		else:
	?>
	<p>Not found bookmark(s).</p>
	<?php
			endif;
		
		endif;
	?>
	
	<?php echo $this->load->view('view_footer'); ?>