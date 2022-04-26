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
          // Enctripto la contraseña
          $contraseñaEncrip = sha1($_REQUEST["contraseña"]);

          //$fechaNacimiento = fechaToString($_REQUEST["fechaNacimiento"]);
          $fechaNacimiento = $_REQUEST["fechaNacimiento"];
          //$fechaNacimiento = ->format('Y-m-d H:i:s');

          $nuevoUsuario = new Usuario("",$_REQUEST["nombre"],$_REQUEST["apellido"],$contraseñaEncrip,$_REQUEST["email"],$fechaNacimiento,$_REQUEST["numTelefono"],"P_NORMAL",$_REQUEST["activo"],"imagenPorDefecto");
          echo UsuarioDAO::save($nuevoUsuario);
          
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
