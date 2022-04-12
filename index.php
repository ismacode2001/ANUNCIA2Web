<?php

  // Importación del archivo de configuración
  require './config/config.php';

  // Se inicia la sesión
  session_start();

  // Si el usuario está logueado correctamente...
  if(isset($_SESSION['validada']))
  {
      // Establezco el controlador requerido
      $controlador = $controladores[$_SESSION['pagina']];
      require_once $controlador;
      exit();
  }
  // En caso contrario...
  else
  {  
      if(isset($_SESSION['pagina']))
      {
          $controlador = $controladores[$_SESSION['pagina']];
          require_once $controlador;
          exit();
      }
  }

  // Que sea la primera vez que se entra en login //
  $_SESSION['vista'] = $vistas['inicio'];
  $_SESSION['pagina'] = 'inicio';
  require_once $vistas['layout'];
  
  //$res = UsuarioDAO::findAll();

  /*
  echo "<pre>";
  print_r($res);
  echo "</pre>";
  */
?>