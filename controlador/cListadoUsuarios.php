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
  // Desactivar
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
  // Eliminar Usuario
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
  // Volver
  else if (isset($_POST['volver'])) 
  {
      $_SESSION['pagina'] = 'menu';
      header('Location: index.php');
      exit();
  }
  // Que sea la primera vez que se entra //
	else
	{
    // Recojo los usuarios de la BBDD
    $arrayUsuarios = UsuarioDAO::findAll();

    $_SESSION['vista'] = $vistas['listadoUsuarios'];
    require_once $vistas['layout'];    
	}
?>