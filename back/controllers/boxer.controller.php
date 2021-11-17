<?php

    //Se inclute modelo de materiales
    require_once('back/models/boxer.model.php');
    require_once('api.view.php');
    require_once('front/view/boxer.view.php');

    class BoxerController {

        private $model;
        private $apiView;
        private $view;

        function __construct(){
            $this->model = new BoxerModel();
            $this->apiView = new APIView();
            $this->view = new BoxerView();
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
                $this->apiView->response($allBoxers, 200);
            } else {
                $this->apiView->response("No se encontraron Cartoneros", 500);
            }   
        }
        
        /** Se muestra el listado de cartoneros */
        function showBoxers(){
            $boxers = $this->model->getAllBoxers();
            $this->view->showBoxers($boxers);
        }
    }