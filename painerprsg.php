
<?php include('server.php')?>
<?php 
$p=0;
$m=0;
$q=0;
$t=0;
$paincomd = "SELECT * FROM commande where id_client='" .$_SESSION['iduser']. "'";
$resultpaincomd = $conn->query($paincomd);

if ($resultpaincomd->num_rows > 0) {
 
  // output data of each row
  while($rowpaincomd = $resultpaincomd->fetch_assoc()) {
    
    if(isset($rowpaincomd["id_pan"]) && $rowpaincomd["pay"]==0){
      
        $pain = "SELECT * FROM panier_fixe where ID_panier='" . $rowpaincomd["id_pan"] . "'";
        $resultpain = $conn->query($pain);
        
        if ($resultpain->num_rows > 0) {
         
          // output data of each row
            while($rowpain = $resultpain->fetch_assoc()) {
                                   echo "<div class='container'>
                                    <div class='row'>
                                      <h4>" . $rowpain["nomp"] . "</h4>
                                    </div>
                                     </div>";
                                     $_SESSION['painecomande'][$m]=$rowpaincomd["id_pan"];
                                     $m++;
                   $painpro = "SELECT * FROM produitpn where id_pan=" . $rowpain["ID_panier"] . "";
                   $resultpainpro = $conn->query($painpro);
                   $_SESSION['index'][$t]=0;
                   $_SESSION['gtqp'][$q]=0;
                   $t++;
                   $q++;
                if ($resultpainpro->num_rows > 0 ) {
              
                    while($rowpainpro = $resultpainpro->fetch_assoc()) {
                     
                               $prodd = "SELECT * FROM produit where ID_pro=" . $rowpainpro["id_pro"] . "";
                               $resultprodd = $conn->query($prodd);
                         
                            if ($resultprodd->num_rows > 0) {
                          
                                while($rowprodd = $resultprodd->fetch_assoc()) {
                                  $_SESSION['gtqp'][$q]=$rowpainpro["QnT"];
                                  $_SESSION['index'][$t]=$rowpainpro["id_pro"];
                                  $q++;
                                  $t++;
                                  echo "<div class='container'>
                                  <div class='row'>
                                    <div class='cola col-1 '>
                                      <img src='./image/" . $rowprodd["img"] . "' class='img1 mt-3'>
                                    </div>
                                    <div class='cola col-5 border-right'>
                                      <h6 class=' mt-3 '>" . $rowprodd["nom"] . "</h6>
                                          <div class='rowc ml-4 mt-3'>
                                          <div class='col-4 '><img src='./icon/like.png' class='icon'><a href='#' class='link'>FAVORIS</a> </div>
                                          <div class='col-5 '><img src='./icon/bin.png' class='icon'> <a href='#' class='link'>SUPPRIMER</a></div>
                                              </div>
                                    </div>
                                    <div class='cola col-1 cent border-right'>
                                    <kbd>" . $rowpainpro["QnT"] . "</kbd>
                                    </div>
                                    <div class='cola col-2 cent border-right'>
                                        <h6 class='m-auto'>" . $rowprodd["prix"] . "DH</h6>
                                  </div>
                                  <div class='cola col-2 cent cor'>
                                      <h6 class='m-auto'>" . ($rowpainpro["QnT"]*$rowprodd["prix"]) . "DH</h6>
                                  </div>
                                  </div>
                                   </div>";
                                   
                                }
                            } 
                    }
                } 
                echo "<div class='container mt-5'>
                <div class=' mt-5 rowc  '>
                            <h6 >Total TTC:</h6>
                            
                            <h6 class='cor ml-5'>" . $rowpain["prix"] . "</h6>
                            <h6 class='cor'>DHS</h6>
                        </div>
                </div>";
                $totalepani[$p]=$rowpain["prix"];
                $p++;
            }
        } 
    }
   }
} 

$conn->close();

?>