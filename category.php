<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="css/category.css" rel="stylesheet">
    
</head>
<body>
    <div id="produits">
        <div class="button">
            <button class="choixCouleurs">Couleurs</button>
            <button class="choixFormes">Formes</button>
            <button class="choixMatieres">Matières</button>
            <button class="submit" type="submit">Go</button>
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

    <?php

    $cat = new Category();
    $cat->getCategoryById($_GET['id']);

    $produits = $cat->getProduits($filter);


    ?>

<script src="js/category.js"></script>
</body>
</html>