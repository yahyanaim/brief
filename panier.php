<?php include('server.php')?>
<?php 
$pani = "SELECT * FROM panier_fixe";
$resultpani = $conn->query($pani);
$m=0;
if ($resultpani->num_rows > 0) {
 
  // output data of each row
  while($rowpani = $resultpani->fetch_assoc()) {
                                                      echo "<div id='pani" .$m. "'>
                                                      <form action='commandepanier.php' method='GET'>
                                                      <input type='text' name='idpanier' class='d-none' value='" .$rowpani["ID_panier"]. "'>
                                                       <div class='text-center coe'>" .$rowpani["nomp"]. "</div>
                                                          <div class='row'>";
       $propan = "SELECT * FROM produitpn where id_pan=" .$rowpani["ID_panier"]. "";
       $resultpropan = $conn->query($propan);
       
    if ($resultpropan->num_rows > 0) {
        
         // output data of each row
      while($rowpropan = $resultpropan->fetch_assoc()) {
          $prod = "SELECT * FROM produit where ID_pro=" .$rowpropan["id_pro"]. "";
          $resultprod = $conn->query($prod);
          
        if ($resultprod->num_rows > 0) {
           
            // output data of each row
          while($rowprod = $resultprod->fetch_assoc()) {
                                           echo "<div class='col-lg-3 offset-lg-1   col-md-5 offset-md-1  col-8 offset-2 pr' >
                                           <img src='./image/" .$rowprod["img"]. "' class='imgpro' alt=''>
                                           <h6>" .$rowprod["nom"]. "</h6>
                                           <h5>" .$rowprod["prix"]. "DH  x" .$rowpropan["QnT"]. "</h5>
                                         </div>";
          }
        }
      }
    } 
                                               echo "<div class='col-lg-3 offset-lg-9'><kbd>" .$rowpani["prix"]. "DHc</kbd><button type='submit' class='btn btn-primary'>Ajouter à panier</button></div>
                                               </div>
                                               </form>
                                               </div>";
                                               $m++;
  }
} else {
  
}
echo "<div class='btn-toolbar justify-content-center' role='toolbar' aria-label='Toolbar with button groups'>
<div class='btn-group mr-2' role='group' aria-label='First group'>";
for ($i=0; $i < $m; $i++) { 
  $g=$i+1;
 echo "<button type='button' class='btn btn-secondary'>$g</button>";
}
echo "</div>
</div>";
$conn->close();

?>