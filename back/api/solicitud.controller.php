<?php

//Se inclute modelo de materiales
require_once('back/models/solicitud.model.php');
require_once('back/models/volumen.model.php');
require_once('back/models/franja_horaria.model.php');
require_once('back/models/ciudadano.model.php');


require_once('api.view.php');
require_once('front/view/request.view.php');

class SolicitudController
{

    private $solicitudModel;
    private $ciudadanoModel;

    private $view;
    private $requestView;


    function __construct()
    {
        //$this->view = new AdminView();
        $this->solicitudModel = new SolicitudModel();
        $this->ciudadanoModel = new CiudadanoModel();
        $this->view = new MaterialView();
        $this->requestView = new RequestView();
    }
    
    /*Calcula distancia entre dos puntos cardinales*/    
    function getdistance($lat1, $lon1, $lat2, $lon2, $unit = 'K') {
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);
        
        if ($unit == "K") {
            return (($miles * 1.609344)/100) ;
        } else if ($unit == "N") {
            return ($miles * 0.8684);
        } else {
            return $miles;
        }
    } 
    
    /*Obtiene coordenadas de una direccion*/
    function getCoord($address = null){
         /* localizacion */
        $queryString = http_build_query([
            'access_key' => 'db466771716e4ba96ee3149e3e6ae48a',
            'query' => $address,
            'region' => 'Tandil, Provincia de Buenos Aires, Argentina',
            'output' => 'json',
            'limit' => 1,
        ]);
        $ch = curl_init(sprintf('%s?%s', 'http://api.positionstack.com/v1/forward', $queryString));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($ch);
        curl_close($ch);
        $apiResult = json_decode($json);
        return ($apiResult);
    }

    /*Controla que la distancia no supere la maxima*/
    function distanciamayor($address = null){
        $direccionBasurero = 'Sandino 800';
        $latitud1 = $this->getCoord($direccionBasurero)->data[0]->latitude;
        $longitud1 = $this->getCoord($direccionBasurero)->data[0]->longitude;
        $address = $address;
        $latitud2 = $this->getCoord($address)->data[0]->latitude;
        $longitud2 = $this->getCoord($address)->data[0]->longitude;
        //var_dump($this->haversineGreatCircleDistance($latitud1,$longitud1,$latitud2,$longitud2)); die();
        if (($this->getdistance($latitud1,$longitud1,$latitud2,$longitud2)) > 6){
            return true;
        }
        return false;
        //$latitud1 = getCoord($direccionBasurero)->data->results->latitude;
        //return true;
    } 
    
    /*Agrega datos personales requeridos*/
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
        if ($this->distanciamayor($address)){
            echo ('La direccion se encuentra a mas de 6 km');
            die();
        }

        $id_ciudadano = $this->ciudadanoModel->insert($name, $surname, $address, $phone);

        if ($franjahoraria != null) {
            if ($realName != null) {
                $this->solicitudModel->insert($id_ciudadano, date('y/m/d'), $_POST['time-zone'], $_POST['materials-volume'], $realName);
            } else {
                $this->solicitudModel->insert($id_ciudadano, date('y/m/d'), $_POST['time-zone'], $_POST['materials-volume'], null);
            }
        }

        header("Location: " . BASE_URL . '');
    }


    //generacion automatica de imagen
    function uniqueRealName($realName, $tempName)
    {
        $filePath = "resources/images/" . uniqid("", true) . "."
            . strtolower(pathinfo($realName, PATHINFO_EXTENSION));

        move_uploaded_file($tempName, $filePath);

        return $filePath;
    }

    function listRequests() {
        $this->requestView->showRequests();
    }
}
