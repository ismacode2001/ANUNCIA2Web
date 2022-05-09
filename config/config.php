<?php

  // Imágenes (local) //
  define('IMAGENES',"./webroot/img/");

  // Funciones Generales //
  include './core/funcionesValidarGenericas.php';
  //include './core/funcionesCookies.php';

  // Modelos //
  require './modelo/Usuario.php';
  require './modelo/Anuncio.php';

  // DAO //
  require './dao/DAO.php';
  require './dao/UsuarioDAO.php';
  require './dao/AnuncioDAO.php';

  // Config //
  require './config/datosBD.php';

  // Controladores //
  $controladores = [
      'inicio' => 'controlador/cInicio.php',
      'login' => 'controlador/cLogin.php',
      'registro' => 'controlador/cRegistro.php',
      'perfil' => 'controlador/cPerfil.php',
      'menu' => 'controlador/cMenu.php',
      'listadoUsuarios' => 'controlador/cListadoUsuarios.php',
      'modificarPerfil' => 'controlador/cModificarPerfil.php',
      'detalleAnuncio' => 'controlador/cDetalleAnuncio.php',
      'crearAnuncio' => 'controlador/cCrearAnuncio.php',
  ];

  // Vistas //
  $vistas = [
      'inicio' => 'vista/vInicio.php',
      'login' => 'vista/vLogin.php',
      'layout' => 'vista/vLayout.php',
      'registro' => 'vista/vRegistro.php',
      'perfil' => 'vista/vPerfil.php',
      'menu' => 'vista/vMenu.php',
      'listadoUsuarios' => 'vista/vListadoUsuarios.php',
      'modificarPerfil' => 'vista/vModificarPerfil.php',
      'detalleAnuncio' => 'vista/vDetalleAnuncio.php',
      'crearAnuncio' => 'vista/vCrearAnuncio.php',
  ];

?>