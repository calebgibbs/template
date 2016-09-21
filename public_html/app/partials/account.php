<?php 
	$this -> layout('master',[
		'title'=>'Account', 
		'desc' => 'View or change your account settings' 

	]); 
?>
<div class="container">
	
	<div>
		<h1>Change password</h1> 
		<?= $_SESSION['status'] ?> 
		<form name="activate" method="post" action="index.php?page=account"> 
			<div class="form-group">
				<label for="new-pwd" class="control-label">Confirm Password</label>
				<input id="new-pwd" name="new-pwd" type="password" class="form-control">
			</div> 
			<div class="form-group">
				<label for="conf-pwd" class="control-label">Confirm Password</label>
				<input id="conf-pwd" name="conf-pwd" type="password" class="form-control">
			</div>  
			<button name="activate" type="submit" class="btn btn-primary">Change Password</button>
		</form>
	</div> 
	
</div>