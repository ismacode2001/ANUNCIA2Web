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

      $_SESSION['pagina'] = 'detalleAnuncio';
      header('Location: index.php');
      exit();
    }
    else
    {
      // Mensaje de error: "error al acceder al Anuncio"
    }
	}
  // Que sea la primera vez que se entra en el Menú //
	else
	{
    // Recojo los Anuncios de la BBDD
    $arrayAnuncios = AnuncioDAO::findAll();
    
    $_SESSION['vista'] = $vistas['menu'];
    require_once $vistas['layout'];    
	}
?>