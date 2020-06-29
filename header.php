<?php

include ('server1.php');?>

<header class="header">  
<div class="fixed-top">
    <nav class="navbar navbar-expand-lg navbar-dark mx-background-top-linear">
      <div class="container">
        <a class="navbar-brand" href="index.html" style="text-transform: uppercase;">bim</a>
        <form action="gestion.php" method="get" class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" name="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
 
          <ul class="navbar-nav ml-auto">
           
            <li class="nav-item active">
              <a class="nav-link" href="gestion.php" onclick='ver()'>Accueil
                <span class="sr-only">(current)</span>
              </a>
            <li class="nav-item">
              <a class="nav-link" href="paniergbl.php">Painer</a>
            </li>
            <li class="nav-item">
            <a href="#" class="nav-link" > <span class="glyphicon glyphicon-user"></span> <?php   if( isset($_SESSION['username'])){
              echo $_SESSION['username'];
          
            }else{
              echo   " <li class='nav-item' ><a class='nav-link' href='login.php' id='connecte' >login</a> </li>";
            }; ?>  </a>
      
            </li>
            <li class="nav-item">
            <a  class="nav-link" href ="gestion.php?logout='1'"><span class="glyphicon glyphicon-user"></span> logout</a>
            </li>
          </ul>
     
        </div>
      </div>
    </nav>
  </div>
</header>