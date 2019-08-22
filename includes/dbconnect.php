
<?php
require(dirname(__DIR__).'/includes/config.php');

try {
    $dbh = new PDO('mysql:host='.$dbhost.';dbname='.$dbname, $dbuser, $dbpass);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>
