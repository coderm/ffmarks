	<?php echo $this->load->view('view_header'); ?>
	
	<h1>Ops!</h1>
	
	<?php 
		if(isset($error)):
			echo '<p>'.$error.'</p>';
		else:
			echo '<p>Please login.</p>';
		endif;
	?>

	<?php echo $this->load->view('view_footer'); ?>