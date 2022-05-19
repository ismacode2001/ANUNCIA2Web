<?php

    // Funcion que codifica una imagen a bytes
    function codificaImagenPng()
    {
        $data = base64_encode(file_get_contents("./todo.png"));

        
    }

    // Función que decodifica una cadena de bytes a imagen y la muestra en la etiqueta//
    function decodificaImagen($idImagen)
    {
        // Recupero la imagen en función de su id
        $imagen = ImagenDAO::findById($idImagen);
        $data = $imagen->cadena;

        // La decodifico de cadena a imagen
        $data = base64_decode($data);

        // Creo la imagen
        $im = imagecreatefromstring($data);
        
        // Si se ha creado correctamente...
        if ($im !== false) 
        {
            // Recupero el formato de la misma
            $partes = explode("|",$imagen->nombre);
            $formatoImagen = $partes[2];

            // Si el formato es .png
            if($formatoImagen == "png")
            {
                //header('Content-Type: image/png');
                imagepng($im, "img.png");
                imagedestroy($im);

                // Imprimo la imagen en la etiqueta
                echo "img.png";
            }
            // Si el formato es .jpeg
            else if($formatoImagen == "jpeg")
            {
                imagejpeg($im, "img.jpeg");
                imagedestroy($im);

                // Imprimo la imagen en la etiqueta
                echo "img.jpeg";
                unlink("img.png");
            }
            
        }
        // Error al crear la imagen
        else 
        {
            echo 'Error al mostrar la imagen.';
        }
    }

?>   