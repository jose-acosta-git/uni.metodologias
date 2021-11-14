<?php

/* Incluyo la libreria para el ruteo */
include_once 'lib/Router.php';
/* Incluyo el controlador de profesiones y comemtarios*/
include_once 'back/api/material.controller.php';
include_once 'back/api/boxers.controller.php';
include_once 'back/api/list_of_orders.php';

/* creo el ruteo */
$router = new Router();

/* Creando la tabla de ruteo */

/* Obtiene todos los materiales */
$router->addRoute('solicitud-ciudadano', 'POST', 'SolicitudController', 'addData');
$router->addRoute('orders', 'GET', 'List_of_Orders_Controller', 'getAllOrders');
$router->addRoute('material', 'GET', 'MaterialsController', 'getAll');

$router->addRoute('boxers', 'GET', 'BoxersController', 'getAll');
$router->addRoute('orders/:date1/:date2', 'GET', 'List_of_Orders_Controller', 'getFilterOrders');

/* rutea -> obteniendo el RECURSO y el METODO por el que me llamaron */
$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
