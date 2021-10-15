<?php

class MaterialsModel{

    function getAll(){
        $materials = array(
            array("name" => "plastico"),
            array("name" => "carton")
        );
        return $materials;
    }

}