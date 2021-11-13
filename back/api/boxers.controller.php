<?php

    //Se inclute modelo de materiales
    require_once('back/models/boxers.model.php');
    require_once('api.view.php');

    class BoxersController {

        private $model;
        private $view;

        function __construct(){
            $this->model = new BoxersModel();
            $this->view = new APIView();
            /**Obtengo lo que tengo por post, como texto */
            $this->data = file_get_contents('php://input');
        }

        private function getData($params = null){
            return json_decode($this->data);
        }

        /* Obtiene todos los materiales */
        public function getAll($params = null){
            $allBoxers = $this->model->getAllBoxers();
            $this->getData($allBoxers);
            if ($allBoxers){
                $this->view->response($allBoxers, 200);
            } else {
                $this->view->response("No se encontraron Cartoneros", 500);
            }   
        }
        
    }