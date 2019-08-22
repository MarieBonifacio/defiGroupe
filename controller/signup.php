<?php
session_start();
//si le login et le mdp ne sont pas vides.
if(!empty($_POST['mail']) AND !empty($_POST['password']) AND !empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['password2'])){
    $birthexplode = explode("-",$_POST['date']);
    $data=[
        "email" => $_POST['mail'],
        "nom" => htmlspecialchars($_POST['nom']),
        "prenom" => htmlspecialchars($_POST['prenom']),
        "pwd" => password_hash($_POST['password'],PASSWORD_DEFAULT),
        "adresse" => htmlspecialchars($_POST['adresse']),
        "cp" => htmlspecialchars($_POST['cp']),
        "ville" => htmlspecialchars($_POST['ville']),
        "tel" => $_POST['tel'],
        "birthday" => mktime(0,0,0,$birthexplode[2], $birthexplode[1], $birthexplode[0]),
        "register" => time()
    ];

//regex verifs
    if(!preg_match(" #^[a-z0-9.-]+@[a-z0-9.-]{2,}.[a-z]{2,4}$# ",$data["email"])){
        $_SESSION['error']= "Format mail non valide";
        header("Location:../signup.php");
    } else if(!preg_match("#^[0-9]{5}$#",$data["cp"])){
        $_SESSION['error']= "Format code postal non valide";
        header("Location:../signup.php");
    } else if(!preg_match(" #^0[1-9]([-. ]?[0-9]{2}){4}$# ",$data["tel"])){
        $_SESSION['error']= "Format numéro de téléphone non valide";
        header("Location:../signup.php");
    } else if($_POST['password'] != $_POST['password2']){
        $_SESSION['error']= "Mot de passe différent";
        header("Location:../signup.php");
    }else{
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
    }
}else{
    $_SESSION['error']="Veuillez remplir tous les champs marqués d'une astérisque";
    header('Location:../signup.php');

}

?>



