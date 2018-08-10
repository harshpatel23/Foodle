<?php include 'templates/header.php' ?>
<?php include 'templates/navbar.php' ?>

<?php 
function addcss(){
	echo '<link rel="stylesheet" type="text/css" href="styles/forms.css">';
}
 ?>
	
	<form id="login-form">
		<div class="form-group">
			<label for="email">Email:</label>
			<input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="example@example.com">
			<label for="pwd">Password</label>
			<input type="password" class="form-control" id="pwd" placeholder="Min 8 characters">
			<button type="submit" class="btn btn-primary" style="font-size: 13px">Login</button>
			<button type="submit" class="btn btn-primary" style="font-size: 13px" formaction="signup.php">Sign up</button>
		</div>		
	</form>
<?php include 'templates/footer.php' ?>

