
<?php include('server.php')?>
<?php include('server1.php')?>
<?php 
$v=0;
$panipro = "SELECT * FROM commande where id_client='" .$_SESSION['iduser']. "'";
$resultpanipro = $conn->query($panipro);
$totalepro=0;

if ($resultpanipro->num_rows > 0) {
 
  // output data of each row
  while($rowpanipro = $resultpanipro->fetch_assoc()) {
    if($rowpanipro["pay"]==0 &$rowpanipro["id_pan"]==null){
      $_SESSION['qntp'][$v]=$rowpanipro["Qte"];
      $_SESSION['idp'][$v]=$rowpanipro["id_pro"];
      $v++;
        $pro = "SELECT * FROM produit where ID_pro=" . $rowpanipro["id_pro"] . "";
        $resultpro = $conn->query($pro);

      if ($resultpro->num_rows > 0) {
 
              while($rowpro = $resultpro->fetch_assoc()) {
              echo  "<div class='container'>
                <div class='row'>
                  <div class='cola col-1 '>
                    <img src='./image/" . $rowpro["img"] . "' class='img1 mt-3'>
                  </div>
                  <div class='cola col-5 border-right'>
                    <h6 class=' mt-3 '>" . $rowpro["nom"] . "</h6>
                        <div class='rowc ml-4 mt-3'>
                        <div class='col-4 '><img src='./icon/like.png' class='icon'><a href='#' class='link'>FAVORIS</a> </div>
                        <div class='col-5 '><img src='./icon/bin.png' class='icon'> <a href='#' class='link'>SUPPRIMER</a></div>
                            </div>
                  </div>
                  <div class='cola col-1 cent border-right'>
                  <kbd>" . $rowpanipro["Qte"] . "</kbd>
                  </div>
                  <div class='cola col-2 cent border-right'>
                      <h6 class='m-auto'>" . $rowpro["prix"] . "DH</h6>
                </div>
                <div class='cola col-2 cent cor'>
                    <h6 class='m-auto'>" . ($rowpro["prix"]*$rowpanipro["Qte"]) . "DH</h6>
                </div>
                </div>
              </div> ";
              $totalepro+=($rowpro["prix"]*$rowpanipro["Qte"]);
              
              }
       }
    }
  }
} 


$conn->close();

?>