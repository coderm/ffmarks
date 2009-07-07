	<?=$this->load->view('view_header')?>

	<h1>Bookmarks of <?=$nickname?> <a href="feed/<?=$nickname?>/" title="RSS Feed"><img alt="RSS Feed" src="public/img/feed-icon-14x14.png" /></a></h1>
	
	<?php
		if($bookmarks):
	?>
	<ul class="list">
	<?php
		foreach($bookmarks as $str):
			echo '<li>'.
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
				 '<span style="color: #858585;">Bookmarked <span style="text-transform: lowercase;">'.timespan(mysql_to_unix($str->fldDate), date('Y-m-d')).'</span> ago</span> - '.
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
				 ' - <a href="http://friendfeed.com/e/'.$str->fldEntryID.'" rel="external nofollow" title="Permalik for this bookmark">Permalink</a>'.
				 '</div>'.
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
	?>
	
	<?=$this->load->view('view_footer')?>