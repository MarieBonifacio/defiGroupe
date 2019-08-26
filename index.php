<?php
$css = ['modulecategory', "sliderPromo"];
$titre = "Accueil";
require('./includes/header.php');


include('./includes/sliderPromo.php');
include('./includes/sliderTopVentes.php');
include('./includes/modulecategory.php');
include('./includes/blocDerniersArticles.php');

$js = ["sliderPromo"];
require('./includes/footer.php');
?>
