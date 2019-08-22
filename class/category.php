<?php

class Category{
    private $id = "";
    private $nom  = "";
    private $ordre = "";

    public function __construct(){}

    public function getCategoryById($id){
        require('../includes/dbconnect.php');
        $sql = "SELECT * FROM categories WHERE id=:id";
        $select = $dbh->prepare($sql);
        $select->bindParam(':id', $id);
        $select->execute();
        if($select->rowCount() == 1){
            $result = $select->fetch();
            $this->id = $result['id'];
            $this->nom = $result['nom'];
            $this->ordre = $result['ordre'];
            return $this;
        }else{
            return 0;
        }
    }

    public function getCategoryByName($nom){
        require('../includes/dbconnect.php');
        $sql = "SELECT * FROM categories WHERE nom=:nom";
        $select = $dbh->prepare($sql);
        $select->bindParam(':nom', $nom);
        $select->execute();
        if($select->rowCount() == 1){
            $result = $select->fetch();
            $this->id = $result['id'];
            $this->nom = $result['nom'];
            $this->ordre = $result['ordre'];
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

    public function getOrdre(){
        return $this->ordre;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }

    public function setOrdre($ordre){
        $this->ordre = $ordre;
    }

    public function save(){
        require('../includes/dbconnect.php');
        if(!$this->nomExist()){
            $sql = "INSERT INTO categories(nom, ordre) VALUES(:nom, :ordre)";
            $insert = $dbh->prepare($sql);
            $insert->bindParam(':nom', $this->nom);
            $insert->bindParam(':ordre', $this->ordre);
            $insert->execute();
            $this->id = $dbh->lastInsertId();
            return $this->id;
        }else{
            return "Nom existe déjà";
        }

    }

    public function update(){
        require('../includes/dbconnect.php');
        if($this->id != ""){
            $sql = "UPDATE categories SET nom=:nom, ordre=:ordre WHERE id=:id";
            $update = $dbh->prepare($sql);
            $update->bindParam(':id', $this->id);
            $update->bindParam(':nom', $this->nom);
            $update->bindParam(':ordre', $this->ordre);
            return $update->execute();
        }
        return 0;
    }

    public function delete(){
        if($this->id != ""){
            require('../includes/dbconnect.php');
            $sql = "DELETE FROM categories WHERE id=:id";
            $delete = $dbh->prepare($sql);
            $delete->bindParam(':id', $this->id);
            return $delete->execute();
        }
        return 0;
    }

    private function nomExist(){
        require('../includes/dbconnect.php');
        $sql = "SELECT id FROM categories WHERE nom=:nom";
        $select = $dbh->prepare($sql);
        $select->bindParam(':nom', $this->nom);
        $select->execute();
        return ($select->rowCount() == 0)?0:1;
    }
}

?>
