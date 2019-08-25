<?php require ("./includes/config.php"); ?>

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
                                echo '<li class="submenuTitle" rel="cat">'.$value.'';
                                require ("./includes/dbconnect.php");
                                $sql = "SELECT * FROM categories ORDER BY ordre";
                                $select = $dbh->query($sql);
                                echo '<ul class="submenuroll" rel="cat">';
                                    while($row = $select->fetch()){
                                        echo '<li><a class="submenu" href="./category.php?id='.$row["id"].'">'.$row["nom"].'</a></li>';
                                    }
                                echo '</ul></li>';
                            }elseif($value == "compte"){
                                if(isset($_SESSION['userLog'])){
                                    echo '<li><a href="profil.php">Profil</a></li>';
                                    echo '<li><a href="deconnexion.php">Deconnexion</a></li>';
                                }else{
                                    echo '<li><a href="./login.php">Connexion</a></li>';
                                    echo '<li><a href="./signup.php">Inscription</a></li>';

                                }
                            }elseif($value == "accueil"){
                                echo '<li><a href="index.php">'.$value.'</a></li>';
                            } else {
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
