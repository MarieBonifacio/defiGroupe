<?php
session_start();

if(!empty($_POST['user_email'])){
    $data=[
        "mail" => $_POST['user_email']
    ];
    
    if(!preg_match(" #^[a-z0-9.-]+@[a-z0-9.-]{2,}.[a-z]{2,4}$# ",$data["mail"])){
        $_SESSION['errorMail']= "Format mail non valide";
    }
    //connexion à la base de données
    require('../includes/dbconnect.php');
    $sql = "SELECT id FROM mailing_list WHERE mail=:mail";
    $select = $dbh->prepare($sql);
    $select->bindParam(':mail', $data["mail"]);
    $select->execute();
    if($select->rowCount()!=0){
        $_SESSION['errorMail']="Mail déjà existant";
    }else{
        //On insère dans la table user correspondant à la ligne mail les valeurs du $data mail.
        $sql = "INSERT INTO mailing_list (mail) VALUES (:mail)";
        //dans un variable $insert, on prépare la requête indiquée au dessus ($sql) avec la variable qui contient la connexion sql
        $insert = $dbh->prepare($sql);
        //on execute la requête avec le tableau $data
        $insert->execute($data);
    }
    //renvoi page d'origine
    header('Location:' .$_SERVER['HTTP_REFERER']);
}else{
    $_SESSION['errorMail']="Veuillez remplir le champ";
    header('Location:' .$_SERVER['HTTP_REFERER']);
}


?>