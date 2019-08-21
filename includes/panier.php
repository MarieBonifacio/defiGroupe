<?php
$panierCookies = array(
    array("nom" => "Item 1", "quantite" => 1, "prix" => 10.50 ),
    array("nom" => "Item 2", "quantite" => 2, "prix" => 11.50 ),
    array("nom" => "Item 3", "quantite" => 3, "prix" => 12.50 ),
);
setcookie("panier", serialize($panierCookies), time()+2*24*60*60);

if(isset($_COOKIE["panier"])){
    $panier = unserialize($_COOKIE["panier"]);
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
                echo '<li><span>'.$item['nom'].'</span><span>x'.$item['quantite'].'</span><span>'.$item['prix'].'&euro;</span></li>';
                $panierTotal += $item['quantite']*$item['prix'];
            }
        }
    echo '
        <li class="total"><span>Total : </span>'.$panierTotal.'&euro;</li>
    </ul>
    <a class="toCommand" href="./commande.php">Commander</a>
</div>';

?>
