<?php

  include './core/funcionesAnuncio.php';

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
  // Crear el anuncio
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
  // Que sea la primera vez que se entra //
	else
	{
    // Array que contendra los errores
    $arrayErrores = Array();
    $_SESSION["erroresAnuncio"] = $arrayErrores;

    $_SESSION['vista'] = $vistas['crearAnuncio'];
    require_once $vistas['layout'];    
	}
?>