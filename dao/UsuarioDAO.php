<?php

class UsuarioDAO implements DAO
{

  // Método que lista todos los Usuarios //
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

    if(count($arrayUsuarios) > 0)
    {
      // Por cada Usuario...
      foreach ($arrayUsuarios["documents"] as $arrayUsuario)
      {
        $arrayDatos = $arrayUsuario["fields"];
  
        $rutaDocumento = $arrayUsuario["name"];
        $partes = explode("/",$rutaDocumento);
  
        $idUsuario = $partes[count($partes) - 1];
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
    }

    return $usuarios;
  }

  // Método que busca un Usuario por su email y contraseña //
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

    if(count($arrayUsuarios) > 0)
    {
      // Por cada Usuario...
      foreach ($arrayUsuarios["documents"] as $arrayUsuario)
      {
        $arrayDatos = $arrayUsuario["fields"];

        $emailU = $arrayDatos["email"]["stringValue"];
        $contraseñaU = $arrayDatos["contraseña"]["stringValue"];

        if(($emailU == $email)&&($contraseñaU == $contraseña))
        {
          $rutaDocumento = $arrayUsuario["name"];
          $partes = explode("/",$rutaDocumento);

          $idUsuario = $partes[count($partes) - 1];
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
    }

    return $usuario;
  }

  // Método que busca un Usuario por su id //
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

    if(count($arrayUsuarios) > 0)
    {
      // Por cada Usuario...
      foreach ($arrayUsuarios["documents"] as $arrayUsuario)
      {
        $arrayDatos = $arrayUsuario["fields"];
        $idUsuario = $arrayDatos["idUsuario"]["stringValue"];
      
        if($idUsuario == $id)
        {
          $rutaDocumento = $arrayUsuario["name"];
          $partes = explode("/",$rutaDocumento);
    
          $idUsuario = $partes[count($partes) - 1];
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
    }

    return $usuario;
  }

  // Método que busca un Usuario por su email //
  public static function findByEmail($email)
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

    if(count($arrayUsuarios) > 0)
    {
      // Por cada Usuario...
      foreach ($arrayUsuarios["documents"] as $arrayUsuario)
      {
        $arrayDatos = $arrayUsuario["fields"];
        $emailUsuario = $arrayDatos["email"]["stringValue"];
      
        if($emailUsuario == $email)
        {
          $rutaDocumento = $arrayUsuario["name"];
          $partes = explode("/",$rutaDocumento);
    
          $idUsuario = $partes[count($partes) - 1];
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
    }

    return $usuario;
  }

  // Método que modifica/actualiza un Usuario //
  public static function update($usuario)
  {
     // Objeto de tipo curl para hacer la peticion
    $ch = curl_init();

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
              'stringValue': '" . $usuario->fechaNacimiento . "'
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

     // url
     curl_setopt($ch, CURLOPT_URL, "https://firestore.googleapis.com/v1/projects/anuncia2web-a77cc/databases/(default)/documents/Usuarios/" . $usuario->idUsuario);

     // Se le indica que lo queremos hacer por put, indicandole como va a ir la cabecera
     curl_setopt($ch,CURLOPT_HTTPHEADER,
         array("Content-Type: application/json",
                 "Content.length: " . strlen($json)));

     // Se le pasan los parámetros a la cabecera del post
     curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'PATCH');

     // Parametros
     curl_setopt($ch,CURLOPT_POSTFIELDS,$json);

     // Quiero respuesta
     curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

     // Ejecuto la conexion
     $usuario = curl_exec($ch);

     // Cierre de la conexión
     curl_close($ch);

     return $usuario;
  }

  // Método que inserta un nuevo Usuario //
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
              'stringValue': '" . $usuario->fechaNacimiento . "'
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

  // Método que elimina un Usuario en funcion de su Id //
  public static function deleteById($id)
  {
    // Objeto de tipo curl para hacer la peticion
    $ch = curl_init();

    // url
    curl_setopt($ch, CURLOPT_URL, "https://firestore.googleapis.com/v1/projects/anuncia2web-a77cc/databases/(default)/documents/Usuarios/" . $id);

    // Se le pasan los parámetros a la cabecera del post
    curl_setopt($ch,CURLOPT_CUSTOMREQUEST,'DELETE');

    // Quiero respuesta
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

    // Ejecuto la conexion
    $usuario = curl_exec($ch);

    // Cierre de la conexión
    curl_close($ch);

    return $usuario;
  }

  // Método que valida si existe un Usuario (activo) mediante sus credenciales //
  public static function validaUser($email,$contraseña)
  {
    // Compruebo que existe dicho usuario con esas credenciales
    $usuarios = UsuarioDAO::findAll();

    $existe = false;
    $activo = false;

    if(count($usuarios) > 0)
    {
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
    }

    // Devuelvo un array con la información del usuario (si existe y si está activo)
    return array($existe,$activo);
  }
}

?>