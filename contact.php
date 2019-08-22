<?php
$css = array('contact', 'formulaire');
$title = 'Contact';
require('./includes/header.php');
?>
<div id="contact" class="formulaire">
    <h1>Contact</h1>
    <form method="post" action="./controller/contact.php">
        <div class="part">
            <div class="field">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" required>
            </div>
            <div class="field">
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" required>
            </div>
            <div class="field">
                <label for="mail">Prénom :</label>
                <input type="email" id="mail" name="mail" required>
            </div>
            <div class="field">
                <label for="msg">Message :</label>
                <textarea id="msg" name="msg"></textarea>
            </div>
        </div>
        <div class="part"><button type="submit" id="button">Envoyer</button></div>
    </form>
</div>
<?php
require('./includes/footer.php');
?>
