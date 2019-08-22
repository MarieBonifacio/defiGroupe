<?php
$title = "Connexion";
$css = array("login","formulaire");
require("./includes/header.php");
?>
<body>
<div id="login" class="formulaire">
    <h1>Connexion</h1>
    <form method="post" action="controller/login.php" class="formulaire">
        <div class="msgError">
            <?php
                if(!empty($_SESSION['error'])){
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                }
                
            ?>
        </div>
        <div class="field">
            <label for="mail">Mail:</label>
            <input type="text" id="mail" name="mail" required>
        </div>
        <div class="field">
            <label for="pass">Mot de Passe :</label>
            <input type="password" id="pass" name="password" required>
        </div>
        <div class="button">
            <button id="button" type="submit">Connexion</button>
        </div>
    </form>
</div>
 
<?php 
require("./includes/footer.php");
?>