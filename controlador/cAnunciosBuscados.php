<?php
  include './core/funcionesFavoritos.php';

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
  // Listado de Usuarios //
	else if(isset($_POST['mostrarUsuarios']))
	{
    $_SESSION['pagina'] = 'listadoUsuarios';
    header('Location: index.php');
    exit();
	}
  // Ver Detalle del Anuncio //
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
	}
  // Crear Anuncio //
	else if(isset($_POST['crearAnuncio']))
	{
    $_SESSION['pagina'] = 'crearAnuncio';
    header('Location: index.php');
    exit();
	}
  // Buscar Anuncio //
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
  // Volver //
  else if (isset($_POST['volver'])) 
  {
      $_SESSION['pagina'] = 'menu';
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
  // Añadir Anuncio a Favoritos //
  else if(isset($_POST["añadirFavorito"]))
  {
    $favorito = new Favorito("x",$_SESSION["idUsuario"],$_REQUEST["idAnuncio"]);
    FavoritoDAO::save($favorito);

    // Le actualizo el id de Favorito al dado por el documento de la BBDD
    $nuevoFavorito = FavoritoDAO::findByUsuarioYAnuncio($_SESSION["idUsuario"],$_REQUEST["idAnuncio"]);
    FavoritoDAO::update($nuevoFavorito);
    
    $_SESSION['pagina'] = 'filtrarAnuncio';
    header('Location: index.php');
    exit();    
  }
  // Quitar Anuncio de Favoritos //
  else if(isset($_POST["quitarFavorito"]))
  {
    $favorito = FavoritoDAO::findByUsuarioYAnuncio($_SESSION["idUsuario"],$_REQUEST["idAnuncio"]);
    FavoritoDAO::deleteById($favorito->idFavorito);
    
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
  // Por defecto (Anuncios Filtrados) //
	else
	{
    //$textoABuscar = $_POST["buscaAnuncio"];
    $textoABuscar = $_SESSION["textoABuscar"];
    
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
    
    $_SESSION['vista'] = $vistas['buscarAnuncio'];
    require_once $vistas['layout'];    
  }
?>