<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
<channel>
<atom:link href="http://ffmarks.com/blog/feed/" rel="self" type="application/rss+xml" />
<atom:link rel="hub" href="http://pubsubhubbub.appspot.com" />
<title>ffmarks Blog</title>
<link>http://ffmarks.com/blog/feed/</link>
<language>en-US</language>
<description>
ffmark's official blog.
</description>

<?php
	foreach($blog as $str):
?>
    <item>
    	<?php
			if(!empty($str->fldTitle)):
		?>
	    <title><?php echo $str->fldTitle; ?></title>
		<?php
			endif;
		?>
		<description><?php echo $str->fldBody; ?></description>
	    <!--<pubDate>{$objRSS->fldTarih|date_format:"%a, %e %b %Y"|replace:'  ':' '} {$objRSS->fldSaat|date_format:"%H:%M:%S"} +0200</pubDate>-->
		<guid isPermaLink="true">http://ffmarks.com/blog#entry-<?php echo $str->fldID; ?></guid>
		<link>http://ffmarks.com/blog#entry-<?php echo $str->fldID; ?></link>
    </item>
<?php
	endforeach;
?>

</channel>
</rss>