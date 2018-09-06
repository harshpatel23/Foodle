<?php 
session_start();

include 'templates/header.php';
include 'templates/navbar.php';

function addcss(){
    echo '<link rel="stylesheet" type="text/css" href="styles/rest_det.css">';
}
?>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
      <div class="col-sm-2">
          <img class="img-fluid max-width=100%" src="images/99pancakes.jpg">
      </div>
      <div class="col-sm-8">
          <div>
              <h1 class="display-4">Restaurant name</h1>
          </div>
      </div> 
  </div>
</div>

<div class="col-sm-2">
    <nav>
    <ul class="nav flex-column nav-fill" id="side-menu">
        <li class="nav-item">
            <a class="nav-link active" href="#">About</a>
        </li>
        <li class="nav-item" data-toggle="collapse" href="#menu-categories" aria-expanded="false" aria-controls="collapseExample">
            <a class="nav-link" href="#">Menu</a>
            <div class="collapse" id="menu-categories">
          <div class="list-group">
            <a href="" class="list-group-item list-group-item-action">Starters</a>
            <a href="" class="list-group-item list-group-item-action">Main course</a>
            <a href="" class="list-group-item list-group-item-action">Deserts</a>
            <a href="" class="list-group-item list-group-item-action">Drinks</a>
          </div>
        </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
    </ul>
    
    </nav>
        
</div>
        <div class="collapse" id="collapseExample">
          <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action">Starters</a>
            <a href="#" class="list-group-item list-group-item-action">Main course</a>
            <a href="#" class="list-group-item list-group-item-action">Deserts</a>
            <a href="#" class="list-group-item list-group-item-action">Drinks</a>
          </div>
        </div>
<div class="col-sm-10">
   
    
</div>

<?php
/*
include 'templates/footer.php';
*/
?>