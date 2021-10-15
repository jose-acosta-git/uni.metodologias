<?php

    include_once 'front/view/material.view.php';

    class MaterialsController{

        private $view;

        function __construct(){
            $this->view = new MaterialView();
        }

        function showMaterial(){
            $this->view->showMaterials();
        }
    }