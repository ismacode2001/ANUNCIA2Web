<?php

include './core/funcionesPerfil.php';

  // Volver //
  if (isset($_POST['volver'])) 
  {
    $_SESSION['pagina'] = 'menu';
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
  // Modificar Perfil //
  else if(isset($_POST['modificar']))
  {
    // Accedo a la página de modificar
    $_SESSION['pagina'] = 'modificarPerfil';
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
  // Por defecto (Vista de Perfil del Usuario) //
  else
  {
      // Array que contendra los errores
      $arrayErrores = Array();
      $_SESSION["erroresPerfil"] = $arrayErrores;

      $idUsuario = $_SESSION["idUsuario"];
      $usuario = UsuarioDAO::findById($idUsuario);

      $_SESSION['vista'] = $vistas['perfil'];
      require_once $vistas['layout'];
  }
?>