<?php 
    $this -> layout('master',[
        'title'=>'Contact', 
        'desc' => 'Get in touch with us' 

    ]); 
?>
<div class="container">
				<h1 class="page-header">Contact<span class="desktop"> Us</span></h1>
				<div class="row">
				<div class="col-md-4">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				</div> 
				<div class="col-md-8">
					<div id="contact-form">
						<form id="contact-form" method="post" action="test.php" class="form-horizontal">
							
							<div class="form-group">
								<label for="name" class="col-sm-2 control-label">Name: </label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="name" placeholder="Your Name" aria-describedby="inputSuccess2Status"> 
									<span id="name-error"></span>
								</div>
							</div> 

							<div class="form-group">
								<label for="phone" class="col-sm-2 control-label">Phone: </label>
								<div class="col-sm-10">
									<input type="tel" class="form-control" id="phone" placeholder="Your Phone number"> 
									<span id="phone-error"></span>
								</div>
							</div>

							<div class="form-group">
								<label for="email" class="col-sm-2 control-label">Email: </label>
								<div class="col-sm-10">
									<input type="email" class="form-control" id="email" placeholder="Your Email"> 
									<span id="email-error"></span>
								</div>
							</div>  

							<div class="form-group">
								<label for="message" class="col-sm-2 control-label">Message: </label>
								<div class="col-sm-10">
									<textarea class="form-control" rows="5" id="message" placeholder="Your Message"></textarea> 
									<span id="message-error"></span>
								</div>
							</div>	
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-default">Send</button>
								</div>
							</div>
						</form>
					</div>	
				</div>
			</div>
			</div>