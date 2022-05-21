<?php

  include './core/funcionesRegistro.php';

  // Volver a Inicio
  if (isset($_POST['volver']))
  {
      $_SESSION['pagina'] = 'inicio';
      header('Location: index.php');
      exit();
  }
  // Registrar el usuario
  else if (isset($_POST['registro']))
  {
      // Array que contendra los errores
      $arrayErrores = Array();
      $_SESSION["erroresRegistro"] = $arrayErrores;

      if(validaFormularioRegistro("registro"))
      {
          // Guardo las imágenes
          guardaImagenPerfil("P","imagenPerfil","registro"); 

          // Enctripto la contraseña
          $contraseñaEncrip = hash('sha256', $_REQUEST["contraseña"]);

          // Creo el Usuario (Por defecto inactivo y con Perfil normal)
          $nuevoUsuario = new Usuario("",$_REQUEST["nombre"],$_REQUEST["apellido"],$contraseñaEncrip,$_REQUEST["email"],$_REQUEST["fechaNacimiento"],$_REQUEST["numTelefono"],"P_NORMAL",$_REQUEST["activo"],$_SESSION["idImagenP"]);
          UsuarioDAO::save($nuevoUsuario);

          // Le actualizo el id de Usuario al dado por el documento de la BBDD
          $usuario = UsuarioDAO::findByEmail($nuevoUsuario->email);
          $usuario->activo = "false";
          UsuarioDAO::update($usuario);
          
          unset($_SESSION["erroresRegistro"]);

          $_SESSION['pagina'] = 'login';
          header('Location: index.php');
          exit();
      }
      else
      {
          // Me quedo en el resgistro
          $_SESSION['vista'] = $vistas['registro'];
          require_once $vistas['layout'];
      }
  }
  // Acceder al login
  else if (isset($_POST['login']))
  {
      $_SESSION['pagina'] = 'login';
      header('Location: index.php');
      exit();
  }
  // La primera vez que se entra
  else
  {
      // Array que contendra los errores
      $arrayErrores = Array();
      $_SESSION["erroresRegistro"] = $arrayErrores;

      $_SESSION['vista'] = $vistas['registro'];
      require_once $vistas['layout'];
  }
?>
