	
	<?=$this->load->view('view_header')?>

	<h1>Blog <a href="blog/feed/" title="RSS Feed"><img alt="RSS Feed" src="public/img/feed-icon-14x14.png" /></a></h1>
	
	<?php
		if($blog):
	?>
	<ul class="list">
	<?php
		foreach($blog as $str):
	?>
		<li id="entry-<?=$str->fldID?>">
			
			<p><?=(!empty($str->fldTitle) ? '<strong>'.$str->fldTitle.'</strong> — ' : '')?><?=$str->fldBody?></p>
			<div class="entry-info">
				Added <?=timespan(mysql_to_unix($str->fldDate), time())?> ago. - 
				<a href="blog#entry-<?=$str->fldID?>">Permalink</a>
			</div>
		</li>
	<?php
		endforeach;
	?>
	</ul>
	<?php
		else:
	?>
	<p>Not found record(s).</p>
	<?php
		endif;
	?>
	
	<?=$this->load->view('view_footer')?>