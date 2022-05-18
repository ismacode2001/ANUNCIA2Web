<?php
    // Constantes //
  define("TXT_CAMPO_OBLIGATORIO","¡Campo obligatorio!");

  // Funcion que invoca al resto de funciones que van validando el formulario
  function validaFormularioAnuncio($nombre)
  {
      // Si se ha enviado el formulario...
      if (validaEnviado($nombre)) 
      {
        $correcto = true;

        // Id Anuncio //
        if (empty($_REQUEST['idAnuncio']))
            $correcto = false;

        // Titulo //
        if (empty($_REQUEST['titulo']))
        {
            $correcto = false;
            $_SESSION["erroresAnuncio"]["titulo"] = TXT_CAMPO_OBLIGATORIO;
        }
    
        // Descripcion //
        if (empty($_REQUEST['descripcion']))
        {
            $correcto = false;
            $_SESSION["erroresAnuncio"]["descripcion"] = TXT_CAMPO_OBLIGATORIO;
        }

        // Categoria //
        if (empty($_REQUEST['categoria']))
        {
            $correcto = false;
            $_SESSION["erroresAnuncio"]["categoria"] = TXT_CAMPO_OBLIGATORIO;
        }

        // Precio //
        if (empty($_REQUEST['precio']))
        {
            $correcto = false;
            $_SESSION["erroresAnuncio"]["precio"] = TXT_CAMPO_OBLIGATORIO;
        }

        // Fecha Anuncio //
        if (empty($_REQUEST['fechaAnuncio']))
            $correcto = false;

        // Ubicacion //
        if (empty($_REQUEST['ubicacion']))
        {
            $correcto = false;
            $_SESSION["erroresAnuncio"]["ubicacion"] = TXT_CAMPO_OBLIGATORIO;
        }
          
        // Id Usuario //
        if (empty($_REQUEST['idUsuario']))
            $correcto = false;
  
        // Nº de Favoritos //
        if (empty($_REQUEST['numFavoritos']))
            //$correcto = false;

        // Imagen 1 //
        if(!isset($_FILES["imagen1"]))
          $correcto = false;

        // Imagen 2 //
        if(!isset($_FILES["imagen2"]))
          $correcto = false;

      }
      // Si no...
      else 
          $correcto = false;
      
      return $correcto;
  }

  // Funcion que guarda una imagen de manera temporal en la carpeta /temp (local) //
  function guardaImagenLocal($numImagen,$nameCampo)
  {
    if(isset($_REQUEST['crearAnuncio']))
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
            $idImagen = ImagenDAO::findByNombre($nombreImagen)->idImagen;
            $_SESSION["idImagen" . $numImagen] = $idImagen;
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
            $idImagen = ImagenDAO::findByNombre($nombreImagen)->idImagen;
            $_SESSION["idImagen" . $numImagen] = $idImagen;
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
