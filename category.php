<?php
$css = array('category');
$title = 'Categorie';
require('./includes/header.php');

require_once('./class/category.php');
if(!empty($_GET['id'])){
    $id = htmlspecialchars($_GET['id']);
    $cat = new Category();
    $cat->getCategoryById($id);
}else{
    header('Location:./index.php');
}
?>

    <div id="category">
        <div class="filter">
            <div class="button">
                <button class="filterButton choixCouleurs">Couleurs</button>
                <button class="filterButton choixFormes">Formes</button>
                <button class="filterButton choixMatieres">Matières</button>
                <button class="filterButton submit" type="submit">Go</button>
                <div class="couleurs">
                    <input type="checkbox" name="couleurs" value="jaune">Jaune<br>
                    <input type="checkbox" name="couleurs" value="vert">Vert<br>
                    <input type="checkbox" name="couleurs" value="rouge">Rouge<br>
                    <input type="checkbox" name="couleurs" value="bleu">Bleu<br>
                </div>
                <div class="formes">
                    <input type="checkbox" name="formes" value="carre">Carré<br>
                    <input type="checkbox" name="formes" value="ronde">Ronde<br>
                    <input type="checkbox" name="formes" value="ovale">Ovale<br>
                </div>
                <div class="matieres">
                    <input type="checkbox" name="matieres" value="fer">Fer<br>
                    <input type="checkbox" name="matieres" value="fonte">Fonte<br>
                    <input type="checkbox" name="matieres" value="inox">Inox<br>
                </div>
            </div>
        </div>
        <div class="produits">
            <?php
            $produits = $cat->getProduits("");
            foreach ($produits as $produit) {
                echo '

                <div class="produit">
                    <a href="./produit.php?id='.$produit->getId().'">
                        <img src="./images/produits/'.$produit->getId().'.png" alt="'.$produit->getNom().'"/>
                        <div>
                            <span class="nom">'.$produit->getNom().'</span>
                            <span class="prix">'.$produit->getPrix().'&euro;</span>
                        </div>
                    </a>
                    <a href="./controller/panier.php?produit='.$produit->getId().'" class="toBasket"><i class="material-icons">add_shopping_cart</i></a>
                </div>
                ';
            }
            ?>
        </div>
    </div>
<?php
$js = ["category"];
require("./includes/footer.php");
?>
