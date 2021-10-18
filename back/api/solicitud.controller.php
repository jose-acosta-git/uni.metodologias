<?php

//Se inclute modelo de materiales
require_once('back/models/solicitud.model.php');
require_once('api.view.php');

class SolicitudController
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
        $this->solicitudModel = new SolicitudModel();
        $this->volumenModel = new VolumenModel();
        $this->franjaHorariaModel = new FranjaHorariaModel();
        $this->ciudadanoModel = new CiudadanoModel();
    }

    function addSolicitud()
    {
        //check login
        // verifico campos obligatorios
        if (empty($_POST['time-zone']) || empty($_POST['materials-volume']) || empty($_POST['description']) || empty($_POST['value']) || empty($_POST['category'])) {
            $this->view->showError('Faltan datos obligatorios');
            die();
        }
        //guardo lo que llega del form por post en variables
        $place = $_POST['place'];
        $shortdescription = $_POST['shortdescription'];
        $description = $_POST['description'];
        $value = $_POST['value'];
        $category = $_POST['category'];

        //verifico que el archivo insertado sea de la extension correspondiente
        if (
            $_FILES['imageUpload']['type'] == "image/jpg" ||
            $_FILES['imageUpload']['type'] == "image/jpeg" ||
            $_FILES['imageUpload']['type'] == "image/png"
        ) {
            // llamo a la funcion para obtener el real name y luego inserto en la DB
            $realName = $this->uniqueRealName($_FILES['imageUpload']['name'], $_FILES['imageUpload']['tmp_name']);
            $this->travelModel->insert($place, $shortdescription, $description, $value, $realName, $category);
        } else {
            $destination = $this->travelModel->getAll();
            $category = $this->categoryModel->getAll();
            $this->view->showDestinationManage($category, $destination, 'Error: el archivo insertado no es válido');
            die();
        }
        // redirigimos a la pagina del manejo de destino
        header("Location: " . BASE_URL . 'destinationmanage');
    }
}
