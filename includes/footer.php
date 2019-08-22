    </div>
    <footer id="footer">
        
        <div class="mailinglist">
                <span id="abo"><i class="material-icons">email</i>
                Abonnez-vous !<br></span>
            <p>
            Laissez votre adresse mail pour rester informés de nos nouveautés:</p>
            <form class="formmailinglist" action="../controller/mailinglist.php">
                <input class="inputmailinglist" type="email" name="user_email" placeholder="adresse e-mail">
                <button class="buttonmail" type="submit" value="submit"><i class="material-icons orange">arrow_forward_ios</i></button>
            </form>
        </div>
        <div class="menufooter">
            <ul>

                <?php
                    require('./includes/dbconnect.php');
                    $sql= "SELECT * FROM categories ORDER BY ordre";
                    $select= $dbh->query($sql);
                    while($row=$select->fetch()){
                        echo "<li id='menufooter'><a href='#'>".$row['nom']."</a></li>";
                    }
                ?>
            </ul>
        </div>
        <div class="navig">
            <ul>
                <li><a href="#">A propos</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
        <div class="reseaux">
            <img src="./images/facebook.svg">
            <img src="./images/instagram.svg">
            <img src="./images/twitter.svg">
        </div>
    </footer>
</body>
<script src="./js/panier.js" charset="utf-8"></script>
<script src="./js/menu.js" charset="utf-8"></script>

<?php
if(!empty($js)){
    foreach($js as $value){
        echo '<script src="./js/'.$value.'.js" charset="utf-8"></script>';
    }
}
?>
</html>
