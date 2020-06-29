
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
    
    <div class="col-lg-3 col-12 filter">
      <h5>Prix</h5>
      <form action="gestion.php" method="get">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">DH</span>
            <span class="input-group-text">0.00</span>
          </div>
          <input type="text" name="prixmin" class="form-control" placeholder="Prix min">
        </div>
        
        <div class="input-group">
          <input type="text" class="form-control" name="prixmax" placeholder="Prix max">
          <div class="input-group-append">
            <span class="input-group-text">DH</span>
            <span class="input-group-text">0.00</span>
          </div>
        </div>
        
        <div class="form-group">
          <label for="exampleFormControlSelect1">Catégorie</label>
          <select class="form-control" name="categorie" id="exampleFormControlSelect1">
            <option></option>
          <?php include('categorie.php')?>
          </select>
        </div>
        <button type="submit" class="btn btn-dark">filter</button>
      </form>
      <button type="button" class="btn btn-primary" onclick="panproo()" id="btnp">Produit</button>
    </div> 
   
    <div id="pro" class="col-lg-9 col-12 pro">
        <div class="row">
            
            <?php  include("produit.php"); 
              $re
                      ?>
            
            <h1 class="d-none" id="prod"> <?php echo $re; ?></h1>
    
          </div>
    </div >
    <div id="panier" class="col-lg-9 col-12 pro">
          <?php include('panier.php')?> 
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