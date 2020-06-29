<?php include('server.php')?>
<?php 
$pro = "SELECT * FROM produit";
$resultpro = $conn->query($pro);
// http://localhost/brief10/gestion.php?prixmin=&prixmax=123&categorie=fruit Search
if (isset($_GET['prixmin'])){
    $min=$_GET['prixmin'];
}else{
    $min=0;
}

if (isset($_GET['prixmax'])){
    $max=$_GET['prixmax'];
}
else{
    $max=99999999;
}
if ($max=="") {
    $max=99999999;
}
if (isset($_GET['categorie'])){
    $cat=$_GET['categorie'];
}else{
    $cat=true;
}
if ($cat=="") {
    $cat=true;
}
if (isset($_GET['Search'])){
    $Search=$_GET['Search'];
}else{
    $Search=true;
}
if ($Search=="") {
    $Search=true;
}
 
$re=0;
if ($resultpro->num_rows > 0 ) {
    while($rowpro = $resultpro->fetch_assoc()) {
                       
        if($rowpro["prix"]<=$max && $rowpro["prix"]>=(int)$min && $rowpro["id_ca"] == $cat && $rowpro["nom"] == $Search && $rowpro["visible"]==1  ) {
        echo "<div class='col-lg-3 offset-lg-1   col-md-5 offset-md-1  col-8 offset-2 pr' >
        <img src='./image/" . $rowpro["img"] .  "' class='imgpro' alt=''>
        <h6>" . $rowpro["nom"] .  "</h6>
        
        <form action='commande.php' method='POST'>
        <h5>" . $rowpro["prix"] . "DH" . "</h5>
        <input type='number' id='qnt' name='qantite' min='0' max='" . $rowpro["Qte"] . "' value='1'>
        <input type='number' class='d-none' name='id_pro' value='" . $rowpro["ID_pro"] . "'>
        <button class='btn  btn-primary '  id='but" . $re . "'  type='submit'>P</button>
         </form>
      </div>";
      $re++;
        }
       
    }
} else {
  
}
if ($re == 0) {
    echo "<div class='container text-center'><div class='alert alert-primary' role='alert'>
    Aucun résultat 
     </div></div>";
    
}
$conn->close();

?>
