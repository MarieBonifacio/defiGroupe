<?php
$title = "Profil";
$css = array("profil", "formulaire");
require("./includes/header.php");
?>

<body>
    <div class="profil">
    <h1>Profil</h1>
    <div id="infos"> 
        <?php
//connexion base de données
        require('./includes/dbconnect.php');
        echo "<table class='table'><thead><tr><th></th></tr></thead><tbody>";
//recupération des données de la variable session pour les afficher
                echo "<tr><td>Nom :</td><td>".($_SESSION['userLog']['nom'])."</td></tr>";
                echo "<tr><td>Prénom :</td><td>".($_SESSION['userLog']['prenom'])."</td></tr>";
                echo "<tr><td>Email :</td><td>".($_SESSION['userLog']['email'])."</td></tr>";
                echo "<tr><td>Téléphone :</td><td>".($_SESSION['userLog']['tel'])."</td></tr>";
                echo "<tr><td>Date de Naissance : </td><td>".(date("d/m/Y",$_SESSION['userLog']['birthday']))."</td></tr>";
                echo "<tr><td>Adresse :</td><td>".($_SESSION['userLog']['adresse'])."</td></tr>";
                echo "<tr><td>Code Postal :</td><td>".($_SESSION['userLog']['cp'])."</td></tr>";
                echo "<tr><td>Ville :</td><td>".($_SESSION['userLog']['ville'])."</td></tr>";

            
        echo"</tbody></table>"
        ?>
    </div>

    <div id="formProfil" class="formulaire">
        <form action='./controller/profil.php' method="post">
            <div class="msgError">
                <?php
                    if(!empty($_SESSION['error'])){
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    }
                    
                ?>
            </div>
            <div class="field">  
                <input type="text" id="mail" name="mail" placeholder="email">
            </div>
            <div class="field">
                <input type="text" id="adresse" name="adresse" placeholder="adresse">
            </div>
            <div class="field">
                <input type="text" id="cp" name="cp" placeholder="Code Postal">
            </div>
            <div class="field">
                <input type="tel" id="tel" name="tel" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" placeholder="Numéro de téléphone">
            </div>
            <div class="field">
                <input type="password" name="mdp" placeholder="mot de passe">
            </div>
            <div class="field">
                <input type="password" name="mdp2" placeholder="confirmation">
            </div>
            <div class="part">
                <button id="button" type="submit" name="edit" value="edit">Modifier</button>
                <button id="button" type="submit" name="delete" value="delete">Supprimer le compte</button>
            </div>
        </form>
    </div>
</div>



<?php 
require("./includes/footer.php");
?>