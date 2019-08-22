<?php
session_start();
//si le login et le mdp ne sont pas vides
if(!empty($_POST['mail']) AND !empty($_POST['password'])){

    $data=[
        "email" => $_POST['mail'],
    ];

    $pwd = $_POST['password'];
    //on se connecte à la base de données
    require('../includes/dbconnect.php');
    //dans une variable $sql, on séléctionne tout de la table user dans la colonne login 
    $sql = "SELECT * FROM users WHERE email=:email";
    // dans une variable select on prépare la requête sql en utilisant la variable de connexion $dbhh
    $select = $dbh->prepare($sql);
    //on execute la requête via le tableau $data
    $select->execute($data);

    //si le nombre de resultat de la requête executée est égale à 1
    if($select->rowCount() == 1){
        //dans une variable $result, on récupère le résultat de la requête
        $result = $select->fetch(PDO::FETCH_ASSOC);

        //si le mot de passe rentré correspond au hash du mdp stocké
        if(password_verify($pwd, $result['password'])){
            $_SESSION["users"]=[
                "id"=> $result["id"],
                "email"=> $result["email"]
            ];
            header("Location: ../profil.php");
        }else{
            header("Location:../login.php");
        }
    }else{
        header("Location:../login.php");
    }
}else{
    header("Location:../login.php");
}

?>