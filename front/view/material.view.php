<?php

    include_once 'lib/smarty/libs/Smarty.class.php';

    class MaterialView {

        // Muestra la página de inicio
        function showHome(){
            $smarty = new Smarty ();
            $smarty->display('front/templates/header.tpl');
            $smarty->display('front/templates/navbar.tpl');
            $smarty->display('front/templates/home.tpl');
            $smarty->display('front/templates/footer.tpl');
        }

        /* Llama a la vista que muestra los materiales */
        function showMaterials(){
            $smarty = new Smarty ();
            $smarty->display('front/templates/header.tpl');
            $smarty->display('front/templates/navbar.tpl');
            $smarty->display('front/templates/materials.tpl');
            $smarty->display('front/templates/footer.tpl');
        }
    }