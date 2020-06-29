<?php
session_start();
?>
<?php
// remove all session variables
session_unset();
header('Location: gestion.php');
exit();
?>