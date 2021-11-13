<?php

/* Incluyo la libreria para el ruteo */
include_once 'lib/Router.php';
/* Incluyo el controlador de profesiones y comemtarios*/
include_once 'back/api/materials.controller.php';
include_once 'back/api/boxers.controller.php';

/* creo el ruteo */
$router = new Router();

/* Creando la tabla de ruteo */

/* Obtiene todos los materiales */
$router->addRoute('material', 'GET', 'MaterialsController', 'getAll');

$router->addRoute('solicitud-ciudadano', 'POST', 'SolicitudController', 'addData');

$router->addRoute('boxers', 'GET', 'BoxersController', 'getAll');
/* rutea -> obteniendo el RECURSO y el METODO por el que me llamaron */
$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
