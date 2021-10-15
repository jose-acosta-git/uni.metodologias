<?php

/**
 * Vista para la API REST
 * 
 * Clase comun a toda la API REST que sabe devolver
 * en formato JSON y manejar el código de respuesta HTTP.
 *  
 * */ 

class APIView {

    /** devuelve la respuesta en formato json */
    public function response($data, $status){
        //Aviso que el formato de la respuesta es JSON
        header("Content-Type: application/json");
        header("HTTP/1.1 " . $status . " " . $this->_requestStatus($status));
        //Convertimos la variable a JSON
        echo json_encode($data);
    }

    /** devuelve el error */
    private function _requestStatus($code){
        $status = array(
            200 => "OK",
            404 => "Not found",
            500 => "Internal Server Error"
        );
        return (isset($status[$code]))? $status[$code] : $status[500];
    }

}