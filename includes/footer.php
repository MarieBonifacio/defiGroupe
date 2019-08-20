<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../css/footer.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div>
    <!-- a suppr -->
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
                    require('./dbconnect.php');
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
            <img src="../images/facebook.svg">
            <img src="../images/instagram.svg">
            <img src="../images/twitter.svg">
        </div>
    </footer>
</body>
</html>