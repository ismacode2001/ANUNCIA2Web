<?php

  // Imágenes (local) //
  define('IMAGENES',"./webroot/img/");

  // Imágenes (temporales) //
  define('IMAGENES_TEMP',"./webroot/img/temp/");

  // Funciones Generales //
  include './core/funcionesValidarGenericas.php';
  include './core/funcionesImagenes.php';

  // Modelos //
  require './modelo/Usuario.php';
  require './modelo/Anuncio.php';
  require './modelo/Imagen.php';
  require './modelo/Comentario.php';
  require './modelo/Favorito.php';

  // DAO //
  require './dao/DAO.php';
  require './dao/UsuarioDAO.php';
  require './dao/AnuncioDAO.php';
  require './dao/ImagenDAO.php';
  require './dao/ComentarioDAO.php';
  require './dao/FavoritoDAO.php';

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
      'buscarAnuncio' => 'controlador/cAnunciosBuscados.php',
      'favoritos' => 'controlador/cFavoritos.php',
      'acercaDe' => 'controlador/cAcercaDe.php',
      'ayuda' => 'controlador/cAyuda.php',
      'filtrarAnuncio' => 'controlador/cAnunciosFiltrados.php',
      'modificarAnuncio' => 'controlador/cModificarAnuncio.php',
      'verPerfil' => 'controlador/cVerPerfil.php',
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
      'buscarAnuncio' => 'vista/vAnunciosBuscados.php',
      'favoritos' => 'vista/vFavoritos.php',
      'acercaDe' => 'vista/vAcercaDe.php',
      'ayuda' => 'vista/vAyuda.php',
      'filtrarAnuncio' => 'vista/vAnunciosFiltrados.php',
      'modificarAnuncio' => 'vista/vModificarAnuncio.php',
      'verPerfil' => 'vista/vVerPerfil.php',
  ];

?>