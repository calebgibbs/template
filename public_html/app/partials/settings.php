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
				<th>Account Status</th>
			</tr>  
			<?php $totalUsers = 0 ?> 
			<?php foreach($allUsers as $user):  ?> 
			<?php if ($user['privilege'] == "admin"): ?>
			
			<tr>
				<td><?= $user['name'] ?></td> 
				<td><?= $user['email'] ?></td> 
				<td>
					<?= ucfirst($user['privilege']); ?>  
					<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#change-modal<?= $user['id'] ?>" style="float: right">Change</button>
				</td> 
					<div class="modal fade bs-example-modal-sm" id="change-modal<?= $user['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="exampleModalLabel">Change <?=$user['name']?>'s privilege</h4>
								</div>
								<div class="modal-body">
									<form method="post" action="index.php?page=settings">
										<div class="form-group">
											<select name="new-class" class="form-control changePriv">
												<option value="admin<?= $user['id'] ?>">Admin</option> 
												<option value="photo-manager<?= $user['id'] ?>">Photo Manager</option>
											</select> 
										</div> 
										<div class="form-group">
											<label for="admin-pwd">Please enter your password to confirm</label> 
											<input name="changePrivPwd" type="password" class="form-control admin-pwd"> 
											<span class="changePrive-msg"></span>
										</div>        
										<div class="modal-footer"> 
										<button name="changePrivilege" type="submit" class="btn btn-primary changePrivilegeBtn">Change Privilege</button>      </div> 
									</form>
								</div>
							</div>
						</div> 
					</div> 
				<td>
					<?= ucfirst($user['status']); ?> 
					<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete-modal<?= $user['id'] ?>" style="float: right">Delete</button>
				</td> 
					<div class="modal fade bs-example-modal-sm" id="delete-modal<?= $user['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="exampleModalLabel">Are you sure you want to delete <?= $user['name'] ?>'s account?</h4>
								</div>
								<div class="modal-body">
									<form method="post" action="index.php?page=settings">
										<div class="form-group">
											<select class="form-control deleteOption">
												<option value="no">No</option> 
												<option value="yes">Yes</option>
											</select> 
											<span class="delete-message"></span>
										</div>  
										<div class="form-group">
											<label for="admin-pwd">Please enter your password to confirm</label> 
											<input id="" type="password" class="form-control admin-pwd">
											<span class="changePrive-msg"></span>
										</div>
										<span class="del-frm-msg"></span>
										<div class="modal-footer"> 
											<button name="delete<?= $user['id'] ?>" type="submit" class="btn btn-danger delete-button">Delete Account</button>	 
										</div> 

									</form>
								</div>
							</div>
						</div> 
					</div>
			</tr>  
			<?php $totalUsers++; ?> 
			<?php endif ?> 
			<?php endforeach ?>
			<?php foreach($allUsers as $user):  ?> 
			<?php if ($user['privilege'] == "photo-manager"): ?>
			<tr>
				<td><?= $user['name'] ?></td> 
				<td><?= $user['email'] ?></td> 
				<td>
					<?= ucfirst($user['privilege']); ?>  
					<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#change-modal<?= $user['id'] ?>" style="float: right">Change</button>
				</td> 
					<div class="modal fade bs-example-modal-sm" id="change-modal<?= $user['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="exampleModalLabel">Change <?=$user['name']?>'s privilege</h4>
								</div>
								<div class="modal-body">
									<form method="post" action="index.php?page=settings">
										<div class="form-group">
											<select class="form-control changePriv">
												<option value="admin<?= $user['id'] ?>">Admin</option> 
												<option value="photo-manager<?= $user['id'] ?>">Photo Manager</option>
											</select> 
										</div> 
										<div class="form-group">
											<label for="admin-pwd">Please enter your password to confirm</label> 
											<input  type="password" class="form-control admin-pwd"> 
											<span class="changePrive-msg"></span>
										</div>        
										<div class="modal-footer"> 
										<button name="changePrivilege" type="submit" class="btn btn-primary changePrivilegeBtn">Change Privilege</button>      </div> 
									</form>
								</div>
							</div>
						</div> 
					</div> 
				<td>
					<?= ucfirst($user['status']); ?> 
					<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete-modal<?= $user['id'] ?>" style="float: right">Delete</button>
				</td> 
					<div class="modal fade bs-example-modal-sm" id="delete-modal<?= $user['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="exampleModalLabel">Are you sure you want to delete <?= $user['name'] ?>'s account?</h4>
								</div>
								<div class="modal-body">
									<form method="post" action="index.php?page=settings">
										<div class="form-group">
											<select class="form-control deleteOption">
												<option value="no">No</option> 
												<option value="yes">Yes</option>
											</select> 
											<span class="delete-message"></span>
										</div>  
										<div class="form-group">
											<label for="admin-pwd">Please enter your password to confirm</label> 
											<input id="" type="password" class="form-control admin-pwd">
											<span class="changePrive-msg"></span>
										</div>
										<span class="del-frm-msg"></span>
										<div class="modal-footer"> 
											<button name="delete<?= $user['id'] ?>" type="submit" class="btn btn-danger delete-button">Delete Account</button>	 
										</div> 

									</form>
								</div>
							</div>
						</div> 
					</div>
			</tr>
			<?php endif ?>
			<?php endforeach ?>
		</table>  
		<p id="user-stats">There <?php if($totalUsers > 1){ 
				echo "are";
		} else { 
			echo "is";
		} ?> <?= $totalUsers ?> users
		<button type="button" class="btn btn-success btn-xs" style="float: right;" data-toggle="modal" data-target="#registerModal" data-whatever="@mdo">Add User</button>
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
          <div class="form-group">
          	<label for="log-pwd" class="control-label">Tempeory Password:</label> 
          	<span><p>12345678</p></span>
          </div>
          <span id="login-message"></span>
    	<span id="reg-message"></span>
      </div> 
      <div class="modal-footer"> 
        <button id="reg-btn" name="register" type="submit" class="btn btn-primary">Create Account</button>
      </div>
      </form> 

    </div>
  </div>
</div> 


	<?php endif; ?> 
</div>