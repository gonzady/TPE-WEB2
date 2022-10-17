<?php

class CategoriesModel {
    private $db_categories;
    
    public function __construct() {
        $this->db_categories = new PDO('mysql:host=localhost;'.'dbname=tpe;charset=utf8', 'root', '');

    }

    public function getAllCategories(){

        $query = $this->db_categories->prepare("SELECT * FROM categories");
        $query->execute();

        $categories = $query->fetchAll(PDO::FETCH_OBJ);

        return $categories;
    }

    public function getFilter($id_categorie){
        $query = $this->db_categories->prepare("SELECT * FROM weapons WHERE id_categorie = ?");
        $query->execute([$id_categorie]);

        $weapons = $query->fetchAll(PDO::FETCH_OBJ);

        return $weapons;

    }

    public function getClass($id){
        $query = $this->db_categories->prepare("SELECT id_categorie FROM weapons WHERE id = ?");
        $query->execute([$id]);

        $weapon= $query->fetch(PDO::FETCH_OBJ);

        $query2 = $this->db_categories->prepare("SELECT class FROM categories WHERE id_categorie = ?");
        $query2->execute([$weapon->id_categorie]);

        $categorie = $query2->fetch(PDO::FETCH_OBJ);

        return $categorie;


    }

    public function insertCategorie($class){
        $query = $this->db_categories->prepare("INSERT INTO categories (class) VALUES (?)");
        $query->execute([$class]);

        return $this->db_categories->lastInsertId();
    }

    function deleteCategorie($id_categorie) {
        $query = $this->db_categories->prepare('DELETE FROM categories WHERE id_categorie = ?');
        $query->execute ([$id_categorie]);
    }

    function editCategorie($class, $id_categorie){
        $query = $this->db_categories->prepare("UPDATE categories SET class = ? WHERE id_categorie = ?");
        $query->execute ([$class, $id_categorie]);

    }



}