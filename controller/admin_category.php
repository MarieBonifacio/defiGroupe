<?php
require('../class/category.php');

if(isset($_POST['action'])){
    switch($_POST['action']){
        case 'Ajouter':
            if(!empty($_POST['nom'])){
                $nom = htmlspecialchars($_POST['nom']);
                $category = new Category();
                $category->setNom($nom);
                require('../includes/dbconnect.php');
                $sql = "SELECT MAX(ordre) AS maxOrdre FROM categories";
                $select = $dbh->query($sql);
                $result = $select->fetch();
                $newOrdre = $result['maxOrdre']+1;
                $category->setOrdre($newOrdre);
                if ($category->save() != 0){
                    header('Location: ../admin_category.php');
                }else{
                    echo 'ERROR';
                }
            }
        break;
        case 'Editer':
            if(!empty($_POST['id']) && !empty($_POST['nom']) && !empty($_POST['ordre'])){
                $id = htmlspecialchars($_POST['id']);
                $nom = htmlspecialchars($_POST['nom']);
                $ordre = htmlspecialchars($_POST['ordre']);

                $category = new Category();
                $category->getCategoryById($id);
                $category->setNom($nom);
                $category->setOrdre($ordre);
                if ($category->update() != 0){
                    header('Location: ../admin_category.php');
                }else{
                    echo 'ERROR';
                }
            }
        break;
        case 'Supprimer':
            if(!empty($_POST['id'])){
                $id = htmlspecialchars($_POST['id']);
                $category = new Category();
                $category->getCategoryById($id);
                if ($category->delete() != 0){
                    header('Location: ../admin_category.php');
                }else{
                    echo 'ERROR';
                }
            }
        break;
    }
}
?>
