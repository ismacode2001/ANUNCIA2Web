<?php

  class Favorito
  {
    // Atributos
    private $idFavorito;
    private $idUsuario;
    private $idAnuncio;

    // Constructor
    function __construct($idFavorito,$idUsuario,$idAnuncio){
      $this->idFavorito = $idFavorito;
      $this->idUsuario = $idUsuario;
      $this->idAnuncio = $idAnuncio;
    }

    // Getter genérico
    public function __get($name)
    {
      return $this->$name;
    }

    // Setter genérico
    public function __set($name,$valor)
    {
      $this->$name = $valor;
    }
  }
?>