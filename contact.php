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
		<h1 class="h3 mb-3 font-weight-normal">Please provide your mobile number</h1>
			<div class="form-group">
			  <input type="text" class="form-control"  placeholder="Enter contact" style="font-size:13px" name="contact" id="contact" required
                <?php 
 				if(isset($_SESSION['otp'])){	
				    echo "value='";
				    echo $_SESSION['contact'];
				    echo "'";
				}
				else{
					echo 'autofocus';
				}
			   ?>>
			</div>
		<?php 
		if(!isset($_SESSION['otp'])){
			echo '<button type="submit" class="btn btn-primary btn-block" style="font-size:inherit; margin:auto;" formaction="send-otp.php"><span class="glyphicon glyphicon-off"></span> Send OTP</button>';
		}
		?>
		<?php     
                if(isset($_SESSION['otp-error']) && $_SESSION['otp-error'] == True)
                echo '<p style="color: red">Invaid OTP</p>';
 				if(isset($_SESSION['otp'])){
					echo '<div class="form-group">
			  <input type="text" class="form-control" name="otp" placeholder="Enter OTP" style="font-size:13px" required>
			</div>

			<div>
		  		<button type="submit" class="btn btn-primary btn-block" style="font-size:inherit; margin:auto;" formaction="verify_otp.php"><span class="glyphicon glyphicon-ok"></span>&nbsp;</span>Verify</button>
			</div>';
				}

			   ?>
			
			<!--<div class="form-group">
			  <input type="text" class="form-control" name="otp" placeholder="Enter OTP" style="font-size:13px" required>
			</div>

			<div>
		  		<button type="submit" class="btn btn-primary btn-block" style="font-size:inherit; margin:auto;" formaction="loginchk.php"><span class="glyphicon glyphicon-off"></span> Login</button>
			</div>-->
		  	
		  </form>
		  </div>

<?php include 'templates/footer.php'; ?>
