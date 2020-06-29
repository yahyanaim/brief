
<?php include('server.php')?>
<?php 
$cat = "SELECT * FROM categorie";
$resultcat = $conn->query($cat);

if ($resultcat->num_rows > 0) {
 
  // output data of each row
  while($rowcat = $resultcat->fetch_assoc()) {
   
    echo "<option value ='" . $rowcat["id_cat"] . "'> " . $rowcat["desc"] . "</option>";
   }
} else {
  
}

$conn->close();

?>
