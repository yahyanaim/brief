<?php
session_start();
?>
<?php include("server.php"); ?>
<?php 
$qantite=$_POST["qantite"];
$idpro=$_POST["id_pro"];
$iduser=$_SESSION['iduser'];
$dt=date('y-m-j');  

$commd = "INSERT INTO commande (date_com,id_pro,id_client,Qte)
VALUES" . "('" . $dt . "','" . $idpro . "','"  . $iduser  . "','"  . $qantite  . "')" ;

if ($conn->query($commd) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $commd . "<br>" . $conn->error;
  }

header('Location: gestion.php');
exit();
$conn->close();
?>
