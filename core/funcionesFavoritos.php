<?php
    
  // Función que añade un Anuncio como Favorito //
  function añadeFavorito()
  {

  }

  // Función que comprueba si un Anuncio está marcado como Favorito //
  function existeFavorito($idUsuario,$idAnuncio)
  {
    $existeFavorito = false;

    // Busco el Favorito por Usuario y Anucnio
    $favorito = FavoritoDAO::findByUsuarioYAnuncio($idUsuario,$idAnuncio);
    
    // Si no existe...
    if($favorito != null)
      $existeFavorito = true;

    return $existeFavorito;
  }

?>
