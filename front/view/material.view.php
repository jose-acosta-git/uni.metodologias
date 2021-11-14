<?php

    include_once 'lib/smarty/libs/Smarty.class.php';

    class MaterialView {

        // Muestra la página de inicio
        function showHome($type = null, $msg = null){
            $smarty = new Smarty ();
            $smarty->display('front/templates/menu/header.tpl');
            $smarty->display('front/templates/menu/navbar.tpl');
            $smarty->assign('msg', $msg);
            $smarty->assign('type', $type);
            $smarty->display('front/templates/home/home.tpl');
            $smarty->display('front/templates/menu/footer.tpl');
        }

        /* Llama a la vista que muestra los materiales */
        function showMaterials($materials){
            $smarty = new Smarty ();
            $smarty->display('front/templates/menu/header.tpl');
            $smarty->display('front/templates/menu/navbar.tpl');
            $smarty->assign('materials', $materials);
            $smarty->display('front/templates/materials/materials.tpl');
            $smarty->display('front/templates/menu/footer.tpl');
        }
        /** Llama a la vista de registro de material que se trae a la planta */
        function registerMaterials($material=null, $boxers=null){
            $smarty = new Smarty ();
            $smarty->display('front/templates/menu/header.tpl');
            $smarty->display('front/templates/menu/navbar.tpl');
            $smarty->assign('material', $material);
            $smarty->assign('boxer',$boxers);
            $smarty->display('front/templates/secretary/registerMaterials.tpl');
            $smarty->display('front/templates/menu/footer.tpl');
        }   

       
        /* Llama a la vista que muestra los materiales para la secretaria */
        function showMaterialsSecretary($materials){
            $smarty = new Smarty ();
            $smarty->display('front/templates/menu/header.tpl');
            $smarty->display('front/templates/menu/navbar.tpl');
            $smarty->assign('materials', $materials);
            $smarty->display('front/templates/materials/materialsSecretary.tpl');
            $smarty->display('front/templates/menu/footer.tpl');
        }

        /* Llama a la vista que muestra el formulario de material */
        function showMaterialForm($material = null){
            $smarty = new Smarty ();
            $smarty->display('front/templates/menu/header.tpl');
            $smarty->display('front/templates/menu/navbar.tpl');
            if($material !== null){
                $smarty->assign('material', $material);
            }
            $smarty->display('front/templates/materials/materialForm.tpl');
            $smarty->display('front/templates/menu/footer.tpl');
        }

         /** Llama a la vista de registro de material que se trae a la planta */
         function materialsBoxers($material=null, $boxers=null){
            $smarty = new Smarty ();
            $smarty->display('front/templates/menu/header.tpl');
            $smarty->display('front/templates/menu/navbar.tpl');
            $smarty->assign('material', $material);
            $smarty->assign('boxer',$boxers);            
            $smarty->display('front/templates/materials/boxersMaterials.tpl');
            $smarty->display('front/templates/menu/footer.tpl');
        }
    }