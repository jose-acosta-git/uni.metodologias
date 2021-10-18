<?php

//Se inclute modelo de materiales
require_once('back/models/solicitud.model.php');
require_once('api.view.php');

class CiudadanoController
{

    private $model;
    private $view;


    private function getData($params = null)
    {
        return json_decode($this->data);
    }

    function __construct()
    {
        //$this->view = new AdminView();
        $this->model = new CiudadanoModel();
    }

    function addCiudadano()
    {
        //check login
        // verifico campos obligatorios
        if (empty($_POST['place']) || empty($_POST['shortdescription']) || empty($_POST['description']) || empty($_POST['value']) || empty($_POST['category'])) {
            $destination = $this->travelModel->getAll();
            $category = $this->categoryModel->getAll();
            $this->view->showDestinationManage($category, $destination, 'Faltan datos obligatorios');
            die();
        }
        //guardo lo que llega del form por post en variables
        $place = $_POST['place'];
        $shortdescription = $_POST['shortdescription'];
        $description = $_POST['description'];
        $value = $_POST['value'];
        $category = $_POST['category'];

        //verifico que el archivo insertado sea de la extension correspondiente

        // redirigimos a la pagina del manejo de destino
        header("Location: " . BASE_URL . 'destinationmanage');
    }
}
