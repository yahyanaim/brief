<?php 
if(session_status()== PHP_SESSION_NONE){
session_start();
}
// session_start();
$username = "";
$email = '';
$Adminname="";
$errors = array();
$db =mysqli_connect ('localhost','root','','gestion');

if(isset($_POST['register'])) {
    $username = mysqli_real_escape_string($db,$_POST['username']);
    $email = mysqli_real_escape_string($db,$_POST['email']);
    $password_1 = mysqli_real_escape_string($db,$_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db,$_POST['password_2']);

    if (empty($username)){
        array_push ($errors,"Username is required");
    }
    if (empty($email)){
        array_push ($errors,"email is required");
    }
    if (empty($password_1)){
        array_push ($errors,"password is required");
    }
    if ($password_1 != $password_2){
        array_push ($errors,"password is not match");
    }
    if (count($errors) == 0){
        $password = md5($password_1);
        $sql = "INSERT INTO user (username, email, pass,idrole)
VALUES" . "('" . $username . "','" . $email . "','"  . $password  . "','3')" ;
             
              mysqli_query($db,$sql);
              $_SESSION ['username'] = $username;
              $_SESSION['iduser']=$rowuser["id_user"];
              $_SESSION ['success'] = "you are logged in";
              header ('location:gestion.php');

    }

}


//login user 
if (isset($_POST['login'])){
 $user = "SELECT * FROM user";
$resultuser = $db->query($user);

if ($resultuser->num_rows > 0) {
 
  // output data of each row
  while($rowuser = $resultuser->fetch_assoc()) {
    if($rowuser["username"]==$_POST["username"] && $rowuser["pass"]==$_POST["password"]){
        $_SESSION['username']=$rowuser["username"];
        $_SESSION['password']=$rowuser["pass"];
        $_SESSION['iduser']=$rowuser["id_user"];
        if($rowuser["idrole"]==3){
          header('Location: gestion.php');
          exit();
        }elseif ($rowuser["idrole"]==2) {
          header('Location: public/admin/index.php');
          exit();
        }else{
           //admin
        }
    }
    
   }
} else {
  
}

}
/////////////////login admin
if (isset($_POST['admin'])){
    $Adminname = mysqli_real_escape_string($db,$_POST['Adminname']);
    $passwordAdmin = mysqli_real_escape_string($db,$_POST['passwordAdmin']);

    if (empty($Adminname)){
        array_push ($errors,"AdminName is required");
    }
    if (empty($passwordAdmin)){
        array_push ($errors,"password is required");
    }
    if(count($errors)== 0){
        //  $Adminname = md5 ($passwordAdmin);
        $fas = "SELECT * FROM admin WHERE MATRICULE='$Adminname' AND PASSWORD='$passwordAdmin'";
        $res = mysqli_query ($db,$fas);
        if (mysqli_num_rows ($res) == 1){
            $_SESSION ['Adminname'] = $Adminname;
            $_SESSION ['success'] = "you are logged in";
            header ('location:admin/index.php');
        }else{
            array_push($errors, "problem ");
        }
    }

}


//logout
if (isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header('location:login.php');
}



?>