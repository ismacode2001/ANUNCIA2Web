<?php
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
  // Activar Usuario //
	else if(isset($_POST['activar']))
	{
    if(isset($_COOKIE["idUsuarioActivar"]))
    {
      $idUsuario = $_COOKIE["idUsuarioActivar"];

      // Recojo el usuario con ese email
      $usuario = UsuarioDAO::findById($idUsuario);
      $usuario->activo = true;
  
      UsuarioDAO::update($usuario);
          
      $_SESSION['pagina'] = 'listadoUsuarios';
      header('Location: index.php');
      exit();
    }
	}
  // Desactivar Usuario //
	else if(isset($_POST['desactivar']))
	{
    if(isset($_COOKIE["idUsuarioDesactivar"]))
    {
      $idUsuario = $_COOKIE["idUsuarioDesactivar"];
       
      // Recojo el usuario con ese id
      $usuario = UsuarioDAO::findById($idUsuario);
      $usuario->activo = 0;
  
      UsuarioDAO::update($usuario);
  
      $_SESSION['pagina'] = 'listadoUsuarios';
      header('Location: index.php');
      exit();
    }
	}
  // Eliminar Usuario //
	else if(isset($_POST['eliminarUsuario']))
	{
    if(isset($_COOKIE["idUsuarioEliminar"]))
    {
      // Recojo el id guardado en la cookie
      $idUsuario = $_COOKIE["idUsuarioEliminar"];        

      // Elimino el usuario en cuestión
      UsuarioDAO::deleteById($idUsuario);

      $_SESSION['pagina'] = 'listadoUsuarios';
      header('Location: index.php');
      exit();
    }
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
  // Por defecto (Vista Listado de Usuarios) //
	else
	{
    // Recojo los usuarios de la BBDD
    $arrayUsuarios = UsuarioDAO::findAll();

    $_SESSION['vista'] = $vistas['listadoUsuarios'];
    require_once $vistas['layout'];    
	}
?>