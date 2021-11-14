<?php

class BoxersModel{

    private $cartoneros = array(
        array(
            "dni" => "31896843",
            "nombre" => "Cristian",
            "apellido" => "Tisera",
            "direccion" => "Figueroa 1221",
            "fecha_nacimiento" => "5/4/1985",
            "id_vehiculo" => "1"
        ),
        array(
            "dni" => "32698639",
            "nombre" => "Juan",
            "apellido" => "Molfese",
            "direccion" => "Ugalde 1301",
            "fecha_nacimiento" => "25/6/1986",
            "id_vehiculo" => "2"
        ),
        array(
            "dni" => "33125896",
            "nombre" => "Guido",
            "apellido" => "Pisarra",
            "direccion" => "Arana 644",
            "fecha_nacimiento" => "2/9/1987",
            "id_vehiculo" => "1"
        ),
        array(
            "dni" => "34923124",
            "nombre" => "Franco",
            "apellido" => "Bayugar",
            "direccion" => "Garibaldi 98",
            "fecha_nacimiento" => "6/2/1988",
            "id_vehiculo" => "1"
        ),
        array(
            "dni" => "35998634",
            "nombre" => "German",
            "apellido" => "De Francesco",
            "direccion" => "Constitucion 565",
            "fecha_nacimiento" => "10/4/1990",
            "id_vehiculo" => "2"
        ), 
        array(
            "dni" => "3653269",
            "nombre" => "Jose",
            "apellido" => "Acosta",
            "direccion" => "Saavedra 76",
            "fecha_nacimiento" => "18/10/1991",
            "id_vehiculo" => "3"
        )
    );
   
    
    /* Obtiene todos los Cartoneros */
    function getAllBoxers()
    {
        
        return $this->cartoneros;
        
    }

    
}
