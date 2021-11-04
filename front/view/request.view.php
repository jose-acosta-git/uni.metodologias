<?php

    include_once 'lib/smarty/libs/Smarty.class.php';

    class RequestView {

        function showRequests() {
            $smarty = new Smarty();
            $smarty->display('front/templates/menu/header.tpl');
            $smarty->display('front/templates/menu/navbar.tpl');
            $smarty->display('front/templates/secretary/request.tpl');
            $smarty->display('front/templates/menu/footer.tpl');
        }

    }