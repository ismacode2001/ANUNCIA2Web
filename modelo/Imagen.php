<?php

  class Imagen
  {
    // Atributos
    private $idImagen;
    private $cadena;
    private $nombre;

    // Constructor
    function __construct($idImagen,$cadena,$nombre){
        $this->idImagen = $idImagen;
        $this->cadena = $cadena;
        $this->nombre = $nombre;
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