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

    function insert($date, $image)
    {
        $query = $this->database->prepare('INSERT INTO `pedido_cartonero`(`fecha_pedido`, `imagen`) VALUES (?,?)');
        $query->execute([$date, $image]);
        return $this->database->lastInsertId();
    }
}
