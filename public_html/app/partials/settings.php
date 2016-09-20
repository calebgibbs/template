<?php 
	$this -> layout('master',[
		'title'=>'Settings', 
		'desc' => 'Manage website content' 

	]); 
?>
<div class="container">
	<h1>Site Managment</h1> 
	
	<h4>Hello, <?= $_SESSION['name'] ?></h4> 
	<h4>My Messages</h4> 
	<?php if($_SESSION['privilege'] == 'admin'): ?>
	<div id="site-users">
		<h4>Manage users</h4>  
		<table>
			<tr>
				<th>Name</th> 
				<th>Email</th> 
				<th>Privilege</th>
			</tr>  
			<?php $totalUsers = 0 ?> 
			<?php foreach($allUsers as $user):  ?> 
			<tr>
				<td><?= $user['name'] ?></td> 
				<td><?= $user['email'] ?></td> 
				<td><?= ucfirst($user['privilege']); ?></td> 
			</tr> 
			<?php $totalUsers++; ?>
			<?php endforeach ?>
		</table>  
		<p id="user-stats">There <?php if($totalUsers > 1){ 
				echo "are";
		} else { 
			echo "is";
		} ?> <?= $totalUsers ?> user
		<button type="button" class="btn btn-primary btn-xs" style="float: right;" data-toggle="modal" data-target="#registerModal" data-whatever="@mdo">Add User</button>
	</p>

	</div>  

	<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Register an account</h4>
      </div>
      
      <form id="register-form" method="post" action="index.php?page=settings">
      <div class="modal-body">
        
        <div class="form-group">
            <label for="reg-name" class="control-label">Name:</label>
            <input id="reg-name" name="reg-name" type="text" class="form-control">
            <span id="reg-name-msg"></span>
          </div>	
          <div class="form-group">
            <label for="reg-email" class="control-label">Email:</label>
            <input id="reg-email" name="reg-email" type="email" class="form-control">
            <span id="reg-email-msg"></span>
          </div> 
          <div class="form-group">
            <label for="conf-reg-email" class="control-label">Confirm Email:</label>
            <input id="conf-reg-email" name="conf-reg-email" type="email" class="form-control">
            <span id="conf-reg-email-msg"></span>
          </div>
          <div class="form-group">
            <label for="log-pwd" class="control-label">Privilege:</label>
            <select id="reg-privilege" class="form-control" name="reg-privilege">
				<option value="notSelected">User Privilege</option>
			  	<option value="photo-manager">Photo Manager Only</option>
			  	<option value="admin">Admin</option>
			</select> 
			<span id="reg-privilege-msg"></span>
          </div>
          <span id="login-message"></span>
    	<span id="reg-message"></span>
      </div> 
      <div class="modal-footer"> 
        <button id="reg-btn" name="register" type="submit" class="btn btn-primary">Log in</button>
      </div>
      </form> 

    </div>
  </div>
</div> 


	<?php endif; ?> 
</div>