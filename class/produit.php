<?php

class Produit{
    private $id = "";
    private $nom = "";
    private $description = "";
    private $prix = "";
    private $stock = "";
    private $category = "";

    public function __construct(){}

    public function getProduitById($id){
        require(dirname(__DIR__).'/includes/dbconnect.php');
        $sql = "SELECT * FROM produits WHERE id=:id";
        $select = $dbh->prepare($sql);
        $select->bindParam(':id', $id);
        $select->execute();
        if($select->rowCount() == 1){
            $result = $select->fetch();
            $this->id = $result['id'];
            $this->nom = $result['nom'];
            $this->description = $result['description'];
            $this->prix = $result['prix'];
            $this->stock = $result['stock'];
            $id_category = $result['id'];
            $this->category= new Category();
            $this->category->getCategoryById($id_category);
            return $this;
        }else{
            return 0;
        }
    }

    public function getId(){
        return $this->id;
    }

    public function getNom(){
        return $this->nom;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getPrix(){
        return $this->prix;
    }

    public function getStock(){
        return $this->stock;
    }

    public function getCategory(){
        return $this->category;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }

    public function setDescription($description){
        $this->description = $description;
    }

    public function setPrix($prix){
        $this->prix = $prix;
    }

    public function setStock($stock){
        $this->stock = $stock;
    }

    public function setCategory($category){
        $this->category = $category;
    }

    public function save(){
        if($this->id == ""){
            require(dirname(__DIR__).'/includes/dbconnect.php');
            $sql = "INSERT INTO produits(nom, description, prix, stock, category_id) VALUES(:nom, :description, :prix, :stock, :category_id)";
            $insert = $dbh->prepare($sql);
            $insert->bindParam(':nom', $this->nom);
            $insert->bindParam(':description', $this->description);
            $insert->bindParam(':prix', $this->prix);
            $insert->bindParam(':stock', $this->stock);
            $insert->bindParam(':category_id', $this->stock->getId());
            if( $insert->execute() == 1){
                $this->id = $dbh->lastInsertId();
                return $this->id;
            }
            return 0;
        }
        return 0;
    }

    public function update(){
        if($this->id != ""){
            $require(dirname(__DIR__).'/includes/dbconnect.php');
            $sql = "UPDATE produits SET nom=:nom, description=:description, prix=:prix, stock=:stock, category_:category_id";
            $update = $dbh->prepare($sql);
            $update->bindParam(':nom', $this->nom);
            $update->bindParam(':description', $this->description);
            $update->bindParam(':prix', $this->prix);
            $update->bindParam(':stock', $this->stock);
            $update->bindParam(':category_id', $this->stock->getId());
            return $update->execute();
        }
        return 0;
    }

    public function delete(){
        if($this->id != ""){
            $sql = "DELETE FROM produits WHERE id=:id";
            $delete = $dbh->prepare($sql);
            $delete->bindParam(':id', $this->id);
            return $delete->execute();
        }
        return 0;
    }

}
?>
