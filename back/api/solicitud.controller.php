<?php

//Se inclute modelo de materiales
require_once('back/models/solicitud.model.php');
require_once('back/models/volumen.model.php');
require_once('back/models/franja_horaria.model.php');
require_once('back/models/ciudadano.model.php');


require_once('api.view.php');

class SolicitudController
{

    private $solicitudModel;
    private $ciudadanoModel;

    private $view;


    function __construct()
    {
        //$this->view = new AdminView();
        $this->solicitudModel = new SolicitudModel();
        $this->ciudadanoModel = new CiudadanoModel();
        $this->view = new MaterialView();
    }

    function addData()
    {
        //control de datos obligatorios
        if (empty($_POST['name']) || empty($_POST['surname']) || empty($_POST['address']) || empty($_POST['phone'])) {
            //$this->view->showError('Faltan datos obligatorios')
            echo ('faltan datos obligatorios');
            die();
        }
        if ($_POST['trip-type'] == 'another') {
            if (empty($_POST['time-zone']) || empty($_POST['materials-volume'])) {
                echo ('faltan datos obligatorios');
                die();
            }
            $franjahoraria = true;
        } elseif (empty($_POST['email']) || empty($_POST['space']) && empty($_POST['observations'])) {
            echo ('faltan datos obligatorios');
            die();
        }


        $realName = null;
        //controlo que este la imagen
        if (!empty($_FILES['imageUpload']['type'])) {
            //controlo el tipo de imagen
            if (
                $_FILES['imageUpload']['type'] == "image/jpg" ||
                $_FILES['imageUpload']['type'] == "image/jpeg" ||
                $_FILES['imageUpload']['type'] == "image/png"
            ) {
                // llamo a la funcion para obtener el real name y luego inserto en la DB
                $realName = $this->uniqueRealName($_FILES['imageUpload']['name'], $_FILES['imageUpload']['tmp_name']);
            } else {
                echo ('formato de imagen invalido');
                die();
            }
        }


        //guardo lo que llega del form por post en variables
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];

        $id_ciudadano = $this->ciudadanoModel->insert($name, $surname, $address, $phone);

        if ($franjahoraria != null) {
            if ($realName != null) {
                $this->solicitudModel->insert($id_ciudadano, date('d/m/y'), $id_franja, $id_volumen, $realName);
            } else {
                $this->solicitudModel->insert($id_ciudadano, date('d/m/y'), $id_franja, $id_volumen, null);
            }
        }

        header("Location: " . BASE_URL . '');
    }


    function uniqueRealName($realName, $tempName)
    {
        $filePath = "resources/images" . uniqid("", true) . "."
            . strtolower(pathinfo($realName, PATHINFO_EXTENSION));

        move_uploaded_file($tempName, $filePath);

        return $filePath;
    }
}
