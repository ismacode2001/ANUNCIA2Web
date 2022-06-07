<?php
    // Constantes //
  define("TXT_CAMPO_OBLIGATORIO","¡Campo obligatorio!");
  define("TXT_FORMATO_IMAGEN","¡El formato de imagen debe ser .png o .jpeg!");

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
        if($_FILES["imagen1"]["size"] == 0)
        {
            $correcto = false;
            $_SESSION["erroresAnuncio"]["imagen1"] = TXT_CAMPO_OBLIGATORIO;
        }
        else if(!compruebaFormatoImagen($_FILES["imagen1"]))
        {
            $correcto = false;
            $_SESSION["erroresAnuncio"]["imagen1"] = TXT_FORMATO_IMAGEN;
        }

        // Imagen 2 //
        if($_FILES["imagen2"]["size"] == 0)
        {
            $correcto = false;
            $_SESSION["erroresAnuncio"]["imagen2"] = TXT_CAMPO_OBLIGATORIO;
        }
        else if(!compruebaFormatoImagen($_FILES["imagen2"]))
        {
            $correcto = false;
            $_SESSION["erroresAnuncio"]["imagen2"] = TXT_FORMATO_IMAGEN;
        }

      }
      // Si no...
      else 
          $correcto = false;
      
      return $correcto;
  }

  // Funcion que invoca al resto de funciones que van validando el formulario
  function validaFormularioModAnuncio($nombre)
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
            $_SESSION["erroresModAnuncio"]["titulo"] = TXT_CAMPO_OBLIGATORIO;
        }
    
        // Descripcion //
        if (empty($_REQUEST['descripcion']))
        {
            $correcto = false;
            $_SESSION["erroresModAnuncio"]["descripcion"] = TXT_CAMPO_OBLIGATORIO;
        }

        // Categoria //
        if (empty($_REQUEST['categoria']))
        {
            $correcto = false;
            $_SESSION["erroresModAnuncio"]["categoria"] = TXT_CAMPO_OBLIGATORIO;
        }

        // Precio //
        if (empty($_REQUEST['precio']))
        {
            $correcto = false;
            $_SESSION["erroresModAnuncio"]["precio"] = TXT_CAMPO_OBLIGATORIO;
        }

        // Fecha Anuncio //
        if (empty($_REQUEST['fechaAnuncio']))
            $correcto = false;

        // Ubicacion //
        if (empty($_REQUEST['ubicacion']))
        {
            $correcto = false;
            $_SESSION["erroresModAnuncio"]["ubicacion"] = TXT_CAMPO_OBLIGATORIO;
        }
          
        // Id Usuario //
        if (empty($_REQUEST['idUsuario']))
            $correcto = false;
  
        // Nº de Favoritos //
        if (empty($_REQUEST['numFavoritos']))
            //$correcto = false;

        // Imagen 1 //
        if($_FILES["imagen1"]["size"] == 0)
        {
            $correcto = false;
            $_SESSION["erroresModAnuncio"]["imagen1"] = TXT_CAMPO_OBLIGATORIO;
        }
        else if(!compruebaFormatoImagen($_FILES["imagen1"]))
        {
            $correcto = false;
            $_SESSION["erroresModAnuncio"]["imagen1"] = TXT_FORMATO_IMAGEN;
        }

        // Imagen 2 //
        if($_FILES["imagen2"]["size"] == 0)
        {
            $correcto = false;
            $_SESSION["erroresModAnuncio"]["imagen2"] = TXT_CAMPO_OBLIGATORIO;
        }
        else if(!compruebaFormatoImagen($_FILES["imagen2"]))
        {
            $correcto = false;
            $_SESSION["erroresModAnuncio"]["imagen2"] = TXT_FORMATO_IMAGEN;
        }

      }
      // Si no...
      else 
          $correcto = false;
      
      return $correcto;
  }

  // Función que comprueba el formato de la Imagen //
  function compruebaFormatoImagen($imagen)
  {

    $arrayFormatoImagen = explode("/",$imagen["type"]);
    $formatoImagen = $arrayFormatoImagen[1];

    $correcto = true;

    if(($formatoImagen != "png")&&($formatoImagen != "jpeg"))
        $correcto = false;

    return $correcto;
  }

  // Función que comprueba la categoría que posee actualmente el Anuncio //
  function compruebaCategoria($anuncio,$categoria)
  {
      if($anuncio->categoria == $categoria)
        echo "checked";
  }
?>
