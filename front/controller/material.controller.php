<?php

    include_once 'front/view/material.view.php';
    include_once 'back/models/materials.model.php'; 
    include_once 'back/models/boxers.model.php';

    class MaterialController{

        private $view;
        private $model;
        private $modelBox;

        function __construct(){
            $this->view = new MaterialView();
            $this->model = new MaterialsModel();
            $this->modelBox= new BoxersModel();
        }
        function showHome(){
            $this->view->showHome();
        }
        /**Muestra pagina de materiales que se aceptan */

        function showMaterial(){
            $this->view->showMaterials();
        }

        //inserta un material que llega por metodo POST a la base de datos
        function insertMaterial() {
            $name = $_POST['name'];
            $condition = $_POST['condition'];
            $image = $_POST['image'];

            //verifico que los campos no estén vacíos
            if (empty($name) || empty($condition) || empty($image)) {
                //TODO imprimir error en formulario de alta de material
                die();
            }

            if ($_FILES['image']['type'] == "image/jpg" || $_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/png" )
            {
                $realName = $this->uniqueSaveName($_FILES['image']['name'], $_FILES['image']['tmp_name']);
                $this->model->insert($name, $condition, $realName);
            } else {
                //TODO imprimir error en formulario de alta de material: imagen invalida
                die();
            }

            header("Location: " . BASE_URL . '');
        }
        
        // Construye un nombre unico de archivo y ademas lo mueve a mi carpeta de imagenes
        function uniqueSaveName($realName, $tempName) {
            $filePath = "images/" . uniqid("", true) . "." . strtolower(pathinfo($realName, PATHINFO_EXTENSION));
            move_uploaded_file($tempName, $filePath);
            return $filePath;
        }

        //Modifica un material de la base de datos, dados los cambios que llegan por metodo POST
        //Supone que se envian por POST todos los datos, no solo los modificados
        function editMaterial($id) {

            //checkea que existe el material que se quiere editar
            $material = $this->model->getById($id);
            if (!$material) {
                //TODO informar que el material que se quiere editar no existe
                die();
            }

            $name = $_POST['name'];
            $condition = $_POST['condition'];
            $image = $_POST['image'];
            
            //verifico que los campos no estén vacíos
            if (empty($name) || empty($condition) || empty($image)) {
                //TODO imprimir error en formulario de edicion de material: no puede haber un campo vacio
                die();
            }

            if ($_FILES['image']['type'] == "image/jpg" || $_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/png" )
            {
                $realName = $this->uniqueSaveName($_FILES['image']['name'], $_FILES['image']['tmp_name']);
                $this->model->editMaterial($realName, $name, $condition, $image);
            } else {
                //TODO imprimir error formato de imagen inválido
                die();
            }
            header("Location: " . BASE_URL . '');
        }

        //Elimina un material de la base de datos
        function deleteMaterial($id) {
            //checkea que existe el material que se quiere eliminar
            $material = $this->model->getById($id);
            if (!$material) {
                //TODO informar que el material que se quiere eliminar no existe
                die();
            }
            $this->model->deleteMaterial($id);
            header("Location: " . BASE_URL . '');
        }


        /**Muestra la pagina para que se registre el material que traen a la planta */
        function registerMaterial(){
            $materials=$this->model->getAll();
            $boxers=$this->modelBox->getAllBoxers();
            $this->view->registerMaterials($materials,$boxers);
            
        }
        
        


    }