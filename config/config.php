<?php

  // Imágenes en local //
  define ('IMAGENES', "../webroot/img/");

  // Includes //
  include './core/funcionesValidarGenericas.php';
  //include './core/funcionesCookies.php';
  require './config/datosBD.php';
  require './dao/DAO.php';
  require './modelo/Usuario.php';
  require './dao/UsuarioDAO.php';

  // Controladores //
  $controladores = [
      'inicio' => 'controlador/cInicio.php',
      'login' => 'controlador/cLogin.php',
      'registro' => 'controlador/cRegistro.php'
  ];

  // Vistas //
  $vistas = [
      'inicio' => 'vista/vInicio.php',
      'login' => 'vista/vLogin.php',
      'layout' => 'vista/vLayout.php',
      'registro' => 'vista/vRegistro.php',
      'perfil' => 'vista/vPerfil.php'
  ];

?>