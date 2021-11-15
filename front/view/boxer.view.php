<?php

    include_once 'lib/smarty/libs/Smarty.class.php';

    class BoxerView {

        function showBoxers($cartoneros){
            $smarty = new Smarty ();
            $smarty->display('front/templates/menu/header.tpl');
            $smarty->display('front/templates/menu/navbar.tpl');
            $smarty->assign('cartoneros', $cartoneros);
            $smarty->display('front/templates/secretary/cartoneros.tpl');
            $smarty->display('front/templates/menu/footer.tpl');
        }
    }