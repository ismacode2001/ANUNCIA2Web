<?php

  class Anuncio
  {
    // Atributos
    private $idAnuncio;
    private $titulo;
    private $descripcion;
    private $categoria;
    private $precio;
    private $fechaAnuncio;
    private $ubicacion;
    private $idUsuario;
    private $imagen1;
    private $imagen2;

    // Constructor
    function __construct($idAnuncio,$titulo,$descripcion,$categoria,$precio,$fechaAnuncio,$ubicacion,$idUsuario,$imagen1,$imagen2){
        $this->idAnuncio = $idAnuncio;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->categoria = $categoria;
        $this->precio = $precio;
        $this->fechaAnuncio = $fechaAnuncio;
        $this->ubicacion = $ubicacion;
        $this->idUsuario = $idUsuario;
        $this->imagen1 = $imagen1;
        $this->imagen2 = $imagen2;
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