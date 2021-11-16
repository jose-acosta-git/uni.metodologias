<?php
    class FileHelper{

        function generateFileName($length = 12){
            // Pasamos todos los caracteres que vamos a utilizar
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            // Devuelve el largo de todos los caracteres
            $charactersLength = strlen($characters);
            // Cargamos un nombre aleatorio con el largo que pasamos, por defecto 12
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            // Lo devuelve
            return $randomString;
        }

        function uploadImage($inputName){
            // Donde vamos a guardar la imagen
            $targetDir = "back/images/materials/";
            // Obtengo el nombre que tiene el archivo actual
            $targetFile = basename($_FILES[$inputName]["name"]);
            // Obtengo la extensión de la imagen que voy a subir
            $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
            // Permito ciertos tipos de archivos
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
                return false;
            }
            // Ruta sumado al nuevo nombre del archivo con el punto de la extension
            $newFileName = $targetDir.$this->generateFileName(10).'.'.$imageFileType;
            // Mueve el archivo, toma la ruta y nombre temporal donde lo descarga y lo pasa a la ruta y nombre que asignamos anteriormente
            if (move_uploaded_file($_FILES[$inputName]["tmp_name"], $newFileName)) {
                return $newFileName;
            } else {
                return false;
            }
        }
    }