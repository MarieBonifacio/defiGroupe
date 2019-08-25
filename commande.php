<?php

$title = "Ma Commande";
$css = array("commande");
require("./includes/header.php");
if(!isset($_SESSION['userLog'])){
    header("Location:./login.php");
}
?>

<body>
    <form method="post" action="#">
        <div id="commande">
            <div class="vue">
                <h2>Panier</h2>
                <?php
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
                    </ul>'
                    ?>
                </div>
                <div class="vue">
                    <h2>Adresse de Livraison</h2>
                    <div id="add">
                        <i class="material-icons left">house</i>
                        <i class="material-icons right" id="icon">house</i>
                        <?php
                            echo "<p>".($_SESSION['userLog']['adresse'])."</p>";
                            echo "<p>".($_SESSION['userLog']['cp'])."</p>";
                            echo "<p>".($_SESSION['userLog']['ville'])."</p>";
                        ?>
                    </div>
                    <h2>Mode de Livraison</h2>
                    <div id="mode">
                        <i class="material-icons left">email</i>
                        <i class="material-icons right" id="icon">email</i>
                            <label>
                            <input type="radio" name="mode" value="radio1">
                            Standard</label><br>
                            <label>
                            <input type="radio" name="mode" value="radio2">
                            Express</label>
                    </div>
                    <h2>Mode de Paiement</h2>
                    <div id="pmt">
                        <i class="material-icons left">payment</i>
                        <i class="material-icons right" id="icon">payment</i>
                            <label>
                            <input type="radio" name="paiement" value="radio1">
                            Paypal</label><br>
                            <label>
                            <input type="radio" name="paiement" value="radio2">
                            Carte Bancaire</label>
                        </div>
                        <a class="bouton" href="./pdf.php">Commander</a>
                    </div>
                </div>
        </form>


<?php
require("./includes/footer.php");
?>
