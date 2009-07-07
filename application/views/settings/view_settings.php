	
	<?=$this->load->view('view_header')?>

	<h1>Settings</h1>
	
	<form action="?" method="post">
		<fieldset class="settings">
			<label>
				<span>Public bookmarks <em>&#8212; Yerimlerinizi kimlerin görüntüleyebileceğini belirlemenize yarar.</em></span>
				<input type="radio" name="frmPublic" value="1" /> Yes
				<input type="radio" name="frmPublic" value="0" /> No
			</label>
			<label>
				<span>Translate language <em>&#8212; Yerimlerinize eklediğiniz girdilerin varsayılan olarak hangi dile çevrileceğini belirlemeye yarar.</em></span>
				<select name="frmLanguage">
					<option selected="selected" value="tr">Turkish</option>
				</select>
			</label>
			<div style="padding-top: 10px; text-align: center;">
				<button title="Update your settings" type="submit">Update</button> or <a href="<?=$this->agent->referrer()?>" title="Go back...">go back</a>
			</div>
		</fieldset>
	</form>
	
	<?=$this->load->view('view_footer')?>