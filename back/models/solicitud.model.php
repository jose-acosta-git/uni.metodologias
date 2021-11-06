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

    function getAllOrders()
    {
        $query = $this->database->prepare('SELECT * FROM `pedido_cartonero`');
        $query->execute();
        return $this->database->lastInsertId();
    }

    function insert($id_ciudadano, $date, $id_franja, $id_volumen, $image)
    {
        $query = $this->database->prepare('INSERT INTO `pedido_cartonero`(`id_ciudadano`, `fecha_pedido`, `id_franja_horaria`, `volumen_id_volumen`, `imagen`) VALUES (?,?,?,?,?)');
        $query->execute([$id_ciudadano, $date, $id_franja, $id_volumen, $image]);
        return $this->database->lastInsertId();
    }
}
