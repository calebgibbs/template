<?php 
	$this -> layout('master',[
		'title'=>'Settings', 
		'desc' => 'Manage website content' 

	]); 
?>
<div class="container">
	<h1>Site Managment</h1> 
	<?= $this->insert('settingsNav') ?>
</div>