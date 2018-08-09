<style>
    #search-bar{
        width: 250px;
        border-color: orange;
        font-size: 15px;
        border-radius: 10px;
        color: black;
    }
    #search-bar:focus{
        border-width: 2px;
    }
    #search-button{
        height: 34px;
        border-color: orange;
        border-radius: 10px;
        font-size: 15px;
        width:70px;
        background-color: white;
        color: black;
    }
    #search-button:hover{
        border-width:2px;
    }
   #navbar{
        top: 0;
        left: 0;
        width: 100%;
        font-size: 20;
        padding: 20px;
        border-color: blue;
        background: red;
        border-radius: 7px;
        color
    }
    #nav-item{
        font-size: 20px;
        text-align: center;4
    }
    #nav-item:hover{
        font-size: 21px;
    }
    #icon{
        font-size:20px;
        text-align:center;
        height: 20px;
        background: none;
        padding:0px;;
        
    }
</style>


<nav class="navbar navbar-expand-xl navbar-light bg-light" id="navbar">
  <a class="navbar-brand" href="index.php"><img src="images/Foodle.png" height="50"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-xl-0">
      <li class="nav-item" id="nav-item">
        <a class="nav-link" href="#">Reserve<i class="fa fa-calendar" id="icon"></i>
<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item" id="nav-item">
        <a class="nav-link" href="login.php">Login<i class="fa fa-lock" id="icon"></i></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-xl-0" id="search_bar">
      <input class="form-control mr-sm-2" id="search-bar"type="search" placeholder="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" id="search-button" type="submit">Search</button>
    </form>
  </div>
</nav>