<?php

class UsuarioDAO implements DAO
{

  // Método que lista todos los usuarios
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
      $fechaNacimiento = $arrayDatos["fechaNacimiento"]["timestampValue"];
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

  // Método que busca un usuario por su id
  public static function findById($id)
  {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://firestore.googleapis.com/v1/projects/Anuncia2Web/databases/(default)/documents/Usuarios/" . $id . "?key=AIzaSyCyBul43xaEl0ZJ7JRcbeP2oU8QPkpHUt4");
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

    // Ejecuto la conexion
    $usuario = curl_exec($ch);

    // Cierre de la conexión
    curl_close($ch);

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
     curl_setopt($ch, CURLOPT_URL, "https://firestore.googleapis.com/v1/projects/Anuncia2Web/databases/(default)/documents/Usuarios/" . $datosU["idUsuario"] . "?key=AIzaSyCyBul43xaEl0ZJ7JRcbeP2oU8QPkpHUt4");

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

  // Método que crea un nuevo usuario
  public static function save($usuario)
  {
      // Objeto de tipo curl para hacer la peticion a la PR18
      $ch = curl_init();

      //curl_setopt($ch, CURLOPT_URL, "http://10.1.160.105/tema7/miapi/miapi.php/usuarios");
      curl_setopt($ch, CURLOPT_URL, "https://firestore.googleapis.com/v1/projects/Anuncia2Web/databases/(default)/documents/Usuarios/?key=AIzaSyCyBul43xaEl0ZJ7JRcbeP2oU8QPkpHUt4");

      // Array que contiene los parámetros que le paso por post
     $datosU = array('idUsuario'=>$usuario->idUsuario,'nombre'=>$usuario->nombre,'apellido'=>$usuario->apellido,
     'contraseña'=>$usuario->contraseña,'email'=>$usuario->email,'fechaNacimiento'=>$usuario->fechaNacimiento,
     'numTelefono'=>$usuario->numTelefono,'perfil'=>$usuario->perfil,'activo'=>$usuario->activo,
     'imagenPerfil'=>$usuario->imagenPerfil);

      // Se formatea el array para que lo entienda la cabecera del http
      $datoshttp = http_build_query($datosU);

      // Se le indica que lo queremos hacer por post
      curl_setopt($ch,CURLOPT_POST,true);

      // Se le pasan los parámetros a la cabecera del post
      curl_setopt($ch,CURLOPT_POSTFIELDS,$datoshttp);

      // Ejecuto la conexion
      $usuario = curl_exec($ch);

      // Cierre de la conexión
      curl_close($ch);

      return $usuario;
  }

  // Método que elimina un usuario en funcion de su id
  public static function deleteById($id)
  {
    
  }


  // Método que valida si existe un usuario
  public static function validaUser($user,$pass)
  {
      
  }
}

?>