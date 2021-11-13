<?php

    include_once 'front/view/material.view.php';
    include_once 'back/models/materials.model.php';
    include_once 'helpers/file.helper.php';

    class MaterialController{

        private $view;
        private $model;
        private $fileHelper;

        function __construct(){
            $this->view = new MaterialView();
            $this->model = new MaterialsModel();
            $this->fileHelper = new FileHelper();
        }
        function showHome(){
            $this->view->showHome();
        }

        /**Muestra pagina de materiales que se aceptan */
        function showMaterials(){
            $allMaterials = $this->model->getAll();
            $this->view->showMaterials($allMaterials);
        }

        /**Muestra pagina de materiales de la secretaria */
        function showMaterialsSecretary(){
            $allMaterials = $this->model->getAll();
            $this->view->showMaterialsSecretary($allMaterials);
        }

        /**Muestra formulario de material */
        function showMaterialForm($id = null){
            if($id !== null){
                $material = $this->model->getById($id);
                $this->view->showMaterialForm($material);
            }
            else{
                $this->view->showMaterialForm();
            }
        }

        //Inserta un material que llega por metodo POST a la base de datos
        function insertMaterial() {
            $name = isset($_POST['name']) ? $_POST['name'] : null;
            $condition = isset($_POST['condition']) ? $_POST['condition'] : null;
            $image = isset($_FILES['image']) ? $_FILES['image'] : null;

            if (empty($name) || empty($condition) || empty($image)) {
                //TODO imprimir error en formulario de alta de material
                die();
            }

            $resultImageUpload = $this->fileHelper->uploadImage('image');
            if(!$resultImageUpload){
                //TODO imprimir error en formulario de alta de material
                die();
            }
            else{
                $this->model->insert($name, $condition, $resultImageUpload);
            }
            header("Location: " . BASE_URL . 'materiales-aceptados-secretaria');
        }

        //Modifica un material de la base de datos, dados los cambios que llegan por metodo POST
        function updateMaterial($id) {
            $material = $this->model->getById($id);
            if (!$material) {
                //TODO informar que el material que se quiere editar no existe
                die();
            }

            $name = isset($_POST['name']) ? $_POST['name'] : null;
            $condition = isset($_POST['condition']) ? $_POST['condition'] : null;
            
            if (empty($name) || empty($condition)) {
                //TODO imprimir error en formulario de edicion de material: no puede haber un campo vacio
                die();
            }

            if ($_FILES['image']['size'] == 0){
                $resultImageUpload = $material->imagen_material;
            }
            else{
                $resultImageUpload = $this->fileHelper->uploadImage('image');
                if(empty($resultImageUpload)){
                    //TODO imprimir error en formulario de alta de material
                    die();
                }
            }
            
            $this->model->updateMaterial($name, $condition, $resultImageUpload, $id);

            header("Location: " . BASE_URL . 'materiales-aceptados-secretaria');
        }

        //Elimina un material de la base de datos
        function deleteMaterial($id) {
            //checkea que existe el material que se quiere eliminar
            $material = $this->model->getById($id);
            if ($material == null) {
                //TODO informar que el material que se quiere eliminar no existe
                die();
            }
            $this->model->deleteMaterial($id);
            header("Location: " . BASE_URL . 'materiales-aceptados-secretaria');
        }
    }