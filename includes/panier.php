<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="../css/panier.css">
<link href="https://fonts.googleapis.com/css?family=Raleway|Roboto&display=swap" rel="stylesheet">
<?php
$_SESSION['panier'] = array(
    array("nom" => "Item 1", "quantite" => 1, "prix" => 10.50 ),
    array("nom" => "Item 2", "quantite" => 2, "prix" => 11.50 ),
    array("nom" => "Item 3", "quantite" => 3, "prix" => 12.50 ),
);
if(!empty($_SESSION['panier'])){
    $panierNbItem = 0;
    foreach ($_SESSION['panier'] as $item) {
        $panierNbItem += $item['quantite'];
    }
}else{
    $panierNbItem = 0;
}
echo '
<div id="panier">
    <i class="material-icons icon">
        shopping_cart
    </i>
    <span class="panierNbItem">'.$panierNbItem.'</span>
    <ul id="items">';
        $panierTotal = 0;
        if(!empty($_SESSION['panier'])){
            foreach ($_SESSION['panier'] as $item) {
                echo '<li><span>'.$item['nom'].'</span><span>x'.$item['quantite'].'</span><span>'.$item['prix'].'</span></li>';
                $panierTotal += $item['quantite']*$item['prix'];
            }
        }
    echo '
        <li class="total"><span>Total : </span>'.$panierTotal.'</li>
    </ul>
</div>';

?>

<script src="../js/panier.js" charset="utf-8"></script>
