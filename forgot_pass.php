<?php 
	session_start();
	include 'templates/header.php';
	include 'templates/navbar.php';

	function addcss()
	{
		echo '<link rel="stylesheet" type="text/css" href="styles/contact.css">';
	}
 ?>
			
	<div class="form-group mx-auto text-center" style="width: 600px">
	<form class="form-signin" id="contact-form" method="post">
		<img class="mx-auto d-block" src="images/Foodle.png" alt="logo" width="200" height=auto>
		<h1 class="h3 mb-3 font-weight-normal">Password will be sent to your mobile</h1>
			<div class="form-group">
			  <input type="text" class="form-control"  placeholder="Enter Username" style="font-size:13px;margin-bottom:10px;" name="username" id="username" required autofocus>
                <input type="text" class="form-control"  placeholder="Enter Contact" style="font-size:13px;margin-bottom:10px;" name="contact" id="contact" required autofocus>
			</div>
		<button type="submit" class="btn btn-primary" style="font-size:inherit; margin-bottom:5px; margin-top:5px; width:130px" formaction="send-pass.php"> Send Password</button>
		  	
		  </form>
		  </div>

<?php include 'templates/footer.php'; ?>
