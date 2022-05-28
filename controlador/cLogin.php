<?php 
  include './core/funcionesLogin.php';

  // Registro //
  if(isset($_POST['registro']))
  {
    $_SESSION['pagina'] = 'registro';
    header('Location: index.php');
    exit();
  }
  // Iniciar Sesión //
  else if (isset($_POST['iniciar']))
  {
    // Array que contendrá los errores
    $arrayErrores = Array();
    $_SESSION["erroresLogin"] = $arrayErrores;

    if(validaFormularioLogin("iniciar"))
    {
      unset($_SESSION["erroresLogin"]);

      // Recojo los datos del formulario
      $user = $_POST["email"];
      $pass = $_POST["pass"];

      // Se encripta la contraseña
      $pass = hash('sha256',$pass);

      // Compruebo si se desea recordar el usuario
      if(isset($_REQUEST["check"]))
      {
          // Si está activado...
          if($_REQUEST["check"] == "on")
          {
              // Guardo el usuario en una cookie (durará un año)
              setcookie("recordarUsuario",$_REQUEST["email"],time()+31536000 ,'/');
          }
      }
      // Si no... borro la cookie de recordar usuario
      else
        setcookie("recordarUsuario",$_REQUEST["email"],time() - 100 ,'/');
      
      // Compruebo si existe el usuario en la BBDD
      $estadoUsuario = UsuarioDAO::validaUser($user,$pass);

      // Si existe el usuario...
      if($estadoUsuario[0])
      {
        // Y además está activo..
        if($estadoUsuario[1])
        {
          // Guardo los datos del usuario en la sesion
          $_SESSION["validada"] = true;

          $usuario = UsuarioDAO::findByEmailAndPass($user,$pass);
          
          $_SESSION["idUsuario"] = $usuario->idUsuario;
          $_SESSION["nombreUsuario"] = $usuario->nombre;
          $_SESSION["apellidoUsuario"] = $usuario->apellido;
          $_SESSION["email"] = $usuario->email;
          $_SESSION["fechaNacUsuario"] = $usuario->fechaNacimiento;
          $_SESSION["numTelefono"] = $usuario->numTelefono;
          $_SESSION["usuarioActivo"] = $usuario->activo;
          $_SESSION["perfil"] = $usuario->perfil;
          $_SESSION["imagenPerfilUsuario"] = $usuario->imagenPerfil;
          
          // Se accede al inicio
          $_SESSION["pagina"] = "menu";
          header("Location: index.php");
        }
        else
        {
          $_SESSION["erroresLogin"]["pass"] = "El usuario no está activo";

          $_SESSION["vista"] = $vistas["login"];
          require_once $vistas["layout"];
        }
      }
      else
      {
          $_SESSION["erroresLogin"]["pass"] = "Usuario o contraseña incorrectos";

          $_SESSION["vista"] = $vistas["login"];
          require_once $vistas["layout"];
      }
      
    }
    else
    {
        //$_SESSION["mensaje"] = "No existe el usuario o contraseña";
        $_SESSION["vista"] = $vistas["login"];
        require_once $vistas["layout"];
    }
  }
  // Volver //
  else if (isset($_POST['volver']))
  {
    $_SESSION['pagina'] = 'inicio';
    header('Location: index.php');
    exit();   
  }
  // Por defecto (Login) //
  else
  {
    // Array que contendra los errores
    $arrayErrores = Array();
    $_SESSION["erroresLogin"] = $arrayErrores;

    $_SESSION['vista'] = $vistas['login'];
    require_once $vistas['layout'];
  }

?>