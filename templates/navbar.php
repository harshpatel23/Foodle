<style>
	
	#logbtn{
		background-color: #343a40;
		border: none;
		color: #cccccc;
		padding: 5px;
		font-size: 12px;
		cursor: pointer;
	}
	#logbtn:hover{
		color: orange;
	}
	#logicon{
		padding: 5px;
		background-color: #343a40;
	}
	.dropdown-menu{
		text-align: left;
		font-size: 13px;
		width: auto;
	}
	.dropdown-header{
		font-size: 14px;
	}
	
    #search-bar{
        width: 350px;
        border-color: orange;
        font-size: 15px;
        border-radius: 5px;
        color: black;
		background-color: floralwhite;
    }
    #search-bar:focus{
        border-width: 2px;
    }
    #search-button{
        height: 34px;
        border-color: orange;
        border-radius: 6px;
        font-size: 15px;
        width:70px;
        background-color: floralwhite;
        color: black;
    }
    #search-button:hover{
        border-width:2px;
		background-color: navajowhite;
    }
   #navbar{
        top: 0;
        left: 0;
        width: 100%;
        font-size: 20;
        /*padding: 20px;*/
        background: red;
        border-radius: 0px;
    }
    #nav-item{
        font-size: 20px;
        text-align: center;
    }
	
	#nav-link{
		color: #cccccc;
	}
	#nav-link:hover{
		color: orange;
	}
	
    #icon{
        font-size:20px;
        text-align:center;
        height: 20px;
        background: none;
        padding:0px;
    }
</style>


<nav class="navbar navbar-expand-md navbar-light bg-dark" id="navbar">
  <a class="navbar-brand" href="index.php"><img src="images/Foodle.png" height="50"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <form class="form-inline my-2 my-xl-0" id="search_bar" method="post">
      <input list="search-results" class="form-control mr-sm-2" autocomplete="off" onkeyup=<?php if (isset($table)) echo "\"search(this.value, '$table')\"";
            else echo '"search(this.value, \'rest\')"'; ?>
       id="search-bar" name="search-bar" type="search" placeholder="Search">
        <datalist id="search-results">
            <option id = "1"></option>
            <option id = "2"></option>
            <option id = "3"></option>
            <option id = "4"></option>
            <option id = "5"></option>
        </datalist>
      <button class="btn btn-outline-success my-2 my-sm-0" formaction="<?php if(isset($_SESSION['role']) && isset($table))
       {
                if($_SESSION['role'] == 'admin')
                    echo "admin_view.php?edit_category=$table";
                elseif($_SESSION['role'] == 'Manager')
                    echo 'manager_view.php';
                }
            else
                echo 'search_grid.php';?>" id="search-button" type="submit">Search</button>
    </form>
	  <ul class="navbar-nav ml-auto mt-2 mt-xl-0">
      <?php 
		  if(isset($_SESSION['uname'])){
		  echo '<li class="nav-item" id="nav-item">
        <div class="dropdown">
	<button class="btn" data-toggle="dropdown" type="button" id="logbtn"><i class="fa fa-bars" id="logicon"></i></button>
			<div class="dropdown-menu dropdown-menu-right">
				<h3 class="dropdown-header">Signed in as <span style="color:blue">';
		echo $_SESSION['uname'];
		echo '</span></h3>
				<div class="dropdown-divider"></div>';
			  if($_SESSION['role'] == 'admin')
			echo '<a class="dropdown-item" href="admin_view.php?edit_category=person">Admin page</a>
				  <div class="dropdown-divider"></div>';
			  else
			  	echo '<a class="dropdown-item" href="profile_view.php">Profile</a>';
                if($_SESSION['role'] == 'Manager')
                    echo '<a class="dropdown-item" href="manager_view.php">Reservations</a>
                <a class="dropdown-item" href="rest_form.php?method=update&rest_id='.$_SESSION['rest_id'].'">Restaurant Details</a>';
                else
                    echo '<a class="dropdown-item" href="my_reservations.php">Reservations</a>
                <a class="dropdown-item" href="favourites.php">Favourites</a>';
				echo '<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="#">Help</a>
				<a class="dropdown-item" href="logout.php">Logout</a>
				
			</div>
	</div>
      </li>';
		  }
		  else{
			  echo '<li class="nav-item" id="nav-item">
        <a class="nav-link" id="nav-link" href="login.php">Login<i class="fa fa-lock" id="icon"></i></a>
		</li>
	<li class="nav-item" id="nav-item">
        <a class="nav-link" id="nav-link" href="contact.php">Signup<span class="fa fa-user" id="icon"></span></a>
      </li>';
		  }
		  ?>
    </ul>
  </div>
</nav>