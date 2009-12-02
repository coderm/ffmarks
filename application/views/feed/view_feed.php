<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
<channel>
<atom:link href="http://ffmarks.com/feed/<?=$nickname?>/" rel="self" type="application/rss+xml" />
<atom:link rel="hub" href="http://pubsubhubbub.appspot.com" />
<title>Bookmarks of <?=$nickname?> - ffmarks</title>
<link>http://ffmarks.com/bookmarks/<?=$nickname?>/</link>
<language>en-US</language>
<description>
Bookmarks of <?=$nickname?>
</description>

<?php
	foreach($bookmarks as $str):
?>
    <item>
	    <title><?=$str->fldTitle?></title>
	    <!--<pubDate>{$objRSS->fldTarih|date_format:"%a, %e %b %Y"|replace:'  ':' '} {$objRSS->fldSaat|date_format:"%H:%M:%S"} +0200</pubDate>-->
	    <?php
			if($str->fldEntryType == 'message' || $str->fldServiceName == 'Twitter'):
		?>
		<guid isPermaLink="true">http://friendfeed.com/e/<?=$str->fldEntryID?></guid>
	    <link>http://friendfeed.com/e/<?=$str->fldEntryID?></link>
		<?php
			else:
		?>
		<guid isPermaLink="true"><?=$str->fldLink?></guid>
		<link><?=$str->fldLink?></link>
		<?php
			endif;
		?>
	    <comments><![CDATA[http://friendfeed.com/e/<?=$str->fldEntryID?>]]></comments>
    </item>
<?php
	endforeach;
?>

</channel>
</rss>