<?php
// $panierCookies = array(
//     array("id" => "1", "quantite" => 1),
//     array("id" => "2", "quantite" => 2),
//     array("id" => "3", "quantite" => 3),
// );
// setcookie("panier", serialize($panierCookies), time()+2*24*60*60);
// $_SESSION['panier']=$panierCookies;

require('./class/category.php');
require('./class/produit.php');


if(isset($_SESSION["panier"])){
    $panier = $_SESSION["panier"];
} else{
    $panier = array();
}

if(!empty($panier)){
    $panierNbItem = 0;
    foreach ($panier as $item) {
        $panierNbItem += $item['quantite'];
    }
}else{
    $panierNbItem = 0;
}
echo '
<div id="panier">
    <div class="flex">
        <h2 class="title">Votre panier</h2>
        <i class="material-icons icon">
            shopping_cart
        </i>
    </div>
    <span class="panierNbItem">'.$panierNbItem.'</span>
    <ul id="items">';
        $panierTotal = 0;
        if(!empty($panier)){
            foreach ($panier as $item) {
                $produit = new Produit();
                $produit->getProduitById($item['id']);
                echo '<li><span>'.$produit->getNom().'</span><span>x'.$item['quantite'].'</span><span>'.$produit->getPrix().'&euro;</span></li>';
                $panierTotal += $item['quantite']*$produit->getPrix();
            }
        }
    echo '
        <li class="total"><span>Total : </span>'.$panierTotal.'&euro;</li>
    </ul>
    <a class="toCommand" href="./commande.php">Commander</a>
</div>';

?>
