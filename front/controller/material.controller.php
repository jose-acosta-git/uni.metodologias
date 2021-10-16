<?php

    include_once 'front/view/material.view.php';

    class MaterialController{

        private $view;

        function __construct(){
            $this->view = new MaterialView();
        }

        function showHome(){
            $this->view->showHome();
        }

        function showMaterial(){
            $this->view->showMaterials();
        }
    }