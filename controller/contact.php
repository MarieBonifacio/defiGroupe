<?php
session_start();
if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['mail']) && !empty($_POST['msg'])){
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $mail = $_POST['mail'];
    $msg = htmlspecialchars($_POST['msg']);

    if(!preg_match(" #^[a-z0-9.-]+@[a-z0-9.-]{2,}.[a-z]{2,4}$# ",$mail)){
        $_SESSION['error'] = "Format de l'adresse mail invalide.";
        header('Location:../contact.php');
    }else{
        $to      = 'contact@raieban.com';
        $subject = 'Message en provenance du site Raieban.com';
        $headers = 'From: ' .$mail "\r\n" .
        'Reply-To: contact@raieban.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $msg, $headers);
    }
}else{
    $_SESSION['error'] = "Veuillez remplir tous les champs";
    header('Location:../contact.php');
}
?>
