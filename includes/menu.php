<?php require ("config.php"); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="../css/menu.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
</head>
<body>
    <div id="menu">
        <div class="header">
            <div id="button">
                <div class="imgburger"></div>
                <div class="imgburger"></div>
                <div class="imgburger"></div>
            </div>
        </div>

        <div class="menuburger">
                <ul>
                    <?php
                        foreach($nav as $value){
                            if($value == "categories"){
                                echo '<li><a href="'.$value.'.php">'.$value.'</a></li>';
                                require ("./dbconnect.php");
                                $sql = "SELECT * FROM categories ORDER BY ordre";
                                $select = $dbh->query($sql);
                                while($row = $select->fetch()){
                                    echo '<li><a class="submenu" href="'.$row["nom"].'.php">'.$row["nom"].'</a></li>';
                                } 
                                

                            }elseif($value == "compte"){
                                if(isset($_SESSION['userLog'])){
                                    echo '<li><a href="profil.php">Profil</a></li>';
                                    echo '<li><a href="deconnexion.php">Deconnexion</a></li>';
                                }else{
                                    echo '<li><a href="./connexion.php">Connexion</a></li>';
                                    echo '<li><a href="./inscription.php">Inscription</a></li>';
                                    
                                } 
                            }else {
                                echo '<li><a href="'.$value.'.php">'.$value.'</a></li>';
                            }
                        }
                        ?>
                        <button class="opensearch"><i class="material-icons">search</i></button>
                        
                        <div class="searchbar">
                            <input type="search"><button class="search"><i class="material-icons">search</i></button>
                        </div>
                </ul>
                
            </div>
    </div>

    <script src="../js/menu.js"></script>

    </body>
    </html>