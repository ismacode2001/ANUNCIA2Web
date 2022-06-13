<?php

  // Funcion que guarda una imagen de manera temporal en la carpeta /temp (local) //
  function guardaImagenLocal($numImagen,$nameCampo,$formulario)
  {
    if(isset($_REQUEST[$formulario]))
    {

      if ((isset($_FILES))) 
      {
        // Se le dice donde se quiere que se guarde
        $rutaGuardado = "./webroot/img/temp/";

        // Se le establece el nombre al archivo a guardar
        $rutaConNombreFichero = $rutaGuardado .  $_FILES[$nameCampo]['name'];

      // Si se mueve el fichero del sitio temporal a la ruta especificada...
      if (move_uploaded_file($_FILES[$nameCampo]['tmp_name'], $rutaConNombreFichero)) 
      {
        // Valido el formato de imagen (jpeg o png)
        $patron = '/.png|.jpg$/';

        // Si es una imagen .png o .jpeg...
        if(preg_match($patron,$rutaConNombreFichero))
        {
          $patronPng = '/.png$/';
          $patronJpeg = '/.jpeg$/';

          $data = base64_encode(file_get_contents($rutaConNombreFichero));

          // Filtro por la extension
          if(preg_match($patronPng,$rutaConNombreFichero))
          {
            // La guardo como .png en Firebase
            $nombreImagen = $numImagen . "|" . $_SESSION["idUsuario"] . "|" ."png";
            $imagen = new Imagen($numImagen,$data,$nombreImagen);
            ImagenDAO::save($imagen);

            // Actualizo el id de la imagen al dado por el documento
            $imagenU = ImagenDAO::findById($numImagen);
            ImagenDAO::update($imagenU);

            // Recojo dicho id y lo establezco en la sesión
            $idImagen = $imagenU->idImagen;
            $_SESSION["idImagen" . $numImagen] = $idImagen;

            // Borro la imagen en local
            unlink($rutaConNombreFichero);
          }
          else if(preg_match($patronJpeg,$rutaConNombreFichero))
          {
            // La guardo como .jpeg en Firebase
            $nombreImagen = $numImagen . "|" . $_SESSION["idUsuario"] . "|" ."jpeg";
            $imagen = new Imagen($numImagen,$data,$nombreImagen);
            ImagenDAO::save($imagen);

            // Actualizo el id de la imagen al dado por el documento
            $imagenU = ImagenDAO::findById($numImagen);
            ImagenDAO::update($imagenU);

            // Recojo dicho id y lo establezco en la sesión
            $idImagen = $imagenU->idImagen;
            $_SESSION["idImagen" . $numImagen] = $idImagen;

            // Borro la imagen en local
            unlink($rutaConNombreFichero);
          }
            
        }
        // Formato de imagen incorrecto
        else
        {
            echo "<p>Solo se aceptan imágenes .png o .jpeg</p>";
        }
      } 
      // Error al guardar la imagen
      else
      {
        echo "<p>Error al guardar la imagen</p>";
      }
      }
    }
  }

    // Función que decodifica una cadena de bytes a imagen y la muestra en la etiqueta//
    function decodificaImagen($idImagen,$numeracion)
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
                imagepng($im, "img" . $numeracion .  ".png");
                imagedestroy($im);

                // Imprimo la imagen en la etiqueta
                echo "img" . $numeracion .  ".png";
                //unlink("img" . $numeracion .  ".png");
            }
            // Si el formato es .jpeg
            else if($formatoImagen == "jpeg")
            {
                imagejpeg($im, "img" . $numeracion .  ".jpeg");
                imagedestroy($im);

                // Imprimo la imagen en la etiqueta
                echo "img" . $numeracion .  ".jpeg";
                //unlink("img" . $numeracion .  ".jpeg");
            }
            
        }
        // Error al crear la imagen
        else 
        {
            echo 'Error al mostrar la imagen.';
        }
    }

    // Funcion que guarda una imagen de manera temporal en la carpeta /temp (local) //
  function guardaImagenPerfil($numImagen,$nameCampo,$formulario)
  {
    if(isset($_REQUEST[$formulario]))
    {

      if ((isset($_FILES))) 
      {
        // Se le dice donde se quiere que se guarde
        $rutaGuardado = "./webroot/img/temp/";

        // Se le establece el nombre al archivo a guardar
        $rutaConNombreFichero = $rutaGuardado .  $_FILES[$nameCampo]['name'];

      // Si se mueve el fichero del sitio temporal a la ruta especificada...
      if (move_uploaded_file($_FILES[$nameCampo]['tmp_name'], $rutaConNombreFichero)) 
      {
        // Valido el formato de imagen (jpeg o png)
        $patron = '/.png|.jpg$/';

        // Si es una imagen .png o .jpeg...
        if(preg_match($patron,$rutaConNombreFichero))
        {
          $patronPng = '/.png$/';
          $patronJpeg = '/.jpeg$/';

          $data = base64_encode(file_get_contents($rutaConNombreFichero));

          // Filtro por la extension
          if(preg_match($patronPng,$rutaConNombreFichero))
          {
            // La guardo como .png en Firebase
            $nombreImagen = $numImagen . "|" . $_REQUEST["nombre"] . "|" ."png";
            $imagen = new Imagen($numImagen,$data,$nombreImagen);
            ImagenDAO::save($imagen);

            // Actualizo el id de la imagen al dado por el documento
            $imagenU = ImagenDAO::findById($numImagen);
            ImagenDAO::update($imagenU);

            // Recojo dicho id y lo establezco en la sesión
            $idImagen = ImagenDAO::findByNombre($nombreImagen)->idImagen;
            $_SESSION["idImagen" . $numImagen] = $idImagen;

            // Borro la imagen en local
            unlink($rutaConNombreFichero);
          }
          else if(preg_match($patronJpeg,$rutaConNombreFichero))
          {
            // La guardo como .jpeg en Firebase
            $nombreImagen = $numImagen . "|" . $_REQUEST["nombre"] . "|" ."jpeg";
            $imagen = new Imagen($numImagen,$data,$nombreImagen);
            ImagenDAO::save($imagen);

            // Actualizo el id de la imagen al dado por el documento
            $imagenU = ImagenDAO::findById($numImagen);
            ImagenDAO::update($imagenU);

            // Recojo dicho id y lo establezco en la sesión
            $idImagen = ImagenDAO::findByNombre($nombreImagen)->idImagen;
            $_SESSION["idImagen" . $numImagen] = $idImagen;

            // Borro la imagen en local
            unlink($rutaConNombreFichero);
          }
            
        }
        // Formato de imagen incorrecto
        else
        {
            echo "<p>Solo se aceptan imágenes .png o .jpeg</p>";
        }
      } 
      // Error al guardar la imagen
      else
      {
        echo "<p>Error al guardar la imagen</p>";
      }
      }
    }
  }

?>   