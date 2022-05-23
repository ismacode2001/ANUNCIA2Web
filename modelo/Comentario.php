<?php

  class Comentario
  {
    // Atributos
    private $idComentario;
    private $idAnuncio;
    private $idUsuario;
    private $fecha;
    private $comentario;
    
    // Constructor
    function __construct($idComentario,$idAnuncio,$idUsuario,$fecha,$comentario){
        $this->idComentario = $idComentario;
        $this->idAnuncio = $idAnuncio;
        $this->idUsuario = $idUsuario;
        $this->fecha = $fecha;
        $this->comentario = $comentario;
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