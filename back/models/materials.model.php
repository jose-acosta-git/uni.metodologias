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
        $materials = array(
            array("name" => "plastico"),
            array("name" => "carton")
        );
        return $materials;
    }

    function insert($name, $condition) {
        $query = $this->database->prepare('INSERT INTO `material`(`name`, `condition`) VALUES (?,?)');
        $query->execute([$name, $condition]);
        return $this->database->lastInsertId();
    }

}