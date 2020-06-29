<?php
// session_start();
// ?>
// <?php include("server.php"); ?>
// <?php 




// $user = "SELECT * FROM user";
// $resultuser = $conn->query($user);

// if ($resultuser->num_rows > 0) {
 
//   // output data of each row
//   while($rowuser = $resultuser->fetch_assoc()) {
//     if($rowuser["username"]==$_GET["username"] && $rowuser["pass"]==$_GET["password"]){
//         $_SESSION['username']=$rowuser["username"];
//         $_SESSION['pass']=$rowuser["pass"];
//         $_SESSION['iduser']=$rowuser["id_user"];
//         if($rowuser["idrole"]==3){
//           header('Location: gestion.php');
//           exit();
//         }elseif ($rowuser["idrole"]==2) {
//           header('Location: gestionner.php');
//           exit();
//         }else{
//            //admin
//         }
//     }
    
//    }
// } else {
  
// }

// $conn->close();
?>
