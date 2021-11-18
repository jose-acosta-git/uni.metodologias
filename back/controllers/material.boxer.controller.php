<?php

    //Se inclute modelo de materiales
    require_once('back/models/material.boxer.model.php');
    require_once('api.view.php');

    class MaterialBoxerController {

        private $model;
        private $view;

        function __construct(){
            $this->model = new MaterialBoxerModel();
            $this->view = new APIView();
            /**Obtengo lo que tengo por post, como texto */
            $this->data = file_get_contents('php://input');
        }

        private function getData($params = null){
            return json_decode($this->data);
        }

        /* Obtiene todos los materiales registrados por cartonero */
        public function getByBoxer($params = null){
            $idBoxer = $params[':dni'];
            $allMaterials = $this->model->getByBoxer($idBoxer);
            $this->getData($allMaterials);
            if ($allMaterials){
                $this->view->response($allMaterials, 200);
            } else {
                $this->view->response("No se encontraron Materiales para ese cartonero", 500);
            }   
        }

        /* Agrega un Material aportado por un Cartonero Con un peso especifico */
        public function add($params = null){
            $body = $this->getData();
            $boxer = $body->boxerId;
            $material = $body->materialId;
            $weight = $body->weight;
            $existMaterial = $this->model->getMaterialBoxer($boxer, $material);
            if ($existMaterial){
                $weight += $existMaterial->peso;
                $material = $this->model->update($boxer, $material, $weight);
            } else {
                $material = $this->model->insert($boxer, $material, $weight);
            }
            if ($material){
                $this->view->response($material, 200);
            } else {
                $this->view->response("No se pudo agregar el Material", 500);
            }
        }
        
    }