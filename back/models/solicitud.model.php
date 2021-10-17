<?php

class SolicitudModel
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

    function insert($date)
    {
        $query = $this->database->prepare('INSERT INTO `pedido_cartonero`(`date`) VALUES (?)');
        $query->execute([$date]);
        return $this->database->lastInsertId();
    }
}
