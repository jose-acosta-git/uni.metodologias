<?php

class MaterialsModel{

    private $database;

    //Materiales hardcodeados
    private $materials = array(
        array(
            "name" => "Papel",
            "info" => "El papel a reciclar debe estar siempre limpio y seco. Además no se acepta papel encerado o parafinado, etiquetas adhesivas, papel higiénico-sanitario, papel alimentación, papel manchado de grasa, papel térmico de fax, papel fotográfico, papeles engomados, papeles de regalo o papeles pegados.",
            "image" => "./front/images/paper.jpeg"
        ), array(
            "name" => "Carton",
            "info" => "El cartón debe estar limpio y si es una caja también debe estar desarmada.",
            "image" => "./front/images/cardboard.jpeg"
        ), array(
            "name" => "Envases plasticos",
            "info" => "Se acepta cualquier envase que tenga un Código de Identificación Plástico o RIC (Resin Identification Code), a excepción de  los de yogur o queso blanco, los plásticos mezclados con otros materiales o los degradados por el sol.",
            "image" => "./front/images/plasticBottles.jpeg"
        ), array(
            "name" => "Latas de conserva",
            "info" => "No deben estar oxidadas.",
            "image" => "./front/images/cans.jpeg"
        ), array(
            "name" => "Tetrabrik",
            "info" => "Solo se aceptarán limpios, secos y aplastados.",
            "image" => "./front/images/boxTetrabrik.jpeg"
        ), array(
            "name" => "Envases de aluminio",
            "info" => "Deben estar secos, y si son latas también aplastadas. No se aceptarán envases de aluminio oxidados.",
            "image" => "./front/images/aluminiumContainers.jpeg"
        ), array(
            "name" => "Botellas de vidrio",
            "info" => "Se aceptarán solo si estan limpias y secas.",
            "image" => "./front/images/glassBottle.jpeg"
        )
    );

    function __construct() {
        $this->database = $this->connect();
    }

    /** Abro la conexión de la base de datos */
    private function connect() {
        $database = new PDO('mysql:host=localhost;'.'dbname=db_motoneta;charset=utf8', 'root', '');  
        return $database;
    }

    function getAll(){
        return $this->materials;
    }

    //Inserta un material que llega por parametro a la base de datos
    function insert($name, $condition, $image) {
        $query = $this->database->prepare('INSERT INTO `material_aceptado`(`nombre_material`, `condicion_entrega`, `imagen_material`) VALUES (?,?,?)');
        $query->execute([$name, $condition, $image]);
        return $this->database->lastInsertId();
    }

}