<?php
if(!empty($_GET['id'])){
    $title = "Produit";
    $css = ["produit"];
    require("./includes/header.php");

    require('./class/produit.php');
    require('./class/category.php');

    $produit = new Produit();
    $produit->getProduitById($_GET['id']);
    ?>
    <div id="produit">
    <div class="name">
            <?php
            echo $produit->getNom();
            ?>
        </div>
        <div class="Img"><img src="./images/lunette-clasique-je-dis-rien.jpg" alt="img"></div><!--$produit->getImage(); -->
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
            <button class="ajouPanier"type="submit"formmethod="get|post"><i class="material-icons">add_shopping_cart</i>Ajouter panier</button>
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