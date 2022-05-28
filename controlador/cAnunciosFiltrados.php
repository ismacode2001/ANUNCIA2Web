<?php
	// Login
	if (isset($_POST['login'])) {
    $_SESSION['pagina'] = 'login';
    header('Location: index.php');
    exit();
	}
	// Logout
	else if(isset($_POST['logout']))
	{
    // Cierre de la sesion
    unset($_SESSION['validada']);
    session_destroy();
    header('Location: index.php');
    exit();
	}
	// Perfil
	else if(isset($_POST['perfil']))
	{
    $_SESSION['pagina'] = 'perfil';
    header('Location: index.php');
    exit();
	}
  // Listado Usuarios
	else if(isset($_POST['mostrarUsuarios']))
	{
    $_SESSION['pagina'] = 'listadoUsuarios';
    header('Location: index.php');
    exit();
	}
  // Ver Detalle del Anuncio
  else if(isset($_POST['detalleAnuncio']))
	{
    if(isset($_POST["idAnuncio"]))
    {
      // Guardo el id del Anuncio
      $_SESSION["idAnuncio"] = $_POST["idAnuncio"];

      $anuncio = AnuncioDAO::findById(["idAnuncio"]);

      $_SESSION['pagina'] = 'detalleAnuncio';
      header('Location: index.php');
      exit();
    }
    else
    {
      // Mensaje de error: "error al acceder al Anuncio"
    }
	}
  // Crear Anuncio
	else if(isset($_POST['crearAnuncio']))
	{
    $_SESSION['pagina'] = 'crearAnuncio';
    header('Location: index.php');
    exit();
	}
  // Buscar Anuncio
	else if(isset($_POST['buscaAnuncio']))
	{
    // Recojo el texto por el que realizar la búsqueda (en función del título)
    $textoABuscar = $_POST["buscaAnuncio"];
    
    // Recojo todos los Anuncios
    $todosAnuncios = AnuncioDAO::findAll();

    // Array que albergará los anuncios ya filtrados
    $arrayAnuncios = [];

    // Por cada Anuncio
    foreach ($todosAnuncios as $anuncio) 
    {
      // Si el título del anuncio actual contiene el mensaje a buscar
      if(strpos($anuncio->titulo,$textoABuscar) !== false)
      {
        // Guardo el Anuncio en el array  
        array_push($arrayAnuncios,$anuncio);
      }
    }

    $_SESSION['pagina'] = 'filtrarAnuncio';
    header('Location: index.php');
    exit();
	}
  // Volver
  else if (isset($_POST['volver'])) 
  {
      $_SESSION['pagina'] = 'menu';
      header('Location: index.php');
      exit();
  }
  // Que sea la primera vez que se entra en el Menú //
	else
	{
    $textoABuscar = $_SESSION["textoABuscar"];
    
    // Recojo todos los Anuncios
    $todosAnuncios = AnuncioDAO::findAll();

    // Array que albergará los anuncios ya filtrados
    $arrayAnuncios = [];

    // Por cada Anuncio
    foreach ($todosAnuncios as $anuncio) 
    {
      // Si el título del anuncio actual contiene el mensaje a buscar
      if(strpos($anuncio->titulo,$textoABuscar) !== false)
      {
          // Guardo el Anuncio en el array  
          array_push($arrayAnuncios,$anuncio);
      }
    }
    
    $_SESSION['vista'] = $vistas['filtrarAnuncio'];
    require_once $vistas['layout'];    
  }
?>