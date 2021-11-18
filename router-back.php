<?php

/* Incluyo la libreria para el ruteo */
include_once 'lib/Router.php';
/* Incluyo el controlador de profesiones y comemtarios*/
include_once 'back/controllers/material.controller.php';
include_once 'back/controllers/boxer.controller.php';
include_once 'back/controllers/material-boxer.controller.php';
include_once 'back/controllers/order.controller.php';

/* creo el ruteo */
$router = new Router();

/* Creando la tabla de ruteo */

/* Obtiene todos los materiales */
$router->addRoute('solicitud-ciudadano', 'POST', 'SolicitudController', 'addData');
$router->addRoute('orders', 'GET', 'List_of_Orders_Controller', 'getAllOrders');
$router->addRoute('material', 'GET', 'MaterialController', 'getAll');

$router->addRoute('boxers', 'GET', 'BoxerController', 'getAll');
$router->addRoute('orders/:date1/:date2', 'GET', 'List_of_Orders_Controller', 'getFilterOrders');
$router->addRoute('material/:dni', 'GET', 'MaterialBoxerController', 'getByBoxer');
$router->addRoute('material', 'POST', 'MaterialBoxerController', 'add');

/* rutea -> obteniendo el RECURSO y el METODO por el que me llamaron */
$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
