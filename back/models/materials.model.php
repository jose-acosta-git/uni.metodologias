<?php

class MaterialsModel{

    private $database;

    function __construct() {
        $this->database = $this->connect();
    }

    /** Abro la conexión de la base de datos */
    private function connect() {
        $database = new PDO('mysql:host=localhost;'.'dbname=db_motoneta;charset=utf8', 'root', '');  
        return $database;
    }

    function getAll(){
        $query = $this->database->prepare('SELECT * FROM `material_aceptado`');
        $query->execute();
        $materials = $query->fetchAll(PDO::FETCH_OBJ);
        return $materials;
    }

    //Inserta un material que llega por parametro a la base de datos
    function insert($name, $condition, $image) {
        $query = $this->database->prepare('INSERT INTO `material_aceptado`(`nombre_material`, `condicion_entrega`, `imagen_material`) VALUES (?,?,?)');
        $query->execute([$name, $condition, $image]);
        return $this->database->lastInsertId();
    }

    //Obtiene un material de la base de datos dado el id
    function getById($id) {
        $query = $this->database->prepare('SELECT * FROM `material_aceptado` WHERE id_material = ?');
        $query->execute([$id]);
        $material = $query->fetch(PDO::FETCH_OBJ);
        return $material;
    }

    //Modifica los datos de un material dado su id
    function editMaterial($id, $name, $condition, $image) {
        $query = $this->database->prepare('UPDATE material_aceptado SET nombre_material = ?, condicion_entrega = ?, imagen_material = ? WHERE id_material = ?');
        $query->execute($name, $condition, $image, $id);
        return $this->database->lastInsertId();
    }

    //Elimina un material de la base de datos, dado su id
    function deleteMaterial($id) {
        $query = $this->database->prepare('DELETE FROM material_aceptado WHERE id_material = ?');
        $query->execute([$id]);
    }

}