<?php

  class Usuario
  {
      // Atributos
      private $idUsuario;
      private $nombre;
      private $apellido;
      private $contraseña;
      private $email;
      private $fechaNacimiento;
      private $numTelefono;
      private $perfil;
      private $activo;
      private $imagenPerfil;

      // Constructor
      function __construct($idUsuario,$nombre,$apellido,$contraseña,$email,$fechaNacimiento,$numTelefono,$perfil,$activo,$imagenPerfil){
          $this->idUsuario = $idUsuario;
          $this->nombre = $nombre;
          $this->apellido = $apellido;
          $this->contraseña = $contraseña;
          $this->email = $email;
          $this->fechaNacimiento = $fechaNacimiento;
          $this->numTelefono = $numTelefono;
          $this->perfil = $perfil;
          $this->activo = $activo;
          $this->imagenPerfil = $imagenPerfil;
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