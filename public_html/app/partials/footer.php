<footer class="footer">This is the footer 
        <span class="mobile-hidden"> 
        <?php if(!isset($_SESSION['id'])): ?>
        <button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
        	Log in
        </button> 
        <?php endif; ?> 
        <?php if(isset($_SESSION['id'])): ?>
        <a href="index.php?page=logout">Log out</a>
        <?php endif; ?>
    </span> 
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Log In</h4>
      </div>
      
      <form id="login-form" method="post" action="index.php?page=settings">
      <div class="modal-body">
        
          <div class="form-group">
            <label for="log-email" class="control-label">Email:</label>
            <input id="log-email" name="login-email" type="text" class="form-control">
            <span id="log-email-msg"></span>
          </div>
          <div class="form-group">
            <label for="log-pwd" class="control-label">Password:</label>
            <input name="log-password" id="log-pwd" type="password" class="form-control">
            <span id="log-pwd-msg"></span>
          </div>
        
      </div> 

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button name="login" type="submit" class="btn btn-primary">Log in</button>
      </div>
      </form>
    </div>
  </div>
</div>
    </footer>