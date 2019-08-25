<?php
session_start();
if(!empty($_GET['produit'])){
    $addQuantite = false;
    for($i=0;$i<sizeof($_SESSION['panier']); $i++) {
        if($_SESSION['panier'][$i]['id'] == $_GET['produit']){
            $_SESSION['panier'][$i]['quantite'] ++;
            $addQuantite = true;
        }
    }
    if(!$addQuantite){
        $_SESSION['panier'][] = array("id" => $_GET['produit'], "quantite"=> 1);
    }

    header('Location:' .$_SERVER['HTTP_REFERER']);
}
?>
