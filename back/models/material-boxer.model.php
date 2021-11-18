<?php

class MaterialBoxerModel{

    private $database;

    function __construct() {
        $this->database = $this->connect();
    }

    /** Abro la conexión de la base de datos */
    private function connect() {
        $database = new PDO('mysql:host=localhost;'.'dbname=db_motoneta;charset=utf8', 'root', '');  
        return $database;
    }

    function getByBoxer($id){
        $query = $this->database->prepare('SELECT * FROM material_cartonero m JOIN material_aceptado k on m.id_material = k.id_material WHERE m.dni_cartonero = ?');
        $query->execute([$id]);
        $materials = $query->fetchAll(PDO::FETCH_OBJ);
        return $materials;
    }
    
    function insert($boxer, $material, $weight){
        $query = $this->database->prepare('INSERT INTO material_cartonero (dni_cartonero, id_material, peso) VALUES (?, ?, ?)');
        $query->execute([$boxer, $material, $weight]);
        $getmaterial = $this->get($boxer, $material);
        return $getmaterial;
    }

    function update($boxer, $material, $weight){
        $query = $this->database->prepare('UPDATE material_cartonero SET dni_cartonero = ?, id_material = ?, peso = ? WHERE dni_cartonero = ? and id_material = ?');
        $query->execute([$boxer, $material, $weight, $boxer, $material]);
        $getmaterial = $this->get($boxer, $material);
        return $getmaterial;
    }

    function get($boxer, $material){
        $query = $this->database->prepare('SELECT * FROM material_cartonero m JOIN material_aceptado k on m.id_material = k.id_material WHERE m.dni_cartonero = ? AND m.id_material = ?');
        $query->execute([$boxer, $material]);
        $material = $query->fetch(PDO::FETCH_OBJ);
        return $material;
    }

    function getMaterialBoxer($boxer, $material){
        $query = $this->database->prepare('SELECT * FROM material_cartonero WHERE dni_cartonero = ? AND id_material = ?');
        $query->execute([$boxer, $material]);
        $material = $query->fetch(PDO::FETCH_OBJ);
        return $material;
    }
}