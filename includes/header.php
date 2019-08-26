<?php
session_start();
$timestamp = time() + 365*24*3600; //durée de vie 1 an
$tab = array(1,2,3);
// serialize transforme un tableau en chaine de caractères
$tabS = serialize($tab);
setcookie("derniers_articles", $tabS, $timestamp, null, null, false, true);
?>


<!DOCTYPE html>
<html lang="fr">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="./css/variable.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/menu.css">
    <link rel="stylesheet" href="./css/panier.css">
    <link rel="stylesheet" href="./css/footer.css">
    <?php
    if (!empty($css)) {
        foreach ($css as $value) {
            echo  '<link rel="stylesheet" href="./css/'. $value .'.css">';
        }
    }
    ?>
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <!--link google fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Raleway|Roboto&display=swap" rel="stylesheet">
    <!-- material icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>
    <?php
    if (!empty($title)) {
        echo $title . " - Raieban ";
    }else {
        echo " Raieban ";
    }
    ?>

    </title>

    <?php
    if (!empty($description)) {
        echo  '<meta name="description" content=" ' . $description.' ">';
    }

    if (!empty($keywords)) {
        echo  '<meta name="keywords" content=" ' . $keywords.' ">';
    }
    ?>

</head>

<body>
    <header  id="header">

    <?php include("./includes/menu.php"); ?>
    <?php include("./includes/panier.php"); ?>

    </header>

<div id="contenair">
    <h1 id="mainTitle"><?php echo "RaieBan"; ?></h1>
