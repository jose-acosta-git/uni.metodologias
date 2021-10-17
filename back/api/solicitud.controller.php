<?php

//Se inclute modelo de materiales
require_once('back/models/solicitud.model.php');
require_once('api.view.php');

class MaterialsController
{

    private $model;
    private $view;


    private function getData($params = null)
    {
        return json_decode($this->data);
    }
}
