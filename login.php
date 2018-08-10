<?php include 'templates/header.php' ?>
<?php include 'templates/navbar.php' ?>

<?php 
function addcss(){
	echo '<link rel="stylesheet" type="text/css" href="styles/forms.css">';
}
 ?>
	
	<form id="login-form" onsubmit="return validateform.()">
		<div class="form-group">
			<label for="email">Email:</label>
			<input type="email" class="form-control" id="email" aria-describedby="emailHelp" required="true" placeholder="example@example.com">
			<label for="pwd">Password</label>
			<input type="password" class="form-control" id="pwd" required="true" placeholder="Min 8 characters">
			<button type="submit" class="btn btn-primary" style="font-size: 13px">Login</button>
			<button type="button" class="btn btn-primary" style="font-size: 13px" formaction="signup.php">Sign up</button>
		</div>		
	</form>
<?php include 'templates/footer.php' ?>

