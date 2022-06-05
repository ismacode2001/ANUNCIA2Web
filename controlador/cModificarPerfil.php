<?php

include './core/funcionesPerfil.php';

    // Volver //
    if (isset($_POST['volver'])) 
    {
      $_SESSION['pagina'] = 'perfil';
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
    // Modificar el Perfil de Usuario //
    else if(isset($_POST['guardarMod']))
    {
      // Array que contendra los errores
      $arrayErrores = Array();
      $_SESSION["erroresModPerfil"] = $arrayErrores;

      // Usuario con la sesion activa
      $usuario = UsuarioDAO::findByEmail($_SESSION["email"]);

      if(validaFormularioPerfil("guardarMod"))
      {
        // Guardo las imágenes
        guardaImagenPerfil("P","imagenPerfil","guardarMod");

        // Encripto la contraseña
        $contraseña = hash('sha256', $_REQUEST["contraseñaNueva"]);

        $nuevoUsuario = new Usuario($_SESSION["idUsuario"],$_REQUEST["nombre"],$_REQUEST["apellido"],$contraseña,$_REQUEST["email"],
          $_REQUEST["fechaNacimiento"],$_REQUEST["numTelefono"],$_REQUEST["perfil"],$_REQUEST["activo"],$_SESSION["idImagenP"]);
       
        // Modifico el Usuario
        UsuarioDAO::update($nuevoUsuario);

        $_SESSION['pagina'] = 'perfil';
        header('Location: index.php');
        exit();
      }
      else
      {
        // Me quedo en el perfil
        $_SESSION['vista'] = $vistas['modificarPerfil'];
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
    // Por defecto (Vista Modificar Perfil) //
    else
    {
      // Array que contendra los errores
      $arrayErrores = Array();
      $_SESSION["erroresModPerfil"] = $arrayErrores;

      $emailUsuario = $_SESSION["email"];
      $usuario = UsuarioDAO::findByEmail($emailUsuario);

      $_SESSION['vista'] = $vistas['modificarPerfil'];
      require_once $vistas['layout'];
    }
?>