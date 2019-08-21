<?php
$timestamp = time() + 365*24*3600; //durée de vie 1 an
$tab = array(1,2,3);
//serialize transforme un tableau en chaine de caractères
$tabS = serialize($tab);
setcookie("derniers_articles", $tabS, $timestamp, null, null, false, true);

///////////////////////////////////////////////////////////////////////////////////////////


$derniersArticles = unserialize( $_COOKIE["derniers_articles"]);

//faire isset pour voir si lecookie existe pour non

if(isset($derniersArticles) AND sizeof($derniersArticles)>=1){
    print_r($derniersArticles);
//Pour chaque élément du taleau avec pour valeur la variable $id
    foreach($derniersArticles AS $id){ 
//connexion base de données
        include("dbconnect.php");
//déclaration de requête sql, je séléctionne tout dans la table articles dans la colonne id
        $sql= "SELECT * FROM articles WHERE id=:id";
//connexion et preparation requête
        $select = $dbh->prepare($sql);
//On assigne la variable $id à la variable sql ":id"
        $select-> bindParam(':id', $id);
        $select->execute();
//on sélétionne une ligne de la table
        $produit = $select->fetch();
        echo $produit['nom'];
        echo $produit['prix'];
        echo $produit['id'].".png";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
</body>
</html>