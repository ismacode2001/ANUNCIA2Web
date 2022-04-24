<?php

  class Favorito
  {
    // Atributos
    private $idFavorito;
    private $idUsuario;
    private $idAnuncio;
    private $fecha;

    // Constructor
    function __construct($idFavorito,$idUsuario,$idAnuncio,$fecha){
        $this->idFavorito = $idFavorito;
        $this->idUsuario = $idUsuario;
        $this->idAnuncio = $idAnuncio;
        $this->fecha = $fecha;
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