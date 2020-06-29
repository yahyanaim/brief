<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'gestion';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) { // mysqli connecte error 
  die('Connection failed: ' . $conn->connect_error);
}else{
    
}
?>
