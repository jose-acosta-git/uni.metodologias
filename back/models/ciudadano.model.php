<?php

class CiudadanoModel
{

    private $database;

    //Materiales hardcodeados
    function __construct()
    {
        $this->database = $this->connect();
    }

    /** Abro la conexión de la base de datos */
    private function connect()
    {
        $database = new PDO('mysql:host=localhost;' . 'dbname=db_motoneta;charset=utf8', 'root', '');
        return $database;
    }

    function getAll()
    {
        //return $this->materials;
    }

    function insert($name, $lastname, $address, $phone)
    {
        $query = $this->database->prepare('INSERT INTO `ciudadano`(`nombre`, `apellido`, `direccion`, `telefono`) VALUES (?,?,?,?)');
        $query->execute([$name, $lastname, $address, $phone]);
        return $this->database->lastInsertId();
    }
}
