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
        if (empty($_REQUEST['imagen1']))
            $correcto = false;

        // Imagen 2 //
        if (empty($_REQUEST['imagen2']))
            $correcto = false;
      }
      // Si no...
      else 
          $correcto = false;
      
      return $correcto;
  }

  // Funcion que guarda una imagen de manera temporal en la carpeta /temp (local) //
  function guardaImagenLocal($idCampo,$nameCampo)
    {
        if(validaEnviado("crearAnuncio"))
        {

            if ((isset($_FILES))) 
            {
                // Se le dice donde se quiere que se guarde
                $rutaGuardado = "../webroot/img/temp/";

                // Se le establece el nombre al archivo a guardar
                $rutaConNombreFichero = $rutaGuardado .  $_FILES[$nameCampo]['name'];

                // Si se mueve el fichero del sitio temporal a la ruta especificada...
                if (move_uploaded_file($_FILES[$nameCampo]['tmp_name'], $rutaConNombreFichero)) 
                {
                    echo "<br>El archivo se ha guardado correctamente.<br>";
                    // Si subo una imagen, la guardo y la cargo en el html //
                    //echo "La ruta es: <b>" . $rutaConNombreFichero . "</b><br>";
                    //echo "<img src='" . $rutaConNombreFichero . "' alt='Imagen' width='100px' height='100px'>";
                    //<img src="pic_trulli.jpg" alt="Italian Trulli">
                } 
                else
                {
                    ?> <label for="<?php echo $idCampo ?>" style="color:red;">Error al guardar el archivo</label> <?php
                }
            }
            else
            {
                echo "<br>No existe FILES";
            }
        }
    }
?>