<?php
$title = "Inscription";
$css = array("signup","formulaire");
require("./includes/header.php");
?>
<div id="signup" class="formulaire">
    <h1>Inscription</h1>
    <form method="post" action="./controller/signup.php">
        <div class="part">
            <div class="field">
                <label for="mail">Mail :</label>
                <input type="text" id="mail" name="mail" required>
            </div>
            <div class="field">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" required>
            </div>
            <div class="field">
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" required>
            </div>
            <div  class="field">
                <label for="tel">Téléphone :</label>
                <input type="tel" id="tel" name="tel" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" >
            </div>
            <div  class="field">
                <label for="date">Date de Naissance :</label>
                <input type="date" id="date" name="date">
            </div>
        </div>

        <div class="part">
            <div  class="field">
                <label for="adresse">Adresse :</label>
                <input type="text" id="adresse" name="adresse">
            </div>
            <div  class="field">
                <label for="cp">Code Postal :</label>
                <input type="text" id="cp" name="cp">
            </div>
            <div  class="field">
                <label for="ville">Ville :</label>
                <input type="text" id="ville" name="ville">
            </div>
            <div  class="field">
                <label for="pass">Mot de Passe :</label>
                <input type="password" id="pass" name="password" required>
            </div>
            <div  class="field">
                <label for="pass">Confirmation du mot de Passe :</label>
                <input type="password" id="pass" name="password2" required>
            </div>
            <div class="button">
                
            </div>
        </div>
        <div class="part"><button type="submit" id="button">Envoyer</button></div>
    </form>
    <div>
</div>
        <?php
            if(!empty($_SESSION['error'])){
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            }
            
        ?>
    </div>
<?php 
require("./includes/footer.php");
?>