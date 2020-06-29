    
<?php 


include("server.php");
$sql = "UPDATE produit SET  visible='" . $_GET["afficher"] . "' WHERE ID_pro='" . $_GET["ID_pro"] . "' and id_ad='" . $_GET["id_ad"] . "'";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}
$sqll = "UPDATE produit SET Qte='" . $_GET["qantite"] . "'  WHERE ID_pro='" . $_GET["ID_pro"] . "' and id_ad='" . $_GET["id_ad"] . "'";

if ($conn->query($sqll) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}
header('Location: gestionner.php');
exit();
$conn->close();
?>
