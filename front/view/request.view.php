<?php

    include_once 'lib/smarty/libs/Smarty.class.php';

    class RequestView {

        //Imprime el template de pedidos de retiro
        function showRequests($filter = null) {
            $smarty = new Smarty();
            $smarty->display('front/templates/menu/header.tpl');
            $smarty->display('front/templates/menu/navbar.tpl');
            $smarty->display('front/templates/secretary/request.tpl');
            $smarty->display('front/templates/secretary/list_of_orders.tpl'); 
            $smarty->display('front/templates/menu/footer.tpl');
            
        }

    }