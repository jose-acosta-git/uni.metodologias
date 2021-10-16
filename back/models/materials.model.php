<?php

class MaterialsModel{

    private $database;

    function __construct() {
        $this->database = $this->connect();
    }

    /** Abro la conexión de la base de datos */
    private function connect() {
        //$database = new PDO('mysql:host=localhost;'.'dbname=db_motoneta;charset=utf8', 'root', '');  
        //return $database;
    }

    function getAll(){
        $materials = array(
            array("name" => "papel", "image" =>"front\images\paper.jpeg", "condition"=>""),
            array("name" => "carton", "image" =>"front\images\cardboard.jpeg", "condition"=>""),
            array("name" => "envases plasticos", "image" =>"front\images\plasticBottles.jpeg", "condition"=>""),          
            array("name" => "latas de conserva", "image" =>"front\images\cans.jpeg", "condition"=>""),
            array("name" => "tetrabrik", "image" =>"front\images\boxTetrabrik.jpeg", "condition"=>""),
            array("name" => "envases de aluminio", "image" =>"front\images\aluminiumContainers.jpeg", "condition"=>""),
            array("name" => "botellas de vidrio", "image" =>"front\images\glassBottle.jpeg", "condition"=>"")
        );
        return $materials;
    }

    function insert($name, $condition) {
        /* $query = $this->database->prepare('INSERT INTO `material`(`name`, `condition`) VALUES (?,?)');
        $query->execute([$name, $condition]);
        return $this->database->lastInsertId(); */
    }

}