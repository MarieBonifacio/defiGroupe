<?php
session_start();
//si le login et le mdp ne sont pas vides.
if(!empty($_POST['mail']) AND !empty($_POST['password']) AND !empty($_POST['nom']) AND !empty($_POST['prenom'])){
    $data=[
        "email" => $_POST['mail'],
        "nom" => htmlspecialchars($_POST['nom']),
        "prenom" => htmlspecialchars($_POST['prenom']),
        "pwd" => password_hash($_POST['password'],PASSWORD_DEFAULT),
        "pwd2" => password_hash($_POST['password2'],PASSWORD_DEFAULT),
        "adresse" => htmlspecialchars($_POST['adresse']),
        "cp" => htmlspecialchars($_POST['cp']),
        "ville" => htmlspecialchars($_POST['ville']),
        "tel" => $_POST['tel'],
        "birthday" => $_POST['date'],
        "register" => time()
        
    ];
    //connexion à la base de données
    require('../includes/dbconnect.php');

    $sql = "SELECT id FROM users WHERE email=:email";
    $select = $dbh->prepare($sql);
    $select->bindParam(':email', $data["email"]);
    $select->execute();
    if($select->rowCount()==1){
        $_SESSION['error']="Mail déjà existant";
        header("Location:../signup.php");
    }
    //On insère dans la table user correspondant aux colonnes login et password les valeurs du $data login et password.
    $sql = "INSERT INTO 
        users (nom, prenom, email, adresse, cp, ville, telephone, birthday, password, permission, register, lastLogin) 
    VALUES 
        (:nom, :prenom, :email, :adresse, :cp, :ville, :tel, :birthday, :pwd, 0, :register, 0)";
    //dans un variable $insert, on prépare la requête indiquée au dessus ($sql) avec la variable qui contient la connexion sql
    $insert = $dbh->prepare($sql);
    //on execute la requête avec le tableau $data
    $insert->execute($data);
    //On renvoit à la page login
    header('Location:../login.php');
}else{
    $_SESSION['error']="Veuillez remplir tous les champs marqués d'une astérisque";
    header('Location:../signup.php');

}

//si le mot de passe et le mot de passe 2 sont différents
if(!empty($_POST['password'])AND !empty($_POST['password2'])){
    if($_POST['password'] != $_POST['password2']){
        $_SESSION['error']= "Mot de passe différent";
        header("Location:../signup.php");
    }
}


?>



?>