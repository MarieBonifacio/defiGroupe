<?php
require('../class/category.php');
require('../class/produit.php');

if(isset($_POST['action'])){
    switch($_POST['action']){
        case 'Ajouter':
            if(!empty($_POST['nom']) && !empty($_POST['description']) && !empty($_POST['prix']) && !empty($_POST['stock']) && !empty($_POST['category'])){
                $nom = htmlspecialchars($_POST['nom']);
                $description = htmlspecialchars($_POST['description']);
                $prix = htmlspecialchars($_POST['prix']);
                $stock = htmlspecialchars($_POST['stock']);
                $category_id = htmlspecialchars($_POST['category']);
                $category = new Category();
                $category->getCategoryById($category_id);

                $produit = new Produit();
                $produit->setNom($nom);
                $produit->setDescription($description);
                $produit->setPrix($prix);
                $produit->setStock($stock);
                $produit->setCategory($category);

                if ($produit->save() != 0){
                    header('Location: ../admin_produit.php');
                }else{
                    echo 'ERROR';
                }
            }
        break;
        case 'Editer':

        break;
        case 'Supprimer':
            if(!empty($_POST['id'])){
                $id = htmlspecialchars($_POST['id']);
                $produit = new Produit();
                $category->getProduitById($id);
                if ($produit->delete() != 0){
                    header('Location: ../admin_produit.php');
                }else{
                    echo 'ERROR';
                }
            }
        break;
    }
}
?>
