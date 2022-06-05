<?php

  include './core/funcionesAnuncio.php';

	// Login //
	if (isset($_POST['login'])) {
    $_SESSION['pagina'] = 'login';
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
	// Perfil //
	else if(isset($_POST['perfil']))
	{
    $_SESSION['pagina'] = 'perfil';
    header('Location: index.php');
    exit();
	}
  // Listado Usuarios //
	else if(isset($_POST['mostrarUsuarios']))
	{
    $_SESSION['pagina'] = 'listadoUsuarios';
    header('Location: index.php');
    exit();
	}
  // Volver //
  else if (isset($_POST['volver'])) 
  {
      $_SESSION['pagina'] = 'menu';
      header('Location: index.php');
      exit();
  }
  // Crear el anuncio //
  else if (isset($_POST['crearAnuncio']))
  {
    // Array que contendra los errores
    $arrayErrores = Array();
    $_SESSION["erroresAnuncio"] = $arrayErrores;

    if(validaFormularioAnuncio("crearAnuncio"))
    {
      // Guardo las imágenes
      guardaImagenLocal("1","imagen1","crearAnuncio"); 
      guardaImagenLocal("2","imagen2","crearAnuncio"); 

      // Creo el Anuncio
      $nuevoAnuncio = new Anuncio($_REQUEST["idAnuncio"],$_REQUEST["titulo"],$_REQUEST["descripcion"],$_REQUEST["categoria"],$_REQUEST["precio"],
        $_REQUEST["fechaAnuncio"],$_REQUEST["ubicacion"],$_REQUEST["idUsuario"],$_REQUEST["numFavoritos"],$_SESSION["idImagen1"],$_SESSION["idImagen2"]);
      AnuncioDAO::save($nuevoAnuncio);

      // Le actualizo el id de Anuncio al dado por el documento de la BBDD
      $anuncio = AnuncioDAO::findByTitulo($nuevoAnuncio->titulo);
      AnuncioDAO::update($anuncio);

      unset($_SESSION["erroresAnuncio"]);

      $_SESSION['pagina'] = 'menu';
      header('Location: index.php');
      exit();
    }
    else
    {
      // Me quedo en esta pantalla
      $_SESSION['vista'] = $vistas['crearAnuncio'];
      require_once $vistas['layout'];
    }
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

    $_SESSION['pagina'] = 'filtrarAnuncio';
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
  // Por defecto (Vista Crear Anuncio) //
	else
	{
    // Usuario con sesión Activa
    $usuario = UsuarioDao::findById($_SESSION["idUsuario"]);
    
    // Array que contendra los errores
    $arrayErrores = Array();
    $_SESSION["erroresAnuncio"] = $arrayErrores;

    $_SESSION['vista'] = $vistas['crearAnuncio'];
    require_once $vistas['layout'];    
	}
?>