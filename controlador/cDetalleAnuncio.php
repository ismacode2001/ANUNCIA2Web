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
  // Volver
  else if (isset($_POST['volver'])) 
  {
      $_SESSION['pagina'] = 'menu';
      header('Location: index.php');
      exit();
  }
  // Insertar Comentario
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
  // Ver Detalle del Anuncio
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
  // Que sea la primera vez que se entra en el Detalle //
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