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
                                echo '<li><a href="'.$value.'.php">'.$value.'</a></li>';
                                require ("./includes/dbconnect.php");
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
