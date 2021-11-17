<?php

    //Se inclute modelo de materiales
    require_once('back/models/request.model.php');
    require_once('api.view.php');

    class OrderController {

        private $model;
        private $view;

        function __construct(){
            $this->model = new RequestModel();
            $this->view = new APIView();
            /**Obtengo lo que tengo por post, como texto */
            $this->data = file_get_contents('php://input');
        }

        private function getData($params = null){
            return json_decode($this->data);
        }

        /* Obtiene todos los materiales */
        public function getAllOrders($params = null){
            $allOrders = $this->model->getAllOrders();
            $this->getData($allOrders);
            if ($allOrders){
                $this->view->response($allOrders, 200);
            } else {
                $this->view->response("No se encontraron pedidos de retiro", 500);
            }   
        }

        public function getFilterOrders($params = null){
            $date1 = $params[':date1'];
            $date2 = $params[':date2'];
            

            $orders = $this->model-> getFilterOrders($date1, $date2);
            if ($orders){
                $this->view->response($orders, 200);
            } else {
                $this->view->response("No se encontraron pedidos de retiro", 500);
            }   
       }

    }