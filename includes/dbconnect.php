<?php

$user= "Marie2";
$password= "Ninmarie0.";


try{
    $dbh = new PDO('mysql:host=localhost;dbname=lunettes', $user, $password);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}


?>