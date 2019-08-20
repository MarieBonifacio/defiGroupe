<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="../css/sliderPromo.css">
    <title>Document</title>
</head>
<body onload="ChangeImage()">
   <div id="SlidePromo">
        <div id=test></div>
    <img id="imgSliderPromo" src="big1.jpg" alt="">
    
    <?php
    /*
    require("./includes/dbconnect.php");

    $sql = "SELECT * FROM promoslider ORDER BY ordre";
    
    $select = $dbh->query($sql);
    while($row = $select->fetch()){
        echo '<img id="imgSliderPromo" src="./images/promoslider/'.$row['image'].'" alt="'.$row['nom'].'">';
    }*/
    ?>
   </div>

<script src="../js/sliderPromo.js"></script>
</body>
</html>