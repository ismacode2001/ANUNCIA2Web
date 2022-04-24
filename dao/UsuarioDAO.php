<?php

class UsuarioDAO implements DAO
{

  // Método que lista todos los Usuarios
  public static function findAll()
  {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://firestore.googleapis.com/v1/projects/anuncia2web-a77cc/databases/(default)/documents/Usuarios/");
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

    // Ejecuto la conexion
    $jsonUsuarios = curl_exec($ch);

    // Cierre de la conexión
    curl_close($ch);

    $arrayUsuarios = json_decode($jsonUsuarios,true); // decode the JSON feed
    
    // Array que contiene los objetos de tipo Usuario
    $usuarios = [];

    // Por cada Usuario...
    foreach ($arrayUsuarios["documents"] as $arrayUsuario)
    {
      $arrayDatos = $arrayUsuario["fields"];

      $idUsuario = $arrayDatos["idUsuario"]["stringValue"];
      $nombre = $arrayDatos["nombre"]["stringValue"];
      $apellido = $arrayDatos["apellido"]["stringValue"];
      $contraseña = $arrayDatos["contraseña"]["stringValue"];
      $email = $arrayDatos["email"]["stringValue"];
      $fechaNacimiento = $arrayDatos["fechaNacimiento"]["stringValue"];
      $numTelefono = $arrayDatos["numTelefono"]["stringValue"];
      $perfil = $arrayDatos["perfil"]["stringValue"];
      $activo = $arrayDatos["activo"]["booleanValue"];
      $imagenPerfil = $arrayDatos["imagenPerfil"]["stringValue"];

      $usuario = new Usuario($idUsuario,$nombre,$apellido,$contraseña,$email,
        $fechaNacimiento,$numTelefono,$perfil,$activo,$imagenPerfil);

      array_push($usuarios,$usuario);
    }

    return $usuarios;
  }

  // Método que busca un Usuario por su email y contraseña
  public static function findByEmailAndPass($email,$contraseña)
  {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://firestore.googleapis.com/v1/projects/anuncia2web-a77cc/databases/(default)/documents/Usuarios/");
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

    // Ejecuto la conexion
    $jsonUsuarios = curl_exec($ch);

    // Cierre de la conexión
    curl_close($ch);

    $arrayUsuarios = json_decode($jsonUsuarios,true); // decode the JSON feed
    
    // Array que contiene los objetos de tipo Usuario
    $usuario = null;

    // Por cada Usuario...
    foreach ($arrayUsuarios["documents"] as $arrayUsuario)
    {
      $arrayDatos = $arrayUsuario["fields"];

      $emailU = $arrayDatos["email"]["stringValue"];
      $contraseñaU = $arrayDatos["contraseña"]["stringValue"];

      if(($emailU == $email)&&($contraseñaU == $contraseña))
      {
        $idUsuario = $arrayDatos["idUsuario"]["stringValue"];
        $nombre = $arrayDatos["nombre"]["stringValue"];
        $apellido = $arrayDatos["apellido"]["stringValue"];
        $contraseña = $arrayDatos["contraseña"]["stringValue"];
        $email = $arrayDatos["email"]["stringValue"];
        $fechaNacimiento = $arrayDatos["fechaNacimiento"]["stringValue"];
        $numTelefono = $arrayDatos["numTelefono"]["stringValue"];
        $perfil = $arrayDatos["perfil"]["stringValue"];
        $activo = $arrayDatos["activo"]["booleanValue"];
        $imagenPerfil = $arrayDatos["imagenPerfil"]["stringValue"];
  
        $usuario = new Usuario($idUsuario,$nombre,$apellido,$contraseña,$email,
          $fechaNacimiento,$numTelefono,$perfil,$activo,$imagenPerfil);
  
        //array_push($usuarios,$usuario);
      }
      
    }

    return $usuario;
  }

  // Método que busca un Usuario por su id
  public static function findById($id)
  {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://firestore.googleapis.com/v1/projects/anuncia2web-a77cc/databases/(default)/documents/Usuarios/");
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

    // Ejecuto la conexion
    $jsonUsuarios = curl_exec($ch);

    // Cierre de la conexión
    curl_close($ch);

    $arrayUsuarios = json_decode($jsonUsuarios,true); // decode the JSON feed
    
    // Array que contiene los objetos de tipo Usuario
    $usuario = null;

    // Por cada Usuario...
    foreach ($arrayUsuarios["documents"] as $arrayUsuario)
    {
      $arrayDatos = $arrayUsuario["fields"];
      $idUsuario = $arrayDatos["idUsuario"]["stringValue"];
     
      if($idUsuario == $id)
      {
        $idUsuario = $arrayDatos["idUsuario"]["stringValue"];
        $nombre = $arrayDatos["nombre"]["stringValue"];
        $apellido = $arrayDatos["apellido"]["stringValue"];
        $contraseña = $arrayDatos["contraseña"]["stringValue"];
        $email = $arrayDatos["email"]["stringValue"];
        $fechaNacimiento = $arrayDatos["fechaNacimiento"]["stringValue"];
        $numTelefono = $arrayDatos["numTelefono"]["stringValue"];
        $perfil = $arrayDatos["perfil"]["stringValue"];
        $activo = $arrayDatos["activo"]["booleanValue"];
        $imagenPerfil = $arrayDatos["imagenPerfil"]["stringValue"];
  
        $usuario = new Usuario($idUsuario,$nombre,$apellido,$contraseña,$email,
          $fechaNacimiento,$numTelefono,$perfil,$activo,$imagenPerfil);
  
      }
      
    }

    return $usuario;
  }

