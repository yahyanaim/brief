<?php
// Start the session
session_start();

?>
<?php
if(!isset($_SESSION['iduser'])){
  header('Location: gestion.php');
  exit(); 
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link rel="stylesheet" href="./style.css">
    <title>Hello, world!</title>
  </head>
  <body>
<?php include('header.php')?>  
<div class="row1">
<div class="container">
        <div class="row">
          <h4>Panier</h4>
        </div>
      </div>
<div class="container mt-3">
        <div class="row">
          <div class=" col-6 artic ">
            <p><b>ARTICLE</b></p>
          </div>
          <div class=" col-1 colc">
              <p><b>QUANTITÉ</b></p>
          </div>
          <div class=" col-2 colc">
            <p><b>PRIX UNITAIRE</b></p>
        </div>
        <div class=" col-2 colc">
            <p><b>SOUS-TOTAL</b></p>
      </div>
        </div>
      </div>
<div class='container'>
        <div class='row'>
          <div class='cola col-1 '>
            <img src='./image/1.jpg' class='img1 mt-3'>
          </div>
          <div class='cola col-5 border-right'>
            <h6 class=' mt-3 '>Batterie pour Xiaomi Series (redmi note 5 Pro)</h6>
                <div class='rowc ml-4 mt-3'>
                <div class='col-4 '><img src='./icon/like.png' class='icon'><a href='#' class='link'>FAVORIS</a> </div>
                <div class='col-5 '><img src='./icon/bin.png' class='icon'> <a href='#' class='link'>SUPPRIMER</a></div>
                    </div>
          </div>
          <div class='cola col-1 cent border-right'>
          <kbd>12</kbd>
          </div>
          <div class='cola col-2 cent border-right'>
              <h6 class='m-auto'>100dh</h6>
        </div>
        <div class='cola col-2 cent cor'>
            <h6 class='m-auto'>100dh</h6>
        </div>
        </div>
</div>
<?php include('panierglb.php')?> 
<div class='container mt-5'>
<div class=' mt-5 rowc  '>
            <h6 >Total TTC:</h6>
           
             
              
            <h6 class='cor ml-5'><?php if(isset($totalepro)){ echo $totalepro;}else{} ?></h6>

            
            <h6 class='cor'>DHS</h6>
        </div>
</div>
<?php include('painerprsg.php')?>
<div class="container mt-5">
        <div class=" mt-5 rowc  ">
            <h6 >Total TTC:</h6>
            
            <h6 class="cor ml-5"><?php if(isset($totalepro) && isset($totalepani)){ echo $totalepro+array_sum($totalepani);}else{} ?></h6></h6>
            <h6 class="cor">DHS</h6>
        </div>
    </div>
<div class="container mt-4">
        <div class="totale row ">
            <button type="button" class="btn btn-outline-secondary mr-1">SUIVRE VOS ACHATS</button>
            <button type="button" class="btn btn-primary"  onclick="window.location.href='finalise.php'" >COMMANDE</button>
            <div class="col-3"></div>
        </div>
    </div>
<!--model signin-->
<div class="modelgnr" id="modelin">
  <div class="model">
    <form class="form-signin" action="signin.php" method="get">
      <h1 class="h3 mb-3 font-weight-normal">Veuillez vous connecter</h1>
      <input type="text" name="username" class="form-control" placeholder="username" required autofocus>
      <input type="password" name="password" class="form-control" placeholder="Mot de passe" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Se connecter</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
  </div>
</div>
<!--model signup-->
<div class="modelgnr" id="modelup" >
  <div class="model">
    <form class="form-signin" action="signup.php" method="get">
      <h1 class="h3 mb-3 font-weight-normal">Veuillez vous connecter</h1>
      <input type="email"  name="email" class="form-control" placeholder="Email address" required autofocus>
      <input type="text" name="username"  class="form-control" placeholder="username" required>
      <input type="password" name="pass" id="inputPassword" class="form-control" placeholder="Mot de passe" required>
      
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Inscrire</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
    </form>
  </div>
</div>
<?php include('footer.php') ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="gestion.js"></script>
  </body>
</html>    
<?php
if(isset($totalepro)){
  $_SESSION['totalep']=$totalepro;

}
if (isset($totalepani)) {
  $_SESSION['prixpn']=$totalepani;
}

?>