

<div id="loginmodal" class="modal fade" role="dialog" style="font-size:15px;">
	<div class="modal-content" style="width:60%; margin:auto; padding:20px;">
	<div class="modal-header">
		<h2 class="modal-title" style="margin:auto; font-size:200%">Login<span class="fa fa-lock" style="background-color:white;"></span></h2>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
	<div class="modal-body" style="padding:40px 50px;">
		<form role="form">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" style="font-size:13px" required>
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
			  <input type="password" class="form-control" id="pwd" placeholder="Enter password" style="font-size:13px" required>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="" checked>Remember me</label>
            </div>
			<p><a href="#">Forgot Password?</a></p>
              <button type="submit" class="btn btn-primary btn-block" style="font-size:inherit; margin:auto;"><span class="glyphicon glyphicon-off"></span> Login</button>
			

          </form>
        </div>
        <div class="modal-footer">      
          <p>Not a member? <a href="signup.php">Sign Up</a></p>
  
        </div>
      </div>
 </div>

