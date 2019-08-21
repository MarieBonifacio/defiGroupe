<?php
session_start();
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
