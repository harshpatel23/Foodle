<?php 
	session_start();
	include 'templates/header.php';
	include 'templates/navbar.php';

	function addcss()
	{
		echo '<link rel="stylesheet" type="text/css" href="styles/login.css">';
	}
 

 ?>
			

	<div class="form-group mx-auto text-center" style="width: 600px">
	<form class="form-signin" id="login-form" method="post">
		<img class="mx-auto d-block" src="images/Foodle.png" alt="logo" width="200" height=auto>
		<h1 class="h3 mb-3 font-weight-normal">Please sign in to continue</h1>
			<div class="form-group">
			  <input type="text" class="form-control"  placeholder="Enter username" style="font-size:13px" name="usrname" id="usrname" required 
			  <?php 
 				if(isset($_SESSION['error'])){
					if($_SESSION['error']=='password'){
						echo "value='";
						echo $_SESSION['temp'];
						echo "'";
					}
				}
				else{
					echo 'autofocus';
				}
			   ?>
			  >
			</div>

			<?php 
			if(isset($_SESSION['error'])){
				if($_SESSION['error']=='username')
					echo '<p style="color: red">Invalid username!</p>';	

			} ?>
			
			<div class="form-group">
			  <input type="password" class="form-control" name="pwd" placeholder="Enter password" style="font-size:13px" required>
			</div>

			<?php 
			if(isset($_SESSION['error'])){
				if($_SESSION['error']=='password')
					echo '<p style="color: red">Invalid password!</p>';
				unset($_SESSION['error']);
				unset($_SESSION['temp']);
			} ?>

			<div class="checkbox">
			  <label><input type="checkbox" value="" checked>Remember me</label>
			</div>
		  	<button type="submit" class="btn btn-primary btn-block" style="font-size:inherit; margin:auto;" formaction="loginchk.php"><span class="glyphicon glyphicon-off"></span> Login</button>
		  	<div id="foot" style="padding: 15px">
		  	<a href="" style="float: left">Forgot password</a>
		  	<span style="float: right">New user? <a href="signup.php">Sign up</a></span>
		  	</div>
		  </form>
		  </div>

<?php include 'templates/footer.php'; ?>
