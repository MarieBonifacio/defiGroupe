<?php
$title = "Admin Category";
$css = ['admin', 'formulaire'];
require('./includes/header.php');
?>

<div id="admin" class="formulaire">
    <h1>Gestion produits</h1>
    <form method="post" action="./controller/admin_produit.php" class="formulaire">
        <h2>Ajout produit</h2>
        <div class="msgError">
            <?php
                if(!empty($_SESSION['errorAddPrd'])){
                    echo $_SESSION['errorAddPrd'];
                    unset($_SESSION['errorAddPrd']);
                }
            ?>
        </div>
        <div class="field">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required />
        </div>
        <div class="field">
            <label for="description">Description :</label>
            <textarea id="description" name="description"></textarea>
        </div>
        <div class="field">
            <label for="prix">Prix :</label>
            <input type="text" id="prix" name="prix" required />
        </div>
        <div class="field">
            <label for="stock">Stock :</label>
            <input type="text" id="stock" name="stock" required />
        </div>
        <div class="field">
            <label for="category">Categorie:</label>
            <select name="category" id="category">
                <?php
                require('./includes/dbconnect.php');
                $sql = "SELECT * FROM categories";
                $select = $dbh->prepare($sql);
                $select->execute();
                while ($row = $select->fetch()){
                    echo '<option value="'.$row['id'].'">'.$row['nom'].'</option>';
                }
                ?>
            </select>
        </div>
        <div class="button">
            <button id="button" type="submit" name="action" value="Ajouter">Ajouter</button>
        </div>
    </form>

    <form>
        <h2>Edition produit</h2>
        <div class="msgError">
            <?php
                if(!empty($_SESSION['errorEditPrd'])){
                    echo $_SESSION['errorEditPrd'];
                    unset($_SESSION['errorEditPrd']);
                }
            ?>
        </div>
        <?php
        echo '
        <div class="flex">
            <h3>Id</h3>
            <h3>Nom</h3>
            <h3>Description</h3>
            <h3>Prix</h3>
            <h3>Stock</h3>
            <h3>Categorie</h3>
            <div class="category_action"></div>
        </div>
        ';
        require('./includes/dbconnect.php');
        $sql = "SELECT * FROM produits";
        $select = $dbh->prepare($sql);
        $select->execute();
        while ($row = $select->fetch()){
            echo '
            <div class="flex" id="editLine_'.$row['id'].'">
                <div class="prd_id">
                    '.$row['id'].'
                </div>
                <div class="info prd_nom" rel="nom">
                    '.$row['nom'].'
                </div>
                <div class="info prd_desc" rel="ordre">
                    '.$row['description'].'
                </div>
                <div class="info prd_prix" rel="ordre">
                    '.$row['prix'].'
                </div>
                <div class="info prd_stock" rel="ordre">
                    '.$row['stock'].'
                </div>
                <div class="info prd_cat" rel="ordre">
                    '.$row['category_id'].'
                </div>
                <div class="category_action">
                    <i class="material-icons editPrd" rel="'.$row['id'].'">edit</i>
                    <i class="material-icons deletePrd" rel="'.$row['id'].'">delete</i>
                </div>
            </div>
            ';
        }
        ?>
    </form>
</div>
<?php
$js = ['admin_category'];
require('./includes/footer.php');
?>
