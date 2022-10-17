<?php

class WeaponsModel {
    private $db_weapons;
    
    public function __construct() {
        $this->db_weapons = new PDO('mysql:host=localhost;'.'dbname=tpe;charset=utf8', 'root', '');

    }

    public function getAllWeapons() {
    $query = $this->db_weapons->prepare("SELECT * FROM weapons");
    $query->execute();

    $weapons = $query->fetchAll(PDO::FETCH_OBJ);

    return $weapons;
    }

    public function getSingleWeapon($id) {
    $query = $this->db_weapons->prepare('SELECT * FROM weapons WHERE id = ?');
    $query->execute ([$id]);

    $weapon = $query->fetch(PDO::FETCH_OBJ);

    return $weapon;
    }

    function deleteWeapon($id) {
    $query = $this->db_weapons->prepare('DELETE FROM weapons WHERE id = ?');
    $query->execute ([$id]);
    }

    function insertWeapon($weapon_name, $id_categorie, $price, $damage, $bullets, $reach) {
    $query = $this->db_weapons->prepare("INSERT INTO weapons (weapon_name, id_categorie, price, damage, bullets, reach) VALUES (?, ?, ?, ?, ?, ?)");
    $query->execute([$weapon_name, $id_categorie, $price, $damage, $bullets, $reach]);

    return $this->db_weapons->lastInsertId();

    }

    function editWeapon($weapon_name, $categorie, $price, $damage, $bullets, $reach, $id){
    $query = $this->db_weapons->prepare("UPDATE weapons SET weapon_name = ?, id_categorie = ?, price = ?, damage = ?, bullets = ?, reach = ? WHERE id = ?");
    $query->execute([$weapon_name, $categorie, $price, $damage, $bullets, $reach, $id]);

    }

}