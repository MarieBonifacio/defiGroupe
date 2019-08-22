,<?php
session_start();

//connexion base de donnée
require('../includes/dbconnect.php');
if(isset($_POST['delete'])){
    $sql = "DELETE FROM users WHERE id=:id";
    $delete= $dbh->prepare($sql);
    $delete->bindParam(":id", $_SESSION["userLog"]["id"]);
    $delete->execute();
    unset($_SESSION);
    session_destroy();
    header("Location:../login.php");
}else{
    if(!empty($_POST['mail'])){
        $mail= $_POST['mail'];
        //requête (selectionne l'id de la table user où la valeur entrée est la même que celle dans la table)
        $sql = "SELECT id FROM users WHERE email=:email";
        //preparation requête à partir de la variable de connexion sql
        $select= $dbh->prepare($sql);
        //J'affecte la valeur entrée à la la variable sql
        $select->bindParam(":email", $mail);
        $select->execute();
        //si la valeur entrée se situe déjà dans la table 
        if($select->rowCount()==1){
            $_SESSION['error']="Mail existant";
            header("Location:../profil.php");
        }
        //requête qui met à jour la table users le mail qui correspond à l'id de l'utilisateur
        $sql= "UPDATE users SET email=:email WHERE id=:id";
        $update=$dbh->prepare($sql);
        //attribue la valeur entrée à la variable sql
        $update->bindParam(":email", $mail);
        //attribue la variable session id à la variable sql id
        $update->bindParam(":id", $_SESSION["userLog"]["id"]);
        $update->execute();
    }
//maj adresse
    if(!empty($_POST['adresse'])){
        $add= $_POST['adresse'];
        $sql= "UPDATE users SET adresse=:adresse WHERE id=:id";
        $update=$dbh->prepare($sql);
        //attribue la valeur entrée à la variable sql
        $update->bindParam(":adresse", $add);
        //attribue la variable session id à la variable sql id
        $update->bindParam(":id", $_SESSION["userLog"]["id"]);
        $update->execute();
    }
// maj CP
    if(!empty($_POST['cp'])){
        $cp= $_POST['cp'];
        $sql= "UPDATE users SET cp=:cp WHERE id=:id";
        $update=$dbh->prepare($sql);
        //attribue la valeur entrée à la variable sql
        $update->bindParam(":cp", $cp);
        //attribue la variable session id à la variable sql id
        $update->bindParam(":id", $_SESSION["userLog"]["id"]);
        $update->execute();
    }
//maj tel
    if(!empty($_POST['tel'])){
        $tel= $_POST['tel'];
        $sql= "UPDATE users SET telephone=:tel WHERE id=:id";
        $update=$dbh->prepare($sql);
        //attribue la valeur entrée à la variable sql
        $update->bindParam(":tel", $tel);
        //attribue la variable session id à la variable sql id
        $update->bindParam(":id", $_SESSION["userLog"]["id"]);
        $update->execute();
    }

    if(!empty($_POST['mdp'])AND !empty($_POST['mdp2'])){
        if($_POST['mdp'] != $_POST['mdp2']){
            $_SESSION['error']= "Mot de passe différent";
            header("Location:../profil.php");
        }
        $mdp = password_hash($_POST['mdp'],PASSWORD_DEFAULT);
        $sql= "UPDATE users SET password=:password WHERE id=:id";
        $update=$dbh->prepare($sql);
        $update->bindParam(":password", $mdp);
        $update->bindParam(":id", $_SESSION['userLog']['id']);
        $update->execute();
        
    }
    $_SESSION['success']="Modification enregistrée";
    header("Location:../profil.php");
}



?>

