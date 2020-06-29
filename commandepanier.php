<?php
session_start();
?>
<?php include("server.php"); ?>
<?php 
$idpn=$_GET['idpanier'];
$qu=1;
$iduse=$_SESSION['iduser'];
$dt=date('y-m-j'); 
$commd = "INSERT INTO commande (date_com,id_pan,id_client,Qte)
VALUES" . "('" . $dt . "','" . $idpn . "','"  . $iduse  . "','"  . $qu  . "')" ;

if ($conn->query($commd) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $commd . "<br>" . $conn->error;
  }
  header('Location: gestion.php');
  exit();  
?>