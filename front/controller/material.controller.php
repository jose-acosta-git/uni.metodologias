<?php

    include_once 'front/view/material.view.php';
    include_once 'models/materials.model.php';

    class MaterialController{

        private $view;
        private $model;

        function __construct(){
            $this->view = new MaterialView();
            $this->model = new MaterialsModel();
        }

        function showHome(){
            $this->view->showHome();
        }

        function showMaterial(){
            $this->view->showMaterials();
        }

        function insertMaterial() {
            $name = $_POST['name'];
            $condition = $_POST['condition'];
            $image = $_POST['image'];

            //verifico que los campos no estén vacíos
            if (empty($name) || empty($condition) || empty($image)) {
                //TODO imprimir error en formulario de alta de material
                die();
            }

            if ($_FILES['image']['type'] == "image/jpg" || 
            $_FILES['image']['type'] == "image/jpeg" || 
            $_FILES['image']['type'] == "image/png" )
            {
                $realName = $this->uniqueSaveName($_FILES['image']['name'], $_FILES['image']['tmp_name']);
                $this->model->insert($name, $condition, $realName);
            } else {
                //TODO imprimir error en formulario de alta de material: imagen invalida
            }

            header("Location: " . BASE_URL . '');
        }
        
        // Construye un nombre unico de archivo y ademas lo mueve a mi carpeta de imagenes
        function uniqueSaveName($realName, $tempName) {
            $filePath = "images/" . uniqid("", true) . "." . strtolower(pathinfo($realName, PATHINFO_EXTENSION));
            move_uploaded_file($tempName, $filePath);
            return $filePath;
        }

    }