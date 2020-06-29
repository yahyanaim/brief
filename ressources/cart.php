<?php require_once("config.php"); ?>
<?php include(TEMPLATE_FRONT . "/header.php");?>


<?php
// add will have the id of our product, everytime is called it will will be concatenating with session and add one
// so we click on add we get these request and we're going to increment one everytime.
if(isset($_GET['add'])){
    $query = query("SELECT * FROM produit WHERE ID_pro=" . escape_string($_GET['add']) . " ");
    confirm($query);
    while($row= fetch_array($query)){
        if($row['Qte'] != $_SESSION["product_".$_GET['add']] ){
            $_SESSION["product_".$_GET['add']] += 1;
            redirect("../public/checkout.php");
        }else{
            set_message("We only have ".$row['Qte']." ". "{$row['nom']}" . " available");
            redirect("../public/checkout.php");

        }

    }


//     $_SESSION["product_".$_GET['add']] += 1;
//     redirect("index.php");
}
if(isset($_GET['remove'])){
    $_SESSION["product_".$_GET["remove"]]--;
    if($_SESSION["product_".$_GET["remove"]] <= 0){
        unset($_SESSION['item_total']);
        unset($_SESSION['item_quantity']);
        redirect("../public/checkout.php");
    }else{
        redirect("../public/checkout.php");
        
    }
}

if(isset($_GET['delete'])) {

    $_SESSION["product_".$_GET["delete"]]= '0';
    unset($_SESSION['item_total']);
    unset($_SESSION['item_quantity']);
    redirect("../public/checkout.php");
}

function cart(){
    $total = 0;
    $item_quantity = 0;
    $item_name = 1;
    $item_number = 1;
    $amount = 1;
    $quantity = 1;
    foreach($_SESSION as $name=>$value){
        if($value>0){
            if(substr($name, 0, 8) == "product_"){ 
                $length = strlen($name)-8;
                // echo $length;
                $id = substr($name, 8, $length);
                // $id = str_replace("", "product_", $name);



                $query = query("SELECT * FROM products WHERE product_id = ".escape_string($id)."");
                confirm($query);
                while($row=fetch_array($query)){
                    $sub = $row['prix'] * $value;
                    $item_quantity += $value; 
                    $product = <<<DELIMETER
                        <tr>
                            <td>{$row["nom"]}<br>
                            <img src="../ressources/uploads/{$row['img']}">
                            </td>
                            <td>{$row['prix']} dh</td>
                            <td>{$value}</td>
                            <td>$sub dh</td>
                            <td><a class ="btn btn-warning" href="../ressources/cart.php?remove={$row['v']}"><span class='glyphicon glyphicon-minus' ></span></a>
                            <a class ="btn btn-success" href="../ressources/cart.php?add={$row['ID_pro']}"><span class='glyphicon glyphicon-plus' ></span></a>
                            <a class ="btn btn-danger" href="../ressources/cart.php?delete={$row['ID_pro']}"><span class='glyphicon glyphicon-remove' ></span></a></td>
                        </tr>
                        <input type="hidden" name="item_name_{$item_name}" value="{$row['nom']}">
                        <input type="hidden" name="item_number_{$item_number}" value="{$row['ID_pro']}">
                        <input type="hidden" name="amount_{$amount}" value="{$row['prix']}">
                        <input type="hidden" name="amount_{$quantity}" value="{$value}">
                    DELIMETER;
                    echo $product;
                    $item_name++;
                    $item_number++;
                    $amount++;
                    $quantity++;
                }
                $_SESSION['item_total'] = $total += $sub;
                $_SESSION['item_quantity'] = $item_quantity;
                $send_order = query("INSERT INTO orders(order_amount,product_id,order_quantity) VALUES({$total},{$item_number},{$quantity})");
                // $last_id = last_id();
                // session_destroy();
                confirm($send_order);

            }
        }
        
    }
}
    

?>
