	<?=$this->load->view('view_header')?>
	
	<h1>Ops!</h1>
	
	<?php 
		if(isset($error)):
			echo '<p>'.$error.'</p>';
		endif;
	?>

	<?=$this->load->view('view_footer')?>