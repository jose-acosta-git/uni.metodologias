<?php

class BoxersModel{

    private $boxers = array(
        array(
            "dni" => "11111111",
            "apellidoYnombre" => "Perez Armando",
            
        ), 
        array(
            "dni" => "22222222",
            "apellidoYnombre" => "Gomez Josefa",
            
        ), 
        array(
            "dni" => "33333333",
            "apellidoYnombre" => "Lopez Gonzalo",
            
        ),
        array(
            "dni" => "44444444",
            "apellidoYnombre" => "Gonzalez Graciela",
            
        ), 
        array(
            "dni" => "55555555",
            "apellidoYnombre" => "Benitez Gervasio",
            
        ), 
    );
   
    
    /* Obtiene todos los Cartoneros */
    function getAllBoxers()
    {
        return $this->boxers;
        
    }

    
}
