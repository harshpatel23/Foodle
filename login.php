<?php include 'templates/header.php' ?>
<?php include 'templates/navbar.php' ?>
	<div class=login>
	<form>
		LOGIN!<br>
		<label for="username"><b>Username</b></label>
		<input type="text" name="username" placeholder = "Enter Username"><br>
		<label for="password"><b>Email</b></label>
		<input type="password" name="password" placeholder = "Enter Password"><br>
		<button name = "Login">Login</button>
		<button name = "Signup" formaction="signup.php">Signup</button>
	</form></div>
<?php include 'templates/footer.php' ?>

