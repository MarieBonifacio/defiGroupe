<?php
if(!empty($_GET['id'])){
    $title = "Produit";
    $css = ["produit"];
    require("./includes/header.php");

    $produit = new Produit();
    $produit->getProduitById($_GET['id']);
    ?>
    <div id="produit">
    <div class="name">
            <?php
            echo '<h2>'.$produit->getNom().'</h2>';
            ?>
        </div>
        <?php
            echo '<div class="Img"><img src="./images/produits/'.$produit->getId().'.png" alt="img"></div>';
        ?>
        <div class="flex">
            <div class="stock">
                <?php
                if ($produit->getStock() < 10) {
                    echo '<span class="color-red">en stock ' .$produit->getStock().'</span>';
                }else {
                    echo '<span class="color-green">en stock ' .$produit->getStock().'</span>';
                }

                ?>
            </div>
            <div class="Price">
                <?php
                    echo '<span class="prix">prix '.$produit->getPrix().' €</span>';
                ?>
            </div>
        </div>
        <div class="flex">
            <?php
            echo '<a href="./controller/panier.php?produit='.$produit->getId().'" class="ajouPanier"type="submit"formmethod="get|post"><i class="material-icons">add_shopping_cart</i>Ajouter panier</a>';
            ?>
        </div>
    <div class="description">
        <?php
        echo $produit->getDescription();
        ?>
    </div>
</div>
<?php
    require("./includes/footer.php");

}else{
    header('Location:./index.php');
}

?>
