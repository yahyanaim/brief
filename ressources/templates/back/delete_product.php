<?php include("C:\\xampp\\htdocs\\brief10\\ressources\\config.php")?>
<?php
if(isset($_GET['id'])){
    $query = query("DELETE FROM produit WHERE ID_pro=". $_GET['id']." ");
    confirm($query);
    set_message('produit deleted');
    redirect("http://localhost/brief10/public/admin/index.php?products");
}

?>
