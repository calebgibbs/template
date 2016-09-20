<?php $page = isset($_GET['page']) ? $_GET['page'] : 'home'; ?>
<nav> 
				<span class="mobile-menu">
					<a href="index.html"><img class="mobile-logo" src="http://placehold.it/50x50"></a> 
					<span id="hamburger" class="glyphicon glyphicon-menu-hamburger"></span>
				</span>
				<span id="menu-text">
					<ul> 
						<li class="desktop-logo"><a href="index.php?page=home"><img src="http://placehold.it/50x50"></a></li>
						<span class="list-items">
						<li><a href="index.php?page=home" <?php if($page=='home'): ?>class="current"<?php endif; ?>>Home</a></li>
						<li><a href="index.php?page=gallery" <?php if($page=='gallery'): ?>class="current"<?php endif; ?>><span class="desktop">Photo </span>Gallery</a></li>
						<li><a href="index.php?page=contact" <?php if($page=='contact'): ?>class="current"<?php endif; ?>>Contact<span class="desktop"> us</span></a></li>
						<?php if(isset($_SESSION['id'])): ?>
						<li><a href="index.php?page=settings" <?php if($page=='settings'): ?>class="current"<?php endif; ?>>Site Managment</a></li>
						<?php endif; ?>
						</span>
					</ul>
				</span>
			</nav>