  // Método que modifica/actualiza un Usuario
  public static function update($usuario)
  {
     // Objeto de tipo curl para hacer la peticion a la PR18
     $ch = curl_init();

     // Array que contiene los parámetros que le paso por post
     $datosU = array('idUsuario'=>$usuario->idUsuario,'nombre'=>$usuario->nombre,'apellido'=>$usuario->apellido,
              'contraseña'=>$usuario->contraseña,'email'=>$usuario->email,'fechaNacimiento'=>$usuario->fechaNacimiento,
              'numTelefono'=>$usuario->numTelefono,'perfil'=>$usuario->perfil,'activo'=>$usuario->activo,
              'imagenPerfil'=>$usuario->imagenPerfil);

     // url
     curl_setopt($ch, CURLOPT_URL, "https://firestore.googleapis.com/v1/projects/anuncia2web-a77cc/databases/(default)/documents/Usuarios/" . $datosU["idUsuario"] . "?key=AIzaSyCyBul43xaEl0ZJ7JRcbeP2oU8QPkpHUt4");

     // Se formatea el array a formato json
     $datosjson = json_encode($datosU);

     // Se le indica que lo queremos hacer por put, indicandole como va a ir la cabecera
     curl_setopt($ch,CURLOPT_HTTPHEADER,
         array("Content-Type: application/json",
                 "Content.length: " . strlen($datosjson)));

     // Se le pasan los parámetros a la cabecera del post
     curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'PUT');

     // Parametros
     curl_setopt($ch,CURLOPT_POSTFIELDS,$datosjson);

     // Quiero respuesta
     curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

     // Ejecuto la conexion
     $usuario = curl_exec($ch);

     // Cierre de la conexión
     curl_close($ch);

     return $usuario;
  }

  // Método que inserta un nuevo Usuario
  public static function save($usuario)
  {
    // Objeto de tipo curl para hacer la peticion a la PR18
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://firestore.googleapis.com/v1/projects/anuncia2web-a77cc/databases/(default)/documents/Usuarios/");

    $json = "{
      'fields':{
          'idUsuario':{
              'stringValue': '" . $usuario->idUsuario . "'
          },
          'nombre':{
              'stringValue': '" . $usuario->nombre . "'
          },
          'apellido':{
              'stringValue': '" . $usuario->apellido . "'
          },
          'contraseña':{
              'stringValue': '" . $usuario->contraseña . "'
          },
          'email':{
              'stringValue': '" . $usuario->email . "'
          },
          'fechaNacimiento':{
              'stringValue': '24/02/2001'
          },
          'numTelefono':{
              'stringValue': '" . $usuario->numTelefono ."'
          },
          'perfil':{
              'stringValue': '" . $usuario->perfil ."'
          },
          'activo':{
              'booleanValue': '" . $usuario->activo . "'
          },
          'imagenPerfil':{
              'stringValue': '" . $usuario->imagenPerfil . "'
          }
      }
    }";

    curl_setopt_array($ch, array(
      CURLOPT_POST=>1,
      CURLOPT_HTTPHEADER=>array(
      'Content-Type: application/json',
      'Content-Length: ' . strlen($json)
      ),
      CURLOPT_POSTFIELDS=>$json
      ));

    // Ejecuto la conexion
    $respuesta = curl_exec($ch);

    // Cierre de la conexión
    curl_close($ch);

    return $respuesta;
  }

  // Método que elimina un Usuario en funcion de su id
  public static function deleteById($id)
  {
    
  }


  // Método que valida si existe un Usuario (activo) mediante sus credenciales
  public static function validaUser($email,$contraseña)
  {
    // Compruebo que existe dicho usuario con esas credenciales
    $usuarios = UsuarioDAO::findAll();

    $existe = false;
    $activo = false;

    foreach ($usuarios as $usuario) 
    {
      // Si coinciden las credenciales...
      if(($usuario->email == $email)&&($usuario->contraseña == $contraseña))
      {
        $existe = true;

        // Compruebo que esté activo (requisito para poder loguearse)
        if($usuario->activo == true)
          $activo = true;
      }
    }

    // Devuelvo un array con la información del usuario (si existe y si está activo)
    return array($existe,$activo);
  }
}

?>