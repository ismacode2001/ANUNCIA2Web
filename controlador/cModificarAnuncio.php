<?php

include './core/funcionesAnuncio.php';

    // Volver //
    if (isset($_POST['volver'])) 
    {
      $_SESSION['pagina'] = 'menu';
      header('Location: index.php');
      exit();
    }
    // Volver Atrás //
    if (isset($_POST['volverAtras'])) 
    {
      $_SESSION['pagina'] = 'detalleAnuncio';
      header('Location: index.php');
      exit();
    }
    // Logout //
    else if(isset($_POST['logout']))
    {
      // Cierre de la sesion
      unset($_SESSION['validada']);
      session_destroy();
      header('Location: index.php');
      exit();
    }
    // Listado de Usuarios //
    else if(isset($_POST['mostrarUsuarios']))
    {
      $_SESSION['pagina'] = 'listadoUsuarios';
      header('Location: index.php');
      exit();
    }
    // Buscar Anuncio //
    else if(isset($_POST['buscaAnuncio']))
    {
      // Recojo el texto por el que realizar la búsqueda (en función del título)
      $textoABuscar = $_POST["buscaAnuncio"];
      $_SESSION["textoABuscar"] = $textoABuscar;
      
      // Recojo todos los Anuncios
      $todosAnuncios = AnuncioDAO::findAll();

      // Array que albergará los anuncios ya filtrados
      $arrayAnuncios = [];

      // Por cada Anuncio
      foreach ($todosAnuncios as $anuncio) 
      {
        if(strlen($textoABuscar) > 0)
        {
          // Si el título del anuncio actual contiene el mensaje a buscar
          if(strpos($anuncio->titulo,$textoABuscar) !== false)
          {
            // Guardo el Anuncio en el array  
            array_push($arrayAnuncios,$anuncio);
          }
        }
      }

      $_SESSION['pagina'] = 'buscarAnuncio';
      header('Location: index.php');
      exit();
    }
    // Favoritos //
    else if(isset($_POST['favoritos']))
    {
      $_SESSION['pagina'] = 'favoritos';
      header('Location: index.php');
      exit();
    }
    // Acerca De //
    else if(isset($_POST['acercaDe']))
    {
      $_SESSION['pagina'] = 'acercaDe';
      header('Location: index.php');
      exit();
    }
    // Ayuda //
    else if(isset($_POST['ayuda']))
    {
      $_SESSION['pagina'] = 'ayuda';
      header('Location: index.php');
      exit();
    }
    // Filtrar Anuncios //
    else if(isset($_POST['filtrarAnuncios']))
    {
      $arrayCategorias = $_REQUEST["categoria"];
      $_SESSION["categoriasFiltrar"] = $arrayCategorias;

      $precioMin = $_REQUEST["precioMinimo"];
      $_SESSION["precioMinFiltrar"] = $precioMin;

      $precioMax = $_REQUEST["precioMaximo"];
      $_SESSION["precioMaxFiltrar"] = $precioMax;
      
      $_SESSION['pagina'] = 'filtrarAnuncio';
      header('Location: index.php');
      exit();
    }
    // Modificar el Perfil de Usuario //
    else if(isset($_POST['guardarModAnuncio']))
    {
      // Array que contendra los errores
      $arrayErrores = Array();
      $_SESSION["erroresModAnuncio"] = $arrayErrores;

      // Usuario con la sesion activa
      $anuncio = AnuncioDAO::findById($_SESSION["idAnuncioModificar"]);

      if(validaFormularioModAnuncio("guardarModAnuncio"))
      {
        // Guardo las imágenes
        guardaImagenLocal("1","imagen1","guardarModAnuncio"); 
        guardaImagenLocal("2","imagen2","guardarModAnuncio"); 
  
        // Creo el Anuncio
        $anuncioModificado = new Anuncio($_REQUEST["idAnuncio"],$_REQUEST["titulo"],$_REQUEST["descripcion"],$_REQUEST["categoria"],$_REQUEST["precio"],
          $_REQUEST["fechaAnuncio"],$_REQUEST["ubicacion"],$_REQUEST["idUsuario"],$_REQUEST["numFavoritos"],$_SESSION["idImagen1"],$_SESSION["idImagen2"]);
        
        AnuncioDAO::update($anuncioModificado);
  
        unset($_SESSION["erroresModAnuncio"]);
  
        $_SESSION['pagina'] = 'detalleAnuncio';
        header('Location: index.php');
        exit();
      }
      else
      {
        // Me quedo en esta pantalla
        $_SESSION['vista'] = $vistas['modificarAnuncio'];
        require_once $vistas['layout'];
      }
    }
    // Por defecto (Vista Modificar Anuncio) //
    else
    {
      // Array que contendra los errores
      $arrayErrores = Array();
      $_SESSION["erroresModAnuncio"] = $arrayErrores;

      $idAnuncio = $_SESSION["idAnuncioModificar"];
      $anuncio = AnuncioDAO::findById($idAnuncio);

      $_SESSION['vista'] = $vistas['modificarAnuncio'];
      require_once $vistas['layout'];
    }
?>