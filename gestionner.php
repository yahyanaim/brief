
<?php include('server.php')?>
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
<?php include('header.php') ?>


<?php 
$user = "SELECT * FROM user where idrole='2'" ;
$resultuser = $conn->query($user);

if ($resultuser->num_rows > 0) {
 
  // output data of each row
  while($rowuser = $resultuser->fetch_assoc()) {
     echo   "<div class='container'>
             <table class='table'>
               <thead class='table-primary'>
                 <tr>
                   <th scope='col  '>" . $rowuser["username"] . "</th>
                 </tr>
            </thead>
             </div>
                       <div class='container'>
              <table class='table table-hover'>
              <thead>
              
                <tr>
                  <th scope='col'>ID-pro</th>
                  <th scope='col'>le nom de produit</th>
                  <th scope='col'>Prix</th>
                  <th scope='col'>quantité</th>
                  <th scope='col'>afficher</th>
                  <th scope='col'>--------</th>
                </tr>
              </thead>
              <tbody>";
              $pro = "SELECT * FROM produit";
              $resultpro = $conn->query($pro);
              
              if ($resultpro->num_rows > 0) {
               
                while($rowpro = $resultpro->fetch_assoc()) {
                    echo   "<tr>
                    <form action='gest.php' method='GET'>
                    <input type='number' class='d-none' name='ID_pro' value='" . $rowpro["ID_pro"] . "'>
                    <input type='number' class='d-none' name='id_ad' value='" . $rowpro["id_ad"] . "'>
                    <th scope='row'>" . $rowpro["ID_pro"] . "</th>
                    <td>" . $rowpro["nom"] . "</td>
                    <td>" . $rowpro["prix"] . "</td>
                    <td ><input type='number'  name='qantite' min='0' max='1000' value='" . $rowpro["Qte"] . "'></td>
                    <td ><input type='number'  name='afficher' min='0' max='1' value='" . $rowpro["visible"] . "'></label></td>
                    <td ><input type='submit' class='btn btn-primary' value='modifier'></td>
                    </form>
                  </tr>";
                 }
              } 
      echo" </tbody>
              </table>
            </div>"  ;        
   }
} 

$conn->close();

?>



<?php include('footer.php') ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="gestion.js"></script>
  </body>
</html>    
