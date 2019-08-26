<?php
$title = "Admin Category";
$css = ['admin', 'formulaire'];
require('./includes/header.php');
?>

<div id="admin" class="formulaire">
    <h1>Gestion categories</h1>
    <form method="post" action="./controller/admin_category.php" class="formulaire">
        <h2>Ajout catégorie</h2>
        <div class="msgError">
            <?php
                if(!empty($_SESSION['errorAddCat'])){
                    echo $_SESSION['errorAddCat'];
                    unset($_SESSION['errorAddCat']);
                }
            ?>
        </div>
        <div class="field">
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" required />
        </div>
        <div class="button">
            <button id="button" type="submit" name="action" value="Ajouter">Ajouter</button>
        </div>
    </form>

    <form>
        <h2>Edition catégorie</h2>
        <div class="msgError">
            <?php
                if(!empty($_SESSION['errorEditCat'])){
                    echo $_SESSION['errorEditCat'];
                    unset($_SESSION['errorEditCat']);
                }
            ?>
        </div>
        <?php
        echo '
        <div class="flex">
            <h3>Id</h3>
            <h3>Nom</h3>
            <h3>Ordre</h3>
            <div class="category_action"></div>
        </div>
        ';
        require('./includes/dbconnect.php');
        $sql = "SELECT * FROM categories";
        $select = $dbh->prepare($sql);
        $select->execute();
        while ($row = $select->fetch()){
            echo '
            <div class="flex" id="editLine_'.$row['id'].'">
                <div class="category_id">
                    '.$row['id'].'
                </div>
                <div class="info category_nom" rel="nom">
                    '.$row['nom'].'
                </div>
                <div class="info category_ordre" rel="ordre">
                    '.$row['ordre'].'
                </div>
                <div class="category_action">
                    <i class="material-icons editCat" rel="'.$row['id'].'">edit</i>
                    <i class="material-icons deleteCat" rel="'.$row['id'].'">delete</i>
                </div>
            </div>
            ';
        }
        ?>
    </form>
</div>
<?php
$js = ['admin','admin_category'];
require('./includes/footer.php');
?>
