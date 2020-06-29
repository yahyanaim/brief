
<?php
$comd = "SELECT * FROM commande ";
$result = $conn->query($comd); //mysqli($conn,$pro)
if (!$result) {
  echo 'error in query';
}
?>
<?php
$totalpp=0;
$i=0;
if ($result->num_rows > 0) { //num_rows() checks if there are more than zero rows returned.
  // output data of each row
  while($row = $result->fetch_assoc()) {
    
     
    if ($row["pay"] == 0 && $row["id_pro"] != null)  {
      $tr[$i] =$row["ID_com"];
      $i++;
    }
    //  echo "ID_com: " . $row["ID_com"]. " date " . $row["date_com"]. " id-pro " . $row["id_pro"]. "<br>";
     $prod = "SELECT * FROM produit where id_pro ="  . $row["id_pro"] ;
     $res = $conn->query($prod); //mysqli($conn,$pro)
     if ($res && $row["pay"] == 0) {
       
      while($r = $res->fetch_assoc()){ 
        echo
        "
        <div class='container'>
        <div class='row'>
          <div class='cola col-1 '>
            <img src='./img/1.jpg' class='img mt-3'>
          </div>
          <div class='cola col-5 border-right'>
            <h6 class=' mt-3 '>" . $r["nom"] ."</h6>
                <div class='rowc ml-4 mt-3'>
                <div class='col-4 '><img src='./icon/like.png' class='icon'><a href='#' class='link'>FAVORIS</a> </div>
                <div class='col-5 '><img src='./icon/bin.png' class='icon'> <a href='suppr.php?id_com=" . $row["ID_com"] ."'' class='link'>SUPPRIMER</a></div>
                    </div>
          </div>
          <div class='cola col-1 cent border-right'>
            <select class='m-auto border-0'>
                <option value='1'>1</option>
                <option value='2'>2</option>
                <option value='3'>3</option>
            </select>
          </div>
          <div class='cola col-2 cent border-right'>
              <h6 class='m-auto'>" . $r["prix"] . "DH" . "</h6>
        </div>
        <div class='cola col-2 cent cor'>
            <h6 class='m-auto'></h6>
      </div>
        </div>
      </div>";
      $totalpp += $r["prix"] ;
      
     }
     
     }
     
     
  }
 } else {
   echo "0 results";
 }
 
?>  
