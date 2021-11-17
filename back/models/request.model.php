<?php

class RequestModel
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

    /** Obtiene todas las ordenes */
    function getAllOrders()
    {
        $query = $this->database->prepare('SELECT * FROM `pedido_cartonero` p INNER JOIN `ciudadano` c ON p.id_ciudadano = c.id_ciudadano');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    /** Inserta una orden */
    function insert($id_ciudadano, $date, $id_franja, $id_volumen, $image)
    {
        $query = $this->database->prepare('INSERT INTO `pedido_cartonero`(`id_ciudadano`, `fecha_pedido`, `id_franja_horaria`, `volumen_id_volumen`, `imagen`) VALUES (?,?,?,?,?)');
        $query->execute([$id_ciudadano, $date, $id_franja, $id_volumen, $image]);
        return $this->database->lastInsertId();
    }

    /** Obtiene ordenes filtradas */
    function getFilterOrders($fechaDesde, $fechaHasta)
    {
        $query = $this->database->prepare('SELECT * FROM `pedido_cartonero` p INNER JOIN `ciudadano` c ON p.id_ciudadano = c.id_ciudadano WHERE fecha_pedido BETWEEN ? AND ?');
        $query->execute([$fechaDesde, $fechaHasta]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}
