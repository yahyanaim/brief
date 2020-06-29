<?php
// Start the session
session_start();
?>
<?php include("server.php"); ?>
<?php
$t=0;
$b=0;
$dt = date('y-m-j');

// for ($i=0; $i < count($_SESSION['index']); $i++) { 
//   if ($_SESSION['index'][$i]==0) {
//     $t++;
//   }else{
  
//     $pro = "SELECT * FROM produit where ID_pro='" . $_SESSION['index'][$i] ."'";
//     $resultpro = $conn->query($pro);

//           if ($resultpro->num_rows > 0) {
//              while($rowpro = $resultpro->fetch_assoc()) {  
//                  if($rowpro["Qte"]-$_SESSION['gtqp'][$i]>=0){
//                   $gtee[$i]=$rowpro["Qte"];
//                  }else{
//                   $i=count($_SESSION['index']);
//                  }
//              }
//           }
//   }
// }

for ($i=0; $i < count($_SESSION['idp']); $i++) { 
  $b++;
  $pro = "SELECT * FROM produit where ID_pro='" . $_SESSION['idp'][$i] ."'";
  $resultpro = $conn->query($pro);

        if ($resultpro->num_rows > 0) {
           while($rowpro = $resultpro->fetch_assoc()) {  
               if($rowpro["Qte"]-$_SESSION['qntp'][$i]>=0){
                $gte[$i]=$rowpro["Qte"];
                  
               }else{
                $i=count($_SESSION['idp']);
               }
           }
        }
}

print_r ($_SESSION['gtqp']);
print_r ($_SESSION['painecomande']);
if($b==count($_SESSION['idp'])){
 
  $pay = "INSERT INTO pay (Date_exp, ID_client,nom_cart,cvv,prix_T,Num_cart) 
          VALUES ('" . $dt . "', '" .$_SESSION['iduser']. "','" . $_GET['cardname'] . "','" . $_GET['cvv'] . "','" . $_GET['prixt'] . "','" . $_GET['cardnumber'] . "')" ;

      if ($conn->query($pay) === TRUE) {
         
           echo "New record created successfully";
           for ($i=0; $i < count($_SESSION['idp']); $i++) { 
                                         $pro = "SELECT * FROM produit where ID_pro='" . $_SESSION['idp'][$i] ."'";
                                         $resultpro = $conn->query($pro);
                                 
                                         if ($resultpro->num_rows > 0) {
                                            while($rowpro = $resultpro->fetch_assoc()) {  
                                              $update = "UPDATE produit SET Qte=" . ($rowpro['Qte']-$_SESSION['qntp'][$i])  .  " WHERE ID_pro='" . $_SESSION['idp'][$i] . "'";
                                                                          if ($conn->query($update) === TRUE) {
                                                                            echo "Record updated successfully";
                                                                            echo ($rowpro['Qte']-$_SESSION['qntp'][$i]);
                                                                          } else {
                                                                            echo "Error updating record: " . $conn->error;
                                                                           
                                                                            echo "<br>";
                                                                          }
                                            }
                                         }
                     
                
                     
                  
            } 
          // for ($i=0; $i < count($_SESSION['index']); $i++) { 
          //   if ($_SESSION['index'][$i]!=0) {
          //                                                  $proa = "SELECT * FROM produit where ID_pro='" . $_SESSION['index'][$i] ."'";
          //                                                  $resultproa = $conn->query($proa);
                                 
          //                                                if ($resultproa->num_rows > 0) {
          //                                                   while($rowproa = $resultproa->fetch_assoc()) {  
          //                                                     $updatep = "UPDATE produit SET Qte=" . ($rowproa['Qte']-$_SESSION['gtqp'][$i])  .  " WHERE ID_pro='" . $_SESSION['idp'][$i] . "'";
          //                                                     if ($conn->query($updatep) === TRUE) {
          //                                                       echo "Record updated successfully";
          //                                                     } else {
          //                                                       echo "Error updating record: " . $conn->error;
          //                                                       echo "<br>";
          //                                                     }
          //                                                   }
          //                                                }
          
                        
                                
          //   }
          // }
          
      } else {
           echo "Error: " . $sql . "<br>" . $conn->error;
      }
                     
}
 if($b==count($_SESSION['idp'])){
   
    $sql = "UPDATE commande SET pay='1' WHERE id_client='" . $_SESSION['iduser'] ."'";

        if ($conn->query($sql) === TRUE) {
          echo "Record updated successfully";
        } else {
          echo "Error updating record: " . $conn->error;
        }
       
  header('Location: paniergbl.php');
          exit();
 }else{
  $sql = "DELETE FROM commande WHERE id_pro='" . $_SESSION['idp'][$b-1] ."'";

    if ($conn->query($sql) === TRUE) {
      echo "Record deleted successfully";
     } else {
             echo "Error deleting record: " . $conn->error;
         }
            
 }      
//  if($t==count($_SESSION['painecomande']) ){
//   echo "kolchi mzn ot9dar tachri";
//  }else{
//   $sql = "DELETE FROM commande WHERE id_pan='" . $_SESSION['painecomande'][$t-1] ."'";

//     if ($conn->query($sql) === TRUE) {
//       echo "Record deleted successfully";
//      } else {
//              echo "Error deleting record: " . $conn->error;
//          }
//   }       
?>
<?php

$conn->close();
?>

