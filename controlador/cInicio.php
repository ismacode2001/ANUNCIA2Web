<?php
	// Login //
	if (isset($_POST['login'])) {
    $_SESSION['pagina'] = 'login';
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
  // Registro //
  else if(isset($_POST['registro']))
  {
      $_SESSION['pagina'] = 'registro';
      header('Location: index.php');
      exit();
  }
	// Perfil //
	else if(isset($_POST['perfil']))
	{
    $_SESSION['pagina'] = 'perfil';
    header('Location: index.php');
    exit();
	}
  // Por defecto (Vista Inicial) //
	else
	{
    $_SESSION['vista'] = $vistas['inicio'];
    require_once $vistas['layout'];    
	}
?>