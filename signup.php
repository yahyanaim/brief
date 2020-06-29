<?php include("server.php"); ?>
<?php 
$usernmae=$_GET["username"];
$email=$_GET["email"];
$pass=$_GET["pass"];
$sql = "INSERT INTO user (username, email, pass,idrole)
VALUES" . "('" . $usernmae . "','" . $email . "','"  . $pass  . "','3')" ;

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
echo $_GET["username"] . $_GET["email"].$_GET["pass"];
header('Location: gestion.php');
exit();
$conn->close();
?>
