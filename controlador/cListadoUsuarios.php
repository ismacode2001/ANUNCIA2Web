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
    // Activar
	else if(isset($_POST['activar']))
	{
        // Recojo el email del Usuario
        if(isset($_POST["emailUsuario"]))
        {
            $emailUsuario = $_POST["emailUsuario"];
            //$_SESSION["emailUsuario"] = $emailUsuario;

            // Recojo el usuario con ese email
            $usuario = UsuarioDAO::findByEmail($emailUsuario);

            $usuario->activo = true;

            UsuarioDAO::update($usuario);
        }
    
        $_SESSION['pagina'] = 'listadoUsuarios';
        header('Location: index.php');
        exit();
	}
    // Desactivar
	else if(isset($_POST['desactivar']))
	{
        // Recojo el email del Usuario
        if(isset($_POST["emailUsuario"]))
        {
            $emailUsuario = $_POST["emailUsuario"];
            //$_SESSION["emailUsuario"] = $emailUsuario;

            // Recojo el usuario con ese email
            $usuario = UsuarioDAO::findByEmail($emailUsuario);

            $usuario->activo = 0;
            //$usuario->imagenPerfil = "xxx";

            UsuarioDAO::update($usuario);
        }
    
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
	else
	{
    // Que sea la primera vez que se entra //
    $_SESSION['vista'] = $vistas['listadoUsuarios'];
    require_once $vistas['layout'];    
	}
?>