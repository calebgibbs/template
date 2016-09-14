<nav> 
				<span class="mobile-menu">
					<a href="index.html"><img class="mobile-logo" src="http://placehold.it/50x50"></a> 
					<span id="hamburger" class="glyphicon glyphicon-menu-hamburger"></span>
				</span>
				<span id="menu-text">
					<ul> 
						<li class="desktop-logo"><a href="index.php?page=home"><img src="http://placehold.it/50x50"></a></li>
						<span class="list-items">
						<li><a href="index.php?page=home">Home</a></li>
						<li><a href="index.php?page=gallery"><span class="desktop">Photo </span>Gallery</a></li>
						<li><a href="index.php?page=contact">Contact<span class="desktop"> us</span></a></li>
						<?php if(isset($_SESSION['id'])): ?>
						<li><a href="">Site Managment</a></li>
						<?php endif; ?>
						</span>
					</ul>
				</span>
			</nav>