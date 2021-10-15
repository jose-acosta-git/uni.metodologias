<?php

    include_once 'lib/smarty/libs/Smarty.class.php';


    class MaterialView {

        /* Llama a la vista que muestra los materiales */
        function showMaterials(){
            $smarty = new Smarty ();
            $smarty->display('front/templates/home.tpl');
        }
    }