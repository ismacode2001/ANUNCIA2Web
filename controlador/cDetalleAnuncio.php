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
  // Insertar Comentario //
  else if(isset($_POST['insertarComentario']))
	{
    if(isset($_COOKIE["idAnuncioComentar"]))
    {
      $idAnuncio = $_COOKIE["idAnuncioComentar"];
      $arrayFecha = getdate();
      $fecha = $arrayFecha['mday'] . "/" . $arrayFecha['mon'] . "/" . $arrayFecha['year'];
      $comentario = new Comentario("1",$idAnuncio,$_SESSION["idUsuario"],$fecha,$_REQUEST["comentario"]);

      // Guardo el comentario
      ComentarioDAO::save($comentario);

      // Le actualizo el id al Comentario al dado por el documento de la BBDD
      $comentarioU = ComentarioDAO::findById($comentario->idComentario);
      ComentarioDAO::update($comentarioU);

      $_SESSION['pagina'] = 'detalleAnuncio';
      header('Location: index.php');
      exit();
    }
    else
    {
      // Mensaje de error: "error al acceder al Anuncio"
    }
	}
  // Ver Detalle del Anuncio //
  else if(isset($_POST['detalleAnuncio']))
	{
    if(isset($_POST["idAnuncio"]))
    {
      // Busco el Anuncio con dicho ID
      AnuncioDAO::findById($_POST["idAnuncio"]);

      $_SESSION['pagina'] = 'detalleAnuncio';
      header('Location: index.php');
      exit();
    }
    else
    {
      // Mensaje de error: "error al acceder al Anuncio"
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
  // Modificar Anuncio //
  else if(isset($_POST['modificarAnuncio']))
  {
    $idAnuncio = $_REQUEST["idAnuncio"];
    $_SESSION["idAnuncioModificar"] = $idAnuncio;

    $_SESSION['pagina'] = 'modificarAnuncio';
    header('Location: index.php');
    exit();
  }
  // Eliminar Anuncio //
  else if(isset($_POST['eliminarAnuncio']))
	{
    if(isset($_COOKIE["idAnuncioComentar"]))
    {
      $idAnuncio = $_COOKIE["idAnuncioComentar"];
      
      $anuncio = AnuncioDAO::findById($idAnuncio);

      // Elimino el Anuncio
      AnuncioDAO::deleteById($idAnuncio);

      // Elimino las imágenes asociadas al Anuncio
      ImagenDAO::deleteById($anuncio->imagen1);
      ImagenDAO::deleteById($anuncio->imagen2);

      // Elimino los Favoritos asociados al Anuncio
      $favoritos = FavoritoDAO::findAll();

      foreach ($favoritos as $favorito) {
        if($favorito->idAnuncio == $idAnuncio)
          FavoritoDAO::deleteById($favorito->idFavorito);
      }

      $_SESSION['pagina'] = 'menu';
      header('Location: index.php');
      exit();
    }
    else
    {
      // Mensaje de error: "error al acceder al Anuncio"
    }
	}
  // Ver Perfil //
  else if(isset($_POST['verPerfil']))
  {
    if(isset($_POST["idUsuario"]))
    {
      // Guardo el id del Usuario
      $_SESSION["idUsuarioVer"] = $_POST["idUsuario"];

      $_SESSION['pagina'] = 'verPerfil';
      header('Location: index.php');
      exit();
    }
    else
    {
      // Mensaje de error: "error al acceder al Anuncio"
    }
  }
  // Por defecto (Vista Detalle Anuncio) //
	else
	{
   // Array que contendra los errores
   $arrayErrores = Array();
   $_SESSION["erroresDetalle"] = $arrayErrores;

   $idAnuncio = $_SESSION["idAnuncio"];
   $anuncio = AnuncioDAO::findById($idAnuncio);

   $_SESSION['vista'] = $vistas['detalleAnuncio'];
   require_once $vistas['layout'];
	}
?>