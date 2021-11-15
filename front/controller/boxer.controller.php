<?php

    include_once 'back/models/boxers.model.php';
    include_once 'front/view/boxer.view.php';

    class BoxerController{

        private $view;
        private $model;

        function __construct(){
            $this->view = new BoxerView();
            $this->model= new BoxersModel();
        }

        function showBoxers(){
            $boxers = $this->model->getAllBoxers();
            $this->view->showBoxers($boxers);
        }
    }