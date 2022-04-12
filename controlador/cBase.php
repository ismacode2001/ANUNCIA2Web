<?php

    // Clase de la cual heredaran el resto de controladores
    class BaseControlador
    {

        // Funcion que analiza el path
        public function getUri()
        {

            $uri = $_SERVER["PATH_INFO"];

            // Devuelvo el array con el contenido de la uri separado por '/'
            return explode("/",$uri);
        }

        // Funcion que recoje los parametros pasados en la uri como filtro
        public function getParametros()
        {
            // Recojo el filtro (?clave=valor&clave=valor... etc)
            // y los meto en el array (siendo tb clave = valor)
            parse_str($_SERVER["QUERY_STRING"],$array);

            return $array;
        }

        // Funcion que
        public function sendRespuesta($datos,$cabecera = array())
        {
            // En la cabecera envio un json y si ha sido satisfactorio o no
            // Si es un array y si es mayor 0
            if((is_array($cabecera) && count($cabecera)))
            {
                // Por 
                foreach($cabecera as $value) 
                {
                    header($value);
                }

                echo $datos;
                exit();
            }
        }
    }
?>